<?php

namespace backend\modules\section\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%section_feedback}}".
 *
 * @property int $id
 * @property string $username
 * @property string $business
 * @property string $content
 * @property int $published_at
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 * @property int $main_flag
 */
class Feedback extends \yii\db\ActiveRecord
{
    const STATUS_PENDING = 0;
    const STATUS_PUBLISHED = 1;
    const MAIN_ON = 1;
    const MAIN_OFF = 0;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%section_feedback}}';
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if ($this->isNewRecord && $this->className() == Feedback::className()) {
            $this->published_at = time();
        }     
    }
     public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'business', 'content', 'status'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at', 'status', 'main_flag'], 'integer'],
            [['username', 'business'], 'string', 'max' => 127],
            [['created_at', 'updated_at'], 'safe'],
            ['published_at', 'date', 'timestampAttribute' => 'published_at', 'format' => 'yyyy-MM-dd'],
            ['published_at', 'default', 'value' => time()],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee', 'ID'),
            'username' => Yii::t('yee', 'Username'),
            'business' => Yii::t('yee', 'Business'),
            'content' => Yii::t('yee', 'Content'),
            'published_at' => Yii::t('yee', 'Published'),
            'created_at' => Yii::t('yee', 'Created At'),
            'updated_at' => Yii::t('yee', 'Updated At'),
            'status' => Yii::t('yee', 'Status'),
            'main_flag' => Yii::t('yee', 'Main On'),
        ];
    }
     public function getPublishedDate()
    {
        return Yii::$app->formatter->asDate(($this->isNewRecord) ? time() : $this->published_at);
    }

    public function getCreatedDate()
    {
        return Yii::$app->formatter->asDate(($this->isNewRecord) ? time() : $this->created_at);
    }

    public function getUpdatedDate()
    {
        return Yii::$app->formatter->asDate(($this->isNewRecord) ? time() : $this->updated_at);
    }

    public function getPublishedTime()
    {
        return Yii::$app->formatter->asTime(($this->isNewRecord) ? time() : $this->published_at);
    }

    public function getCreatedTime()
    {
        return Yii::$app->formatter->asTime(($this->isNewRecord) ? time() : $this->created_at);
    }

    public function getUpdatedTime()
    {
        return Yii::$app->formatter->asTime(($this->isNewRecord) ? time() : $this->updated_at);
    }

    public function getPublishedDatetime()
    {
        return "{$this->publishedDate} {$this->publishedTime}";
    }

    public function getCreatedDatetime()
    {
        return "{$this->createdDate} {$this->createdTime}";
    }

    public function getUpdatedDatetime()
    {
        return "{$this->updatedDate} {$this->updatedTime}";
    }

    public function getStatusText()
    {
        return $this->getStatusList()[$this->status];
    }
   /**
     * getTypeList
     * @return array
     */
    public static function getStatusList()
    {
        return [
            self::STATUS_PENDING => Yii::t('yee', 'Pending'),
            self::STATUS_PUBLISHED => Yii::t('yee', 'Published'),
        ];
    }
   /**
     * getStatusOptionsList
     * @return array
     */
    public static function getStatusOptionsList()
    {
        return [
            [self::STATUS_PENDING, Yii::t('yee', 'Pending'), 'default'],
            [self::STATUS_PUBLISHED, Yii::t('yee', 'Published'), 'primary']
        ];
    }
     public static function getMainOptionsList()
    {
        return [
            [self::MAIN_ON, Yii::t('yee', 'On'), 'default'],
            [self::MAIN_OFF, Yii::t('yee', 'Off'), 'primary']
        ];
    }
     /**
     *
     * @inheritdoc
     */
    public static function getCarouselOption()
    {
    return [
            'items' => 1,
            'single_item' => true,
            'navigation' => true,
            'pagination' => true,
            'transition_style' => 'fadeUp',
            'auto_play' => '9000',           
            ];
    }
}
