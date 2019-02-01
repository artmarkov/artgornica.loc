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
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'link_href')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'img_alt')->textInput(['maxlength' => true]) ?>                            
                        </div>
                    </div>
                </div>

            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="record-info">
                        <?=
                        $form->field($model, 'thumbnail')->widget(backend\modules\media\widgets\FileInput::className(), [
                            'name' => 'image',
                            'buttonTag' => 'button',
                            'buttonName' => Yii::t('yee', 'Browse'),
                            'buttonOptions' => ['class' => 'btn btn-default btn-file-input'],
                            'options' => ['class' => 'form-control'],
                            'template' => '<div class="items-thumbnail thumbnail"></div><div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
                            'thumb' => $this->context->module->thumbnailSize,
                            'imageContainer' => '.items-thumbnail',
                            'pasteData' => backend\modules\media\widgets\FileInput::DATA_URL,
                            'callbackBeforeInsert' => 'function(e, data) {
                                $(".items-thumbnail").show();
                            }',
                        ])
                        ?>
                    </div>
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

                        <?=
                                $form->field($model, 'category_id')
                                ->dropDownList(backend\modules\portfolio\models\Category::getCategories(), [
                                    'prompt' => Yii::t('yee/section', 'Select Categories...'),
                                    'id' => 'categories_id'
                                ])->label(Yii::t('yee/section', 'Portfolio Category'));
                        ?>
                        <div class="form-group">
                            <?php if ($model->isNewRecord): ?>
    <?= Html::submitButton(Yii::t('yee', 'Create'), ['class' => 'btn btn-primary']) ?>
    <?= Html::a(Yii::t('yee', 'Cancel'), ['/portfolio/default/index'], ['class' => 'btn btn-default']) ?>
<?php else: ?>
                                <div class="form-group clearfix">
                                    <label class="control-label" style="float: left; padding-right: 5px;"><?= $model->attributeLabels()['id'] ?>: </label>
                                    <span><?= $model->id ?></span>
                                </div>
                                <?= Html::submitButton(Yii::t('yee', 'Save'), ['class' => 'btn btn-primary']) ?>
                                <?=
                                Html::a(Yii::t('yee', 'Delete'), ['/portfolio/default/delete', 'id' => $model->id], [
                                    'class' => 'btn btn-default',
                                    'data' => [
                                        'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                        'method' => 'post',
                                    ],
                                ])
                                ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php ActiveForm::end(); ?>

</div>
<?php
$css = <<<CSS
.ms-ctn .ms-sel-ctn {
    margin-left: -6px;
    margin-top: -2px;
}
.ms-ctn .ms-sel-item {
    color: #666;
    font-size: 14px;
    cursor: default;
    border: 1px solid #ccc;
}
CSS;

$js = <<<JS
    var thumbnail = $("#items-thumbnail").val();
    if(thumbnail.length == 0){
        $('.items-thumbnail').hide();
    } else {
        $('.items-thumbnail').html('<img src="' + thumbnail + '" />');
    }
JS;

$this->registerCss($css);
$this->registerJs($js, yii\web\View::POS_READY);
?>