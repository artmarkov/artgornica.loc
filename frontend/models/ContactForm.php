<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use himiklab\yii2\recaptcha\ReCaptchaValidator;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $reCaptcha;

    /**
     * @inheritdoc
     */
     public function rules() {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            [['name', 'subject'], 'string', 'min' => 5],
            ['body', 'string', 'min' => 30],
            [
                ['reCaptcha'], ReCaptchaValidator::className(),
                'secret' => '6LdDI4IUAAAAAGHfEzx7IMbr5TvJPqeqBiivjqmc',
                'uncheckedMessage' => Yii::t('yee/auth', 'Please confirm that you are not a bot.')
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'name' => Yii::t('yee', 'Full Name'),
            'email' => Yii::t('yee', 'E-mail'),
            'subject' => Yii::t('yee', 'Title'),
            'body' => Yii::t('yee', 'Content'),
            'reCaptcha' => Yii::t('yee', 'Captcha'),
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param  string $email the target email address
     * @return boolean whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose(Yii::$app->yee->emailTemplates['send-contact'], ['body' => $this->body, 'subject' => $this->subject])
            ->setFrom([$this->email => $this->name])
            ->setTo($email)
            ->setSubject(Yii::t('yee', 'Message for') . ' ' . Yii::$app->name)          
            ->send();
    }
}
