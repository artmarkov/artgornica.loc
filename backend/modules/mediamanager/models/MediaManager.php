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
            [['media_id', 'class', 'item_id', 'sort'], 'safe'],
            [['media_id', 'item_id', 'sort'], 'integer'],
            [['class'], 'string', 'max' => 256],
            [['media_id'], 'exist', 'skipOnError' => true, 'targetClass' => Media::className(), 'targetAttribute' => ['media_id' => 'id']],
            ['sort', 'default', 'value' => function($model) {
                $count = MediaManager::find()->andWhere(['class' => $model->class, 'item_id' => $model->item_id])->count();
                return ($count > 0) ? $count++ : 0;
            }],
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
     * @return \yii\db\ActiveQuery
     */
    public function getMediaList($class, $item_id)
    {
        return self::find()                
                ->where(['class' => $class, 'item_id' => $item_id])                
                ->indexBy('id')
                ->orderBy('sort')
                ->asArray()->all();    
    }
    /**
     * 
     * @param type $sortList
     * @return boolean
     */
    public function sort($sortList) 
    {
        $ret = true;
        
         foreach (explode(',', $sortList) as $sort => $id) :
           $model =  self::findOne($id);
           $model->sort = $sort;
           if(!$model->save()) {
               $ret = false;  
               break;
           }
         endforeach;
//         echo '<pre>' . print_r($sort_new, true) . '</pre>';
        return $ret;
    }
    /**
     * 
     * @return type array
     */
     public static function getMediaThumbList($class, $item_id)
    {
         $data = array();
         
         $items =  self::getMediaList($class, $item_id);      
       // echo '<pre>' . print_r($items, true) . '</pre>';
        
        foreach ($items as $key => $item) :
          $content = '';
          $content .= Html::beginTag('div', ['id' => 'media-base']);
          $content .= Html::img(Media::findById($item['media_id'])->getDefaultThumbUrl());
          $content .= Html::endTag('div');
          $content .= Html::beginTag('div', ['id' => 'media-remove']);
          $content .= Html::tag('a','<span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>', 
                                    ['class' => 'data-remove', 'data-id' => $item['id'], 'href' => '#']);
          $content .= Html::endTag('div');
          
            $data[$key] = [  
                    'content' => $content,            
            ];
        endforeach;
        
        return $data;
    } 
    
    
}
