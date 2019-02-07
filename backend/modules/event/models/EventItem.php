<?php

namespace backend\modules\event\models;
use yii\behaviors\TimestampBehavior;

use Yii;

/**
 * This is the model class for table "{{%event_item}}".
 *
 * @property int $id
 * @property int $vid_id
 * @property string $name
 * @property string $description
 * @property int $created_at
 * @property int $updated_at
 * 
 * @property EventVid $vid
 * @property EventItemPractice[] $eventItemPractices
 * @property EventItemProgramm[] $eventItemProgramms
 * @property EventSchedule[] $eventSchedules
 */
class EventItem extends \yeesoft\db\ActiveRecord
{
     public $gridPracticeSearch;
     
     /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%event_item}}';
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
            [
                'class' => \common\components\behaviors\ManyHasManyBehavior::className(),
                'relations' => [
                    'eventPractices' => 'practice_list',
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'vid_id'], 'required'],
            [['vid_id'], 'integer'],
            [['description'], 'string'],           
            [['created_at', 'updated_at'], 'safe'],
            [['practice_list'], 'safe'],
            [['name'], 'string', 'max' => 127],
            [['vid_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventVid::className(), 'targetAttribute' => ['vid_id' => 'id']],
       
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee', 'ID'),
            'vid_id' => Yii::t('yee/event', 'Vid ID'),
            'name' => Yii::t('yee', 'Name'),
            'description' => Yii::t('yee', 'Description'),
            'created_at' => Yii::t('yee', 'Created At'),
            'updated_at' => Yii::t('yee', 'Updated At'),
            'practice_list' => Yii::t('yee/event', 'Practice List'),
            'gridPracticeSearch' => Yii::t('yee/event', 'Practice List'),
            'timeVolume' => Yii::t('yee/event', 'Time Volume'),           
        ];
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
    public function getVid()
    {
        return $this->hasOne(EventVid::className(), ['id' => 'vid_id']);
    }
    
    /* Геттер для названия вида */
    public function getVidName()
    {
        return $this->vid->name;
    }
    
    /* Геттер для времени проведения */
    public function getTimeVolume()
    {
        return EventPractice::getEventPracticeTime($this->id);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventPractices()
    {
        return $this->hasMany(EventPractice::className(), ['id' => 'practice_id'])
                    ->viaTable('{{%event_item_practice}}', ['item_id' => 'id']);        
    }
     /**
     * 
     * @return type array
     */
    public static function getEventItemList()
    {
        return \yii\helpers\ArrayHelper::map(static::find()
                ->innerJoin('event_vid', 'event_vid.id = event_item.vid_id')
                ->select('event_item.id as id, event_item.name as name, event_vid.name as name_category')
                ->asArray()->all(), 'id', 'name', 'name_category');
    }
   
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventItemProgramms()
    {
        return $this->hasMany(EventItemProgramm::className(), ['item_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventSchedules()
    {
        return $this->hasMany(EventSchedule::className(), ['event_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \backend\modules\event\models\query\EventItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\event\models\query\EventItemQuery(get_called_class());
    }
    /**
     * @return \yii\db\ActiveQuery
     * Полный список занятий по programm_id
     */
    public static function getItemByProgrammId($programm_id) {
        $data = self::find()
                        ->innerJoin('event_item_programm', 'event_item_programm.item_id = event_item.id')
                        ->where(['event_item_programm.programm_id' => $programm_id])
                        ->select(['event_item.name', 'event_item.id'])
                        ->asArray()->all();

        return $data;
    }

    /**
     * @return \yii\db\ActiveQuery
     * Полный список занятий по name
     */
    public static function getItemByName($programm_id) {
        $data = self::find()
                        ->innerJoin('event_item_programm', 'event_item_programm.item_id = event_item.id')
                        ->where(['event_item_programm.programm_id' => $programm_id])
                        ->select(['event_item.name as name', 'event_item.id as id'])
                        ->indexBy('id')->column();

        return $data;
    }

    /**
     * @return \yii\db\ActiveQuery
     * Полный список занятий по name
     */
    public static function getEventItemByName($vid_id) {
        $data = self::find()
                        ->innerJoin('event_vid', 'event_vid.id = event_item.vid_id')
                        ->where(['event_item.vid_id' => $vid_id])
                        ->select(['event_item.name', 'event_item.id'])
                        ->indexBy('id')->column();

        return $data;
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
            
            $countProgramm = EventItemProgramm::find()->where(['item_id' => $this->id])->count();
                if($countProgramm != 0) {
                $link = true;
                $message .= Yii::t('yee/event', 'Event Programms') . ' ';            
            }
            $countSchedule = EventSchedule::find()->where(['item_id' => $this->id])->count();
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
    /**
     *
     * @inheritdoc
     */
    public static function getCarouselOption()
    {
    return [
            'items' => 1,
            'single_item' => true,
            'navigation' => true,
            'pagination' => true,
            'transition_style' => 'fadeUp',
            'auto_play' => '9000',           
            ];
    }
    
}
