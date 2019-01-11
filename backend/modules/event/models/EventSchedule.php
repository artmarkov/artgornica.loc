<?php

namespace backend\modules\event\models;

use Yii;

/**
 * This is the model class for table "{{%event_schedule}}".
 *
 * @property int $id
 * @property int $item_programm_id
 * @property int $place_id
 * @property int $start_timestamp
 * @property int $end_timestamp
 * @property string $description
 * @property string $price стоимость занятия
 * @property int $all_day
 *
 * @property EventPlace $place
 * @property EventItemProgramm $itemProgramm
 */
class EventSchedule extends \yii\db\ActiveRecord
{
     public $programmId;
     public $groupId;
     public $eventItemId;
     
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%event_schedule}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_programm_id', 'place_id', 'start_timestamp'], 'required'],
            [['item_programm_id', 'place_id'], 'integer'],
//            [['item_programm_id'], 'unique'],
            [['start_timestamp', 'end_timestamp', 'all_day'], 'safe'],
            ['all_day', 'default', 'value' => 0],
            [['description'], 'string'],
            [['price'], 'string', 'max' => 15],
            [['place_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventPlace::className(), 'targetAttribute' => ['place_id' => 'id']],
            [['item_programm_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventItemProgramm::className(), 'targetAttribute' => ['item_programm_id' => 'id']],
            ['start_timestamp', 'compareTimestamp'],
          ];
    }
    /**
     * сравнение даты начала и окончания/ дата окончания должна быть меньше даты начала
     */
    public function compareTimestamp()
    {
        if (!$this->hasErrors()) {

            if ($this->end_timestamp < $this->start_timestamp) {
                $this->addError('start_timestamp', Yii::t('yee/event', 'The event start date must be greater than the end date.'));
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee/event', 'ID'),
            'item_programm_id' => Yii::t('yee/event', 'Item Programm ID'),
            'place_id' => Yii::t('yee/event', 'Place ID'),
            'start_timestamp' => Yii::t('yee/event', 'Start Time'),
            'end_timestamp' => Yii::t('yee/event', 'End Time'),
            'description' => Yii::t('yee', 'Description'),
            'price' => Yii::t('yee/event', 'Price'),
            'all_day' => Yii::t('yee/event', 'All Day'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlace()
    {
        return $this->hasOne(EventPlace::className(), ['id' => 'place_id']);
    }

    /* Геттер для названия места */
    public function getPlaceName()
    {
        return $this->place->name;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventItemProgramm()
    {
        return $this->hasOne(EventItemProgramm::className(), ['id' => 'item_programm_id']);
        
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemProgramm()
    {
        return $this->hasOne(EventProgramm::className(), ['id' => 'programm_id'])
                ->viaTable('{{%event_item_programm}}', ['id' => 'item_programm_id']);
    }
    /* Геттер для Id программы */
    public function getProgrammId()
    {
        return $this->itemProgramm->programm_id;
    }
    /* Геттер для названия программы */
    public function getProgrammName()
    {
        return $this->itemProgramm->name;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemGroup()
    {
        return $this->hasOne(EventGroup::className(), ['id' => 'programm_id'])
                ->viaTable('{{%event_item_programm}}', ['id' => 'item_programm_id']);
    }
    /* Геттер для Id группы */
    public function getGroupId()
    {
        return $this->itemGroup->id;
    } 
    /* Геттер для названия группы */
    public function getGroupName()
    {
        return $this->itemGroup->name;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventItem()
    {
        return $this->hasOne(EventItem::className(), ['id' => 'item_id'])
                ->viaTable('{{%event_item_programm}}', ['id' => 'item_programm_id']);
    }
     /* Геттер для Id события */
    public function getEventItemId()
    {
        return $this->eventItem->item_id;
    } 
    /* Геттер для названия события */
    public function getEventItemName()
    {
        return $this->eventItem->name;
    }
    /**
     * {@inheritdoc}
     * @return \backend\modules\event\models\query\EventScheduleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\event\models\query\EventScheduleQuery(get_called_class());
    }
    /**
     * 
     * @return type
     */
    public function beforeValidate() {
        $this->start_timestamp = Yii::$app->formatter->asTimestamp($this->start_timestamp);
        $this->end_timestamp = Yii::$app->formatter->asTimestamp($this->end_timestamp);
       return parent::beforeValidate();
    }
    
}
