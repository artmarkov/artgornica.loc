<?php
namespace frontend\models;
use yii\db\ActiveQueryInterface;
/**
 * Article search model.
 * 
 * @property integer $id
 * @property string $title
 * @property string $short_description
 * @property string $content
 */
class PostGlobalSearch extends \backend\modules\post\models\Post implements \vintage\search\interfaces\CustomSearchInterface
{
    /**
     * @inheritdoc
     */
    public function getSearchTitle()
    {
        return $this->slug;
    }

    /**
     * @inheritdoc
     */
    public function getSearchDescription()
    {
        return $this->content;
    }

    /**
     * @inheritdoc
     */
    public function getSearchUrl()
    {
       return \yii\helpers\Url::toRoute(['/news/default/index', 'slug' => $this->slug]);
    }

   /**
    * @inheritdoc
    */
    public function getSearchFields()
    {
        return [
            'slug',
//            'short_description',
//            'content',
        ];
    }
 
   /**
     * @inheritdoc
     */
    public function getQuery(ActiveQueryInterface $query, $field, $searchQuery)
    {
        return $query
                ->joinWith('translations')
                ->where(['like', $field, $searchQuery]);
    }
}