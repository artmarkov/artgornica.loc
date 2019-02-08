<?php

namespace backend\modules\section\controllers;

use Yii;
use backend\controllers\DefaultController;

/**
 * FeedbackController implements the CRUD actions for backend\modules\section\models\Feedback model.
 */
class FeedbackController extends DefaultController 
{
    public $modelClass       = 'backend\modules\section\models\Feedback';
    public $modelSearchClass = 'backend\modules\section\models\search\FeedbackSearch';

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