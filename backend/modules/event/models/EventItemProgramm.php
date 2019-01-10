<?php

namespace backend\modules\event\models;

use Yii;

/**
 * This is the model class for table "{{%event_item_programm}}".
 *
 * @property int $id
 * @property int $item_id
 * @property int $programm_id
 *
 * @property EventItem $item
 * @property EventProgramm $programm
 * @property EventSchedule[] $eventSchedules
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
            [['item_id', 'programm_id'], 'required'],
            [['item_id', 'programm_id'], 'integer'],
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
            'item_id' => Yii::t('yee/event', 'Item ID'),
            'programm_id' => Yii::t('yee/event', 'Programm ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(EventItem::className(), ['id' => 'item_id']);
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
    public function getEventSchedules()
    {
        return $this->hasMany(EventSchedule::className(), ['item_programm_id' => 'id']);
    }
}
