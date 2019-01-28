<?php

namespace backend\modules\section\controllers;

use Yii;
use backend\controllers\DefaultController;

/**
 * CarouselController implements the CRUD actions for backend\modules\section\models\Carousel model.
 */
class CarouselController extends DefaultController 
{
    public $modelClass       = 'backend\modules\section\models\Carousel';
    public $modelSearchClass = 'backend\modules\section\models\search\CarouselSearch';

    protected function getRedirectPage($action, $model = null)
    {
        switch ($action) {
            case 'update':
                return ['update', 'id' => $model->id];
                break;
            case 'create':
                return ['update', 'id' => $model->id];
                break;
            default:
                return parent::getRedirectPage($action, $model);
        }
    }
}