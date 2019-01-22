<?php

use yeesoft\widgets\ActiveForm;
use yeesoft\helpers\Html;
use backend\modules\event\models\EventSchedule;

/* @var $model backend\modules\event\models\EventItemProgramm */
/* @var $form yeesoft\widgets\ActiveForm */

$this->title = $model->itemName;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="event-view">
    <section id="about" class="container">
    
<?php  //echo '<pre>' . print_r($model->schedulePractices, true) . '</pre>'; ?>
    
<?php //echo '<pre>' . print_r($model->place, true) . '</pre>'; ?>
    
    <article class="row">
             <div class="col-md-6">
                 <div class="owl-carousel controlls-over" data-plugin-options='{"autoPlay":9000, "items": 1, "singleItem": true, "navigation": true, "pagination": true, "transitionStyle":"fadeUp"}'>
                     <div>
                         <img class="img-responsive" src="../../frontend/web/images/sunset-1.jpg" width="555" height="311" alt="">
                     </div>
                     <div>
                         <img class="img-responsive" src="../../frontend/web/images/fishermen-1.jpg" width="555" height="311" alt="">
                     </div>
                     <div>
                         <img class="img-responsive" src="../../frontend/web/images/sunset-silhouette-2081796_1920.jpg" width="555" height="311" alt="">
                     </div>
                 </div>
             </div>
             <div class="col-md-6">
                 <h4><i class="fa fa-heart-o"></i> <?= Yii::t('yee/event', 'Event Name'); ?>:</h4>
                 <p><?= $model->itemName ?></p>
                 <h4><i class="fa fa-heart-o"></i> <?= Yii::t('yee/event', 'Description'); ?>:</h4>
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