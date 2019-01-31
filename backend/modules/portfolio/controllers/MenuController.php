<?php

namespace backend\modules\portfolio\controllers;

use Yii;
use backend\controllers\DefaultController;

/**
 * MenuController implements the CRUD actions for backend\modules\portfolio\models\Menu model.
 */
class MenuController extends DefaultController 
{
    public $modelClass       = 'backend\modules\portfolio\models\Menu';
    public $modelSearchClass = 'backend\modules\portfolio\models\search\MenuSearch';

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