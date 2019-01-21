<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('yee/event', 'Private');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-private">
     <section id="private" class="container">
   
         <?= \frontend\widgets\ScheduleUserWidget::widget(['model' => $model, 'pagination' => $pagination]); ?>

     </section>
</div>


<!--        модал просмотра события пользователя -->
    <?php \yii\bootstrap\Modal::begin([
        'header' => '<h4 class="modal-title" id="eventUserModalLabel">' . Yii::t('yee/event', 'View Event') . '</h4>',
        'size' => 'modal-lg',
        'id' => 'event-user-modal',
        'footer' => '<button class="btn btn-default" data-dismiss="modal">Close</button>'
        . '<button class="btn btn-primary">Save changes</button>',
    ]);

    \yii\bootstrap\Modal::end(); ?>
