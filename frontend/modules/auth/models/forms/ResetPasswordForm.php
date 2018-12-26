<?php

namespace frontend\modules\auth\models\forms;

use yeesoft\models\User;
use Yii;
use yii\base\Model;
use himiklab\yii2\recaptcha\ReCaptchaValidator;

class ResetPasswordForm extends Model
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $reCaptcha;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['reCaptcha'], ReCaptchaValidator::className(),
                'secret' => '6LdDI4IUAAAAAGHfEzx7IMbr5TvJPqeqBiivjqmc',
                'uncheckedMessage' => Yii::t('yee/auth', 'Please confirm that you are not a bot.')
            ],
            [['email', 'reCaptcha'], 'required'],
            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'validateEmailConfirmedAndUserActive'],
        ];
    }

    /**
     * @return bool
     */
    public function validateEmailConfirmedAndUserActive()
    {
        if (!Yii::$app->yee->checkAttempts()) {
            $this->addError('email', Yii::t('yee/auth', 'Too many attempts'));
            return false;
        }

        $user = User::findOne([
            'email' => $this->email,
            'email_confirmed' => 1,
            'status' => User::STATUS_ACTIVE,
        ]);

        if ($user) {
            $this->user = $user;
        } else {
            $this->addError('email', Yii::t('yee/auth', 'E-mail is invalid'));
        }
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'email' => 'E-mail',
            'reCaptcha' => Yii::t('yee/auth', 'Captcha'),
        ];
    }

    /**
     * @param bool $performValidation
     *
     * @return bool
     */
    public function sendEmail($performValidation = true)
    {
        if ($performValidation AND !$this->validate()) {
            return false;
        }

        $this->user->generateConfirmationToken();
        $this->user->save(false);

        return Yii::$app->mailer->compose(Yii::$app->yee->emailTemplates['password-reset'],
            ['user' => $this->user])
            ->setFrom(Yii::$app->yee->emailSender)
            ->setTo($this->email)
            ->setSubject(Yii::t('yee/auth', 'Password reset for') . ' ' . Yii::$app->name)
            ->send();
    }
}