<?php

namespace backend\modules\event\models;
use yii\behaviors\TimestampBehavior;
use common\components\behaviors\DateToTimeBehavior;
use yii\db\ActiveRecord;
use backend\components\models\User;

use Yii;

/**
 * This is the model class for table "{{%event_schedule}}".
 *
 * @property int $id
 * @property int $programm_id
 * @property int $item_id
 * @property int $place_id
 * @property int $start_timestamp
 * @property int $end_timestamp
 * @property int $price стоимость занятия
 * @property string $description
 * @property int $all_day
 * @property int $created_at
 * @property int $updated_at
 *
 * @property EventPlace $place
 * @property EventProgramm $programm
 * @property EventItem $item
 */
class EventSchedule extends \yeesoft\db\ActiveRecord
{
    public $start_time;
    public $end_time;
    
    public $gridUsersSearch;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%event_schedule}}';
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
                    'scheduleUsers' => 'users_list',
                ],
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
            [['programm_id', 'item_id', 'place_id', 'start_timestamp', 'end_timestamp'], 'required'],
            [['programm_id', 'item_id', 'place_id', 'all_day', 'price'], 'integer'],
            [['start_timestamp', 'end_timestamp'], 'safe'],
            [['all_day', 'price'], 'default', 'value' => 0],
            [['description'], 'string'],
            [['place_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventPlace::className(), 'targetAttribute' => ['place_id' => 'id']],
            [['programm_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventProgramm::className(), 'targetAttribute' => ['programm_id' => 'id']],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventItem::className(), 'targetAttribute' => ['item_id' => 'id']],
            ['start_timestamp', 'compareTimestamp'],
            [['created_at', 'updated_at'], 'safe'],
            ['start_time', 'date', 'format' => 'php:d-m-Y H:i'],
            ['end_time', 'date', 'format' => 'php:d-m-Y H:i'],
            [['users_list'], 'safe'],
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
            'id' => Yii::t('yee/event', 'ID'),
            'programm_id' => Yii::t('yee/event', 'Programm ID'),
            'item_id' => Yii::t('yee/event', 'Item ID'),
            'place_id' => Yii::t('yee/event', 'Place ID'),
            'start_timestamp' => Yii::t('yee/event', 'Start Time'),
            'end_timestamp' => Yii::t('yee/event', 'End Time'),
            'start_time' => Yii::t('yee/event', 'Start Time'),
            'end_time' => Yii::t('yee/event', 'End Time'),
            'description' => Yii::t('yee/event', 'Description'),
            'price' => Yii::t('yee/event', 'Price'),
            'all_day' => Yii::t('yee/event', 'All Day'),
            'created_at' => Yii::t('yee', 'Created At'),
            'updated_at' => Yii::t('yee', 'Updated At'),
            'users_list' => Yii::t('yee/event', 'Users List'),
            'gridUsersSearch' => Yii::t('yee/event', 'Users List'),
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
    /* Геттер для вида программы (инд или групп) */
    public function getProgrammVid()
    {
        return $this->programm->vid_id;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(EventItem::className(), ['id' => 'item_id']);
    }

    /* Геттер для названия события */
    public function getItemName()
    {
        return $this->item->name;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScheduleUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])
                ->viaTable('{{%event_schedule_users}}', ['schedule_id' => 'id']);
                             
    }
     /**
     * getScheduleUsersList
     *
     * @return array
     */
    public static function getScheduleUsersList()
    {
        $users = User::find()
                ->andWhere(['in', 'user.status', User::STATUS_ACTIVE]) // заблокированных не добавляем в список
                ->select(['user.id as id', "CONCAT(user.last_name,' ',user.first_name,' [',user.username,']') AS name"])
                ->orderBy('user.last_name')
                ->asArray()->all();
        return \yii\helpers\ArrayHelper::map($users, 'id', 'name');
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
