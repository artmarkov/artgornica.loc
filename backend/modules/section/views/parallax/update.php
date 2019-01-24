<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\section\models\Parallax */

$this->title = Yii::t('yii', 'Update') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/section', 'Parallaxes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Update');
?>
<div class="parallax-update">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>