<?php

namespace backend\modules\media\assets;

use yii\web\AssetBundle;

class UploaderAsset extends AssetBundle
{
    public $sourcePath = '@backend/modules/media/assets/source';
    public $css = [
        'css/uploader.css',
    ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
    ];
}
