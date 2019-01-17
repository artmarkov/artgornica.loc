<?php

use yeesoft\widgets\ActiveForm;
use yeesoft\helpers\Html;

/* @var $model backend\modules\event\models\EventItemProgramm */
/* @var $form yeesoft\widgets\ActiveForm */

?>

<div class="item-programm-form">
    <?php if ($model->isNewRecord) {
        $action = 'create-programm';
    } else {
        $action = 'update-programm';
    }
    ?>
    <?php $form = ActiveForm::begin([
    'id' => 'item-programm-form',
        
    'enableAjaxValidation' => true,
    'action' => ['item-programm/' . $action , 'id' => $model->id]
]);
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group clearfix">
              <h4><?= $model->itemName ?></h4>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'qty_items')->textInput() ?>
                </div>
                <div class="col-md-6">
                     <?= $form->field($model, 'price')->textInput() ?>                    
                </div>
            </div>

            <?= $form->field($model, 'programm_id')->label(false)->hiddenInput() ?>
            <?= $form->field($model, 'item_id')->label(false)->hiddenInput() ?>

            <?php if ($model->isNewRecord) {
                echo Html::submitButton(Yii::t('yee', 'Add'), ['class' => 'btn btn-primary']);
            } else {
                echo Html::submitButton(Yii::t('yee', 'Update'), ['class' => 'btn btn-primary']);
            }
            ?>

        </div>
    </div>

<?php ActiveForm::end(); ?>

</div>
