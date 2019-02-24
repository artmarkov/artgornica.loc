<?php

namespace backend\modules\section\controllers;

use Yii;
use backend\controllers\DefaultController;
use backend\modules\section\models\SlidesLayers;
use yii\web\NotFoundHttpException;

/**
 * SlidesController implements the CRUD actions for backend\modules\section\models\Slides model.
 */
class SlidesController extends DefaultController 
{
    public $modelClass       = 'backend\modules\section\models\Slides';
    public $modelSearchClass = 'backend\modules\section\models\search\SlidesSearch';

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
     * Copied an existing model.
     * If copied is successful, the browser will be redirected to the 'update' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionCopy($id) {
        /* @var $model \yeesoft\db\ActiveRecord */
        $model_old = $this->findModel($id);
        
        if (!$model_old) {
            throw new NotFoundHttpException(Yii::t('yee', 'Item not found'));
        }
        
        $model = new $this->modelClass;
        $model->setAttributes($model_old->attributes);

        if ($model->save()) {
            $items = SlidesLayers::find()
                    ->andWhere(['slides_id' => $model_old->id])
                    ->all();
            foreach ($items as $item) {
                $model_layers = new SlidesLayers;
                $model_layers->setAttributes($item->attributes);
                $model_layers->slides_id = $model->id;
                $model_layers->save();
            }
            Yii::$app->session->setFlash('crudMessage', Yii::t('yee', 'Your item has been copied.'));
            return $this->redirect($this->getRedirectPage('update', $model));
        }

        throw new NotFoundHttpException(Yii::t('yee', 'Item not found'));
    }

}