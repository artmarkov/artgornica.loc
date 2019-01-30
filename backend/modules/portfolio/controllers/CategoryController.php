<?php

namespace backend\modules\portfolio\controllers;

use Yii;
use backend\controllers\DefaultController;

/**
 * CategoryController implements the CRUD actions for backend\modules\portfolio\models\Category model.
 */
class CategoryController extends DefaultController 
{
    public $modelClass       = 'backend\modules\portfolio\models\Category';
    public $modelSearchClass = 'backend\modules\portfolio\models\search\CategorySearch';

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