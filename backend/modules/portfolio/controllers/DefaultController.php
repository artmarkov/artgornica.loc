<?php

namespace backend\modules\portfolio\controllers;
use himiklab\sortablegrid\SortableGridAction;
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
    /**
     * action sort for himiklab\sortablegrid\SortableGridBehavior
     * @return type
     */
    public function actions()
    {
        return [
            'sort' => [
                'class' => SortableGridAction::className(),
                'modelName' => $this->modelClass,
            ],
        ];
    }
}