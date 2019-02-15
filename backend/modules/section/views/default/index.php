<?php

use yii\helpers\Url;
use yii\widgets\Pjax;
use yeesoft\grid\GridView;
use yeesoft\grid\GridQuickLinks;
use backend\modules\section\models\SectionPage;
use yeesoft\helpers\Html;
use yeesoft\grid\GridPageSize;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\section\models\search\SectionPage */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Section Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section-page-index">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="lte-hide-title page-title"><?=  Html::encode($this->title) ?></h3>
            <?= Html::a(Yii::t('yee', 'Add New'), ['/section/default/create'], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-6">
                    <?php 
                    /* Uncomment this to activate GridQuickLinks */
                     echo GridQuickLinks::widget([
                        'model' => SectionPage::className(),
                        'searchModel' => $searchModel,
                    ])
                    ?>
                </div>

                <div class="col-sm-6 text-right">
                    <?=  GridPageSize::widget(['pjaxId' => 'section-page-grid-pjax']) ?>
                </div>
            </div>

            <?php 
            Pjax::begin([
                'id' => 'section-page-grid-pjax',
            ])
            ?>

            <?= 
            GridView::widget([
                'id' => 'section-page-grid',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'bulkActionOptions' => [
                    'gridId' => 'section-page-grid',
                    'actions' => [ Url::to(['bulk-delete']) => 'Delete'] //Configure here you bulk actions
                ],
                'columns' => [
                    ['class' => 'yeesoft\grid\CheckboxColumn', 'options' => ['style' => 'width:10px']],
                    [
                        'class' => 'yeesoft\grid\columns\TitleActionColumn',
                        'options' => ['style' => 'width:350px'],
                        'attribute' => 'name',
                        'controller' => '/section/default',
                        'title' => function(SectionPage $model) {
                            return Html::a($model->name, ['view', 'id' => $model->id], ['data-pjax' => 0]);
                        },
                    ],
            'slug',
            [
                        'class' => 'yeesoft\grid\columns\StatusColumn',
                        'attribute' => 'status',
                        'optionsArray' => [
                            [SectionPage::STATUS_ACTIVE, Yii::t('yee', 'Active'), 'primary'],
                            [SectionPage::STATUS_INACTIVE, Yii::t('yee', 'Inactive'), 'info'],
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


