<?php

use yeesoft\widgets\ActiveForm;
use backend\modules\section\models\Parallax;
use yeesoft\helpers\Html;
use kartik\color\ColorInput;

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

                    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'countdown_date')->textInput() ?>

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

        </div>
    </div>

    <?php  ActiveForm::end(); ?>

</div>
