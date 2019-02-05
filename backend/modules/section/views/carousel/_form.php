<?php

use yeesoft\widgets\ActiveForm;
use backend\modules\section\models\Carousel;
use yeesoft\helpers\Html;
use yii\helpers\Url;
use kartik\sortable\Sortable;
use kartik\sortinput\SortableInput;
use yii\web\JsExpression;
use yii\widgets\Pjax;

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
<?php
    $JSInsertLink = <<<EOF
        function(e, data) {      
            
            // console.log(data);            
             var eventData;
            
             eventData = {
                id: '{$model->id}',
                class: '{$model->formName()}',          
                media: data.id,
            };

        $.ajax({
               url: '/admin/mediamanager/default/add-media',
               type: 'POST',
               data: {eventData : eventData},
               success: function (res) {
            
                    $.pjax.reload({
                          container: "#carousel-container" 
                    });
            
                 //  console.log(res);
               },
               error: function () {
                   alert('Error!!!');
               }
           });
       }
EOF;
    ?>
    <div class="row">
        <div class="col-md-9">

            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>                   
                   

                </div>

            </div>
            
             <div class="panel panel-default">
                <div class="panel-body">
                <?php Pjax::begin([
                    'id' => 'carousel-container'
                ]); ?>
                    
                <?php
                    echo $form->field($model, 'sort_list')->widget(SortableInput::classname(), [
                        'sortableOptions' => ['type' => Sortable::TYPE_GRID],                        
                        'items' => backend\modules\mediamanager\models\MediaManager::getMediaThumbList($model->formName(), $model->id),
                        'hideInput' => true,
                        'options' => ['id' => 'carousel', 'class' => 'form-control', 'readonly' => true]
                    ]);
                    //echo '<pre>' . print_r(backend\modules\mediamanager\models\MediaManager::getMediaThumbList('Carousel','1'), true) . '</pre>';
                ?>
                <?php Pjax::end(); ?>
                    
                     <?= backend\modules\media\widgets\FileInput::widget([
                            'name' => 'image',
                            'buttonOptions' => ['class' => 'btn btn-primary'],
                            'options' => ['class' => 'hidden', 'id' => 'carousel-input'],
                            'template' => '<div class="input">{input}{button}</div>',
                            'thumb' => 'medium',
                            'callbackBeforeInsert' => new JsExpression($JSInsertLink), 
                        ])
                        ?>
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
                    
                        <?= $form->field($model->loadDefaultValues(), 'status')->dropDownList(Carousel::getStatusList()) ?>

                        <?= $form->field($model, 'plugin_class')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'plugin_options')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'img_class')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'img_width')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'img_height')->textInput(['maxlength' => true]) ?>
                        
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
