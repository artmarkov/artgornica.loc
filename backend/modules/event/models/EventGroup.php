<?php

namespace backend\modules\event\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%event_group}}".
 *
 * @property int $id
 * @property int $number
 * @property int $programm_id
 * @property string $name
 * @property string $description
 * @property int $created_at
 * @property int $updated_at
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
            [['number', 'programm_id', 'name'], 'required'],
            [['number', 'programm_id'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
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
            'number' => Yii::t('yee/event', 'Group Number'),
            'programm_id' => Yii::t('yee/event', 'Programm ID'),
            'name' => Yii::t('yee', 'Name'),
            'description' => Yii::t('yee', 'Description'),
            'created_at' => Yii::t('yee', 'Created At'),
            'updated_at' => Yii::t('yee', 'Updated At'),
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
    public function getProgramm()
    {
        return $this->hasOne(EventProgramm::className(), ['id' => 'programm_id']);
    }

    /* Геттер для названия программы */
    public function getProgrammName()
    {
        return $this->programm->name;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventGroupUsers()
    {
        return $this->hasMany(EventGroupUsers::className(), ['group_id' => 'id']);
    }
}
