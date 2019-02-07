<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use backend\modules\mediamanager\models\MediaManager;
use backend\modules\media\models\Media;
use frontend\widgets\owlcarousel\OwlCarouselWidget;

?>  
<?php if(!empty($model)) : ?>
        <?php
//               echo '<pre>' . print_r($model, true) . '</pre>';
        OwlCarouselWidget::begin([
            'container' => 'div',
            'containerOptions' => [
                'class' => $options['class'],
            ],
            'pluginOptions' => [
                'items' => $model['items'],
                'singleItem' => $model['single_item'] == 1 ? true : false,
                'navigation' => $model['navigation'] == 1 ? true : false,
                'pagination' => $model['pagination'] == 1 ? true : false,
                'transitionStyle' => $model['transition_style'],
                'autoPlay' => $model['auto_play'],
            ]
        ]);
        ?>
       <?php 
        if($options['type'] === 'images') {

       $items = MediaManager::getMediaList($model['model_name'], $model['id']); 
       $content = '';
        foreach ($items as $key => $item) :   
            $content .= Html::beginTag('div');
            $content .= Html::img(Media::findById($item['media_id'])->getThumbs()[$options['size']], ['class' => 'img-responsive', 'alt' => '']); 
            $content .= Html::endTag('div'); 
        endforeach;
//        $content .= '<div class="testimonial white">
//                            <p>Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa.</p>
//                            <cite><strong>Jessica Doe</strong>, Customer</cite>
//                        </div>';
        }
        
        echo $content;
        ?>

         <?php OwlCarouselWidget::end(); ?>

        <!-- /carousel -->
<?php endif; ?>