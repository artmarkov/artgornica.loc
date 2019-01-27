<?php

namespace backend\modules\section\controllers;

use Yii;
use backend\controllers\DefaultController;

/**
 * SlidesController implements the CRUD actions for backend\modules\section\models\Slides model.
 */
class SlidesController extends DefaultController 
{
    public $modelClass       = 'backend\modules\section\models\Slides';
    public $modelSearchClass = 'backend\modules\section\models\search\SlidesSearch';

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