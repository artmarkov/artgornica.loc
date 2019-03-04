<?php

use yeesoft\widgets\ActiveForm;
use backend\modules\event\models\EventProgramm;
use backend\modules\event\models\EventItem;
use yeesoft\helpers\Html;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use backend\modules\media\widgets\TinyMce;

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

                        echo $form->field($model, 'programm_id')->dropDownList(EventProgramm::getProgrammList(), [
                            'prompt' => Yii::t('yee/event', 'Select Programm...'),
                            'id' => 'programm_id'
                        ])->label(Yii::t('yee/event', 'Programm Name'));

                        echo $form->field($model, 'item_id')->widget(DepDrop::classname(), [
                            'data' => EventItem::getItemByName($model->programm_id),
                            'options' => ['prompt' => Yii::t('yee/event', 'Select Event...'), 'id' => 'item_id'],
                            'pluginOptions' => [
                                'depends' => ['programm_id'],
                                'placeholder' => Yii::t('yee/event', 'Select Event...'),
                                'url' => Url::to(['/event/schedule/item'])
                            ]
                        ])->label(Yii::t('yee/event', 'Event Name'));
                        
                        ?>
                    <?= $form->field($model, 'description')->widget(TinyMce::className()); ?>

                </div>

            </div>
        </div>

        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="record-info">
                        <?php if (!$model->isNewRecord): ?>

                            <div class="form-group clearfix">
                                <label class="control-label" style="float: left; padding-right: 5px;">
                             <?= $model->attributeLabels()['created_at'] ?> :
                                </label>
                                <span><?= $model->createdDatetime ?></span>                                
                            </div>

                            <div class="form-group clearfix">
                                <label class="control-label" style="float: left; padding-right: 5px;">
                             <?= $model->attributeLabels()['updated_at'] ?> :
                                </label>
                                <span><?= $model->updatedDatetime ?></span>
                            </div>
                        
                            <div class="form-group clearfix">
                                <label class="control-label" style="float: left; padding-right: 5px;">Расчет: </label>
                                <span><?= $model->priceItems ?></span> / 
                                <span><?= $model->qtyItems ?></span> = 
                                <span><?= round(($model->priceItems/$model->qtyItems), 2); ?> руб.</span>
                            </div>
                        <?php endif; ?>
                    
                   
                        <?=  $form->field($model, 'place_id')
                            ->dropDownList(backend\modules\event\models\EventPlace::getPlacesList(), [
                                'prompt' => Yii::t('yee/event', 'Select Places...')
                            ])->label(Yii::t('yee/event', 'Place Name'));
                        ?>
                        
                        <?= $form->field($model, 'start_time')->widget(kartik\datetime\DateTimePicker::classname())->widget(\yii\widgets\MaskedInput::className(), ['mask' => Yii::$app->settings->get('reading.date_time_mask')])->textInput(); ?>

                        <?= $form->field($model, 'end_time')->widget(kartik\datetime\DateTimePicker::classname())->widget(\yii\widgets\MaskedInput::className(), ['mask' => Yii::$app->settings->get('reading.date_time_mask')])->textInput() ?>

                        <?= $form->field($model, 'price')->textInput() ?>
                        
                        <?= $form->field($model, 'users_list')->widget(kartik\select2\Select2::className(), [
                        'data' => backend\modules\event\models\EventSchedule::getScheduleUsersList(),
                        'options' => ['placeholder' => Yii::t('yee/event', 'Select Users...'), 'multiple' => true],                        
                         ])
                        ?>
                   
                        <div class="form-group">
                            <?php if ($model->isNewRecord): ?>
                                <?= Html::submitButton(Yii::t('yee', 'Create'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('yee', 'Cancel'), ['/event/schedule/index'], ['class' => 'btn btn-default']) ?>
                            <?php else: ?>                            

                            <div class="form-group clearfix">
                                <label class="control-label" style="float: left; padding-right: 5px;"><?= $model->attributeLabels()['id'] ?>: </label>
                                <span><?= $model->id ?></span>
                            </div>
                                <?= Html::submitButton(Yii::t('yee', 'Save'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('yee', 'Delete'), ['/event/schedule/delete', 'id' => $model->id], [
                                    'class' => 'btn btn-default',
                                    'data' => [
                                        'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                        'method' => 'post',
                                    ],
                                ])
                                ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php ActiveForm::end(); ?>

</div>
