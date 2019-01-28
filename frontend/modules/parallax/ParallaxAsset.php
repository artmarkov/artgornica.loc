<?php

namespace frontend\modules\parallax;

/**
 * Class ParallaxAsset
 */
class ParallaxAsset extends \yii\web\AssetBundle
{
    public $sourcePath;

    public $css = [
        '../css/countdown.css',
    ];
    public $js = [
        'jquery-countdown/jquery.countdown.min.js',
        '../js/countdown.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
    public $publishOptions = [
        'forceCopy' => true,
    ];

    public function init()
    {
        $module = \Yii::$app->getModule('parallax');
        $this->sourcePath = $module->getPluginLocation();
        parent::init();
    }
}
