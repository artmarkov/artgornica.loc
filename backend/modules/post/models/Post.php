<?php

namespace backend\modules\post\models;

use yeesoft\behaviors\MultilingualBehavior;
use yeesoft\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yeesoft\db\ActiveRecord;
use yii\helpers\Html;
use backend\modules\imagemanager\models\ImageManager;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $slug
 * @property string $view
 * @property string $layout
 * @property integer $category_id
 * @property integer $status
 * @property integer $comment_status
 * @property string $thumbnail
 * @property integer $published_at
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $revision
 *
 * @property PostCategory $category
 * @property User $createdBy
 * @property User $updatedBy
 * @property PostLang[] $postLangs
 * @property Tag[] $tags
 */
class Post extends ActiveRecord 
{

    const STATUS_PENDING = 0;
    const STATUS_PUBLISHED = 1;
    const COMMENT_STATUS_CLOSED = 0;
    const COMMENT_STATUS_OPEN = 1;
    const COUNT_POST_INDEX = 3;
    const MAIN_ON = 1;
    const MAIN_OFF = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post}}';
    }
     /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if ($this->isNewRecord && $this->className() == Post::className()) {
            $this->published_at = time();
        }     
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
            'sluggable' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
            ],
            'multilingual' => [
                'class' => MultilingualBehavior::className(),
                'langForeignKey' => 'post_id',
                'tableName' => "{{%post_lang}}",
                'attributes' => [
                    'title', 'content',
                ]
            ],
            [
                'class' => \common\components\behaviors\ManyHasManyBehavior::className(),
                'relations' => [
                    'tags' => 'tag_list',
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['created_by', 'updated_by', 'status', 'comment_status', 'revision', 'category_id', 'main_flag'], 'integer'],
            [['title', 'content', 'view', 'layout'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['slug'], 'string', 'max' => 127],
            [['tag_list'], 'safe'],
            [['thumbnail'], 'string', 'max' => 255],
            ['published_at', 'date', 'timestampAttribute' => 'published_at', 'format' => 'yyyy-MM-dd'],
            ['published_at', 'default', 'value' => time()],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee', 'ID'),
            'created_by' => Yii::t('yee', 'Author'),
            'updated_by' => Yii::t('yee', 'Updated By'),
            'slug' => Yii::t('yee', 'Slug'),
            'view' => Yii::t('yee', 'View'),
            'layout' => Yii::t('yee', 'Layout'),
            'title' => Yii::t('yee', 'Title'),
            'status' => Yii::t('yee', 'Status'),
            'comment_status' => Yii::t('yee', 'Comment Status'),
            'content' => Yii::t('yee', 'Content'),
            'category_id' => Yii::t('yee', 'Category'),
            'thumbnail' => Yii::t('yee/post', 'Thumbnail'),
            'published_at' => Yii::t('yee', 'Published'),
            'created_at' => Yii::t('yee', 'Created'),
            'updated_at' => Yii::t('yee', 'Updated'),
            'revision' => Yii::t('yee', 'Revision'),
            'tag_list' => Yii::t('yee/post', 'Tags'),
            'main_flag' => Yii::t('yee', 'Main On'),
        ];
    }

    /**
     * @inheritdoc
     * @return PostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PostQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
                    ->viaTable('{{%post_tag_post}}', ['post_id' => 'id']);
    }


    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    public function getPublishedDate()
    {
        return Yii::$app->formatter->asDate(($this->isNewRecord) ? time() : $this->published_at);
    }

    public function getCreatedDate()
    {
        return Yii::$app->formatter->asDate(($this->isNewRecord) ? time() : $this->created_at);
    }

    public function getUpdatedDate()
    {
        return Yii::$app->formatter->asDate(($this->isNewRecord) ? time() : $this->updated_at);
    }

    public function getPublishedTime()
    {
        return Yii::$app->formatter->asTime(($this->isNewRecord) ? time() : $this->published_at);
    }

    public function getCreatedTime()
    {
        return Yii::$app->formatter->asTime(($this->isNewRecord) ? time() : $this->created_at);
    }

    public function getUpdatedTime()
    {
        return Yii::$app->formatter->asTime(($this->isNewRecord) ? time() : $this->updated_at);
    }

    public function getPublishedDatetime()
    {
        return "{$this->publishedDate} {$this->publishedTime}";
    }

    public function getCreatedDatetime()
    {
        return "{$this->createdDate} {$this->createdTime}";
    }

    public function getUpdatedDatetime()
    {
        return "{$this->updatedDate} {$this->updatedTime}";
    }

    public function getStatusText()
    {
        return $this->getStatusList()[$this->status];
    }

    public function getCommentStatusText()
    {
        return $this->getCommentStatusList()[$this->comment_status];
    }

    public function getRevision()
    {
        return ($this->isNewRecord) ? 1 : $this->revision;
    }

    public function updateRevision()
    {
        $this->updateCounters(['revision' => 1]);
    }

    public function getAllContent($delimiter = '<p>', $allowableTags = '<a><blockquote><!-- pagebreak -->')
    {
         $result = '';
         $i = 0;
         $content = explode($delimiter, $this->content);
        
         foreach ($content as $id => $item) :
         
          $item =  strip_tags($item, $allowableTags);
         
             if(strlen($item) != 0) :          
                if($i == 0) { 
                    $result .= Html::tag('p', $item, ['class' => "dropcap"]);
                    $i++;
                }
                else {
                    $result .= Html::tag('p', $item);
                }
                
            endif;
         endforeach;
         
       return $result;        
    } 
    
    public function getShortContent($delimiter = '<!-- pagebreak -->', $allowableTags = '<a><p><blockquote>')
    {
        $content = explode($delimiter, $this->content);
        return strip_tags($content[0], $allowableTags);
    }
    /**
     * getTypeList
     * @return array
     */
    public static function getMainList()
    {
        return [
            self::MAIN_ON => Yii::t('yee', 'On'),
            self::MAIN_OFF => Yii::t('yee', 'Off'),
        ];
    }
 /**
     * getStatusOptionsList
     * @return array
     */
    public static function getMainOptionsList()
    {
        return [
            [self::MAIN_ON, Yii::t('yee', 'On'), 'default'],
            [self::MAIN_OFF, Yii::t('yee', 'Off'), 'primary']
        ];
    }
    /**
     * getStatusOptionsList
     * @return array
     */
    public static function getStatusOptionsList()
    {
        return [
            [self::STATUS_PENDING, Yii::t('yee', 'Pending'), 'default'],
            [self::STATUS_PUBLISHED, Yii::t('yee', 'Published'), 'primary']
        ];
    }

    /**
     * getCommentStatusList
     * @return array
     */
    public static function getCommentStatusList()
    {
        return [
            self::COMMENT_STATUS_OPEN => Yii::t('yee', 'Open'),
            self::COMMENT_STATUS_CLOSED => Yii::t('yee', 'Closed')
        ];
    }
 /**
     * getTypeList
     * @return array
     */
    public static function getStatusList()
    {
        return [
            self::STATUS_PENDING => Yii::t('yee', 'Pending'),
            self::STATUS_PUBLISHED => Yii::t('yee', 'Published'),
        ];
    }
    /**
     *
     * @inheritdoc
     */
    public static function getFullAccessPermission()
    {
        return 'fullPostAccess';
    }

    /**
     *
     * @inheritdoc
     */
    public static function getOwnerField()
    {
        return 'created_by';
    }
    
    public function getImages()
    {
        return $this->hasMany(ImageManager::className(), ['item_id' => 'id'])->orderBy('sort');
    }
    public function getImagesLinks()
    {
        return ArrayHelper::getColumn($this->images, 'imageUrl');
    }
    public function getImagesLinksData()
    {
        return ArrayHelper::toArray($this->images,[
                    ImageManager::className() => [
                    'type' => 'type',
                    'filetype' => 'filetype',
                    'downloadUrl' => 'url',
                    'caption'=> 'name',
                    'size'=> 'size',
                    'key'=> 'id',
                ]]
        );
    }
}
