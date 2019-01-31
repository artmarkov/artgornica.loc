<?php

namespace backend\modules\portfolio\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%portfolio_menu}}".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $status
 * @property int $sort
 * @property int $created_at
 * @property int $updated_at
 *
 * @property PortfolioMenuCategory[] $portfolioMenuCategories
 */
class Menu extends \yii\db\ActiveRecord
{
    public $gridCategorySearch;     
         
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%portfolio_menu}}';
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
            [['name', 'status'], 'required'],
            [['name'], 'unique'],
            [['created_at', 'updated_at', 'categories_list'], 'safe'],            
            [['description'], 'string'],
            [['status', 'sort', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 32],
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
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee', 'ID'),
            'name' => Yii::t('yee', 'Name'),
            'description' => Yii::t('yee', 'Description'),
            'status' => Yii::t('yee', 'Status'),
            'sort' => Yii::t('yee', 'Sort'),
            'created_at' => Yii::t('yee', 'Created At'),
            'updated_at' => Yii::t('yee', 'Updated At'),
            'categories_list' => Yii::t('yee/section', 'Portfolio Categories'),
            'gridCategorySearch' => Yii::t('yee/section', 'Portfolio Categories'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])
                    ->viaTable('{{%portfolio_menu_category}}', ['menu_id' => 'id']);
    }

     /**
     * 
     * @return type array 
     */
     public static function getPortfolioMenuList()
    {
        return self::find()
                ->where(['in', 'status', self::STATUS_ACTIVE])
                ->asArray()->all();        
    } 
     public function getCategoriesLinks()
    {
        return \yii\helpers\ArrayHelper::getColumn($this->categories, 'id');
    }
    
    /**
     * {@inheritdoc}
     * @return \backend\modules\portfolio\models\query\MenuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\portfolio\models\query\MenuQuery(get_called_class());
    }
}
