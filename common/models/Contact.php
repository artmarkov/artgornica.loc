<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use Yii;
use himiklab\yii2\recaptcha\ReCaptchaValidator;
use common\components\behaviors\PurifyBehavior;

/**
 * This is the model class for table "{{%contact}}".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $body
 * @property int $subscribe
 * @property int $created_at
 */
class Contact extends ActiveRecord
{
    const SUBSCRIBE = 1;
    const UNSUBSCRIBE = 0;
    /**
     *
     * @var type 
     */
    public $reCaptcha;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%contact}}';
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
            'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
            ],
            'purify' => [
                'class' => PurifyBehavior::className(),
                'attributes' => ['subject','body'],
                
            ],
        ];
    }
   
    /**
     * {@inheritdoc}
     */
   public function rules()
    {
        return [
            [['name', 'email', 'subject', 'body'], 'required'],
            ['email', 'email'],
            [['name', 'subject'], 'string', 'min' => 5],
            ['body', 'string', 'min' => 30],
            ['subscribe', 'integer'],
            ['subscribe', 'default', 'value' => self::UNSUBSCRIBE],
            ['reCaptcha', 'required',  'on' => ['contact']], 
            [
                ['reCaptcha'], ReCaptchaValidator::className(),
                'secret' => Yii::$app->reCaptcha->secret,
                'uncheckedMessage' => Yii::t('yee/auth', 'Please confirm that you are not a bot.'),
                'on' => ['contact'], // scenario
            ],
            ['created_at', 'safe'],
        ];
    }
/**
     * getSubscribeList
     * @return array
     */
    public static function getSubscribeList()
    {
        return array(
            self::SUBSCRIBE => Yii::t('yee', 'Subscribe On'),
            self::UNSUBSCRIBE => Yii::t('yee', 'Subscribe Off'),
        );
    }
    /**
     * getSubscribeValue
     *
     * @param string $val
     *
     * @return string
     */
    public static function getSubscribeValue($val)
    {
        $ar = self::getSubscribeList();

        return isset($ar[$val]) ? $ar[$val] : $val;
    }
    /**
     * {@inheritdoc}
     */
    
   public function attributeLabels() {
        return [
            'id' => Yii::t('yee', 'ID'),
            'name' => Yii::t('yee', 'Full Name'),
            'email' => Yii::t('yee', 'E-mail'),
            'subject' => Yii::t('yee', 'Title'),
            'body' => Yii::t('yee', 'Content'),
            'created_at' => Yii::t('yee', 'Created At'),
            'reCaptcha' => Yii::t('yee', 'Captcha'),
            'subscribe' => Yii::t('yee', 'Subscribe'),
            
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
        return Yii::$app->mailer->compose(
                Yii::$app->yee->emailTemplates['send-contact'], 
                [
                    'body' => $this->body, 
                    'subject' => $this->subject
                ])
            ->setFrom([$this->email => $this->name])
            ->setTo($email)
            ->setSubject(Yii::t('yee', 'Message for') . ' ' . Yii::$app->name)          
            ->send();
    }
    
    public function getCreatedDate()
    {
        return Yii::$app->formatter->asDate(($this->isNewRecord) ? time() : $this->created_at);
    }

    public function getCreatedTime()
    {
        return Yii::$app->formatter->asTime(($this->isNewRecord) ? time() : $this->created_at);
    }

    public function getCreatedDatetime()
    {
        return "{$this->createdDate} {$this->createdTime}";
    }
      public function getContent($content, $allowableTags = '<p>')
    {
        return strip_tags($content, $allowableTags);
    }
}
