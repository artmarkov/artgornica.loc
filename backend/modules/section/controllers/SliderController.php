<?php

namespace backend\modules\section\controllers;

use Yii;

/**
 * DefaultController implements the CRUD actions for common\models\RevolutionSlider model.
 */
class SliderController extends \backend\controllers\DefaultController
{
    public $modelClass       = 'backend\modules\section\models\Slider';
    public $modelSearchClass = 'backend\modules\section\models\search\SliderSearch';

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