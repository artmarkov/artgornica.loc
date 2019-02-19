<?php

namespace backend\modules\translation;
use yeesoft\translation\TranslationModule;

/**
 * translation module definition class
 */
class Module extends TranslationModule
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'backend\modules\translation\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
