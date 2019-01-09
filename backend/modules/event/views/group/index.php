<?php

use yii\helpers\Url;
use yii\widgets\Pjax;
use yeesoft\grid\GridView;
use yeesoft\grid\GridQuickLinks;
use backend\modules\event\models\EventGroup;
use yeesoft\helpers\Html;
use yeesoft\grid\GridPageSize;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\event\models\search\EventGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yee/event','Event Groups');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/event','Event'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="event-group-index">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="lte-hide-title page-title"><?=  Html::encode($this->title) ?></h3>
            <?= Html::a(Yii::t('yee', 'Add New'), ['/event/group/create'], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-6">
                    <?php 
                    /* Uncomment this to activate GridQuickLinks */
                    /* echo GridQuickLinks::widget([
                        'model' => EventGroup::className(),
                        'searchModel' => $searchModel,
                    ])*/
                    ?>
                </div>

                <div class="col-sm-6 text-right">
                    <?=  GridPageSize::widget(['pjaxId' => 'event-group-grid-pjax']) ?>
                </div>
            </div>

            <?php 
            Pjax::begin([
                'id' => 'event-group-grid-pjax',
            ])
            ?>

            <?= 
            GridView::widget([
                'id' => 'event-group-grid',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'bulkActionOptions' => [
                    'gridId' => 'event-group-grid',
                    'actions' => [ Url::to(['bulk-delete']) => 'Delete'] //Configure here you bulk actions
                ],
                'columns' => [
                    ['class' => 'yeesoft\grid\CheckboxColumn', 'options' => ['style' => 'width:10px']],
                    [
                        'class' => 'yeesoft\grid\columns\TitleActionColumn',
                        'attribute' => 'name',
                        'controller' => '/event/group',
                        'title' => function(EventGroup $model) {
                            return Html::a($model->name, ['update', 'id' => $model->id], ['data-pjax' => 0]);
                        },
                        'buttonsTemplate' => '{update} {delete}',
                    ],
                    [
                        'attribute' => 'number',
                        'options' => ['style' => 'width:100px']
                    ],
                    [
                        'attribute' => 'programm_id',
                        'value' => 'programmName',
                        'label' => Yii::t('yee/event', 'Programm Name'),
                        'filter' => \backend\modules\event\models\EventProgramm::getProgrammList(),
                        'options' => ['style' => 'width:300px'],
                    ],
                    [
                        'attribute' => 'gridUsersSearch',
                        'filter' => backend\modules\event\models\EventGroup::getEventUsersList(),
                        'value' => function (EventGroup $model) {
                            return implode(',<br>',
                                yii\helpers\ArrayHelper::map($model->groupUsers, 'id', 'fullName'));
                        },
                        'options' => ['style' => 'width:350px'],
                        'format' => 'raw',
                    ],

//            'id',
//            'programm_id',
//            'name',
//            'description:ntext',

                ],
            ]);
            ?>

            <?php Pjax::end() ?>
        </div>
    </div>
</div>


