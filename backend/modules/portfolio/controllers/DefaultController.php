<?php

namespace backend\modules\portfolio\controllers;

use Yii;


/**
 * DefaultController implements the CRUD actions for backend\modules\portfolio\models\Items model.
 */
class DefaultController extends \backend\controllers\DefaultController
{
    public $modelClass       = 'backend\modules\portfolio\models\Items';
    public $modelSearchClass = 'backend\modules\portfolio\models\search\ItemsSearch';

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