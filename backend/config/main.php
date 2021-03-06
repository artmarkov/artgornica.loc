<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

Yii::$container->set(\kartik\date\DatePicker::class, [
        'type' => \kartik\date\DatePicker ::TYPE_INPUT,
        'options' => ['placeholder' => ''],
        'convertFormat' => true,
        'pluginOptions' => [
            'format' => 'dd.MM.yyyy',
            'autoclose' => true,
            'weekStart' => 1,
            'startDate' => '01.01.1930',
            'endDate' => '01.01.2030',
            'todayBtn' => 'linked',
            'todayHighlight' => true,
        ]
    ]);
 
Yii::$container->set(\kartik\datetime\DateTimePicker::class, [
        'type' => \kartik\datetime\DateTimePicker::TYPE_INPUT,
        'options' => ['placeholder' => ''],
        'convertFormat' => true,
        'pluginOptions' => [
            'format' => 'dd.MM.yyyy hh:i',
            'autoclose' => true,
            'weekStart' => 1,
            'startDateTime' => '01.01.1930 00:00',
            'endDateTime' => '01.01.2030 00:00',
            'todayBtn' => 'linked',
            'todayHighlight' => true,
        ]
    ]);

return [
    'id' => 'backend',
    'homeUrl' => '/admin',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],    
    'modules' => [
        'mediamanager' => [
            'class' => 'backend\modules\mediamanager\MediamanagerModule',
        ],
        'portfolio' => [
            'class' => 'backend\modules\portfolio\PortfolioModule',
        ],
        'section' => [
            'class' => 'backend\modules\section\SectionModule',
        ],
        'event' => [
            'class' => 'backend\modules\event\EventModule',
        ],
        'db' => [
            'class' => 'backend\modules\db\Module',
        ], 
        'post' => [
            'class' => 'backend\modules\post\Module',
        ],
        'comment' => [
            'class' => 'backend\modules\comment\Module',
        ],
        'media' => [
            'class' => 'backend\modules\media\Module',
            'routes' => [
                'baseUrl' => '', // Base absolute path to web directory
                'basePath' => '@public', // Base web directory url
                'uploadPath' => 'uploads', // Path for uploaded files in web directory
            ],
            'thumbs' => [
            'small' => [
                'name' => 'Мелкий',
                'size' => [128, 72],
            ],
            'medium' => [
                'name' => 'Средний',
                'size' => [832, 468],
            ],
            'large' => [
                'name' => 'Большой',
                'size' => [1280, 720],
            ],
             'great' => [
                'name' => 'Очень Большой',
                'size' => [1920, 1080],
            ],
        ],
        ],
        'settings' => [
            'class' => 'backend\modules\settings\Module',
        ],
        'menu' => [
            'class' => 'backend\modules\menu\Module',
        ],
        'translation' => [
            'class' => 'backend\modules\translation\Module',
        ],
        'user' => [
            'class' => 'backend\modules\user\Module',
        ],

        'page' => [
            'class' => 'backend\modules\page\Module',
        ],
        'seo' => [
            'class' => 'backend\modules\seo\SeoModule',
        ],
    ],
    'components' => [
        'request' => [
            'baseUrl' => '/admin',
        ],
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => '@yeesoft/yii2-yee-core/assets/theme/bootswatch/custom',
                    'css' => ['bootstrap.css']
                ],
            ],
        ],
        'urlManager' => [
            'class' => 'yeesoft\web\MultilingualUrlManager',
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'multilingualRules' => false,
            'rules' => array(
                //add here local frontend controllers
                //'<controller:(test)>' => '<controller>/index',
                //'<controller:(test)>/<id:\d+>' => '<controller>/view',
                //'<controller:(test)>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                //'<controller:(test)>/<action:\w+>' => '<controller>/<action>',
                //yee cms and other modules routes
                '<module:\w+>/' => '<module>/default/index',
                '<module:\w+>/<action:\w+>/<id:\d+>' => '<module>/default/<action>',
                '<module:\w+>/<action:(create)>' => '<module>/default/<action>',
                '<module:\w+>/<controller:\w+>' => '<module>/<controller>/index',
                '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
            )
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
    ],
    'controllerMap' => [
        'elfinder' => [
			'class' => 'mihaildev\elfinder\PathController',
			'access' => ['@'],
			'root' => [
				'driver' => 'LocalFileSystem',
                                'path' => '../../',
                                
                               //  'name' => 'Global',
			],
//			'watermark' => [
//						'source'         => __DIR__.'/logo.png', // Path to Water mark image
//						 'marginRight'    => 5,          // Margin right pixel
//						 'marginBottom'   => 5,          // Margin bottom pixel
//						 'quality'        => 95,         // JPEG image save quality
//						 'transparency'   => 70,         // Water mark image transparency ( other than PNG )
//						 'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats ( bit-field )
//						 'targetMinPixel' => 200         // Target image minimum pixel size
//			]
		]
    ],
    'params' => $params,
];
