<?php

namespace backend\modules\media\controllers;
/**
 * CategoryController implements the CRUD actions for backend\modules\media\models\Category model.
 */
class CategoryController extends \backend\controllers\DefaultController
{
    public $modelClass = 'backend\modules\media\models\Category';
    public $modelSearchClass = 'backend\modules\media\models\CategorySearch';
    public $disabledActions = ['view', 'bulk-activate', 'bulk-deactivate'];

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