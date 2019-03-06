<?php

namespace backend\modules\event\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\behaviors\DateToTimeBehavior;
use yeesoft\db\ActiveRecord;

/**
 * This is the model class for table "event_plan".
 *
 * @property int $id
 * @property int $programm_id
 * @property int $place_id
 * @property string $color
 * @property int $start_timestamp
 * @property int $end_timestamp
 * @property string $description
 * @property int $created_at
 * @property int $updated_at
 *
 * @property EventProgramm $programm
 * @property EventPlace $place
 */
class EventPlan extends ActiveRecord
{
    public $start_time;
    public $end_time;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_plan';
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
                'class' => DateToTimeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_VALIDATE => 'start_time',
                    ActiveRecord::EVENT_AFTER_FIND => 'start_time',
                ],
                'timeAttribute' => 'start_timestamp',
            ],
            [
                'class' => DateToTimeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_VALIDATE => 'end_time',
                    ActiveRecord::EVENT_AFTER_FIND => 'end_time',
                ],
                'timeAttribute' => 'end_timestamp',
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['programm_id', 'place_id', 'start_time', 'end_time'], 'required'],
            [['programm_id', 'place_id', 'created_at', 'updated_at'], 'integer'],
            [['start_timestamp', 'end_timestamp'], 'safe'],
            [['description'], 'string'],
            ['start_timestamp', 'compareTimestamp'],
            [['created_at', 'updated_at'], 'safe'],
            ['start_time', 'date', 'format' => 'php:d.m.Y H:i'],
            ['end_time', 'date', 'format' => 'php:d.m.Y H:i'],
            [['color'], 'string', 'max' => 32],
            [['programm_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventProgramm::className(), 'targetAttribute' => ['programm_id' => 'id']],
            [['place_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventPlace::className(), 'targetAttribute' => ['place_id' => 'id']],
        ];
    }

     /**
     * сравнение даты начала и окончания/ дата окончания должна быть меньше даты начала
     */
    public function compareTimestamp()
    {
        if (!$this->hasErrors()) {

            if ($this->end_timestamp < $this->start_timestamp) {
                $this->addError('start_time', Yii::t('yee/event', 'The event start date must be greater than the end date.'));
            }
        }
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee', 'ID'),
            'programm_id' => Yii::t('yee/event', 'Programm ID'),
            'place_id' => Yii::t('yee/event', 'Place ID'),
            'color' => Yii::t('yee/event', 'Color'),
            'start_timestamp' => Yii::t('yee/event', 'Start Time'),
            'end_timestamp' => Yii::t('yee/event', 'End Time'),
            'start_time' => Yii::t('yee/event', 'Start Time'),
            'end_time' => Yii::t('yee/event', 'End Time'),
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
    
    public function getStartDate()
    {
        return Yii::$app->formatter->asDate($this->start_timestamp);
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
    public function getProgramm()
    {
        return $this->hasOne(EventProgramm::className(), ['id' => 'programm_id']);
    }

    /* Геттер для названия программы */
    public function getProgrammName()
    {
        return $this->programm->name;
    }
    
    /* Геттер для содержания программы */
    public function getProgrammDescription()
    {
        return $this->programm->description;
    }
    /* Геттер для вида программы (инд или групп) */
    public function getProgrammVid()
    {
        return $this->programm->vid_id;
    }

    /**
     * {@inheritdoc}
     * @return \backend\modules\event\models\query\EventPlanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\event\models\query\EventPlanQuery(get_called_class());
    }
}
