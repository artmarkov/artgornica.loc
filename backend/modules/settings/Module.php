<?php

namespace backend\modules\settings;
use yeesoft\settings\SettingsModule;

/**
 * settings module definition class
 */
class Module extends SettingsModule
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'backend\modules\settings\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
