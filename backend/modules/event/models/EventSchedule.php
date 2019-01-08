<?php

namespace backend\modules\event\models;

use Yii;

/**
 * This is the model class for table "{{%event_schedule}}".
 *
 * @property int $id
 * @property int $event_id
 * @property int $place_id
 * @property int $timestamp_in
 * @property int $timestamp_out
 * @property string $description
 * @property string $price стоимость занятия
 * @property int $status
 *
 * @property EventItem $event
 * @property EvantPlace $place
 */
class EventSchedule extends \yeesoft\db\ActiveRecord
{
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
            [['event_id', 'place_id', 'timestamp_in', 'timestamp_out', 'description', 'price', 'status'], 'required'],
            [['event_id', 'place_id', 'timestamp_in', 'timestamp_out', 'status'], 'integer'],
            [['description'], 'string'],
            [['price'], 'string', 'max' => 15],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventItem::className(), 'targetAttribute' => ['event_id' => 'id']],
            [['place_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventPlace::className(), 'targetAttribute' => ['place_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee', 'ID'),
            'event_id' => Yii::t('yee', 'Event ID'),
            'place_id' => Yii::t('yee/event', 'Place ID'),
            'timestamp_in' => Yii::t('yee/event', 'Time In'),
            'timestamp_out' => Yii::t('yee/event', 'Time Out'),
            'description' => Yii::t('yee', 'Description'),
            'price' => Yii::t('yee/event', 'Price'),
            'status' => Yii::t('yee', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(EventItem::className(), ['id' => 'event_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlace()
    {
        return $this->hasOne(EventPlace::className(), ['id' => 'place_id']);
    }

    /**
     * {@inheritdoc}
     * @return \backend\modules\event\models\query\EventScheduleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\event\models\query\EventScheduleQuery(get_called_class());
    }
}
