<?php

use yeesoft\widgets\ActiveForm;
use backend\modules\section\models\Feedback;
use yeesoft\helpers\Html;
use backend\modules\media\widgets\TinyMce;
use yii\jui\DatePicker;
use kartik\switchinput\SwitchInput;

/* @var $this yii\web\View */
/* @var $model backend\modules\section\models\Feedback */
/* @var $form yeesoft\widgets\ActiveForm */
?>

<div class="feedback-form">

    <?php 
    $form = ActiveForm::begin([
            'id' => 'feedback-form',
            'validateOnBlur' => false,
        ])
    ?>

    <div class="row">
        <div class="col-md-9">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6"> 
                            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-6"> 
                            <?= $form->field($model, 'business')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>

                    <?php
                   
                    $users = [                       
                        'label' => [
                            'Blocks', 
                            'title' => 'Paragraph'
                            ],			
                        
                    ];
    $usersList = \yii\helpers\Json::encode($users);
    echo '<pre>' . print_r($usersList, true) . '</pre>';
                    $tinyMCECallback = <<< JS
    function (editor) {
//
//        let usersList = $usersList;
//        let options = [];
//
//        //iterate the user array and create the options with text and 
//        //onclick event to insert the content on click to the editor
//
//        $.each(usersList, function(title, mapping) {
//            options.push({
//                text: title, 
//                onclick: function() { tinymce.activeEditor.insertContent(title); }
//            });
//        });
                         

//        //add the dropdown button to the editor 
//        editor.addButton('users', {
//            type: 'menubutton',
//            text: 'Users',
//            icon: false,
//            menu: options
//        });
                            
                            
    editor.addButton('alignment', {

            type: 'menubutton',
            text: 'Alignment',
            icon: false,
            menu: [
                { text: 'left', onclick: function() {tinymce.activeEditor.formatter.toggle('alignleft');}},
                { text: 'center', onclick: function() {tinymce.activeEditor.formatter.toggle('aligncenter');}},
                { text: 'right', onclick: function() {tinymce.activeEditor.formatter.toggle('alignright');}},
                { text: 'justify', onclick: function() {tinymce.activeEditor.formatter.toggle('alignjustify');}},
                            
                { text: 'test', onclick: function() {tinymce.activeEditor.insertContent('test');}},
                { text: 'some', onclick: function() {tinymce.activeEditor.setContent('<span>some</span> html', {format: 'raw'});}},  
                      
                {icon: 'alignleft', onclick: function() { console.log(editor); tinyMCE.execCommand('JustifyLeft'); }},
                {icon: 'alignright', onclick: function() { tinyMCE.execCommand('JustifyRight'); }}
            ]
        });
    }

JS;
            
            
            echo $form->field($model, 'content')->widget(
        TinyMce::class, [
            'options' => ['rows' => 10],
            //'language' => 'en',
            'clientOptions' => [
                'extended_valid_elements' => 'i[class],span[*]' ,   
                
                'menubar' => false,
                'height' => 400,
                'image_dimensions' => true,
                'entity_encoding' => 'raw',
                'plugins' => [
                    'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code contextmenu table wordcount pagebreak',
                ],
                'toolbar' => 'undo redo | alignment | styleselect bold italic | alignleft aligncenter alignright alignjustify bullist numlist outdent indent | pagebreak link image table | code',

                
                'setup' => new \yii\web\JsExpression($tinyMCECallback),
           ],
        ]
    );



    ?>
                    
                </div>
            </div>
        </div>

        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="record-info">
                        <div class="form-group clearfix">
                            <label class="control-label" style="float: left; padding-right: 5px;"><?=  $model->attributeLabels()['id'] ?>: </label>
                            <span><?=  $model->id ?></span>
                        </div>
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
                            <?= $form->field($model, 'published_at')
                                ->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd', 'options' => ['class' => 'form-control']]);
                            ?>
                        
                            <?= $form->field($model, 'main_flag')->widget(SwitchInput::classname(), [
                                'pluginOptions' => [
                                    'size' => 'small',
                                ],
                            ]); ?>
                        
                            <?= $form->field($model, 'status')->dropDownList(Feedback::getStatusList()) ?>
                        <div class="form-group">
                            <?php  if ($model->isNewRecord): ?>
                                <?= Html::submitButton(Yii::t('yee', 'Create'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('yee', 'Cancel'), ['/section/feedback/index'], ['class' => 'btn btn-default']) ?>
                            <?php  else: ?>
                                <?= Html::submitButton(Yii::t('yee', 'Save'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('yee', 'Delete'),
                                    ['/section/feedback/delete', 'id' => $model->id], [
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
