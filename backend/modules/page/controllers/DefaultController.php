<?php

namespace backend\modules\page\controllers;

/**
 * Controller implements the CRUD actions for Page model.
 */
class DefaultController extends \backend\controllers\DefaultController
{
    public $modelClass = 'backend\modules\page\models\Page';
    public $modelSearchClass = 'backend\modules\page\models\search\PageSearch';

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