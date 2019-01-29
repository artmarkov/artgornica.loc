<?php

use yeesoft\widgets\ActiveForm;
use backend\modules\section\models\Carousel;
use yeesoft\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\modules\section\models\Carousel */
/* @var $form yeesoft\widgets\ActiveForm */
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
            
             <div class="panel panel-default">
                <div class="panel-body">
                    
       <?//php echo '<pre>' . print_r($model->imagesLinksData, true) . '</pre>'; ?>
                    <?= \kartik\file\FileInput::widget([
                        'name' => 'ImageManager[attachment]',
                        'options' => [
                            'multiple' => true
                        ],
                        'pluginOptions' => [
                            'deleteUrl' => Url::toRoute(['/imagemanager/image-manager/delete-image']),
                            'initialPreview' => $model->imagesLinks,
                            'initialPreviewAsData' => true,
                            'initialPreviewFileType' => 'image',
                            'overwriteInitial' => false,
                            'initialPreviewConfig' => $model->imagesLinksData,
                            'allowedFileExtensions' => ["jpg"], //, "png", "mp4", "pdf"
                            'uploadUrl' => Url::to(['/imagemanager/image-manager/file-upload']),
                            'uploadExtraData' => [
                                'ImageManager[class]' => $model->formName(),
                                'ImageManager[item_id]' => $model->id
                            ],
                            'maxFileCount' => 10,
                        ],
                        'pluginEvents' => [
                            'filesorted' => new \yii\web\JsExpression('function(event, params){
                                              $.post("' . Url::toRoute(["/imagemanager/image-manager/sort-image", "id" => $model->id]) . '", {sort: params});
                                        }')
                        ],
                    ]);
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
