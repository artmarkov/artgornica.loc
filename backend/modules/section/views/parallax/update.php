<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\section\models\Parallax */

$this->title = 'Update Parallax: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Parallaxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="parallax-update">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>