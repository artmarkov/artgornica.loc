<?php

namespace backend\modules\mediamanager\models;

use Yii;
use backend\modules\media\models\Media;
use yeesoft\helpers\Html;

/**
 * This is the model class for table "{{%media_manager}}".
 *
 * @property int $id
 * @property int $media_id
 * @property string $class
 * @property int $item_id
 * @property int $sort
 *
 * @property Media $media
 */
class MediaManager extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%media_manager}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           // [['media_id', 'class', 'item_id', 'sort'], 'required'],
            [['media_id', 'item_id', 'sort'], 'integer'],
            [['class'], 'string', 'max' => 256],
            [['media_id'], 'exist', 'skipOnError' => true, 'targetClass' => Media::className(), 'targetAttribute' => ['media_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee', 'ID'),
            'media_id' => Yii::t('yee', 'Media ID'),
            'class' => Yii::t('yee', 'Class'),
            'item_id' => Yii::t('yee', 'Item ID'),
            'sort' => Yii::t('yee', 'Sort'),
        ];
    }

    public function getModelForm()
    {
       return $this->formName();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedia()
    {
        return $this->hasOne(Media::className(), ['id' => 'media_id']);
    }
    
    /**
     * 
     * @return type array
     */
     public static function getMediaThumbList($class, $item_id)
    {
         $data = array();
         
         $items =  self::find()                
                ->where(['class' => $class, 'item_id' => $item_id])                
                ->indexBy('id')->asArray()->all();      
       // echo '<pre>' . print_r($items, true) . '</pre>';
        
        foreach ($items as $key => $item) :
            
        $data[$key] = [  
                'content' => Html::img(Media::findById($item['media_id'])->getDefaultThumbUrl()),            
        ];
        endforeach;
        
        return $data;
    } 
    
    
}
