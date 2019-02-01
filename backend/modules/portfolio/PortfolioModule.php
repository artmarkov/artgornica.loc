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
    
    public $thumbnailSize = 'medium';
    /**
     * {@inheritdoc}
     */
    public function init()
    {
         if (in_array($this->thumbnailSize, [])) {
            $this->thumbnailSize = 'medium';
        }
        parent::init();

        // custom initialization code goes here
    }
}
