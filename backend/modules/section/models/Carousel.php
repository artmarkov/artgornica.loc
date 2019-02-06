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
 * @property int $items
 * @property int $single_item
 * @property int $navigation
 * @property int $pagination
 * @property string $transition_style
 * @property string $auto_play
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
            [['items', 'single_item', 'navigation', 'pagination', 'transition_style', 'auto_play'], 'required'],
            [['items', 'single_item', 'navigation', 'pagination', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'slug', 'transition_style', 'auto_play'], 'string', 'max' => 127],
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
            'slug' => Yii::t('yee', 'Slug'),
            'items' => Yii::t('yee', 'Items'),
            'single_item' => Yii::t('yee/section', 'Single Item'),
            'navigation' => Yii::t('yee', 'Navigation'),
            'pagination' => Yii::t('yee', 'Pagination'),
            'transition_style' => Yii::t('yee/section', 'Transition Style'),
            'auto_play' => Yii::t('yee/section', 'Auto Play'),
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
