<?php

namespace backend\modules\event\models;

use Yii;

/**
 * This is the model class for table "{{%event_group}}".
 *
 * @property int $id
 * @property int $number
 * @property int $programm_id
 * @property string $name
 * @property string $description
 *
 * @property EventProgramm $programm
 * @property EventGroupUsers[] $eventGroupUsers
 */
class EventGroup extends \yeesoft\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%event_group}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'programm_id', 'name', 'description'], 'required'],
            [['number', 'programm_id'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 127],
            [['programm_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventProgramm::className(), 'targetAttribute' => ['programm_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee', 'ID'),
            'number' => Yii::t('yee/event', 'Programm Number'),
            'programm_id' => Yii::t('yee/event', 'Programm ID'),
            'name' => Yii::t('yee', 'Name'),
            'description' => Yii::t('yee', 'Description'),
        ];
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
    public function getEventGroupUsers()
    {
        return $this->hasMany(EventGroupUsers::className(), ['group_id' => 'id']);
    }
}
