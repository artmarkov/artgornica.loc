<?php

use yii\helpers\Html;

/* @var $event backend\modules\post\models\EventSchedule */
?>
<!-- item -->
<div class="col-md-3">

    <div class="item-box appear-animation pull-left inner" data-animation="fadeInDown">
        <figure>                            
            <?= Html::a('<span class="overlay color2"></span><span class="inner">
            <span class="block fa fa-plus fsize20"></span>
            <strong>ДЕТАЛИ</strong> ЗАНЯТИЯ</span>', ['/event/view', 'id' => $event->id], ['class' => 'item-hover']);
            ?>
            <img class="img-responsive" src="../frontend/web/images/demo/portfolio/scouter-600x403.jpg" width="260" height="260" alt="">
        </figure>
        <div class="item-box-desc">
            <h5><?= $event->itemName ?></h5>
            <small class="styleColor"><?= $event->start_time ?></small>
        </div>
    </div>
</div>
<!-- /item -->
