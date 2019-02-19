<?php

namespace backend\modules\user\controllers;

use Yii;
use backend\controllers\DefaultController;

/**
 * RelationController implements the CRUD actions for common\models\user\UserRelation model.
 */
class RelationController extends DefaultController 
{
    public $modelClass       = 'common\models\user\UserRelation';
    public $modelSearchClass = '';

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