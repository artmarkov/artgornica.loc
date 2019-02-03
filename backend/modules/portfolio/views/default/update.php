<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\portfolio\models\Items */

$this->title = Yii::t('yee','Update'). ': ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/section','Portfolio Items'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = Yii::t('yee','Update');
?>
<div class="items-update">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>