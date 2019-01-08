<?php

namespace backend\modules\event\controllers;

use Yii;
use backend\controllers\DefaultController;

/**
 * MethodsController implements the CRUD actions for backend\modules\event\models\EventMethods model.
 */
class MethodsController extends DefaultController 
{
    public $modelClass       = 'backend\modules\event\models\EventMethods';
    public $modelSearchClass = 'backend\modules\event\models\search\EventMethodsSearch';

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