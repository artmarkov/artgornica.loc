<?= $form->field($model, 'reCaptcha')->widget(
    \himiklab\yii2\recaptcha\ReCaptcha::className(),
    ['siteKey' => '6LdDI4IUAAAAANYm-f1zoMXm7kBl9Qk6ChTi2rb7']
);
?>