<?php

namespace backend\modules\portfolio\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\behaviors\SluggableBehavior;

/**
 * This is the model class for table "{{%portfolio_category}}".
 *
 * @property int $id
 * @property int $type
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 */
class Category extends \yeesoft\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    
    const TYPE_IMAGE = 0;
    const TYPE_IFRAME = 1;
    const TYPE_LINK = 2;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%portfolio_category}}';
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
                'class' => SluggableBehavior::className(),
                'in_attribute' => 'name',
                'out_attribute' => 'slug',
                'translit' => true           
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type', 'status'], 'required'],
            [['name', 'slug'], 'unique'],
            [['type', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'slug', 'description'], 'string', 'max' => 127],
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
     * getTypeList
     * @return array
     */
    public static function getTypeList()
    {
        return array(
            self::TYPE_IMAGE => Yii::t('yee/section', 'Image'),
            self::TYPE_IFRAME => Yii::t('yee/section', 'Iframe'),
            self::TYPE_LINK => Yii::t('yee/section', 'Link'),
        );
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
            'description' => Yii::t('yee', 'Description'),
            'status' => Yii::t('yee', 'Status'),
            'created_at' => Yii::t('yee', 'Created At'),
            'updated_at' => Yii::t('yee', 'Updated At'),
        ];
    }
     /**
     * @inheritdoc
     */
    
    public static function getCategories()
    {
        return \yii\helpers\ArrayHelper::map(static::find()
                ->andWhere(['in', 'status', self::STATUS_ACTIVE])
                ->select('id, name')
                ->asArray()->all(), 'id', 'name');
        
    } 
     /**
     * 
     * @return type string
     */
     public static function getPortfolioMenuOptions($menu_id)
    {
        $options = array();
        $items = self::find()
                ->innerJoin('portfolio_menu_category', 'portfolio_menu_category.category_id = portfolio_category.id')
                ->where(['portfolio_menu_category.menu_id' => $menu_id])
                ->asArray()->all();
        
            foreach ($items as $id => $item) { 
                    $options[] = '.' . $item['slug'];
            } 
            
            return implode(",", $options);
    }

    /**
     * 
     * @return type string
     */
    public static function getCategory($category_id) {

        $data = self::find()
                        ->where(['id' => $category_id])
                        ->asArray()->one();
        return $data;
    }

}
