<?php

namespace backend\modules\section\models;

use Yii;

use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;
/**
 * This is the model class for table "section_page".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property SectionItem[] $sectionItems
 */
class SectionPage extends \yii\db\ActiveRecord
{
    public  $emails;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'section_page';
    }

      /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
            ], 
            'sluggable' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['status'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 127],
            [['created_at', 'updated_at'], 'safe'],
            ['emails', 'validateEmails']
        ];
    }

    /**
     * Email validation.
     *
     * @param $attribute
     */
    public function validateEmails($attribute)
    {
        $items = $this->$attribute;

        if (!is_array($items)) {
            $items = [];
        }

        foreach ($items as $index => $item) {
            $validator = new \yii\validators\EmailValidator();
            $error = null;
            $validator->validate($item, $error);
            if (!empty($error)) {
                $key = $attribute . '[' . $index . ']';
                $this->addError($key, $error);
            }
        }
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee', 'ID'),
            'name' => Yii::t('yee', 'Name'),
            'slug' => Yii::t('yee', 'Slug'),
            'status' => Yii::t('yee', 'Status'),
            'created_at' => Yii::t('yee', 'Created At'),
            'updated_at' => Yii::t('yee', 'Updated At'),
        ];
    }

      
     public function getCreatedDate()
    {
        return Yii::$app->formatter->asDate(($this->isNewRecord) ? time() : $this->created_at);
    }

    public function getUpdatedDate()
    {
        return Yii::$app->formatter->asDate(($this->isNewRecord) ? time() : $this->updated_at);
    }

    public function getCreatedTime()
    {
        return Yii::$app->formatter->asTime(($this->isNewRecord) ? time() : $this->created_at);
    }

    public function getUpdatedTime()
    {
        return Yii::$app->formatter->asTime(($this->isNewRecord) ? time() : $this->updated_at);
    }

    public function getCreatedDatetime()
    {
        return "{$this->createdDate} {$this->createdTime}";
    }

    public function getUpdatedDatetime()
    {
        return "{$this->updatedDate} {$this->updatedTime}";
    }
    
     /**
     * getStatusList
     * @return array
     */
    public static function getStatusList()
    {
        return array(
            self::STATUS_ACTIVE => Yii::t('yee', 'Active'),
            self::STATUS_INACTIVE => Yii::t('yee', 'Inactive'),
        );
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSectionItems()
    {
        return $this->hasMany(SectionItem::className(), ['page_id' => 'id']);
    }
}
