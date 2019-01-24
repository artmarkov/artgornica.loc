<?php

use yeesoft\widgets\ActiveForm;
use backend\modules\section\models\Slider;
use yeesoft\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RevolutionSlider */
/* @var $form yeesoft\widgets\ActiveForm */
?>

<div class="slider-form">

    <?php 
    $form = ActiveForm::begin([
            'id' => 'slider-form',
            'validateOnBlur' => false,
        ])
    ?>

    <div class="row">
        <div class="col-md-9">

            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <?= $form->field($model, 'banner_top')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'banner_middle')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'slide_image')->textInput(['maxlength' => true]) ?>
                    
                    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'btn_icon')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'btn_name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'btn_class')->textInput(['maxlength' => true]) ?>


                </div>

            </div>
        </div>

        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="record-info">
                        <div class="form-group clearfix">
                            <label class="control-label" style="float: left; padding-right: 5px;"><?=  $model->attributeLabels()['id'] ?>: </label>
                            <span><?=  $model->id ?></span>
                        </div>

                    <?= $form->field($model->loadDefaultValues(), 'status')->dropDownList(Slider::getStatusList()) ?>

                    <?= $form->field($model, 'sort')->textInput() ?>
                        
                        <div class="form-group">
                            <?php  if ($model->isNewRecord): ?>
                                <?= Html::submitButton(Yii::t('yee', 'Create'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('yee', 'Cancel'), ['/section/slider/index'], ['class' => 'btn btn-default']) ?>
                            <?php  else: ?>
                                <?= Html::submitButton(Yii::t('yee', 'Save'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('yee', 'Delete'),
                                    ['/section/slider/delete', 'id' => $model->id], [
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
