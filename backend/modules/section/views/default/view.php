<?php

use yii\widgets\DetailView;
use yeesoft\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\section\models\SectionPage */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Section Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section-page-view">

    <h3 class="lte-hide-title"><?=  Html::encode($this->title) ?></h3>

    <div class="panel panel-default">
        <div class="panel-body">

            <p>
                <?=                 Html::a('Edit', ['/section/default/update', 'id' => $model->id],
                    ['class' => 'btn btn-sm btn-primary'])
                ?>
                <?=                 Html::a('Delete', ['/section/default/delete', 'id' => $model->id],
                    [
                    'class' => 'btn btn-sm btn-default',
                    'data' => [
                        'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ])
                ?>
                <?=                 Html::a(Yii::t('yee', 'Add New'), ['/section/default/create'],
                    ['class' => 'btn btn-sm btn-primary pull-right'])
                ?>
            </p>


            <?=             DetailView::widget([
                'model' => $model,
                'attributes' => [
            'id',
            'name',
            'slug',
            'status',
            'created_at',
            'updated_at',
                ],
            ])
            ?>

        </div>
    </div>

</div>
