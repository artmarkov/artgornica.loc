<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\event\models\EventPlace */
$this->title = Yii::t('yee','Update'). ': ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/event','Event'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/event','Event Places'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('yee','Update');

?>
<div class="event-place-update">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>