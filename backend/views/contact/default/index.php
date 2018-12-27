<?php

use yii\helpers\Url;
use yii\widgets\Pjax;
use yeesoft\grid\GridView;
use yeesoft\grid\GridQuickLinks;
use common\models\Contact;
use yeesoft\helpers\Html;
use yeesoft\grid\GridPageSize;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yee', 'Contacts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="lte-hide-title page-title"><?=  Html::encode($this->title) ?></h3>
           
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-6">
                    <?php 
                    /* Uncomment this to activate GridQuickLinks */
                    /* echo GridQuickLinks::widget([
                        'model' => Contact::className(),
                        'searchModel' => $searchModel,
                    ])*/
                    ?>
                </div>

                <div class="col-sm-6 text-right">
                    <?=  GridPageSize::widget(['pjaxId' => 'contact-grid-pjax']) ?>
                </div>
            </div>

            <?php 
            Pjax::begin([
                'id' => 'contact-grid-pjax',
            ])
            ?>

            <?= 
            GridView::widget([
                'id' => 'contact-grid',
                'dataProvider' => $dataProvider,
                                'bulkActionOptions' => [
                    'gridId' => 'contact-grid',
                    'actions' => [ Url::to(['bulk-delete']) => 'Delete'] //Configure here you bulk actions
                ],
                'columns' => [
                    ['class' => 'yeesoft\grid\CheckboxColumn', 'options' => ['style' => 'width:10px']],
                    ['class' => 'yii\grid\SerialColumn', 'options' => ['style' => 'width:20px'],],
                    [
                        'class' => 'yeesoft\grid\columns\TitleActionColumn',
                        'options' => ['style' => 'width:200px'],
                        'attribute' => 'name',
                        'controller' => '/contact/default',
                        'title' => function(Contact $model) {
                            return Html::a($model->name, ['update', 'id' => $model->id], ['data-pjax' => 0]);
                        },
                                 'buttonsTemplate' => '{update} {delete}',
                    ],

            'email:email',
            'subject',
            'body:ntext',
           
            [
                'class' => 'yeesoft\grid\columns\StatusColumn',
                'attribute' => 'subscribe',
                'optionsArray' => [                    
                    [Contact::SUBSCRIBE, Yii::t('yee', 'Subscribe On'), 'primary'],
                    [Contact::UNSUBSCRIBE, Yii::t('yee', 'Subscribe Off'), 'info'],
                ],
                'options' => ['style' => 'width:150px']
            ],
            [
                'attribute' => 'created_at',
                'value' => function (Contact $model) {
                    return  $model->createdDatetime;
                },
                'format' => 'raw',
                'options' => ['style' => 'width:150px'],
            ],

                ],
            ]);
            ?>

            <?php Pjax::end() ?>
        </div>
    </div>
</div>


