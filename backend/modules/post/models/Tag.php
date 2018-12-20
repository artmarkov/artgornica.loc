<?php

namespace backend\modules\post\models;

use yeesoft\behaviors\MultilingualBehavior;
use yeesoft\models\OwnerAccess;
use yeesoft\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yeesoft\db\ActiveRecord;

/**
 * This is the model class for table "post_tag".
 *
 * @property integer $id
 * @property string $slug
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property User $updatedBy
 * @property User $createdBy
 * @property PostTagLang[] $postTagLangs
 * @property Post[] $posts
 */
class Tag extends ActiveRecord implements OwnerAccess
{

    const SCENARIO_AUTOGENERATED = 'autotag';
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post_tag}}';
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            BlameableBehavior::className(),
            TimestampBehavior::className(),
            'sluggable' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
            ],
            'multilingual' => [
                'class' => MultilingualBehavior::className(),
                'langForeignKey' => 'post_tag_id',
                'tableName' => "{{%post_tag_lang}}",
                'attributes' => [
                    'title'
                ]
            ],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_AUTOGENERATED] = ['title', 'slug'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required', 'on' => self::SCENARIO_DEFAULT],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['slug', 'title'], 'string', 'max' => 200],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee', 'ID'),
            'slug' => Yii::t('yee', 'Slug'),
            'title' => Yii::t('yee', 'Title'),
            'created_by' => Yii::t('yee', 'Created By'),
            'updated_by' => Yii::t('yee', 'Updated By'),
            'created_at' => Yii::t('yee', 'Created'),
            'updated_at' => Yii::t('yee', 'Updated'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostTagLangs()
    {
        return $this->hasMany(PostTagLang::className(), ['post_tag_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['id' => 'post_id'])
            ->viaTable('{{%post_tag_post}}', ['tag_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     */
    
    public static function getTags()
    {
        $result = [];
        $tags = static::find()->all();
        foreach ($tags as $tag) {
            $result += [$tag->id => $tag->title];
        }
        //echo '<pre>' . print_r($result, true) . '</pre>';
        return $result;
        
    } 
    /**
     * для виджета Облако тегов
     * @return type
     */
    public static function getTagsCloud() {
        $result = [];
        $tags = static::find()->all();
        foreach ($tags as $tag) {
            $count = self::find()
                    ->innerJoin('post_tag_post', 'post_tag_post.tag_id = post_tag.id')
                    ->where(['post_tag.id' => $tag->id])
                    ->count();
            $result[] = [
                'id' => $tag->id,
                'name' => $tag->title,
                'slug' => $tag->slug,
                'count' => $count
            ];
        }

        return $result;
    }
    /**
     * 
     * @return \backend\modules\post\models\TagQuery
     */
    public static function find()
    {
        return new TagQuery(get_called_class());
    }

    /**
     *
     * @inheritdoc
     */
    public static function getFullAccessPermission()
    {
        return 'fullPostTagAccess';
    }

    /**
     *
     * @inheritdoc
     */
    public static function getOwnerField()
    {
        return 'created_by';
    }
}