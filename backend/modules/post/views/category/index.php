<?php

use yii\helpers\Html;
use klisl\nestable\Nestable;
use yii\helpers\Url;

/* @var $query \yii\db\ActiveQuery */

$this->title = Yii::t('yee/post', 'Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/post', 'Posts'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="menu-index">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="lte-hide-title page-title"><?= Html::encode($this->title) ?></h3>
            <?= Html::a(Yii::t('yee', 'Add New'), ['create'], ['class' => 'btn btn-sm btn-primary']) ?>

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12">

                    <?=
                    Nestable::widget([
                        'type' => Nestable::TYPE_LIST,
                        'query' => $query,
                        'modelOptions' => [
                            'name' => 'title', //поле из БД с названием элемента (отображается в дереве)
                        ],
                        'pluginEvents' => [
                            'change' => 'function(e) {}', //js событие при выборе элемента
                        ],
                        'pluginOptions' => [
                            'maxDepth' => 10, //максимальное кол-во уровней вложенности
                        ],
                        'update' => Url::to(['update']), //действие по обновлению
                        'delete' => Url::to(['delete']), //действие по удалению
                        'viewItem' => Url::to(['view']), 
                    ]);
                    ?>

                    <div id="nestable-menu">
                        <button class="btn btn-sm btn-primary" type="button" data-action="expand-all"><?= Yii::t('yee', 'Expand All')?></button>
                        <button class="btn btn-sm btn-default" type="button" data-action="collapse-all"><?= Yii::t('yee', 'Collapse All')?></button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>