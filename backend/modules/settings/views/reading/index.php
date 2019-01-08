<?php

use yeesoft\helpers\Html;
use yeesoft\settings\assets\SettingsAsset;
use yeesoft\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model yeesoft\models\Setting */
/* @var $form yeesoft\widgets\ActiveForm */

$this->title = Yii::t('yee/settings', 'Reading Settings');
$this->params['breadcrumbs'][] = $this->title;

SettingsAsset::register($this);
?>
<div class="setting-index">

    <div class="row">
        <div class="col-lg-8"><h3 class="lte-hide-title page-title"><?= Html::encode($this->title) ?></h3></div>
        <div class="col-lg-4"></div>
    </div>

    <div class="setting-form">
        <?php
        $form = ActiveForm::begin([
            'id' => 'setting-form',
            'validateOnBlur' => false,
            'fieldConfig' => [
                'template' => "<div class=\"settings-group\"><div class=\"settings-label\">{label}</div>\n<div class=\"settings-field\">{input}\n{hint}\n{error}</div></div>"
            ],
        ])
        ?>

        <?= $form->field($model, 'page_size')->textInput(['maxlength' => true])->hint($model->getDescription('page_size')) ?>
        <?= $form->field($model, 'phone_mask')->textInput(['maxlength' => true])->hint($model->getDescription('phone_mask')) ?>
        <?= $form->field($model, 'date_mask')->textInput(['maxlength' => true])->hint($model->getDescription('date_mask')) ?>      
        <?= $form->field($model, 'time_mask')->textInput(['maxlength' => true])->hint($model->getDescription('time_mask')) ?>
        <?= $form->field($model, 'date_time_mask')->textInput(['maxlength' => true])->hint($model->getDescription('date_time_mask')) ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('yee', 'Save'), ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>


