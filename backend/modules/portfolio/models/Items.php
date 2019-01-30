<?php

namespace backend\modules\portfolio\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%portfolio_items}}".
 *
 * @property int $id
 * @property string $name
 * @property string $link_class
 * @property string $link_href
 * @property string $img_class
 * @property string $img_src
 * @property string $img_alt
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 */
class Items extends \yeesoft\db\ActiveRecord
{
    public $gridCategorySearch;
     
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%portfolio_items}}';
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
                    'categories' => 'categories_list',
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
            [['status', 'link_class', 'link_href', 'img_class', 'img_src', 'img_alt'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at', 'categories_list'], 'safe'],
            [['name', 'link_class', 'link_href', 'img_class', 'img_src', 'img_alt'], 'string', 'max' => 127],
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
            'link_class' => Yii::t('yee', 'Link Class'),
            'link_href' => Yii::t('yee/section', 'Link Href'),
            'img_class' => Yii::t('yee/section', 'Img Class'),
            'img_src' => Yii::t('yee/section', 'Img Src'),
            'img_alt' => Yii::t('yee/section', 'Img Alt'),
            'status' => Yii::t('yee', 'Status'),
            'created_at' => Yii::t('yee', 'Created At'),
            'updated_at' => Yii::t('yee', 'Updated At'),
            'categories_list' => Yii::t('yee/section', 'Portfolio Categories'),
            'gridCategorySearch' => Yii::t('yee/section', 'Portfolio Categories'),
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
     * @return \yii\db\ActiveQuery
     */
   /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])
                    ->viaTable('{{%portfolio_items_category}}', ['items_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \backend\modules\section\models\query\ItemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\portfolio\models\query\ItemsQuery(get_called_class());
    }
}
