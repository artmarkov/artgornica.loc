<?php

namespace backend\modules\event\controllers;

use Yii;
use backend\controllers\DefaultController;

/**
 * ScheduleController implements the CRUD actions for backend\modules\event\models\EventSchedule model.
 */
class ScheduleController extends DefaultController 
{
    public $modelClass       = 'backend\modules\event\models\EventSchedule';
    public $modelSearchClass = 'backend\modules\event\models\search\EventScheduleSearch';

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