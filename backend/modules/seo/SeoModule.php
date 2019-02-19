<?php

namespace backend\modules\seo;
use yeesoft\seo\SeoModule as Seo;

/**
 * seo module definition class
 */
class SeoModule extends Seo
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'backend\modules\seo\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
