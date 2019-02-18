 <?php
use yeesoft\widgets\ActiveForm;
use backend\modules\media\widgets\TinyMce;   
?>
  <?php 
    $form = ActiveForm::begin([
            'id' => 'feedback-form',
            'validateOnBlur' => false,
        ])
    ?>
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
            
            
            echo $form->field($model, 'title')->widget(
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