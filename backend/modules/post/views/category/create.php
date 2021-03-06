<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\post\models\Category */

$this->title = Yii::t('yee/post', 'Create Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/post', 'Posts'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/post', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('yee', 'Create');
?>

<div class="post-category-create">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form',  ['model' => $model, 'root' => $root]) ?>
</div>