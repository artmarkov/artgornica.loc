<?php

use yii\helpers\Url;
use yii\widgets\Pjax;
use yeesoft\grid\GridView;
use yeesoft\grid\GridQuickLinks;
use backend\modules\section\models\Parallax;
use yeesoft\helpers\Html;
use yeesoft\grid\GridPageSize;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\section\models\search\ParallaxSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $this->title = Yii::t('yee/section', 'Parallaxes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parallax-index">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="lte-hide-title page-title"><?=  Html::encode($this->title) ?></h3>
            <?= Html::a(Yii::t('yee', 'Add New'), ['/section/parallax/create'], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-6">
                    <?php 
                    /* Uncomment this to activate GridQuickLinks */
                     echo GridQuickLinks::widget([
                        'model' => Parallax::className(),
                        'searchModel' => $searchModel,
                    ])
                    ?>
                </div>

                <div class="col-sm-6 text-right">
                    <?=  GridPageSize::widget(['pjaxId' => 'parallax-grid-pjax']) ?>
                </div>
            </div>

            <?php 
            Pjax::begin([
                'id' => 'parallax-grid-pjax',
            ])
            ?>

            <?= 
            GridView::widget([
                'id' => 'parallax-grid',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'bulkActionOptions' => [
                    'gridId' => 'parallax-grid',
                   // 'actions' => [ Url::to(['bulk-delete']) => 'Delete'] //Configure here you bulk actions
                ],
                'columns' => [
                    ['class' => 'yeesoft\grid\CheckboxColumn', 'options' => ['style' => 'width:10px']],
                    ['class' => 'yii\grid\SerialColumn', 'options' => ['style' => 'width:20px']],
                    [
                        'class' => 'yeesoft\grid\columns\TitleActionColumn',
                        'attribute' => 'bg_image',
                        'options' => ['style' => 'width:250px'],
                        'controller' => '/section/parallax',
                        'title' => function(Parallax $model) {
                            return Html::a(Html::img($model->bg_image, ['width' => '128']), ['update', 'id' => $model->id], ['data-pjax' => 0]);
                        },
                        'buttonsTemplate' => '{update} {delete}',
                    ],
                    [
                    'attribute' => 'content_image',
                    'options' => ['style' => 'width:250px'],
                    'value' => function(Parallax $model) {
                             !empty($model->content_image) ? $img = $model->content_image : $img = '/images/noimg.png';
                            return Html::img($img, ['width' => '128']);
                    },
                            'format' => 'html',
                    ],
                    'parallax_class',
                    [
                        'class' => 'yeesoft\grid\columns\StatusColumn',
                        'attribute' => 'status',
                        'optionsArray' => [
                            [Parallax::STATUS_ACTIVE, Yii::t('yee', 'Active'), 'primary'],
                            [Parallax::STATUS_INACTIVE, Yii::t('yee', 'Inactive'), 'info'],
                        ],
                        'options' => ['style' => 'width:250px']
                     ],

                ],
            ]);
            ?>

            <?php Pjax::end() ?>
        </div>
    </div>
</div>


