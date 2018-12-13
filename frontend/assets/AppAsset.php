<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use Yii;
use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
       // 'plugins/bootstrap/css/bootstrap.min.css',

        'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800',
        'css/font-awesome.css',
        'plugins/owl-carousel/owl.carousel.css',
        'plugins/owl-carousel/owl.theme.css',
        'plugins/owl-carousel/owl.transitions.css',
        'plugins/magnific-popup/magnific-popup.css',
        'css/animate.css',
        'css/superslides.css',

        'plugins/revolution-slider/css/settings.css',
        'css/essentials.css',
        'css/layout.css',
        'css/layout-responsive.css',
        'css/color_scheme/red.css'
    ];

    public $js = [
        'plugins/jquery-2.0.3.min.js',
        'plugins/bootstrap/js/bootstrap.min.js',

        'plugins/jquery.easing.1.3.js',
        'plugins/jquery.cookie.js',
        'plugins/jquery.appear.js',
        'plugins/jquery.isotope.js',
        'plugins/masonry.js',
        'plugins/magnific-popup/jquery.magnific-popup.min.js',
        'plugins/owl-carousel/owl.carousel.min.js',
        'plugins/stellar/jquery.stellar.min.js',
        'plugins/knob/js/jquery.knob.js',
        'plugins/jquery.backstretch.min.js',
        'plugins/superslides/dist/jquery.superslides.min.js',
        'plugins/revolution-slider/js/jquery.themepunch.plugins.min.js',
        'plugins/revolution-slider/js/jquery.themepunch.revolution.min.js',
        'js/slider_revolution.js',
        'js/scripts.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}