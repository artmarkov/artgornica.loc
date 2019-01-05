<?php

namespace frontend\modules\auth\controllers;

use yeesoft\auth\models\forms\LoginForm;
use frontend\modules\auth\models\forms\ResetPasswordForm;
use yeesoft\auth\models\forms\UpdatePasswordForm;
use yeesoft\components\AuthEvent;
use yeesoft\models\User;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yeesoft\widgets\ActiveForm;

class DefaultController extends \yeesoft\controllers\BaseController
{
    /**
     * @var array
     */
    public $freeAccessActions = ['login', 'logout', 'reset-password', 
        'reset-password-request', 'update-password'];

   

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],                   
                ],
            ],
        ]);
    }

   
    /**
     * Login form
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }

        $model = new LoginForm();

        if (Yii::$app->request->isAjax AND $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) AND $model->login()) {
            return $this->redirect('/admin');
        }

        return $this->renderIsAjax('login', compact('model'));
    }

    /**
     * Logout and redirect to home page
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(Yii::$app->homeUrl);
    }
    /**
     * Change your own password
     *
     * @throws \yii\web\ForbiddenHttpException
     * @return string|\yii\web\Response
     */
    public function actionUpdatePassword()
    {
        if (Yii::$app->user->isGuest) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }

        $user = User::getCurrentUser();

        if ($user->status != User::STATUS_ACTIVE) {
            throw new ForbiddenHttpException();
        }

        $model = new UpdatePasswordForm(compact('user'));

        if (Yii::$app->request->isAjax AND $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) AND $model->updatePassword()) {
            return $this->renderIsAjax('update-password-success');
        }

        return $this->renderIsAjax('update-password', compact('model'));
    }

    /**
     * Action to reset password
     *
     * @return string|\yii\web\Response
     */
    public function actionResetPassword()
    {
        if (!Yii::$app->user->isGuest) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }

        $model = new ResetPasswordForm();

        if (Yii::$app->request->isAjax AND $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $model->validate();
        }

        if ($model->load(Yii::$app->request->post()) AND $model->validate()) {
            if ($this->triggerModuleEvent(AuthEvent::BEFORE_PASSWORD_RECOVERY_REQUEST, ['model' => $model])) {
                if ($model->sendEmail(false)) {
                    if ($this->triggerModuleEvent(AuthEvent::AFTER_PASSWORD_RECOVERY_REQUEST, ['model' => $model])) {
                        return $this->renderIsAjax('reset-password-success');
                    }
                } else {
                    Yii::$app->session->setFlash('error', Yii::t('yee/auth', "Unable to send message for email provided"));
                }
            }
        }

        return $this->renderIsAjax('reset-password', compact('model'));
    }

    /**
     * Receive token, find user by it and show form to change password
     *
     * @param string $token
     *
     * @throws \yii\web\NotFoundHttpException
     * @return string|\yii\web\Response
     */
    public function actionResetPasswordRequest($token)
    {
        if (!Yii::$app->user->isGuest) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }

        $user = User::findByConfirmationToken($token);

        if (!$user) {
            throw new NotFoundHttpException(Yii::t('yee/auth', 'Token not found. It may be expired. Try reset password once more'));
        }

        $model = new UpdatePasswordForm([
            'scenario' => 'restoreViaEmail',
            'user' => $user,
        ]);

        if ($model->load(Yii::$app->request->post()) AND $model->validate()) {
            if ($this->triggerModuleEvent(AuthEvent::BEFORE_PASSWORD_RECOVERY_COMPLETE, ['model' => $model])) {
                $model->updatePassword(false);

                if ($this->triggerModuleEvent(AuthEvent::AFTER_PASSWORD_RECOVERY_COMPLETE, ['model' => $model])) {
                    return $this->renderIsAjax('update-password-success');
                }
            }
        }

        return $this->renderIsAjax('update-password', compact('model'));
    }

   
    /**
     * Universal method for triggering events like "before registration", "after registration" and so on
     *
     * @param string $eventName
     * @param array $data
     *
     * @return bool
     */
    protected function triggerModuleEvent($eventName, $data = [])
    {
        $event = new AuthEvent($data);

        Yii::$app->yee->trigger($eventName, $event);

        return $event->isValid;
    }

   
}