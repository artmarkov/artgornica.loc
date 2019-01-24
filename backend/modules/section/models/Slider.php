<?php

namespace backend\modules\section\models;

use Yii;

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
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee/block', 'ID'),
            'slide_image' => Yii::t('yee/block', 'Slide Image'),
            'banner_top' => Yii::t('yee/block', 'Banner Top'),
            'banner_middle' => Yii::t('yee/block', 'Banner Middle'),
            'url' => Yii::t('yee/block', 'Banner Url'),
            'btn_icon' => Yii::t('yee/block', 'Btn Icon'),
            'btn_name' => Yii::t('yee/block', 'Btn Name'),
            'btn_class' => Yii::t('yee/block', 'Btn Class'),
            'status' => Yii::t('yee', 'Status'),
            'sort' => Yii::t('yee', 'Sort'),
        ];
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
