<?php

namespace backend\modules\event\models;

use Yii;

/**
 * This is the model class for table "{{%event_item_programm}}".
 *
 * @property int $id
 * @property int $programm_id
 * @property int $item_id
 * @property int $qty_items
 * @property int $price
 *
 * @property EventItem $item
 * @property EventProgramm $programm
 * @property EventSchedule[] $eventSchedules
 * @property EventSchedule[] $eventSchedules0
 */
class EventItemProgramm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%event_item_programm}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['programm_id', 'item_id'], 'required'],
            [['programm_id', 'item_id', 'qty_items', 'price'], 'integer'],
            [['qty_items'], 'default', 'value' => 1],
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
            'qty_items' => Yii::t('yee/event', 'Qty Items'),
            'price' => Yii::t('yee/event', 'Price'),
            'itemName' => Yii::t('yee', 'Name'),
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramm()
    {
        return $this->hasOne(EventProgramm::className(), ['id' => 'programm_id']);
    }

    /**
     * @param $programm_id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getEventItemProgrammList($programm_id)
    {
        $data = self::find()            
            ->innerJoin('event_item', 'event_item.id = event_item_programm.item_id')
            ->andWhere(['in', 'event_item_programm.programm_id' , $programm_id])
            ->select(['event_item.id as item_id',
                      'event_item_programm.id as id',
                      'event_item.name as name',
                      'event_item_programm.qty_items as qty',
                      'event_item_programm.price as price'                      
                ])
            ->orderBy('event_item_programm.id')
            ->asArray()->all(); 

      return $data; 
    }
}
