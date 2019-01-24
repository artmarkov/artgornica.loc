<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RevolutionSlider */

$this->title = Yii::t('yii', 'Update') . ': ' . $model->banner_top;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/block', 'Revolution Sliders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Update');
?>
<div class="slider-update">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>