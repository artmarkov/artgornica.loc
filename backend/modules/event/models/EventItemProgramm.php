<?php

namespace backend\modules\event\models;

use Yii;
use himiklab\sortablegrid\SortableGridBehavior;

/**
 * This is the model class for table "{{%event_item_programm}}".
 *
 * @property int $id
 * @property int $programm_id
 * @property int $item_id
 * @property int $price
 * @property int $sortOrder
 * @property string $name_short
 * @property EventItem $item
 * @property EventProgramm $programm
 * @property EventSchedule[] $eventSchedules
 * @property EventSchedule[] $eventSchedules0
 */
class EventItemProgramm extends \yii\db\ActiveRecord
{
    public $gridPractice;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%event_item_programm}}';
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => \common\components\behaviors\ManyHasManyBehavior::className(),
                'relations' => [
                    'itemProgrammPractices' => 'practice_list',
                ],
            ],
            'sort' => [
                'class' => SortableGridBehavior::className(),
                'sortableAttribute' => 'sortOrder',
                'scope' => function ($query) {
                    $query->andWhere(['programm_id' => $this->programm_id]);
                },
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['programm_id', 'item_id'], 'required'],
            [['programm_id', 'item_id', 'name_short', 'price', 'sortOrder'], 'integer'],
            ['practice_list', 'safe'],
            ['name_short', 'string', 'max' => 32],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventItem::className(), 'targetAttribute' => ['item_id' => 'id']],
            [['programm_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventProgramm::className(), 'targetAttribute' => ['programm_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee/event', 'ID'),
            'programm_id' => Yii::t('yee/event', 'Programm ID'),
            'item_id' => Yii::t('yee/event', 'Item ID'),
            'name_short' => Yii::t('yee/event', 'Name Short'),
            'price' => Yii::t('yee/event', 'Price'),
            'itemName' => Yii::t('yee', 'Name'),
            'practice_list' => Yii::t('yee/event', 'Practice List'),
            'gridPractice' => Yii::t('yee/event', 'Practice List'),            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(EventItem::className(), ['id' => 'item_id']);
    }
    
     /* Геттер для названия занятия */
    public function getItemName()
    {
        return $this->item->name;
    }
    
     /* Геттер для времени проведения */
    public function getTimeVolume()
    {
        return EventPractice::getEventProgrammPracticeTime($this->id);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramm()
    {
        return $this->hasOne(EventProgramm::className(), ['id' => 'programm_id']);
    }
    
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemProgrammPractices()
    {
        return $this->hasMany(EventPractice::className(), ['id' => 'practice_id'])
                ->viaTable('{{%event_item_programm_practice}}', ['item_programm_id' => 'id']);
    } 
    
    /**
     * метод считает полную стоимость программы
     * @param type $programm_id
     * @return type integer
     */
    public static function getFullItemPrice($programm_id) {
        $result = 0;
        $data = static::find()
                        ->where(['programm_id' => $programm_id])
                        ->select('price')
                        ->asArray()->all();
        foreach ($data as $items) {
            $result += $items['price'];
        }
        // echo '<pre>' . print_r($result, true) . '</pre>';
        return $result;    
    }
}
