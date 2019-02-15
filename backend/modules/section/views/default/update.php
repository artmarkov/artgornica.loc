<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\section\models\SectionPage */

$this->title = 'Update Section Page: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Section Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="section-page-update">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>