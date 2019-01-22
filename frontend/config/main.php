<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'frontend',
    'homeUrl' => '/',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'auth' => [
            'class' => 'frontend\modules\auth\AuthModule',
        ],
    ],
    'components' => [
        'view' => [
            'as seo' => [
                'class' => 'yeesoft\seo\components\SeoViewBehavior',
            ]
        ],
        'seo' => [
            'class' => 'yeesoft\seo\components\Seo',
        ],
        'request' => [
            'baseUrl' => '',
        ],
        'urlManager' => [
            'class' => 'yeesoft\web\MultilingualUrlManager',
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'rules' => array(
                '<module:auth>/<action:(logout|captcha)>' => '<module>/default/<action>',
                '<module:auth>/<action:(oauth)>/<authclient:\w+>' => '<module>/default/<action>',
            ),
            'multilingualRules' => [
                '<module:auth>/<action:\w+>' => '<module>/default/<action>',
                '<controller:(category|tag)>/<slug:[\w \-]+>' => '<controller>/index',
                '<controller:(category|tag|event)>' => '<controller>/index',
                '<slug:[\w \-]+>' => 'site/blog/',
                '/' => 'site/index',
                '<action:[\w \-]+>' => 'site/<action>',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
            'nonMultilingualUrls' => [
                'auth/default/oauth',
            ],
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
//         'assetManager' => [
//            'bundles' => [
//                'yii\bootstrap\BootstrapAsset' => [
//                    'css' => ['https://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css'],
//                ],
//                'yii\bootstrap\BootstrapPluginAsset' => [
//                    'js'=> ['https://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js']
//                ],
//                'yii\web\JqueryAsset' => [
//                    'js' => [YII_DEBUG ? 'https://code.jquery.com/jquery-2.0.3.js' : 'https://code.jquery.com/jquery-2.0.3.min.js'],
//                    'jsOptions' => ['type' => 'text/javascript'],
//                ],
//            ],
//        ],
    ],
    'params' => $params,
];
