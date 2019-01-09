<?php

use yii\helpers\Url;
use yii\widgets\Pjax;
use yeesoft\grid\GridView;
use yeesoft\grid\GridQuickLinks;
use backend\modules\event\models\EventProgramm;
use yeesoft\helpers\Html;
use yeesoft\grid\GridPageSize;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\event\models\search\EventProgrammSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yee/event','Event Programms');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/event','Event'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="event-programm-index">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="lte-hide-title page-title"><?=  Html::encode($this->title) ?></h3>
            <?= Html::a(Yii::t('yee', 'Add New'), ['/event/programm/create'], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-6">
                    <?php 
                    /* Uncomment this to activate GridQuickLinks */
                    /* echo GridQuickLinks::widget([
                        'model' => EventProgramm::className(),
                        'searchModel' => $searchModel,
                    ])*/
                    ?>
                </div>

                <div class="col-sm-6 text-right">
                    <?=  GridPageSize::widget(['pjaxId' => 'event-programm-grid-pjax']) ?>
                </div>
            </div>

            <?php 
            Pjax::begin([
                'id' => 'event-programm-grid-pjax',
            ])
            ?>

            <?= 
            GridView::widget([
                'id' => 'event-programm-grid',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'bulkActionOptions' => [
                    'gridId' => 'event-programm-grid',
                    'actions' => [ Url::to(['bulk-delete']) => 'Delete'] //Configure here you bulk actions
                ],
                'columns' => [
                    ['class' => 'yeesoft\grid\CheckboxColumn', 'options' => ['style' => 'width:10px']],
                    [
                        'class' => 'yeesoft\grid\columns\TitleActionColumn',
                        'attribute' => 'name',
                        'controller' => '/event/programm',
                        'title' => function(EventProgramm $model) {
                            return Html::a($model->name, ['update', 'id' => $model->id], ['data-pjax' => 0]);
                        },
                        'buttonsTemplate' => '{update} {delete}'
                    ],
                    [
                        'attribute' => 'vid_id',
                        'value' => 'vidName',
                        'label' => Yii::t('yee/event', 'Vid Name'),
                        'filter' => backend\modules\event\models\EventVid::getVidList(),
                        'options' => ['style' => 'width:300px'],
                    ],
                    [
                        'attribute' => 'gridItemsSearch',
                        'filter' => backend\modules\event\models\EventItem::getEventItemList(),
                        'value' => function (EventProgramm $model) {
                            return implode(',<br>',
                                ArrayHelper::map($model->eventItems, 'id', 'name'));
                        },
                        'options' => ['style' => 'width:600px'],
                        'format' => 'raw',
                    ],

//            'id',
//            'vid_id',
//            'name',
//            'description:ntext',

                ],
            ]);
            ?>

            <?php Pjax::end() ?>
        </div>
    </div>
</div>


