<?php

namespace backend\modules\section\models;

use Yii;
use yeesoft\helpers\Html;

/**
 * This is the model class for table "{{%section_slides_layers}}".
 *
 * @property int $id
 * @property int $slides_id
 * @property string $content
 * @property string $class
 * @property string $data_x
 * @property string $data_y
 * @property string $data_customin
 * @property string $data_customout
 * @property int $data_hoffset
 * @property int $data_voffset
 * @property int $data_speed
 * @property int $data_start
 * @property string $data_easing
 * @property string $data_splitin
 * @property string $data_splitout
 * @property string $data_elementdelay
 * @property string $data_endelementdelay
 * @property string $data_end
 * @property int $data_endspeed
 * @property string $data_endeasing
 * @property string $data_captionhidden
 * @property string $style
 * @property int $btn_flag
 * @property string $btn_url
 * @property string $btn_icon
 * @property string $btn_name
 * @property string $btn_class
 *
 * @property SectionSlides $slides
 */
class SlidesLayers extends \yeesoft\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%section_slides_layers}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slides_id', 'content'], 'required'],
            [['slides_id', 'data_hoffset', 'data_voffset', 'data_speed', 'data_start', 'data_endspeed', 'btn_flag'], 'integer'],
            [['content'], 'string'],
            [['class', 'data_x', 'data_y', 'data_easing', 'data_splitin', 'data_splitout', 'data_elementdelay', 'data_endelementdelay', 'data_end', 'data_endeasing', 'style', 'btn_url', 'btn_icon', 'btn_name', 'btn_class'], 'string', 'max' => 127],
            [['data_customin', 'data_customout'], 'string', 'max' => 512],
            [['data_captionhidden'], 'string', 'max' => 32],
            [['slides_id'], 'exist', 'skipOnError' => true, 'targetClass' => Slides::className(), 'targetAttribute' => ['slides_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee/section', 'ID'),
            'slides_id' => Yii::t('yee/section', 'Slides ID'),
            'content' => Yii::t('yee/section', 'Content'),
            'class' => Yii::t('yee/section', 'Class'),
            'data_x' => Yii::t('yee/section', 'Data X'),
            'data_y' => Yii::t('yee/section', 'Data Y'),
            'data_customin' => Yii::t('yee/section', 'Data Customin'),            
            'data_customout' => Yii::t('yee/section', 'Data Customout'),
            'data_hoffset' => Yii::t('yee/section', 'Data Hoffset'),
            'data_voffset' => Yii::t('yee/section', 'Data Voffset'),
            'data_speed' => Yii::t('yee/section', 'Data Speed'),
            'data_start' => Yii::t('yee/section', 'Data Start'),
            'data_easing' => Yii::t('yee/section', 'Data Easing'),
            'data_splitin' => Yii::t('yee/section', 'Data Splitin'),
            'data_splitout' => Yii::t('yee/section', 'Data Splitout'),
            'data_elementdelay' => Yii::t('yee/section', 'Data Elementdelay'),
            'data_endelementdelay' => Yii::t('yee/section', 'Data Endelementdelay'),
            'data_end' => Yii::t('yee/section', 'Data End'),
            'data_endspeed' => Yii::t('yee/section', 'Data Endspeed'),
            'data_endeasing' => Yii::t('yee/section', 'Data Endeasing'),
            'data_captionhidden' => Yii::t('yee/section', 'Data Captionhidden'),
            'style' => Yii::t('yee/section', 'Style'),
            'btn_flag' => Yii::t('yee/section', 'Btn Flag'),
            'btn_url' => Yii::t('yee', 'Url'),
            'btn_icon' => Yii::t('yee', 'Btn Icon'),
            'btn_name' => Yii::t('yee', 'Btn Name'),
            'btn_class' => Yii::t('yee', 'Btn Class'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlides()
    {
        return $this->hasOne(Slides::className(), ['id' => 'slides_id']);
    }
    /**
     * @param $programm_id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getSlidesLayersList($slides_id)
    {
        $data = self::find()            
            ->innerJoin('section_slides', 'section_slides.id = section_slides_layers.slides_id')
            ->andWhere(['in', 'section_slides_layers.slides_id' , $slides_id])
            ->orderBy('section_slides_layers.id')
            ->asArray()->all(); 

      return $data; 
    }

    /**
     * 
     * @param type $slides_id
     * @return array
     */
    public static function getSlidesLayersData($slides_id)
    {
        $items = self::getSlidesLayersList($slides_id);         
        $i=0;
        foreach ($items as $item) {
            
            if ($item['btn_flag'] == 1) {
                $layerHtml = '';
                $layerHtml .= Html::beginTag('a', ['href' => $item['btn_url'], 'class' => $item['btn_class']]);
                $layerHtml .= '<i class="' . $item['btn_icon'] . '"></i>' . Yii::t('yee/section', '' . $item['btn_name'] . '') . '</span>';
                $layerHtml .= Html::endTag('a');
            } else {
                $layerHtml = $item['content'];
            }
            $data[$i] = [
                'options' =>
                [
                    'class' => $item['class'],
                    'data' => [
                        'x' => $item['data_x'],
                        'y' => $item['data_y'],
                        'speed' => $item['data_speed'],
                        'start' => $item['data_start'],
                        'easing' => $item['data_easing'],
                    ],
                    'style' => $item['style'],
                ],
                'content' => $layerHtml,
            ];
            
            !empty($item['data_customin']) ? $data[$i]['options']['data']['customin'] = $item['data_customin'] : NULL;
            !empty($item['data_customout']) ? $data[$i]['options']['data']['customout'] = $item['data_customout'] : NULL;
            !empty($item['data_hoffset']) ? $data[$i]['options']['data']['hoffset'] = $item['data_hoffset'] : NULL;
            !empty($item['data_voffset']) ? $data[$i]['options']['data']['voffset'] = $item['data_voffset'] : NULL;
            !empty($item['data_splitin']) ? $data[$i]['options']['data']['splitin'] = $item['data_splitin'] : NULL;
            !empty($item['data_splitout']) ? $data[$i]['options']['data']['splitout'] = $item['data_splitout'] : NULL;
            !empty($item['data_elementdelay']) ? $data[$i]['options']['data']['elementdelay'] = $item['data_elementdelay'] : NULL;
            !empty($item['data_endelementdelay']) ? $data[$i]['options']['data']['endelementdelay'] = $item['data_endelementdelay'] : NULL;
            !empty($item['data_end']) ? $data[$i]['options']['data']['end'] = $item['data_end'] : NULL;
            !empty($item['data_endspeed']) ? $data[$i]['options']['data']['endspeed'] = $item['data_endspeed'] : NULL;
            !empty($item['data_endeasing']) ? $data[$i]['options']['data']['endeasing'] = $item['data_endeasing'] : NULL;
            !empty($item['data_captionhidden']) ? $data[$i]['options']['data']['captionhidden'] = $item['data_captionhidden'] : NULL;


            $i++;
        }
        return $data; 
    }
}
