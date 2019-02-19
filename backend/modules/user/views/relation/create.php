<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\user\UserRelation */

$this->title = Yii::t('yee','Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/user','User Relations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-relation-create">
    <h3 class="lte-hide-title"><?=  Html::encode($this->title) ?></h3>
    <?=  $this->render('_form', compact('model')) ?>
</div>