<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\section\models\Feedback */

$this->title = Yii::t('yii', 'Update') . ': ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/section', 'Feedback'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Update');
?>
<div class="feedback-update">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>