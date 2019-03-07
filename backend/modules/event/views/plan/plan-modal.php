<?php

use yeesoft\widgets\ActiveForm;
use backend\modules\event\models\EventProgramm;
use yeesoft\helpers\Html;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\calendar\Event */
/* @var $form yeesoft\widgets\ActiveForm */
?>

<div class="plan-form">

     <?php $form = ActiveForm::begin([
        'id' => 'plan-form',
        'validateOnBlur' => false,
        'enableAjaxValidation' => true,
    ]);
    ?>


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php
                    echo $form->field($model, 'programm_id')->dropDownList(EventProgramm::getProgrammList(), [
                        'prompt' => Yii::t('yee/event', 'Select Programm...'),
                        'id' => 'programm_id'
                    ])->label(Yii::t('yee/event', 'Programm Name'));
                    
                   ?>

                    <?=  $form->field($model, 'place_id')
                            ->dropDownList(backend\modules\event\models\EventPlace::getPlacesList(), [
                                'prompt' => Yii::t('yee/event', 'Select Places...')
                            ])->label(Yii::t('yee/event', 'Place Name'));
                    ?>
                    
                    <?= $form->field($model, 'start_time')->widget(kartik\datetime\DateTimePicker::classname())->widget(\yii\widgets\MaskedInput::className(), ['mask' => Yii::$app->settings->get('reading.date_time_mask')])->textInput(); ?>

                    <?= $form->field($model, 'end_time')->widget(kartik\datetime\DateTimePicker::classname())->widget(\yii\widgets\MaskedInput::className(), ['mask' => Yii::$app->settings->get('reading.date_time_mask')])->textInput() ?>

                    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

                    <?//= $form->field($model, 'all_day')->textInput() ?>

                   
                    <?= $form->field($model, 'id')->label(false)->hiddenInput() ?>

                </div>

            </div>
            <div class="form-group">
                <?php if ($model->isNewRecord): ?>
                    <?= Html::a(Yii::t('yee', 'Create'), ['#'], ['class' => 'btn btn-primary create-event']) ?>
                    <?= Html::a(Yii::t('yee', 'Cancel'), ['#'], ['class' => 'btn btn-default cancel-event']) ?>
                <?php else: ?>

                    <?= Html::a(Yii::t('yee', 'Save'), ['#'], ['class' => 'btn btn-primary create-event']) ?>
                    <?= Html::a(Yii::t('yee', 'Delete'), ['#'], ['class' => 'btn btn-default remove-event']) ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$js = <<<JS

$('.create-event').on('click', function (e) {

    e.preventDefault();

    var eventData;
            eventData = {
                id : $('#eventplan-id').val(),
                programmId : $('#programm_id').val(),
                resourceId : $('#eventplan-place_id').val(),
                description : $('#eventplan-description').val(),
                start : $('#eventplan-start_time').val(),
                end : $('#eventplan-end_time').val(),
            };
    $.ajax({
        url: '/admin/event/plan/update-event',
        data: {eventData : eventData},
        type: 'POST',
    success: function (res) {
                $('#w0').fullCalendar('refetchEvents', JSON);
                closeModal();
                console.log(eventData);
            },
            error: function () {
                alert('Error!!!');
            }
        });
});

$('.cancel-event').on('click', function (e) {
         e.preventDefault();        
         closeModal();
});
        
$('.remove-event').on('click', function (e) {

    e.preventDefault();

    var id = $('#eventplan-id').val();

    $.ajax({
        url: '/admin/event/plan/remove-event',
        data: {id: id},
        type: 'POST',
        success: function (res) {
       
         $('#w0').fullCalendar('refetchEvents', JSON);
                closeModal();
               // console.log(id);
            },
            error: function () {
                alert('Error!!!');
            }
    });
});

function closeModal() {
    $('#plan-modal').modal('hide');
}
JS;

$this->registerJs($js);
?>