<?php

namespace backend\modules\user\controllers;

use yeesoft\models\User;
use yeesoft\controllers\admin\BaseController;
use Yii;
use yii\web\NotFoundHttpException;


/**
 * DefaultController implements the CRUD actions for User model.
 */
class DefaultController extends BaseController {

    /**
     * @var User
     */
    public $modelClass = 'yeesoft\models\User';
    public $layout = '@backend/views/layouts/main.php';

    /**
     * @var UserSearch
     */
    public $modelSearchClass = 'yeesoft\user\models\search\UserSearch';
    public $disabledActions = ['view'];

    protected function getRedirectPage($action, $model = null) {
        switch ($action) {
            case 'delete':
                return ['index'];
                break;
            case 'update':
                return ['update', 'id' => $model->id];
                break;
            case 'create':
                return ['update', 'id' => $model->id];
                break;
            default:
                return ['index'];
        }
    }

    /**
     * @param int $id User ID
     *
     * @throws \yii\web\NotFoundHttpException
     * @return string
     */
    public function actionChangePassword($id) {
        $model = User::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException(Yii::t('yee/user', 'User not found'));
        }

        $model->scenario = 'changePassword';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('crudMessage', Yii::t('yee/auth', 'Password has been updated'));
            return $this->redirect(['change-password', 'id' => $model->id]);
        }

        return $this->renderIsAjax('changePassword', compact('model'));
    }

}
