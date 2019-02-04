<?php

namespace backend\modules\portfolio;

/**
 * portfolio module definition class
 */
class PortfolioModule extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'backend\modules\portfolio\controllers';
    
    public $thumbnailSize = 'small';
    /**
     * {@inheritdoc}
     */
    public function init()
    {
         if (in_array($this->thumbnailSize, [])) {
            $this->thumbnailSize = 'small';
        }
        parent::init();

        // custom initialization code goes here
    }
}
