<?php

namespace backend\modules\user;
use yeesoft\user\UserModule;

/**
 * user module definition class
 */
class Module extends UserModule
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'backend\modules\user\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
