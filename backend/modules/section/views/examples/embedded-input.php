<?php

use yii\bootstrap\ActiveForm;
use unclead\multipleinput\MultipleInput;
use unclead\multipleinput\examples\models\ExampleModel;
use yii\helpers\Html;
use unclead\multipleinput\MultipleInputColumn;


/* @var $this \yii\web\View */
/* @var $model ExampleModel */

$commonAttributeOptions = [
    'enableAjaxValidation'   => true,
    'enableClientValidation' => false,
    'validateOnChange'       => false,
    'validateOnSubmit'       => true,
    'validateOnBlur'         => false,
];

$enableActiveForm = true;
?>
<div class="section-page-form">
<?php

if ($enableActiveForm) {
    $form = ActiveForm::begin([
        'enableAjaxValidation'      => true,
        'enableClientValidation'    => false,
        'validateOnChange'          => false,
        'validateOnSubmit'          => true,
        'validateOnBlur'            => false,
    ]);
} else {
    echo Html::beginForm();
}

?>
 <div class="row">
        <div class="col-md-9">

            <div class="panel panel-default">
                <div class="panel-body">
<?php

echo MultipleInput::widget([
    'model' => $model,
    'attribute' => 'questions',
     'sortable' => true,
    'attributeOptions' => $commonAttributeOptions,
    'columns' => [
        [
            'name' => 'question',
            //'type' => 'textarea',
             'type' => \backend\modules\media\widgets\TinyMce::className(), 
        ],
        [
            'name' => 'answers',
            'type'  => MultipleInput::className(),
            'options' => [
                
                'attributeOptions' => $commonAttributeOptions,
                'columns' => [
                    [
                        'name' => 'right',
                        'type' => MultipleInputColumn::TYPE_CHECKBOX
                    ],
                    [
                        'name' => 'answer'
                    ]
                ]
            ]
        ]
    ],
]);
?>
                </div>
                </div>
                </div>
    
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-body">
                    
                    
<?= Html::submitButton('Update', ['class' => 'btn btn-success']);?>
                    
                </div>
                </div>
                </div>
                </div>
                
<?php
if ($enableActiveForm) {
    ActiveForm::end();
} else {
    echo Html::endForm();
}
?>
                </div>

