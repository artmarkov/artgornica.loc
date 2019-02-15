<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\section\models\SectionPage */

$this->title = 'Create Section Page';
$this->params['breadcrumbs'][] = ['label' => 'Section Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="section-page-create">
    <h3 class="lte-hide-title"><?=  Html::encode($this->title) ?></h3>
    <?=  $this->render('_form', compact('model')) ?>
</div>