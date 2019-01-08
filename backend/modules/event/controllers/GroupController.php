<?php

namespace backend\modules\event\controllers;

use Yii;
use backend\controllers\DefaultController;

/**
 * GroupController implements the CRUD actions for backend\modules\event\models\EventGroup model.
 */
class GroupController extends DefaultController 
{
    public $modelClass       = 'backend\modules\event\models\EventGroup';
    public $modelSearchClass = 'backend\modules\event\models\search\EventGroupSearch';

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