<?php

use yii\helpers\Url;
use yii\widgets\Pjax;
use yeesoft\grid\GridView;
use yeesoft\grid\GridQuickLinks;
use backend\modules\event\models\EventPractice;
use yeesoft\helpers\Html;
use yeesoft\grid\GridPageSize;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\event\models\search\EventPracticeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yee/event','Event Practices');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/event','Event'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-practice-index">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="lte-hide-title page-title"><?=  Html::encode($this->title) ?></h3>
            <?= Html::a(Yii::t('yee', 'Add New'), ['/event/practice/create'], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-6">
                    <?php 
                    /* Uncomment this to activate GridQuickLinks */
                    /* echo GridQuickLinks::widget([
                        'model' => EventPractice::className(),
                        'searchModel' => $searchModel,
                    ])*/
                    ?>
                </div>

                <div class="col-sm-6 text-right">
                    <?=  GridPageSize::widget(['pjaxId' => 'event-practice-grid-pjax']) ?>
                </div>
            </div>

            <?php 
            Pjax::begin([
                'id' => 'event-practice-grid-pjax',
            ])
            ?>

            <?= 
            GridView::widget([
                'id' => 'event-practice-grid',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'bulkActionOptions' => [
                    'gridId' => 'event-practice-grid',
                    'actions' => [ Url::to(['bulk-delete']) => 'Delete'] //Configure here you bulk actions
                ],
                'columns' => [
                    ['class' => 'yeesoft\grid\CheckboxColumn', 'options' => ['style' => 'width:10px']],
                    [
                        'class' => 'yeesoft\grid\columns\TitleActionColumn',
                        'controller' => '/event/practice',
                        'attribute' => 'name',
                        'title' => function(EventPractice $model) {
                            return Html::a($model->name, ['update', 'id' => $model->id], ['data-pjax' => 0]);
                        },
                        'buttonsTemplate' => '{update} {delete}',
                    ],
                    [
                        'attribute' => 'methods_id',
                        'value' => 'methodsName',
                        'label' => Yii::t('yee/event', 'Event Methods'),
                        'filter' => backend\modules\event\models\EventMethods::getMethodsList(),
                    ],
                    [
                        'attribute' => 'time_volume',
                        'options' => ['style' => 'width:100px'],
                        'value' => function ($model)
                                {
                                    return $model->time_volume . ' ' . Yii::t('yee/event', 'min');
                                }
                    ],
//            'time_volume',
//            'description:ntext',
//            'created_at',

                ],
            ]);
            ?>

            <?php Pjax::end() ?>
        </div>
    </div>
</div>


