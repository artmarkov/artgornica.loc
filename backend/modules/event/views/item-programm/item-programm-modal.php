<?php

use yeesoft\widgets\ActiveForm;
use yeesoft\helpers\Html;
use backend\modules\event\models\EventPractice;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

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
                <label class="control-label" style="float: left; padding-right: 5px;">
                    <?= $model->attributeLabels()['itemName'] ?> :
                </label>
                <span><?= $model->itemName ?></span>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'qty_items')->textInput() ?>
                </div>
                <div class="col-md-6">
                     <?= $form->field($model, 'price')->textInput() ?>                    
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'practice_list')->widget(DepDrop::classname(), [
                            'type' => DepDrop::TYPE_SELECT2,
                            'data' => EventPractice::getEventPracticeByName($model->item_id),
                            'options' => ['multiple' => true, 'prompt' => Yii::t('yee/event', 'Select Practice...'), 'id' => 'practice_list'],
                            'pluginOptions' => [
                                'depends' => ['item_id'],
                                'placeholder' => Yii::t('yee/event', 'Select Practice...'),
                                'url' => Url::to(['/event/schedule/practice'])
                            ]
                        ])->label(Yii::t('yee/event', 'Practice List'));
                        ?>                   
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
