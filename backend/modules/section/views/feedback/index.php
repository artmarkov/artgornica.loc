<?php

use yii\helpers\Url;
use yii\widgets\Pjax;
use yeesoft\grid\GridView;
use yeesoft\grid\GridQuickLinks;
use backend\modules\section\models\Feedback;
use yeesoft\helpers\Html;
use yeesoft\grid\GridPageSize;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\section\models\search\FeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $this->title = Yii::t('yee/section', 'Feedback');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="lte-hide-title page-title"><?=  Html::encode($this->title) ?></h3>
            <?= Html::a(Yii::t('yee', 'Add New'), ['/section/feedback/create'], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-6">
                    <?php 
                    /* Uncomment this to activate GridQuickLinks */
                     echo GridQuickLinks::widget([
                        'model' => Feedback::className(),
                        'searchModel' => $searchModel,
                          'labels' => [
                            'all' => Yii::t('yee', 'All'),
                            'active' => Yii::t('yee', 'Published'),
                            'inactive' => Yii::t('yee', 'Pending'),
                        ]
                    ])
                    ?>
                </div>

                <div class="col-sm-6 text-right">
                    <?=  GridPageSize::widget(['pjaxId' => 'feedback-grid-pjax']) ?>
                </div>
            </div>

            <?php 
            Pjax::begin([
                'id' => 'feedback-grid-pjax',
            ])
            ?>

            <?= 
            GridView::widget([
                'id' => 'feedback-grid',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
               'bulkActionOptions' => [
                    'gridId' => 'feedback-grid',
                    'actions' => [
                        Url::to(['bulk-activate']) => Yii::t('yee', 'Publish'),
                        Url::to(['bulk-deactivate']) => Yii::t('yee', 'Unpublish'),
                        Url::to(['bulk-delete']) => Yii::t('yii', 'Delete'),
                    ]
                ],
                'columns' => [
                    ['class' => 'yeesoft\grid\CheckboxColumn', 'options' => ['style' => 'width:10px']],
                    [
                        'class' => 'yeesoft\grid\columns\TitleActionColumn',
                        'options' => ['style' => 'width:350px'],
                        'attribute' => 'username',
                        'controller' => '/section/feedback',
                        'title' => function(Feedback $model) {
                            return Html::a($model->username, ['update', 'id' => $model->id], ['data-pjax' => 0]);
                        },
                        'buttonsTemplate' => '{update} {delete}',        
                    ],
                     
            'business',
                    [
                        'class' => 'yeesoft\grid\columns\StatusColumn',
                        'attribute' => 'status',
                        'optionsArray' => Feedback::getStatusOptionsList(),
                        'options' => ['style' => 'width:150px'],
                    ],
                    [
                        'class' => 'yeesoft\grid\columns\StatusColumn',
                        'attribute' => 'main_flag',
                        'optionsArray' => Feedback::getMainOptionsList(),
                        'options' => ['style' => 'width:200px'],
                    ],
                    [
                        'class' => 'yeesoft\grid\columns\DateFilterColumn',
                        'attribute' => 'published_at',
                        'value' => function (Feedback $model) {
                            return '<span style="font-size:85%;" class="label label-'
                            . ((time() >= $model->published_at) ? 'primary' : 'default') . '">'
                            . $model->publishedDate . '</span>';
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


