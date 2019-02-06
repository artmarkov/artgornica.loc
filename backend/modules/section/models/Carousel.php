<?php

namespace backend\modules\section\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%section_carousel}}".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $plugin_class
 * @property string $plugin_options
 * @property string $img_class
 * @property string $img_width
 * @property string $img_height
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Carousel extends \yeesoft\db\ActiveRecord
{
      
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%section_carousel}}';
    }

     /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
            ], 
            'sluggable' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'plugin_class', 'plugin_options'], 'required'],
            [['created_at', 'updated_at'], 'safe'],            
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'slug', 'plugin_class', 'plugin_options', 'img_class'], 'string', 'max' => 127],
            [['img_width', 'img_height'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee', 'ID'),
            'name' => Yii::t('yee/', 'Name'),
            'slug' => Yii::t('yee', 'Slug'),
            'plugin_class' => Yii::t('yee/section', 'Plugin Class'),
            'plugin_options' => Yii::t('yee/section', 'Plugin Options'),
            'img_class' => Yii::t('yee/section', 'Img Class'),
            'img_width' => Yii::t('yee/section', 'Img Width'),
            'img_height' => Yii::t('yee/section', 'Img Height'),
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
    
    /**
     * {@inheritdoc}
     * @return \backend\modules\section\models\query\CarouselQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\section\models\query\CarouselQuery(get_called_class());
    }
    
}
