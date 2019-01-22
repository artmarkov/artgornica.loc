<?php

use yeesoft\widgets\ActiveForm;
use yeesoft\helpers\Html;

/* @var $model backend\modules\event\models\EventItemProgramm */
/* @var $form yeesoft\widgets\ActiveForm */

$this->title = Yii::t('yee/event', 'Event Details');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="event-user-form">
    
<?php //echo '<pre>' . print_r($model, true) . '</pre>'; ?>
    
<?php //echo '<pre>' . print_r($model->place, true) . '</pre>'; ?>
<div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?=  common\widgets\YandexDisplayMapWidget::widget([
                                'center' => $model->place->coords,
                                'zoom' => $model->place->map_zoom,
                            ]); ?>
                        </div>
                    </div>

                </div>
            </div>
</div>
