<?php

use yii\helpers\Url;
use yii\widgets\Pjax;
use yeesoft\grid\GridView;
use yeesoft\grid\GridQuickLinks;
use common\models\RevolutionSlider;
use yeesoft\helpers\Html;
use yeesoft\grid\GridPageSize;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\RevolutionSliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $this->title = Yii::t('yee/landing', 'Revolution Sliders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-index">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="lte-hide-title page-title"><?=  Html::encode($this->title) ?></h3>
            <?= Html::a(Yii::t('yee', 'Add New'), ['/slider/default/create'], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-6">
                    <?php 
                    /* Uncomment this to activate GridQuickLinks */
                     echo GridQuickLinks::widget([
                        'model' => RevolutionSlider::className(),
                        'searchModel' => $searchModel,
                    ])
                    ?>
                </div>

                <div class="col-sm-6 text-right">
                    <?=  GridPageSize::widget(['pjaxId' => 'slider-grid-pjax']) ?>
                </div>
            </div>

            <?php 
            Pjax::begin([
                'id' => 'slider-grid-pjax',
            ])
            ?>

            <?= 
            GridView::widget([
                'id' => 'slider-grid',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'bulkActionOptions' => [
                    'gridId' => 'slider-grid',
                    //'actions' => [ Url::to(['bulk-delete']) => 'Delete'] //Configure here you bulk actions
                ],
                'columns' => [
                    ['class' => 'yeesoft\grid\CheckboxColumn', 'options' => ['style' => 'width:10px']],
                    [
                        'class' => 'yeesoft\grid\columns\TitleActionColumn',
                        'options' => ['style' => 'width:250px'],
                        'attribute' => 'banner_top',
                        'controller' => '/slider/default',
                        'title' => function(RevolutionSlider $model) {
                            return Html::a($model->banner_top, ['update', 'id' => $model->id], ['data-pjax' => 0]);
                        },
                        'buttonsTemplate' => '{update} {delete}',
                    ],

            'banner_middle',
            'slide_image',
            'url:url',
            [
                        'class' => 'yeesoft\grid\columns\StatusColumn',
                        'attribute' => 'status',
                        'optionsArray' => [
                            [RevolutionSlider::STATUS_ACTIVE, Yii::t('yee', 'Active'), 'primary'],
                            [RevolutionSlider::STATUS_INACTIVE, Yii::t('yee', 'Inactive'), 'info'],
                        ],
                        'options' => ['style' => 'width:100px']
            ],
//            'id',
//            'banner_top',
            // 'btn_name',
            // 'btn_class',
            // 'sort',

                ],
            ]);
            ?>

            <?php Pjax::end() ?>
        </div>
    </div>
</div>


