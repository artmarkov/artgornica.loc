<?php

namespace backend\modules\section\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%section_slider}}".
 *
 * @property int $id
 * @property string $slide_image
 * @property string $banner_top
 * @property string $banner_middle
 * @property string $url
 * @property string $btn_icon
 * @property string $btn_name
 * @property string $btn_class
 * @property int $status
 * @property int $sort
 */
class Slider extends \yeesoft\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%section_slider}}';
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
            [['slide_image', 'banner_top', 'banner_middle', 'url', 'btn_name', 'btn_class'], 'required'],
            [['status', 'sort'], 'integer'],
            ['sort', 'default', 'value' => 0],
            [['slide_image'], 'string', 'max' => 127],
            [['banner_top', 'banner_middle', 'url', 'btn_name', 'btn_class', 'btn_icon'], 'string', 'max' => 127],
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
            'slide_image' => Yii::t('yee', 'Image'),
            'banner_top' => Yii::t('yee/section', 'Banner Top'),
            'banner_middle' => Yii::t('yee/section', 'Banner Middle'),
            'url' => Yii::t('yee', 'Url'),
            'btn_icon' => Yii::t('yee', 'Btn Icon'),
            'btn_name' => Yii::t('yee', 'Btn Name'),
            'btn_class' => Yii::t('yee', 'Btn Class'),
            'status' => Yii::t('yee', 'Status'),
            'sort' => Yii::t('yee', 'Sort'),
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
