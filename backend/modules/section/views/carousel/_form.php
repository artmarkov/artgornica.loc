<?php

use yeesoft\widgets\ActiveForm;
use backend\modules\section\models\Carousel;
use yeesoft\helpers\Html;
use kartik\switchinput\SwitchInput;

/* @var $this yii\web\View */
/* @var $model backend\modules\section\models\Carousel */
/* @var $form yeesoft\widgets\ActiveForm */
//https://toster.ru/q/569522
?>

<div class="carousel-form">

    <?php 
    $form = ActiveForm::begin([
            'id' => 'carousel-form',
            'validateOnBlur' => false,
        ])
    ?>

    <div class="row">
        <div class="col-md-9">

            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>                     

                </div>
            </div>
            
            <?php if (!$model->isNewRecord) : ?>
            
            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <?= \backend\modules\mediamanager\widgets\MediaManagerWidget::widget(['model' => $model]); ?>
                    
                </div> 
            </div>
            
            <?php endif; ?>
            
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
                        
                        <?php endif; ?>
                    
                        <?= $form->field($model->loadDefaultValues(), 'status')->dropDownList(Carousel::getStatusList()) ?>

                        <?= $form->field($model, 'items')->textInput() ?>
                     
                        <?= $form->field($model, 'transition_style')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'auto_play')->textInput(['maxlength' => true]) ?>
                        
                        
                        <div class="row">
                            <div class="col-md-12 col-lg-4 "> 
                        <?= $form->field($model, 'single_item')->widget(SwitchInput::classname(), [
                        'pluginOptions' => [
                            'size' => 'small',
                        ],
                        ]); ?>                                 
                            </div>
                            <div class="col-md-12 col-lg-4 "> 
                        <?= $form->field($model, 'navigation')->widget(SwitchInput::classname(), [
                        'pluginOptions' => [
                            'size' => 'small',
                        ],
                        ]); ?>                                 
                            </div>
                            <div class="col-md-12 col-lg-4 ">
                        <?= $form->field($model, 'pagination')->widget(SwitchInput::classname(), [
                        'pluginOptions' => [
                            'size' => 'small',
                        ],
                        ]); ?>                                                              
                            </div>
                        </div>
                                
                        <div class="form-group clearfix">
                            <label class="control-label" style="float: left; padding-right: 5px;"><?=  $model->attributeLabels()['id'] ?>: </label>
                            <span><?=  $model->id ?></span>
                        </div>
                        <div class="form-group">
                            <?php  if ($model->isNewRecord): ?>
                                <?= Html::submitButton(Yii::t('yee', 'Create'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('yee', 'Cancel'), ['/section/carousel/index'], ['class' => 'btn btn-default']) ?>
                            <?php  else: ?>
                                <?= Html::submitButton(Yii::t('yee', 'Save'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('yee', 'Delete'),
                                    ['/section/carousel/delete', 'id' => $model->id], [
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
