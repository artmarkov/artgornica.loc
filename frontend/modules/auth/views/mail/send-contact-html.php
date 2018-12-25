<?php
/**
 * @var $this yii\web\View
 * @var $user yeesoft\models\User
 */
use yii\helpers\Html;


?>

<div class="send-contact">
    <p><b><?= Yii::t('yee', 'Message for') . '</b> ' . Yii::$app->name ?></p> 

    <p><b><?= Yii::t('yee', 'Title') . ':</b> ' . Html::encode($subject) ?></p> 

    <p><b><?= Yii::t('yee', 'Content') . ':</b> ' . Html::encode($body) ?></p>
</div>

