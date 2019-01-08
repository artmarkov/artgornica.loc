<?php

namespace backend\modules\event\controllers;

use Yii;


/**
 * DefaultController implements the CRUD actions for backend\modules\event\models\EventItem model.
 */
class DefaultController extends \backend\controllers\DefaultController
{
    public $modelClass       = 'backend\modules\event\models\EventItem';
    public $modelSearchClass = 'backend\modules\event\models\search\EventItemSearch';

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