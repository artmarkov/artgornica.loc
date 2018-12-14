<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = Yii::t('yee/db', 'DB manager');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="post-index">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="lte-hide-title page-title"><?= Html::encode($this->title) ?></h3>
            <?= Html::a(Yii::t('yee/db', 'Create dump'), ['export'], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn', 'options' => ['style' => 'width:20px'],],
                           /* [
                                'attribute' => 'type',
                                'label' => Yii::t('yee/db', 'Type'),
                                'format' => 'text',
                            ],*/
                            [
                                'attribute' => 'dump',
                                'label' => Yii::t('yee/db', 'Dump'),
                                'format' => 'text',
                            ],
                            [
                                'attribute' => 'size',
                                'format' => 'text',
                                'label' => Yii::t('yee/db', 'Size'),
                            ],
                           /* [
                                'attribute' => 'create_at',
                                'format' => 'text',
                                'label' => Yii::t('yee/db', 'Create time'),
                            ],*/
                            [
                                'options' => ['style' => 'width:20px'],
                                'format' => 'raw',
                                'value' => function ($data, $id) {
                                    return Html::a('<span class="glyphicon glyphicon-download-alt"></span>',
                                        Url::to(['default/download', 'path' => $data['dump']]),
                                        [
                                            'title' => Yii::t('yee/db', 'Download'),
                                            'class' => 'btn btn-sm btn-default',
                                        ]);
                                },
                            ],
                            [
                                'options' => ['style' => 'width:20px'],
                                'format' => 'raw',
                                'value' => function ($data, $id) {
                                    return Html::a('<span class="glyphicon glyphicon-import"></span>',
                                        Url::to(['default/import', 'path' => $data['dump']]),
                                        [
                                            'title' => Yii::t('yee/db', 'Import'),
                                            'data-confirm' => Yii::t('yee/db', 'All database entries will be overwritten. Are you sure?'),
                                            'class' => 'btn btn-sm btn-primary',
                                        ]);
                                },
                            ],
                            [
                                'options' => ['style' => 'width:20px'],
                                'format' => 'raw',
                                'value' => function ($data, $id) {
                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                                        Url::to(['default/delete', 'path' => $data['dump']]),

                                        [
                                            'title' => Yii::t('yee/db', 'Delete'),
                                            'data-method' => 'post',
                                            'data-confirm' => Yii::t('yee/db', 'The database dump will be deleted. Are you sure?'),
                                            'class' => 'btn btn-sm btn-danger',
                                        ]);
                                },
                            ],
                        ],
                    ]); ?>

                </div>
            </div>
        </div>
    </div>
</div>
