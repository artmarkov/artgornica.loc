<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\event\models\EventItem */

$this->title = Yii::t('yee','Update'). ': ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/event','Event Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('yee','Update');
?>
<div class="event-item-update">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>