<?php

use yeesoft\helpers\Html;
use yeesoft\media\widgets\TinyMce;
use yeesoft\models\User;
use backend\modules\post\models\Category;
use backend\modules\post\models\Post;
use yeesoft\widgets\ActiveForm;
use yeesoft\widgets\LanguagePills;
use yii\jui\DatePicker;
use backend\modules\post\widgets\MagicSuggest;
use backend\modules\post\models\Tag;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\modules\post\models\Post */
/* @var $form yeesoft\widgets\ActiveForm */
?>

<div class="post-form">

    <?php
    $form = ActiveForm::begin([
                'id' => 'post-form',
                'validateOnBlur' => false,
            ])
    ?>

    <div class="row">
        <div class="col-md-9">

            <div class="panel panel-default">
                <div class="panel-body">

                    <?php if ($model->isMultilingual()): ?>
                        <?= LanguagePills::widget() ?>
                    <?php endif; ?>

                    <?= $form->field($model, 'content')->widget(TinyMce::className()); ?>

                </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-body">
                     
                    
                    
                    

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

                            <div class="form-group clearfix">
                                <label class="control-label" style="float: left; padding-right: 5px;">
                            <?= $model->attributeLabels()['updated_by'] ?> :
                                </label>
                                <span><?= $model->updatedBy->username ?></span>
                            </div>

                        <?php endif; ?>

                        <div class="form-group">
                            <?php if ($model->isNewRecord): ?>
                                <?= Html::submitButton(Yii::t('yee', 'Create'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('yee', 'Cancel'), ['index'], ['class' => 'btn btn-default']) ?>
                            <?php else: ?>
                                <?= Html::submitButton(Yii::t('yee', 'Save'), ['class' => 'btn btn-primary']) ?>
                                <?=
                                Html::a(Yii::t('yee', 'Delete'), ['delete', 'id' => $model->id], [
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

            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="record-info">
                        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

                        <?=
                        $form->field($model, 'tag_list')->widget(nex\chosen\Chosen::className(), [
                            'items' => Tag::getTags(),
                            'multiple' => true,
                            'placeholder' => Yii::t('yee/post', 'Select Tags...'),
                        ])
                        ?>

                        <?= $form->field($model, 'category_id')->dropDownList(Category::getCategories(), ['prompt' => '', 'encodeSpaces' => true]) ?>

                        <?= $form->field($model, 'published_at')
                                ->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd', 'options' => ['class' => 'form-control']]);
                        ?>

                        <?= $form->field($model, 'status')->dropDownList(Post::getStatusList()) ?>

                        <?php if (!$model->isNewRecord): ?>
                            <?= $form->field($model, 'created_by')->dropDownList(User::getUsersList()) ?>
                        <?php endif; ?>

                        <?= $form->field($model, 'comment_status')->dropDownList(Post::getCommentStatusList()) ?>
                        
                        <?= $form->field($model, 'main_flag')->dropDownList(Post::getMainList()) ?>

                        <?= $form->field($model, 'view')->dropDownList($this->context->module->viewList) ?>

                        <?= $form->field($model, 'layout')->dropDownList($this->context->module->layoutList) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php ActiveForm::end(); ?>

</div>
