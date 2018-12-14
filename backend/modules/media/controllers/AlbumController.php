<?php

namespace backend\modules\media\controllers;

use Yii;

/**
 * AlbumController implements the CRUD actions for backend\modules\media\models\Album model.
 */
class AlbumController extends \backend\controllers\DefaultController
{
    public $modelClass = 'backend\modules\media\models\Album';
    public $modelSearchClass = 'backend\modules\media\models\AlbumSearch';
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