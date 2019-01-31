<?php

use yeesoft\widgets\ActiveForm;
use backend\modules\portfolio\models\Menu;
use yeesoft\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\portfolio\models\Menu */
/* @var $form yeesoft\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php 
    $form = ActiveForm::begin([
            'id' => 'menu-form',
            'validateOnBlur' => false,
        ])
    ?>

    <div class="row">
        <div class="col-md-9">

            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'categories_list')->widget(nex\chosen\Chosen::className(), [
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
                            
                            <?= $form->field($model->loadDefaultValues(), 'status')->dropDownList(Menu::getStatusList()) ?>
                        
                            <?= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>
                        
                        <div class="form-group">
                            <?php  if ($model->isNewRecord): ?>
                                <?= Html::submitButton(Yii::t('yee', 'Create'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('yee', 'Cancel'), ['/portfolio/menu/index'], ['class' => 'btn btn-default']) ?>
                            <?php  else: ?>
                                <div class="form-group clearfix">
                                    <label class="control-label" style="float: left; padding-right: 5px;"><?=  $model->attributeLabels()['id'] ?>: </label>
                                    <span><?=  $model->id ?></span>
                                </div>
                                <?= Html::submitButton(Yii::t('yee', 'Save'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('yee', 'Delete'),
                                    ['/portfolio/menu/delete', 'id' => $model->id], [
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
