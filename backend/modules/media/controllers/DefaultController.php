<?php

namespace backend\modules\media\controllers;

use Yii;
use backend\modules\media\models\Media;

class DefaultController extends \backend\controllers\DefaultController
{

    public $disabledActions = ['view', 'create', 'update', 'delete', 'toggle-attribute',
        'bulk-activate', 'bulk-deactivate', 'bulk-delete', 'grid-sort', 'grid-page-size'];

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSettings()
    {
        return $this->render('settings');
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