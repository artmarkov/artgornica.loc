<?php

namespace backend\modules\section\controllers;

use Yii;
use backend\controllers\DefaultController;

/**
 * ParallaxController implements the CRUD actions for backend\modules\section\models\Parallax model.
 */
class ParallaxController extends DefaultController 
{
    public $modelClass       = 'backend\modules\section\models\Parallax';
    public $modelSearchClass = 'backend\modules\section\models\search\ParallaxSearch';

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