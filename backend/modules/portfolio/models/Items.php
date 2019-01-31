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
        ];
    }
        
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status', 'link_class', 'link_href', 'img_class', 'img_src', 'img_alt', 'category_id'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
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
            'category_id' => Yii::t('yee', 'Category ID'),
            'name' => Yii::t('yee', 'Name'),
            'link_class' => Yii::t('yee', 'Link Class'),
            'link_href' => Yii::t('yee/section', 'Link Href'),
            'img_class' => Yii::t('yee/section', 'Img Class'),
            'img_src' => Yii::t('yee/section', 'Img Src'),
            'img_alt' => Yii::t('yee/section', 'Img Alt'),
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
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    
     /* Геттер для названия категории */
    public function getCategoryName()
    {
        return $this->category->name;
    }

    /**
     * 
     * @return type array
     */
     public static function getPortfolioItems()
    {
        return self::find()
                ->where(['in', 'status', self::STATUS_ACTIVE])
                ->asArray()->all();        
    } 
     /**
     *  @return type array to about page
     */
    public static function getPortfolioMasonryItems() {
        

        foreach (self::getPortfolioItems() as $id => $item) :

            $data[] = [
                    'options' => [
                        'class' => 'isotope-item photography',
                    ],
                    'link' => [
                        'class' => $item['link_class'],
                        'href' => $item['link_href'],
                        'data' => [
                            'plugin-options' => [
                                'type' => 'image',
                            ],
                        ]
                    ],
                    'image' => [
                        'src' => $item['img_src'],
                        'options' => [
                            'class' => 'img-responsive',
                            'width' => '260',
                            'height' => '260',
                            'alt' =>  $item['img_alt'],
                        ],
                    ],
                    'content' => '<strong>VIEW</strong> PROJECT',
            ];

        endforeach;

        return $data;
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
