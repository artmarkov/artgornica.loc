<?php

namespace backend\modules\mediamanager\controllers;

use Yii;


/**
 * DefaultController implements the CRUD actions for backend\modules\mediamanager\models\MediaManager model.
 */
class DefaultController extends \backend\controllers\DefaultController
{
    public $modelClass       = 'backend\modules\mediamanager\models\MediaManager';
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
    
    public function actionAddMedia()
    {
         $eventData = Yii::$app->request->post('eventData');
      
        if(empty($eventData)) return false;
        
        $model = new $this->modelClass;
        

        if (!Yii::$app->request->isAjax) {
            return $this->redirect(Yii::$app->request->referrer);
        }
        
       $model->media_id = $eventData['id'];
       $model->class = $eventData['class'];

        echo '<pre>' . print_r($model, true) . '</pre>';
        if ($model->save()) {
                  
                    return true;
                }
                else {
                    return false;
                }
    }
    
    public function actionPasteLink() {

        $id = Yii::$app->request->post('id');
      
        if ($id != 0) {
            $model = Media::findById($id);
            // echo '<pre>' . print_r($model, true) . '</pre>';
            return $model->getThumbs()['large'];
            
        } else {
            return false;
        }
    }
}