<?php

use yeesoft\widgets\ActiveForm;
use backend\modules\event\models\EventProgramm;
use backend\modules\event\models\EventItem;
use yeesoft\helpers\Html;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\calendar\Event */
/* @var $form yeesoft\widgets\ActiveForm */
?>

<div class="event-form">

     <?php $form = ActiveForm::begin([
        'id' => 'event-form',
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

                    <?=
                            $form->field($model, 'place_id')
                            ->dropDownList(backend\modules\event\models\EventPlace::getPlacesList(), [
                                'prompt' => Yii::t('yee/event', 'Select Places...')
                            ])->label(Yii::t('yee/event', 'Place Name'));
                    ?>
                    
                    <?= $form->field($model, 'start_time')->widget(kartik\datetime\DateTimePicker::classname())->widget(\yii\widgets\MaskedInput::className(), ['mask' => Yii::$app->settings->get('reading.date_time_mask')])->textInput(); ?>

                    <?= $form->field($model, 'end_time')->widget(kartik\datetime\DateTimePicker::classname())->widget(\yii\widgets\MaskedInput::className(), ['mask' => Yii::$app->settings->get('reading.date_time_mask')])->textInput() ?>

                    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

                    <?//= $form->field($model, 'all_day')->textInput() ?>

                    <?=
                    $form->field($model, 'users_list')->widget(nex\chosen\Chosen::className(), [
                        'items' => backend\modules\event\models\EventSchedule::getScheduleUsersList(),
                        'multiple' => true,
                        'placeholder' => Yii::t('yee/event', 'Select Users...'),
                    ])
                    ?>
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
                id : $('#eventschedule-id').val(),
                programmId : $('#programm_id').val(),
                itemId : $('#item_id').val(),
                resourceId : $('#eventschedule-place_id').val(),
                description : $('#eventschedule-description').val(),
                users : $('#eventschedule-users_list').val(),
                start : $('#eventschedule-start_time').val(),
                end : $('#eventschedule-end_time').val(),
            };
    $.ajax({
        url: '/admin/event/schedule/update-event',
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

    var id = $('#eventschedule-id').val();

    $.ajax({
        url: '/admin/event/schedule/remove-event',
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
    $('#event-modal').modal('hide');
}
JS;

$this->registerJs($js);
?>