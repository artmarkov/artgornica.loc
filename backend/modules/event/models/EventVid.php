<?php

namespace backend\modules\event\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\behaviors\PurifyBehavior;
use yeesoft\db\ActiveRecord;

/**
 * This is the model class for table "{{%event_vid}}".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $created_at
 *
 * @property EventProgramm[] $eventProgramms
 */
class EventVid extends \yeesoft\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%event_vid}}';
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
            'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
            ],
            'purify' => [
                'class' => PurifyBehavior::className(),
                'attributes' => ['name','description'],
                
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 127],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee', 'ID'),
            'name' => Yii::t('yee', 'Name'),
            'description' => Yii::t('yee', 'Description'),
            'created_at' => Yii::t('yee', 'Created At'),
        ];
    }
    
    public function getCreatedDate()
    {
        return Yii::$app->formatter->asDate(($this->isNewRecord) ? time() : $this->created_at);
    }

    public function getCreatedTime()
    {
        return Yii::$app->formatter->asTime(($this->isNewRecord) ? time() : $this->created_at);
    }

    public function getCreatedDatetime()
    {
        return "{$this->createdDate} {$this->createdTime}";
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventProgramms()
    {
        return $this->hasMany(EventProgramm::className(), ['vid_id' => 'id']);
    }
    /**
     * 
     * @return type array
     */
    public static function getVidList()
    {
        return \yii\helpers\ArrayHelper::map(static::find()->all(), 'id', 'name');
    }
}
