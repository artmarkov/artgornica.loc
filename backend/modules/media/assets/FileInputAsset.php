<?php

namespace backend\modules\media\assets;

use yii\web\AssetBundle;

class FileInputAsset extends AssetBundle
{
    public $sourcePath = '@vendor/yeesoft/yii2-yee-media/assets/source';

    public $js = [
        'js/fileinput.js',
    ];

    public $depends = [
        'yii\bootstrap\BootstrapAsset',
        'yii\web\JqueryAsset',
        'backend\modules\media\assets\ModalAsset',
    ];
}
