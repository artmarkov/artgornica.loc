<?php

namespace backend\modules\event\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%event_place}}".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $phone_optional
 * @property string $email
 * @property string $сontact_person
 * @property string $coords
 * @property int $map_zoom
 * @property string $description
 * @property int $created_at
 * @property int $updated_at
 * @property string $event_color
 * @property string $event_text_color
 *
 * @property EventSchedule[] $eventSchedules
 */
class EventPlace extends \yeesoft\db\ActiveRecord
{
    public  $map_address;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%event_place}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'phone', 'email', 'сontact_person', 'coords'], 'required'],
            [['map_zoom'], 'integer'],
            ['email', 'email'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'сontact_person'], 'string', 'max' => 127],
            [['address', 'email', 'description'], 'string', 'max' => 255],
            [['phone', 'phone_optional'], 'string', 'max' => 24],
            ['coords', 'string', 'max' => 64],
            [['event_color', 'event_text_color'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee', 'ID'),
            'name' => Yii::t('yee', 'Name'),
            'address' => Yii::t('yee', 'Address'),
            'phone' => Yii::t('yee', 'Phone'),
            'phone_optional' => Yii::t('yee', 'Phone Optional'),
            'email' => Yii::t('yee', 'Email'),
            'сontact_person' => Yii::t('yee', 'Contact Person'),
            'coords' => Yii::t('yee', 'Coords'),
            'map_zoom' => Yii::t('yee', 'Map Zoom'),
            'description' => Yii::t('yee', 'Description'),
            'created_at' => Yii::t('yee', 'Created At'),
            'updated_at' => Yii::t('yee', 'Updated At'),
            'event_color' => Yii::t('yee/event', 'Event Color'),
            'event_text_color' => Yii::t('yee/event', 'Event Text Color'),
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
     * @return \yii\db\ActiveQuery
     */
    public function getEventSchedules()
    {
        return $this->hasMany(EventSchedule::className(), ['place_id' => 'id']);
    }

    /**
     * 
     * @return type array
     */
    public static function getPlacesList()
    {
        return \yii\helpers\ArrayHelper::map(static::find()->all(), 'id', 'name');
    }
    /**
     * event/views/schedule/fullcalendar
     * 
     * @return type array
     */
     public static function getEventPlacesList()
    {
      return self::find()->select(['name', 'event_color', 'event_text_color'])->asArray()->all();
    }
    /**
     * {@inheritdoc}
     * @return \backend\modules\event\models\query\EventPlaceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\event\models\query\EventPlaceQuery(get_called_class());
    }
}
