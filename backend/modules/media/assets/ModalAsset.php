<?php

namespace backend\modules\media\assets;

use yii\web\AssetBundle;

class ModalAsset extends AssetBundle
{
    public $sourcePath = '@vendor/yeesoft/yii2-yee-media/assets/source';
    public $css = [
        'css/modal.css',
    ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
    ];
}
