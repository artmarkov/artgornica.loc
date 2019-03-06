<?php

namespace backend\modules\event\controllers;

use Yii;
use yeesoft\controllers\admin\BaseController;

/**
 * EventPlanController implements the CRUD actions for backend\modules\event\models\EventPlan model.
 */
class PlanController extends BaseController 
{
    public $modelClass       = 'backend\modules\event\models\EventPlan';
    public $modelSearchClass = 'backend\modules\event\models\search\EventPlanSearch';

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