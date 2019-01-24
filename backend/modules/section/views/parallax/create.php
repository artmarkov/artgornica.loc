<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\section\models\Parallax */

$this->title = 'Create Parallax';
$this->params['breadcrumbs'][] = ['label' => 'Parallaxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="parallax-create">
    <h3 class="lte-hide-title"><?=  Html::encode($this->title) ?></h3>
    <?=  $this->render('_form', compact('model')) ?>
</div>