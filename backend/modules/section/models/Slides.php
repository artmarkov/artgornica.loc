<?php

namespace backend\modules\section\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%section_slides}}".
 *
 * @property int $id
 * @property string $name
 * @property string $data_transition
 * @property int $data_slotamount
 * @property int $data_masterspeed
 * @property string $data_delay
 * @property string $img_src
 * @property string $img_alt
 * @property string $data_lazyload
 * @property string $data_fullwidthcentering
 * @property string $data_bgfit
 * @property string $data_bgposition
 * @property string $data_bgrepeat  * 
 * @property int $status
 * @property int $sort
 * @property int $created_at
 * @property int $updated_at
 *
 * @property SectionSlidesLayers[] $sectionSlidesLayers
 */
class Slides extends \yeesoft\db\ActiveRecord
{
    public $sort_list;
    
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%section_slides}}';
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
            [['data_transition', 'data_slotamount', 'data_masterspeed', 'data_fullwidthcentering', 'name'], 'required'],
            [['status', 'sort'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['data_slotamount', 'data_masterspeed'], 'integer'],
            [['data_transition', 'data_bgfit', 'data_bgposition', 'data_bgrepeat'], 'string', 'max' => 32],
            [['img_src', 'img_alt', 'data_lazyload', 'data_fullwidthcentering', 'data_delay'], 'string', 'max' => 127],
                 
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
            'data_transition' => Yii::t('yee/section', 'Data Transition'),
            'data_slotamount' => Yii::t('yee/section', 'Data Slotamount'),
            'data_masterspeed' => Yii::t('yee/section', 'Data Masterspeed'),
            'data_delay' => Yii::t('yee/section', 'Data Delay'),            
            'img_src' => Yii::t('yee/section', 'Img Src'),
            'img-alt' => Yii::t('yee/section', 'Img Alt'),
            'data_lazyload' => Yii::t('yee/section', 'Data Lazyload'),
            'data_fullwidthcentering' => Yii::t('yee/section', 'Data Fullwidthcentering'),
            'data_bgfit' => Yii::t('yee/section', 'Data Bgfit'),
            'data_bgposition' => Yii::t('yee/section', 'Data Bgposition'),
            'data_bgrepeat' => Yii::t('yee/section', 'Data Bgrepeat'),           
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
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlidesLayers()
    {
        return $this->hasMany(SlidesLayers::className(), ['slides_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \backend\modules\section\models\query\SlidesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\section\models\query\SlidesQuery(get_called_class());
    }
    
    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getSlidesList()
    {
        $data = self::find()
                ->andWhere(['in', 'status', self::STATUS_ACTIVE])
                ->orderBy(['sort' => SORT_ASC])
                ->asArray()->all(); 

      return $data; 
    }
    /**
     * 
     * @return type array
     */
     public static function getSlidesData()
    {
        $items = self::getSlidesList();         
        $i = 0;
        foreach ($items as $item) {
            
            $data[$i] = [
                'options' =>
                [
                    'data' => [
                        'transition' => $item['data_transition'],
                        'slotamount' => $item['data_slotamount'],
                        'masterspeed' => $item['data_masterspeed'],                       
                    ],
                ],
                'image' => [
                    'options' =>
                    [
                        'alt' => $item['img_alt'],                        
                    ],
                ],
                'layers' => \backend\modules\section\models\SlidesLayers::getSlidesLayersData($item['id']),
            ];
            !empty($item['img_src']) ? $data[$i]['image']['src'] = $item['img_src'] : $data[$i]['image']['src'] = '/images/dummy.png';
            !empty($item['data_delay']) ? $data[$i]['options']['data']['delay'] = $item['data_delay'] : NULL;
            !empty($item['data_lazyload']) ? $data[$i]['image']['options']['data']['lazyload'] = $item['data_lazyload'] : NULL;
            !empty($item['data_fullwidthcentering']) ? $data[$i]['image']['options']['data']['fullwidthcentering'] = $item['data_fullwidthcentering'] : NULL;
            !empty($item['data_bgfit']) ? $data[$i]['image']['options']['data']['bgfit'] = $item['data_bgfit'] : NULL;
            !empty($item['data_bgposition']) ? $data[$i]['image']['options']['data']['bgposition'] = $item['data_bgposition'] : NULL;
            !empty($item['data_bgrepeat']) ? $data[$i]['image']['options']['data']['bgrepeat']= $item['data_bgrepeat'] : NULL;
            
            $i++;
        }
        return $data; 
    }
}

