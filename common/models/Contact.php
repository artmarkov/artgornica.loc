<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use Yii;

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
            
        ];
    }
    /**
     * {@inheritdoc}
     */
   public function rules()
    {
        return [
            [['name', 'email', 'subject', 'body'], 'required'],
            [['body'], 'string'],
            [['subscribe'], 'integer'],
            [['name', 'email', 'subject'], 'string', 'max' => 127],
            ['created_at', 'safe'],
        ];
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
            'created_at' => Yii::t('yii', 'Created At'),
            
        ];
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
    
}
