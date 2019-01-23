<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%revolution_slider}}".
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
class RevolutionSlider extends \yeesoft\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%revolution_slider}}';
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
            'id' => Yii::t('yee/landing', 'ID'),
            'slide_image' => Yii::t('yee/landing', 'Slide Image'),
            'banner_top' => Yii::t('yee/landing', 'Banner Top'),
            'banner_middle' => Yii::t('yee/landing', 'Banner Middle'),
            'url' => Yii::t('yee/landing', 'Banner Url'),
            'btn_icon' => Yii::t('yee/landing', 'Btn Icon'),
            'btn_name' => Yii::t('yee/landing', 'Btn Name'),
            'btn_class' => Yii::t('yee/landing', 'Btn Class'),
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
