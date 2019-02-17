<?php

use yeesoft\widgets\ActiveForm;
use backend\modules\section\models\SectionPage;
use yeesoft\helpers\Html;

use unclead\multipleinput\MultipleInput;
use unclead\multipleinput\examples\models\ExampleModel;

/* @var $this yii\web\View */
/* @var $model backend\modules\section\models\SectionPage */
/* @var $form yeesoft\widgets\ActiveForm */
?>

<div class="section-page-form">

   <?php $form = ActiveForm::begin();?>
    

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
                    
                    <?= $form->field($model, 'emails')->widget(MultipleInput::className(), [
                        'max' => 4,
                         'cloneButton' => true,
                         'sortable' => true,
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
                            <?= $form->field($model->loadDefaultValues(), 'status')->dropDownList(SectionPage::getStatusList()) ?>

                        <div class="form-group">
                            <?php  if ($model->isNewRecord): ?>
                                <?= Html::submitButton(Yii::t('yee', 'Create'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('yee', 'Cancel'), ['/section/default/index'], ['class' => 'btn btn-default']) ?>
                            <?php  else: ?>
                            <div class="form-group clearfix">
                                <label class="control-label" style="float: left; padding-right: 5px;"><?=  $model->attributeLabels()['id'] ?>: </label>
                                <span><?=  $model->id ?></span>
                            </div>
                                <?= Html::submitButton(Yii::t('yee', 'Save'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('yee', 'Delete'),
                                    ['/section/default/delete', 'id' => $model->id], [
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
