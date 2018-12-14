<?php

namespace backend\modules\comment;
use yeesoft\comment\CommentModule;

/**
 * comment module definition class
 */
class Module extends CommentModule
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'backend\modules\comment\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
