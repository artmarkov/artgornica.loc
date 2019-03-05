<?php

namespace backend\modules\event\models;

use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "{{%event_programm}}".
 *
 * @property int $id
 * @property int $vid_id
 * @property string $name
 * @property string $description
 * @property string $assignment
 * @property int $programm_price
 * @property int $created_at
 * @property int $updated_at
 * @property EventItemProgramm[] $eventItemProgramms
 * @property EventVid $vid
 * @property EventSchedule[] $eventSchedules
 */
class EventProgramm extends \yeesoft\db\ActiveRecord
{
     public $gridItemsSearch;
     public $item_id;
     public $mediaFirst;

     /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%event_programm}}';
    }

     /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vid_id', 'name'], 'required'],
            [['vid_id', 'programm_price'], 'integer'],
            [['description', 'assignment'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 127],
            [['vid_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventVid::className(), 'targetAttribute' => ['vid_id' => 'id']],
            [['item_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee', 'ID'),
            'vid_id' => Yii::t('yee', 'Vid ID'),
            'name' => Yii::t('yee', 'Name'),
            'description' => Yii::t('yee', 'Description'),
            'assignment' => Yii::t('yee/event', 'Assignment'),
            'created_at' => Yii::t('yee', 'Created At'),
            'updated_at' => Yii::t('yee', 'Updated At'),
            'gridItemsSearch' => Yii::t('yee/event', 'Events List'),
            'item_id' => Yii::t('yee/event', 'Events List'),
            'programm_price' => Yii::t('yee/event', 'Programm Price'),
            'fullPrice' => Yii::t('yee/event', 'Price Summ'),                      
            'mediaFirst' => Yii::t('yee/media', 'Media First'),   
        ];
    }
    
     /* Геттер для стоимости всей пролграммы */
    
    public function getFullPrice()
    {
        return EventItemProgramm::getFullItemPrice($this->id);
    }
    
    public function getCreatedDate()
    {
        return Yii::$app->formatter->asDate(($this->isNewRecord) ? time() : $this->created_at);
    }

    public function getUpdatedDate()
    {
        return Yii::$app->formatter->asDate(($this->isNewRecord) ? time() : $this->updated_at);
    }

    public function getCreatedTime()
    {
        return Yii::$app->formatter->asTime(($this->isNewRecord) ? time() : $this->created_at);
    }

    public function getUpdatedTime()
    {
        return Yii::$app->formatter->asTime(($this->isNewRecord) ? time() : $this->updated_at);
    }

    public function getCreatedDatetime()
    {
        return "{$this->createdDate} {$this->createdTime}";
    }

    public function getUpdatedDatetime()
    {
        return "{$this->updatedDate} {$this->updatedTime}";
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventItems()
    {
        return $this->hasMany(EventItem::className(), ['id' => 'item_id'])
                    ->viaTable('{{%event_item_programm}}', ['programm_id' => 'id']);        
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventItemProgramms()
    {
        return $this->hasMany(EventItemProgramm::className(), ['prigramm_id' => 'id']);
    }
   
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVid()
    {
        return $this->hasOne(EventVid::className(), ['id' => 'vid_id']);
    }
    
    /* Геттер для названия вида */
    public function getVidName()
    {
        return $this->vid->name;
    }
    
    /**
     * 
     * @return type array
     */
    public static function getProgrammList()
    {
        return \yii\helpers\ArrayHelper::map(static::find()
                ->innerJoin('event_vid', 'event_vid.id = event_programm.vid_id')
                ->select('event_programm.id as id, event_programm.name as name, event_vid.name as name_category')
                ->asArray()->all(), 'id', 'name', 'name_category');
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventSchedules()
    {
        return $this->hasMany(EventSchedule::className(), ['programm_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \backend\modules\event\models\query\EventProgrammQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\event\models\query\EventProgrammQuery(get_called_class());
    }
    
    /**
     * 
     * @return boolean
     */
     public function beforeDelete()
     {             
         
        if (parent::beforeDelete()) {
            
            $link = false;
            $message = NULL;
            
             $countSchedule = EventSchedule::find()->where(['programm_id' => $this->id])->count();
            if($countSchedule != 0) {
                $link = true;
                $message .= Yii::t('yee/event', 'Event Schedules') . ' ';             
            }
                        
            if($link) {
                Yii::$app->session->setFlash('crudMessage', Yii::t('yee', 'Integrity violation. Delete the associated data in the models first:') . ' ' . $message);
                return false;            
            }
            else {                
                return true;
            }       
        }           
         else {
            return false;
        }
    }
}
