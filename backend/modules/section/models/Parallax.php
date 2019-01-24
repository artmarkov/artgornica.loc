<?php

namespace backend\modules\section\models;
use yii\behaviors\TimestampBehavior;
use common\components\behaviors\DateToTimeBehavior;
use yii\db\ActiveRecord;

use Yii;

/**
 * This is the model class for table "{{%section_parallax}}".
 *
 * @property int $id
 * @property string $name
 * @property string $bg_color
 * @property string $bg_image
 * @property string $content_image
 * @property string $content
 * @property string $countdown
 * @property string $countdown_prompt
 * @property string $start_timestamp
 * @property string $url
 * @property string $btn_icon
 * @property string $btn_name
 * @property string $btn_class
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Parallax extends ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    
    public $start_time;
     
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%section_parallax}}';
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
            
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'bg_image', 'content', 'url', 'btn_name', 'btn_class'], 'required'],
            [['content', 'countdown_prompt'], 'string'],
            [['content'], 'trim'],
            [['start_timestamp'], 'safe'],
            [['status', 'countdown'], 'integer'],
            ['countdown', 'default', 'value' => 0],
            [['bg_color', 'bg_image', 'content_image', 'url', 'btn_icon', 'btn_name', 'btn_class'], 'string', 'max' => 127],
            ['start_time', 'date', 'format' => 'php:d-m-Y H:i'],
            [['created_at', 'updated_at'], 'safe'],
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
            'bg_color' => Yii::t('yee/section', 'Bg Color'),
            'bg_image' => Yii::t('yee/section', 'Bg Image'),
            'content_image' => Yii::t('yee/section', 'Content Image'),
            'content' => Yii::t('yee', 'Content'),
            'countdown' => Yii::t('yee/section', 'Countdown'),
            'countdown_prompt' => Yii::t('yee/section', 'Countdown Prompt'),
            'start_time' => Yii::t('yee/section', 'Start Time'),
            'url' => Yii::t('yee/section', 'Url'),
            'btn_icon' => Yii::t('yee/section', 'Btn Icon'),
            'btn_name' => Yii::t('yee/section', 'Btn Name'),
            'btn_class' => Yii::t('yee/section', 'Btn Class'),
            'status' => Yii::t('yee', 'Status'),
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
     * getStatusList
     * @return array
     */
    public static function getStatusList()
    {
        return array(
            self::STATUS_ACTIVE => Yii::t('yee', 'Active'),
            self::STATUS_INACTIVE => Yii::t('yee', 'Inactive'),
        );
    }
}
