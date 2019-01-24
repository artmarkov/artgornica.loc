<?php

namespace backend\modules\section\models;

use Yii;

/**
 * This is the model class for table "{{%section_parallax}}".
 *
 * @property int $id
 * @property string $name
 * @property string $bg_color
 * @property string $bg_image
 * @property string $content_image
 * @property string $content
 * @property string $countdown_date
 * @property string $url
 * @property string $btn_icon
 * @property string $btn_name
 * @property string $btn_class
 * @property int $status
 */
class Parallax extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%section_parallax}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'bg_image', 'content', 'url', 'btn_name', 'btn_class'], 'required'],
            [['content'], 'string'],
            [['countdown_date'], 'safe'],
            [['status'], 'integer'],
            [['bg_color', 'bg_image', 'content_image', 'url', 'btn_icon', 'btn_name', 'btn_class'], 'string', 'max' => 127],
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
            'bg_color' => Yii::t('yee/block', 'Bg Color'),
            'bg_image' => Yii::t('yee/block', 'Bg Image'),
            'content_image' => Yii::t('yee/block', 'Content Image'),
            'content' => Yii::t('yee', 'Content'),
            'countdown_date' => Yii::t('yee/block', 'Countdown Date'),
            'url' => Yii::t('yee/block', 'Url'),
            'btn_icon' => Yii::t('yee/block', 'Btn Icon'),
            'btn_name' => Yii::t('yee/block', 'Btn Name'),
            'btn_class' => Yii::t('yee/block', 'Btn Class'),
            'status' => Yii::t('yee/block', 'Status'),
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
