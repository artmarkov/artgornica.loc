<?php

use yeesoft\widgets\ActiveForm;
use backend\modules\section\models\Parallax;
use yeesoft\helpers\Html;
use kartik\color\ColorInput;
use kartik\switchinput\SwitchInput;

/* @var $this yii\web\View */
/* @var $model backend\modules\section\models\Parallax */
/* @var $form yeesoft\widgets\ActiveForm */
?>

<div class="parallax-form">

    <?php
    $form = ActiveForm::begin([
                'id' => 'parallax-form',
                'validateOnBlur' => false,
            ])
    ?>

    <div class="row">
        <div class="col-md-9">

            <div class="panel panel-default">
                <div class="panel-body">

                    <?= $form->field($model, 'parallax_class')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'background_ratio')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'content')->textarea(['rows' => 12]) ?>

                </div>

            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">  
                            <?= $form->field($model, 'countdown')->widget(SwitchInput::classname(), [
                                'pluginOptions' => [
                                    'size' => 'small',
                                ],
                            ]); ?>
                        </div>
                        <div class="col-md-10">
                            <?= $form->field($model, 'start_time')->widget(kartik\datetime\DateTimePicker::classname())
                                    ->widget(\yii\widgets\MaskedInput::className(), ['mask' => Yii::$app->settings->get('reading.date_time_mask')])->textInput();
                            ?>


                        </div>
                    </div>
                            <?= $form->field($model, 'countdown_prompt')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="record-info">
                        <div class="form-group clearfix">
                            <div class="row">
                                <div class="col-md-6">
                            <?= $form->field($model, 'btn_name')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-md-6">
                            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                            <?= $form->field($model, 'btn_icon')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-md-6">
                            <?= $form->field($model, 'btn_class')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="record-info">
                        <div class="form-group clearfix">
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
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <?php if ($model->isNewRecord): ?>
                                <?= Html::submitButton(Yii::t('yee', 'Create'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('yee', 'Cancel'), ['/section/parallax/index'], ['class' => 'btn btn-default']) ?>
                            <?php else: ?>
                                <div class="form-group clearfix">
                                    <label class="control-label" style="float: left; padding-right: 5px;"><?= $model->attributeLabels()['id'] ?>: </label>
                                    <span><?= $model->id ?></span>
                                </div>
                                <?= Html::submitButton(Yii::t('yee', 'Save'), ['class' => 'btn btn-primary']) ?>
                                <?=
                                Html::a(Yii::t('yee', 'Delete'), ['/section/parallax/delete', 'id' => $model->id], [
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
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="record-info">
                        <?= $form->field($model->loadDefaultValues(), 'status')->dropDownList(Parallax::getStatusList()) ?>

                        <?= $form->field($model, 'bg_color')->widget(ColorInput::classname(), [
                            'options' => ['placeholder' => 'Select color ...'],
                            'pluginOptions' => ['preferredFormat' => 'rgb']
                        ]);
                        ?>
                        <?= $form->field($model, 'bg_image')->widget(backend\modules\media\widgets\FileInput::className(), [
                            'name' => 'image',
                            'buttonTag' => 'button',
                            'buttonName' => Yii::t('yee', 'Browse'),
                            'buttonOptions' => ['class' => 'btn btn-default btn-file-input'],
                            'options' => ['class' => 'form-control'],
                            'template' => '<div class="parallax-bg_image thumbnail"></div><div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
                            'thumb' => 'great',
                            'imageContainer' => '.parallax-bg_image',
                            'pasteData' => backend\modules\media\widgets\FileInput::DATA_URL,
                            'callbackBeforeInsert' => 'function(e, data) {
                                $(".bg_image-thumbnail").show();
                            }',
                        ])
                        ?>
                        <?= $form->field($model, 'content_image')->widget(backend\modules\media\widgets\FileInput::className(), [
                            'name' => 'image',
                            'buttonTag' => 'button',
                            'buttonName' => Yii::t('yee', 'Browse'),
                            'buttonOptions' => ['class' => 'btn btn-default btn-file-input'],
                            'options' => ['class' => 'form-control'],
                            'template' => '<div class="parallax-content_image thumbnail"></div><div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
                            'thumb' => 'medium',
                            'imageContainer' => '.parallax-content_image',
                            'pasteData' => backend\modules\media\widgets\FileInput::DATA_URL,
                            'callbackBeforeInsert' => 'function(e, data) {
                                $(".content_image-thumbnail").show();
                            }',
                        ])
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php ActiveForm::end(); ?>

</div>
<?php
$js = <<<JS
    var bg_image = $("#parallax-bg_image").val();
    if(bg_image.length == 0){
        $('.parallax-bg_image').hide();
    } else {
        $('.parallax-bg_image').html('<img src="' + bg_image + '" />');
    }
        
    var content_image = $("#parallax-content_image").val();
    if(bg_image.length == 0){
        $('.parallax-content_image').hide();
    } else {
        $('.parallax-content_image').html('<img src="' + content_image + '" />');
    }
JS;

$this->registerJs($js, yii\web\View::POS_READY);
?>