<?php

namespace backend\modules\event\controllers;
use himiklab\sortablegrid\SortableGridAction;
use Yii;


/**
 * DefaultController implements the CRUD actions for backend\modules\event\models\EventItem model.
 */
class DefaultController extends \backend\controllers\DefaultController
{
    public $modelClass       = 'backend\modules\event\models\EventItem';
    public $modelSearchClass = 'backend\modules\event\models\search\EventItemSearch';

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
     * Deletes an existing model.
     * 
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        /* @var $model \yeesoft\db\ActiveRecord */
        $model = $this->findModel($id);
        if($model->delete()) {
             Yii::$app->session->setFlash('crudMessage', Yii::t('yee', 'Your item has been deleted.'));
        }
       
        return $this->redirect($this->getRedirectPage('delete', $model));
       
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