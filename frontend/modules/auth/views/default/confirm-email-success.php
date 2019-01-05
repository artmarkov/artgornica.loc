<?php

/**
 * @var yii\web\View $this
 * @var yeesoft\models\User $user
 */

$this->title = Yii::t('yee/auth', 'E-mail confirmed');
?>
<div class="change-own-password-success">
    <div class="container">
        <div class="alert alert-success text-center">
            <?= Yii::t('yee/auth', 'E-mail {email} confirmed', ['email' => '<b>' . $user->email . '</b>']) ?>
        </div>
    </div>
</div>
