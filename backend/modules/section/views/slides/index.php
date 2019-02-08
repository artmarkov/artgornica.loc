<?php

use yii\helpers\Url;
use yii\widgets\Pjax;
use yeesoft\grid\GridView;
use yeesoft\grid\GridQuickLinks;
use backend\modules\section\models\Slides;
use yeesoft\helpers\Html;
use yeesoft\grid\GridPageSize;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\section\models\search\SlidesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $this->title = Yii::t('yee/section', 'Slides');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slides-index">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="lte-hide-title page-title"><?=  Html::encode($this->title) ?></h3>
            <?= Html::a(Yii::t('yee', 'Add New'), ['/section/slides/create'], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-6">
                    <?php 
                    /* Uncomment this to activate GridQuickLinks */
                     echo GridQuickLinks::widget([
                        'model' => Slides::className(),
                        'searchModel' => $searchModel,
                    ])
                    ?>
                </div>

                <div class="col-sm-6 text-right">
                    <?=  GridPageSize::widget(['pjaxId' => 'slides-grid-pjax']) ?>
                </div>
            </div>

            <?php 
            Pjax::begin([
                'id' => 'slides-grid-pjax',
            ])
            ?>

            <?= 
            GridView::widget([
                'id' => 'slides-grid',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'bulkActionOptions' => [
                    'gridId' => 'slides-grid',
                   // 'actions' => [ Url::to(['bulk-delete']) => 'Delete'] //Configure here you bulk actions
                ],
                'columns' => [
                    ['class' => 'yeesoft\grid\CheckboxColumn', 'options' => ['style' => 'width:10px']],
                    [
                        'class' => 'yeesoft\grid\columns\TitleActionColumn',
                        'options' => ['style' => 'width:200px'],
                        'attribute' => 'name',                       
                        'controller' => '/section/slides',
                        'title' => function(Slides $model) {
                            return Html::a($model->name, ['update', 'id' => $model->id], ['data-pjax' => 0]);
                        },
                        'buttonsTemplate' => '{update} {delete}',
                    ],
                    [
                    'attribute' => 'img_src',
                    'options' => ['style' => 'width:200px'],
                    'value' => function(Slides $model) {
                            !empty($model->img_src) ? $img = $model->img_src : $img = '/images/noimg.png';
                            return Html::img($img, ['class'=> 'dw-media-image']);
                    },
                            'format' => 'html',
                    ],
                    [
                    'attribute' => 'data_lazyload',
                    'options' => ['style' => 'width:200px'],
                    'value' => function(Slides $model) {
                         !empty($model->data_lazyload) ? $img = $model->data_lazyload : $img = '/images/noimg.png';
                            return Html::img($img, ['class'=> 'dw-media-image']);
                    },
                            'format' => 'html',
                    ],
                    [
                        'class' => 'yeesoft\grid\columns\StatusColumn',
                        'attribute' => 'status',
                        'optionsArray' => [
                            [Slides::STATUS_ACTIVE, Yii::t('yee', 'Active'), 'primary'],
                            [Slides::STATUS_INACTIVE, Yii::t('yee', 'Inactive'), 'info'],
                        ],
                        'options' => ['style' => 'width:100px']
                    ],
           
                ],
            ]);
            ?>

            <?php Pjax::end() ?>
        </div>
    </div>
</div>


