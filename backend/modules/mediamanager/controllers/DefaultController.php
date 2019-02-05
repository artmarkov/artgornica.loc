<?php

namespace backend\modules\mediamanager\controllers;

use Yii;


/**
 * DefaultController implements the CRUD actions for backend\modules\mediamanager\models\MediaManager model.
 */
class DefaultController extends \backend\controllers\DefaultController
{
    public $modelClass  = 'backend\modules\mediamanager\models\MediaManager';
     
    
    public function actionAddMedia() {

        if (!Yii::$app->request->isAjax) {
            return false;
        }

        $eventData = Yii::$app->request->post('eventData');

        if (empty($eventData)) {
            return false;
        }

        $model = new $this->modelClass;
        $model->item_id = $eventData['id'];
        $model->media_id = $eventData['media'];
        $model->class = $eventData['class'];

        // echo '<pre>' . print_r($model, true) . '</pre>';
        if ($model->save()) {
            return true;
        } else {
            return false;
        }
    }

}