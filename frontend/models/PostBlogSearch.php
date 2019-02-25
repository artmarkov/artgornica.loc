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
class PostBlogSearch extends \backend\modules\post\models\Post implements \vintage\search\interfaces\CustomSearchInterface
{
    /**
     * @inheritdoc
     */
    public function getSearchTitle()
    {
        return $this->title;
    }

    /**
     * @inheritdoc
     */
    public function getSearchDescription()
    {
        return $this->getShortContent();
    }

    /**
     * @inheritdoc
     */
    public function getSearchUrl()
    {
       return \yii\helpers\Url::toRoute(["/site/{$this->slug}"]);
    }

   /**
    * @inheritdoc
    */
    public function getSearchFields()
    {
        return [
            'slug',
        ];
    }
 
   /**
     * @inheritdoc
     */
    public function getQuery(ActiveQueryInterface $query, $field, $searchQuery)
    {
        return $query
                ->joinWith('translations')->select(['post_lang.title', 'post_lang.content', 'post.slug'])
                ->orWhere([
            'or',
            ['like', 'post_lang.title', $searchQuery],
            ['like', 'post_lang.content', $searchQuery],
        ]
          );
    }
}