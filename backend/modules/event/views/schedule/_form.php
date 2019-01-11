<?php

use yeesoft\widgets\ActiveForm;
use backend\modules\event\models\EventProgramm;
use backend\modules\event\models\EventSchedule;
use backend\modules\event\models\EventGroup;
use backend\modules\event\models\EventItem;
use backend\modules\event\models\EventItemProgramm;
use yeesoft\helpers\Html;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\modules\event\models\EventSchedule */
/* @var $form yeesoft\widgets\ActiveForm */
?>

<div class="event-schedule-form">

    <?php 
    $form = ActiveForm::begin([
            'id' => 'event-schedule-form',
            'validateOnBlur' => false,
        ])
    ?>

    <div class="row">
        <div class="col-md-9">

            <div class="panel panel-default">
                <div class="panel-body">
                     <?php
//                     echo '<pre>' . print_r($model, true) . '</pre>';
                    echo $form->field($model, 'programmId')->dropDownList(EventProgramm::getProgrammList(), [
                        'prompt' => Yii::t('yee/event', 'Select Programm...'), 
                        'value' => EventItemProgramm::getProgrammId($model->item_programm_id),
                        'id' => 'programmId'
                    ])->label(Yii::t('yee/event', 'Programm Name'));
                    
                    echo $form->field($model, 'groupId')->widget(DepDrop::classname(), [
                        'data' => EventGroup::getGroupByName($model->programmId),                        
                        'options' => ['prompt' => Yii::t('yee/event', 'Select Group...'), 'id' => 'groupId'],
                        'pluginOptions' => [
                            'depends' => ['programmId'],                            
                            'placeholder' => Yii::t('yee/event', 'Select Group...'),
                            'url' => Url::to(['/event/schedule/group'])
                        ]
                    ])->label(Yii::t('yee/event', 'Group Name'));
                    
                    echo $form->field($model, 'eventItemId')->widget(DepDrop::classname(), [
                        'data' => EventItem::getItemByName($model->programmId),
                        'options' => ['prompt' => Yii::t('yee/event', 'Select Event...'), 'id' => 'eventItemId'],
                        'pluginOptions' => [
                            'depends' => ['programmId'],
                            'placeholder' => Yii::t('yee/event', 'Select Event...'),
                            'url' => Url::to(['/event/schedule/item'])
                        ]
                    ])->label(Yii::t('yee/event', 'Event Name'));
                    ?>
                    <?//= $form->field($model, 'item_programm_id')->textInput() ?>

                    <?php  if($model->start_timestamp) $model->start_timestamp = Yii::$app->formatter->asDatetime($model->start_timestamp);  ?>
                    <?= $form->field($model, 'start_timestamp')->widget(kartik\datetime\DateTimePicker::classname())->widget(\yii\widgets\MaskedInput::className(),['mask' => Yii::$app->settings->get('reading.date_time_mask')])->textInput(); ?>
                    
                    <?php  if($model->end_timestamp) $model->end_timestamp = Yii::$app->formatter->asDatetime($model->end_timestamp);  ?>
                    <?= $form->field($model, 'end_timestamp')->widget(kartik\datetime\DateTimePicker::classname())->widget(\yii\widgets\MaskedInput::className(),['mask' => Yii::$app->settings->get('reading.date_time_mask')])->textInput() ?>
                    
                    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'all_day')->textInput() ?>

                </div>

            </div>
        </div>

        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="record-info">
                        <?= $form->field($model, 'place_id')
                            ->dropDownList(backend\modules\event\models\EventPlace::getPlacesList(), [
                                'prompt' => Yii::t('yee/event', 'Select Places...')
                            ])->label(Yii::t('yee/event', 'Place Name'));
                        ?>
                        <div class="form-group clearfix">
                            <label class="control-label" style="float: left; padding-right: 5px;"><?=  $model->attributeLabels()['id'] ?>: </label>
                            <span><?=  $model->id ?></span>
                        </div>

                        <div class="form-group">
                            <?php  if ($model->isNewRecord): ?>
                                <?= Html::submitButton(Yii::t('yee', 'Create'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('yee', 'Cancel'), ['/event/schedule/index'], ['class' => 'btn btn-default']) ?>
                            <?php  else: ?>
                                <?= Html::submitButton(Yii::t('yee', 'Save'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('yee', 'Delete'),
                                    ['/event/schedule/delete', 'id' => $model->id], [
                                    'class' => 'btn btn-default',
                                    'data' => [
                                        'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php  ActiveForm::end(); ?>

</div>
