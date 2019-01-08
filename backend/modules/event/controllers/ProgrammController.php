<?php

namespace backend\modules\event\controllers;

use Yii;
use backend\controllers\DefaultController;

/**
 * ProgrammController implements the CRUD actions for backend\modules\event\models\EventProgramm model.
 */
class ProgrammController extends DefaultController 
{
    public $modelClass       = 'backend\modules\event\models\EventProgramm';
    public $modelSearchClass = 'backend\modules\event\models\search\EventProgrammSearch';

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