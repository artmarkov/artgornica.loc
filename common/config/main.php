<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => ['comments', 'yee'],
    'language' => 'ru',
    'sourceLanguage' => 'en-US',
    'components' => [
        'yee' => [
            'class' => 'yeesoft\Yee',
            'languages' => [
//               'en-US' => 'English',
                'ru' => 'Россия',
            ],
            'languageRedirects' => ['ru' => 'ru'],
        ],
        'settings' => [
            'class' => 'yeesoft\components\Settings'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'class' => 'yeesoft\components\User',
            'on afterLogin' => function ($event) {
                \yeesoft\models\UserVisitLog::newVisitor($event->identity->id);
            }
        ],
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => '6LdDI4IUAAAAANYm-f1zoMXm7kBl9Qk6ChTi2rb7',
            'secret' => '6LdDI4IUAAAAAGHfEzx7IMbr5TvJPqeqBiivjqmc',
        ],
    ],
    'modules' => [
        'comments' => [
            'class' => 'yeesoft\comments\Comments',
            'userModel' => 'yeesoft\models\User',
            'userAvatar' => function ($user_id) {
                $user = yeesoft\models\User::findIdentity((int)$user_id);
                if ($user instanceof yeesoft\models\User) {
                    return $user->getAvatar();
                }
                return false;
            }
        ],
    ],
];
