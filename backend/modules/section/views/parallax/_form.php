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
                    
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                    
                    <?= $form->field($model, 'bg_image')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'content_image')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'content')->textarea(['rows' => 10]) ?>
                   
                </div>

            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">  
                            <?= $form->field($model, 'countdown')->widget(SwitchInput::classname(),
                                [
                                    'pluginOptions' => [
                                         'size' => 'small',                                            
                                    ],                                            
                                ]);
                            ?>
                        </div>
                        <div class="col-md-10">
                            <?= $form->field($model, 'start_time')->widget(kartik\datetime\DateTimePicker::classname())
                                                ->widget(\yii\widgets\MaskedInput::className(),     
                                                ['mask' => Yii::$app->settings->get('reading.date_time_mask')])->textInput(); ?>


                        </div>
                    </div>
                            <?= $form->field($model, 'countdown_prompt')->textInput(['maxlength' => true]) ?>
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
                        
                            <?= $form->field($model->loadDefaultValues(), 'status')->dropDownList(Parallax::getStatusList()) ?>
                        
                            <?= $form->field($model, 'bg_color')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                                'pluginOptions' => ['preferredFormat' => 'rgb']
                            ]);
                            ?>
                        <div class="form-group">
                            <?php  if ($model->isNewRecord): ?>
                                <?= Html::submitButton(Yii::t('yee', 'Create'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('yee', 'Cancel'), ['/section/parallax/index'], ['class' => 'btn btn-default']) ?>
                            <?php  else: ?>
                           <div class="form-group clearfix">
                                <label class="control-label" style="float: left; padding-right: 5px;"><?= $model->attributeLabels()['id'] ?>: </label>
                                <span><?= $model->id ?></span>
                            </div>
                                <?= Html::submitButton(Yii::t('yee', 'Save'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('yee', 'Delete'),
                                    ['/section/parallax/delete', 'id' => $model->id], [
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
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="record-info">
                        <div class="form-group clearfix">
                            
                            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'btn_icon')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'btn_name')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'btn_class')->textInput(['maxlength' => true]) ?>  
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php  ActiveForm::end(); ?>

</div>
