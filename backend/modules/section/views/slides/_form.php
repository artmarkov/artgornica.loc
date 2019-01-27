<?php

use yeesoft\widgets\ActiveForm;
use backend\modules\section\models\Slides;
use yeesoft\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\section\models\Slides */
/* @var $form yeesoft\widgets\ActiveForm */
?>

<div class="slides-form">

    <?php 
    $form = ActiveForm::begin([
            'id' => 'slides-form',
            'validateOnBlur' => false,
        ])
    ?>

    <div class="row">
        <div class="col-md-9">

            <div class="panel panel-default">
                <div class="panel-body">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'img_src')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'img_alt')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <?= $form->field($model, 'data_lazyload')->textInput(['maxlength' => true]) ?>   

                </div>

            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <?php if (!$model->isNewRecord) : ?>
                        <?= backend\modules\section\widgets\SlidesLayersWidget::widget(['model' => $model]); ?>
                    <?php endif; ?>
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
                        
                        <?php endif; ?>
                    
                    <?= $form->field($model->loadDefaultValues(), 'status')->dropDownList(Slides::getStatusList()) ?>

                    <?= $form->field($model, 'sort')->textInput() ?>    
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="record-info">
                        
                         
                        
                    <?= $form->field($model, 'data_transition')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'data_slotamount')->textInput() ?>

                    <?= $form->field($model, 'data_masterspeed')->textInput() ?>

                    <?= $form->field($model, 'data_delay')->textInput() ?>                    

                    <?= $form->field($model, 'data_fullwidthcentering')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'data_bgfit')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'data_bgposition')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'data_bgrepeat')->textInput(['maxlength' => true]) ?>
                        <div class="form-group">
                            <?php  if ($model->isNewRecord): ?>
                                <?= Html::submitButton(Yii::t('yee', 'Create'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('yee', 'Cancel'), ['/section/slides/index'], ['class' => 'btn btn-default']) ?>
                            <?php  else: ?>
                                <div class="form-group clearfix">
                                    <label class="control-label" style="float: left; padding-right: 5px;"><?=  $model->attributeLabels()['id'] ?>: </label>
                                    <span><?=  $model->id ?></span>
                                </div>
                                <?= Html::submitButton(Yii::t('yee', 'Save'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('yee', 'Delete'),
                                    ['/section/slides/delete', 'id' => $model->id], [
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

<!--        модал добавления слоя в слайд-->
        <?php \yii\bootstrap\Modal::begin([
            'header' => '<h3 class="lte-hide-title page-title">' . Yii::t('yee/section', 'Add Layers') . '</h3>',
            'size' => 'modal-lg',
            'id' => 'slides-layers-modal',
            //'footer' => 'footer',
        ]);

        \yii\bootstrap\Modal::end(); ?>