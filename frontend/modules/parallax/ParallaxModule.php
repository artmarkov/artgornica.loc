<?php

namespace frontend\modules\parallax;

/**
 * Slider Parallax Module
 */
class ParallaxModule extends \yii\base\Module
{
    public $pluginLocation;

    public function init()
    {
        parent::init();
    }

    public function getPluginLocation()
    {
        return $this->pluginLocation;
    }

}
