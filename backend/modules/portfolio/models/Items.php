<?php

namespace backend\modules\portfolio\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yeesoft\helpers\Html;

/**
 * This is the model class for table "{{%portfolio_items}}".
 *
 * @property int $id
 * @property int $category_id 
 * @property string $link_href
 * @property string $thumbnail
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
            [['status', 'category_id', 'link_href', 'thumbnail'], 'required'],
            ['thumbnail', 'unique'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['link_href', 'img_alt'], 'string', 'max' => 127],
            [['thumbnail'], 'string', 'max' => 255],
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
            'link_class' => Yii::t('yee', 'Link Class'),
            'link_href' => Yii::t('yee/section', 'Link Href'),
            'thumbnail' => Yii::t('yee/section', 'Thumbnail'),
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
    
    public function getThumbnail($options = ['class' => 'thumbnail pull-left', 'style' => 'width: 240px'])
    {
        if (!empty($this->thumbnail)) {
            return Html::img($this->thumbnail, $options);
        }

        return;
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
        
      $data = array();

        foreach (self::getPortfolioItems() as $id => $item) :
            
            $data_cat = Category::getCategory($item['category_id']);
        
            switch ($data_cat['type']) {
                case Category::TYPE_IMAGE: $type = 'image';
                    $link_class = 'item-hover lightbox';
                    $content = '<strong>просмотр</strong> фото';
                    break;
                case Category::TYPE_IFRAME: $type = 'iframe';
                    $link_class = 'item-hover lightbox';
                    $content = '<strong>просмотр</strong> видео';
                    break;
                case Category::TYPE_LINK: $type = '';
                    $link_class = 'item-hover';
                    $content = '<strong>просмотр</strong> проекта';
                    break;
                default: $type = '';
                    $link_class = 'item-hover';
                    $content = '<strong>view</strong> content';
            }
            
            $data[] = [
                    'options' => [
                        'class' => 'isotope-item ' . $data_cat['slug'],
                    ],
                    'link' => [
                        'class' => $link_class,
                        'href' => $item['link_href'],
                        'data' => [
                            'plugin-options' => [
                                'type' => $type,
                            ],
                        ]
                    ],
                    'image' => [
                        'src' => $item['thumbnail'],
                        'options' => [
                            'class' => 'img-responsive',
                            'width' => '260',
                            'height' => '260',
                            'alt' =>  $item['img_alt'],
                        ],
                    ],
                    'content' => '<span class="uppercase">' . $content . '</span>',
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
