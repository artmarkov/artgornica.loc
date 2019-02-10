<?php

use yii\helpers\ArrayHelper;

/* @var $model backend\modules\event\models\EventItemProgramm */
/* @var $form yeesoft\widgets\ActiveForm */

$this->title = $model->itemName;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="event-view">
    <section id="about" class="container">
    
<?php //echo '<pre>' . print_r($model->place, true) . '</pre>'; ?>
    
    <article class="row">
             <div class="col-md-6">
                 <!-- carousel -->
    
                <?php
                $carousel = ArrayHelper::merge($model->item->getCarouselOption(), [
                            'model_name' => $model->item->formName(),
                            'id' => $model->item_id,
                ]);
                echo \frontend\widgets\CarouselWidget::widget(
                        [
                            'content_items' => \backend\modules\mediamanager\models\MediaManager::getMediaList($carousel['model_name'], $carousel['id']),
                            'owl_options' => $carousel,
                            'options' =>
                            [
                                'type' => 'images',
                                'size' => 'medium',
                                'class' => 'owl-carousel controlls-over',
                            ],
                ]);
                ?>
                <!-- carousel -->
             </div>
             <div class="col-md-6">
                 <h4><i class="fa fa-heart-o"></i> <?= Yii::t('yee/event', 'Event Name'); ?>:</h4>
                 <p><?= $model->itemName ?></p>
                 <h4><i class="fa fa-heart-o"></i> <?= Yii::t('yee/event', 'Schedule Description'); ?>:</h4>
                 <p><?= $model->description ?></p>
                 <h4><i class="fa fa-heart-o"></i> <?= Yii::t('yee/event', 'Event Description'); ?>:</h4>
                 <p><?= $model->itemDescription ?></p>
                 <h4><i class="fa fa-heart-o"></i> <?= Yii::t('yee/event', 'Start Time'); ?>:</h4>
                 <p><?= $model->start_time ?></p>
                 <h4><i class="fa fa-heart-o"></i> <?= Yii::t('yee/event', 'End Time'); ?>:</h4>
                 <p><?= $model->end_time ?></p>
                
                 
                 <hr />
             </div>
         </article>
        <article class="row">
            <div class="col-md-6">
                 <h4><i class="fa fa-heart-o"></i> <?= Yii::t('yee/event', 'Programm Name'); ?>:</h4>
                 <p><?= $model->programmName ?></p>
                 <h4><i class="fa fa-heart-o"></i> <?= Yii::t('yee/event', 'Programm Description'); ?>:</h4>
                 <p><?= $model->programmDescription ?></p>
                 <h4><i class="fa fa-heart-o"></i>  <?= Yii::t('yee/event', 'Practice List'); ?>:</h4>
                    <ul class="list-icon heart-o color">
                     <?php foreach ($model->schedulePractices as $data): ?>
                        <li><?= $data->name ?></li>
                     <?php endforeach ?>
                    </ul>
            </div>
            <div class="col-md-6">
                 <h4><i class="fa fa-heart-o"></i> <?= Yii::t('yee/event', 'Place Name'); ?>:</h4>
                 <p><?= $model->place->name ?></p>
                 <h4><i class="fa fa-heart-o"></i> <?= Yii::t('yee', 'Address'); ?>:</h4>
                 <p><?= $model->place->address ?></p>
                 <h4><i class="fa fa-heart-o"></i> <?= Yii::t('yee', 'Phone'); ?>:</h4>
                 <p><?= $model->place->phone ?></p>
                 <h4><i class="fa fa-heart-o"></i> <?= Yii::t('yee', 'Email'); ?>:</h4>
                 <p><?= $model->place->email ?></p>
                 <h4><i class="fa fa-heart-o"></i> <?= Yii::t('yee', 'Contact Person'); ?>:</h4>
                 <p><?= $model->place->сontact_person ?></p>
                 
            </div>
        </article>
        
        <article class="row">
            <div class="col-md-12">
                 <?=  common\widgets\YandexDisplayMapWidget::widget([
                                'center' => $model->place->coords,
                                'zoom' => $model->place->map_zoom,
                            ]); ?>
            </div>
        </article>

</section>
</div>