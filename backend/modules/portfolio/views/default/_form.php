<?php

use yeesoft\widgets\ActiveForm;
use backend\modules\portfolio\models\Items;
use yeesoft\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\portfolio\models\Items */
/* @var $form yeesoft\widgets\ActiveForm */
?>

<div class="items-form">

    <?php 
    $form = ActiveForm::begin([
            'id' => 'items-form',
            'validateOnBlur' => false,
        ])
    ?>

    <div class="row">
        <div class="col-md-9">

            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'link_class')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'link_href')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'img_class')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'img_src')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'img_alt')->textInput(['maxlength' => true]) ?>

                   <?=
                        $form->field($model, 'categories_list')->widget(nex\chosen\Chosen::className(), [
                            'items' => backend\modules\portfolio\models\Category::getCategories(),
                            'multiple' => true,
                            'placeholder' => Yii::t('yee/section', 'Select Categories...'),
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
                        <?= $form->field($model->loadDefaultValues(), 'status')->dropDownList(Items::getStatusList()) ?>
                        <div class="form-group">
                            <?php  if ($model->isNewRecord): ?>
                                <?= Html::submitButton(Yii::t('yee', 'Create'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('yee', 'Cancel'), ['/portfolio/default/index'], ['class' => 'btn btn-default']) ?>
                            <?php  else: ?>
                                <div class="form-group clearfix">
                                    <label class="control-label" style="float: left; padding-right: 5px;"><?=  $model->attributeLabels()['id'] ?>: </label>
                                    <span><?=  $model->id ?></span>
                                </div>
                                <?= Html::submitButton(Yii::t('yee', 'Save'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('yee', 'Delete'),
                                    ['/portfolio/default/delete', 'id' => $model->id], [
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
