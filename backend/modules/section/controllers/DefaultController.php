<?php

namespace backend\modules\section\controllers;

use Yii;
use yeesoft\controllers\admin\BaseController;
use himiklab\sortablegrid\SortableGridAction;

/**
 * DefaultController implements the CRUD actions for backend\modules\section\models\SectionPage model.
 */
class DefaultController extends \backend\controllers\DefaultController 
{
    public $modelClass       = 'backend\modules\section\models\SectionPage';
    public $modelSearchClass = 'backend\modules\section\models\search\SectionPage';

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