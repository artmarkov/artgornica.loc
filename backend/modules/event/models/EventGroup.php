<?php

namespace backend\modules\event\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use backend\components\models\User;

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
    public $gridUsersSearch;
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
            [
                'class' => \common\components\behaviors\ManyHasManyBehavior::className(),
                'relations' => [
                    'groupUsers' => 'users_list',
                ],
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
            [['users_list'], 'safe'],
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
    public function getGroupUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])
                ->viaTable('{{%event_group_users}}', ['group_id' => 'id']);
                             
    }
    /**
     * etEventUsersList
     *
     * @return array
     */
    public static function getEventUsersList()
    {
        $users = User::find()
                ->andWhere(['in', 'user.status', User::STATUS_ACTIVE]) // заблокированных не добавляем в список
                ->select(['user.id as id', "CONCAT(user.last_name,' ',user.first_name,' [',user.username,']') AS name"])
                ->orderBy('user.last_name')
                ->asArray()->all();
        return \yii\helpers\ArrayHelper::map($users, 'id', 'name');
    }
     /**
     * 
     * @return type array
     */
    public static function getGroupList()
    {
        return \yii\helpers\ArrayHelper::map(static::find()->all(), 'id', 'name');
    }
     /**
     * @return \yii\db\ActiveQuery
     * Полный список групп по programm_id
     */
    public static function getGroupByProgrammId($programm_id) {
        $data = self::find()->select(['id', 'name'])
                        ->where(['programm_id' => $programm_id])
                        ->asArray()->all();

        return $data;
    }

    /**
     * @return \yii\db\ActiveQuery
     * Полный список групп по name
     */
    public static function getGroupByName($programm_id) {
        $data = self::find()->select(['name', 'id'])
                        ->where(['programm_id' => $programm_id])
                        ->indexBy('id')->column();

        return $data;
    }

}
