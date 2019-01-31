<?php

use yii\helpers\Url;
use yii\widgets\Pjax;
use yeesoft\grid\GridView;
use yeesoft\grid\GridQuickLinks;
use backend\modules\portfolio\models\Items;
use backend\modules\portfolio\models\Category;
use yeesoft\helpers\Html;
use yeesoft\grid\GridPageSize;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\portfolio\models\search\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yee/section', 'Portfolio Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-index">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="lte-hide-title page-title"><?=  Html::encode($this->title) ?></h3>
            <?= Html::a(Yii::t('yee', 'Add New'), ['/portfolio/default/create'], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-6">
                    <?php 
                    /* Uncomment this to activate GridQuickLinks */
                     echo GridQuickLinks::widget([
                        'model' => Items::className(),
                        'searchModel' => $searchModel,
                    ])
                    ?>
                </div>

                <div class="col-sm-6 text-right">
                    <?=  GridPageSize::widget(['pjaxId' => 'items-grid-pjax']) ?>
                </div>
            </div>

            <?php 
            Pjax::begin([
                'id' => 'items-grid-pjax',
            ])
            ?>

            <?= 
            GridView::widget([
                'id' => 'items-grid',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'bulkActionOptions' => [
                    'gridId' => 'items-grid',
//                    'actions' => [ Url::to(['bulk-delete']) => 'Delete'] //Configure here you bulk actions
                ],
                'columns' => [
                    ['class' => 'yeesoft\grid\CheckboxColumn', 'options' => ['style' => 'width:10px']],
                    [
                        'class' => 'yeesoft\grid\columns\TitleActionColumn',
                        'attribute' => 'name',
                        'controller' => '/portfolio/default',
                        'title' => function(Items $model) {
                            return Html::a($model->name, ['update', 'id' => $model->id], ['data-pjax' => 0]);
                        },
                        'buttonsTemplate' => '{update} {delete}',
                    ],

//            'id',
//            'name',
//            'link_class',
            'link_href',
            'img_class',
            // 'img_src',
            // 'img_alt',
                [
                    'attribute' => 'category_id',
                    'value' => 'categoryName',
                    'label' => Yii::t('yee/event', 'Category Name'),
                    'filter' => Category::getCategories(),
                    'options' => ['style' => 'width:350px'],
                ],
                [
                    'class' => 'yeesoft\grid\columns\StatusColumn',
                    'attribute' => 'status',
                    'optionsArray' => [
                        [Items::STATUS_ACTIVE, Yii::t('yee', 'Active'), 'primary'],
                        [Items::STATUS_INACTIVE, Yii::t('yee', 'Inactive'), 'info'],
                    ],
                    'options' => ['style' => 'width:250px']
                ],
            // 'created_at',
            // 'updated_at',

                ],
            ]);
            ?>

            <?php Pjax::end() ?>
        </div>
    </div>
</div>


