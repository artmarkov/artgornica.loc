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
    
     public function actionSortMedia() {

        if (!Yii::$app->request->isAjax) {
            return false;
        }

        $sortList = Yii::$app->request->post('sortList');

        if (empty($sortList)) {
            return false;
        }
      
        // echo '<pre>' . print_r($eventData, true) . '</pre>';
        if ($this->modelClass::sort($sortList)) {
            Yii::$app->session->setFlash('carousel', Yii::t('yee/media', 'Sort data saved'));
            return true;
        } else {
            return false;
        }
    }
     public function actionRemoveMedia() {

        if (!Yii::$app->request->isAjax) {
            return false;
        }

        $id = Yii::$app->request->get('id');

        if (empty($id)) {
            return false;
        }
        $model = $this->findModel($id);
       
         //echo '<pre>' . print_r($model, true) . '</pre>';
        if ($model->delete()) {
            Yii::$app->session->setFlash('carousel', Yii::t('yee', 'Your item has been deleted.'));
            return true;
        } else {
            return false;
        }
    }

}