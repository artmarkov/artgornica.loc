<?php

namespace backend\modules\event\models;

use Yii;

/**
 * This is the model class for table "{{%event_programm}}".
 *
 * @property int $id
 * @property int $vid_id
 * @property string $name
 * @property string $description
 *
 * @property EventGroup[] $eventGroups
 * @property EventItemProgramm[] $eventItemProgramms
 * @property EventVid $vid
 */
class EventProgramm extends \yeesoft\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%event_programm}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vid_id', 'name', 'description'], 'required'],
            [['vid_id'], 'integer'],
            [['description'], 'string'],
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
            'vid_id' => Yii::t('yee', 'Vid ID'),
            'name' => Yii::t('yee', 'Name'),
            'description' => Yii::t('yee', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventGroups()
    {
        return $this->hasMany(EventGroup::className(), ['programm_id' => 'id']);
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

    /**
     * {@inheritdoc}
     * @return \backend\modules\event\models\query\EventProgrammQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\event\models\query\EventProgrammQuery(get_called_class());
    }
}
