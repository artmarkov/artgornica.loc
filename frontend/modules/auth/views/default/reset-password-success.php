<?php

/**
 * @var yii\web\View $this
 */

$this->title = Yii::t('yee/auth', 'Password recovery');
?>
<div class="password-recovery-success">
    <div class="container">
        <div class="alert alert-success">
            <?= '<i class="fa fa-check-circle"></i>' . Yii::t('yee/auth', 'Check your E-mail for further instructions') ?>
        </div>
    </div>
</div>
