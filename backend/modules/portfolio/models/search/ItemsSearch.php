<?php

namespace backend\modules\portfolio\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\portfolio\models\Items;

/**
 * ItemsSearch represents the model behind the search form about `backend\modules\portfolio\models\Items`.
 */
class ItemsSearch extends Items
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'link_class', 'link_href', 'img_class', 'img_src', 'img_alt', 'status'], 'safe'],
             ['gridCategorySearch', 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Items::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => Yii::$app->request->cookies->getValue('_grid_page_size', 20),
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        //жадная загрузка       
      
        $query->with(['categories']);
       
        
        if ($this->gridCategorySearch) {
            $query->joinWith(['categories']);
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'portfolio_items_category.category_id' => $this->gridCategorySearch,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'link_class', $this->link_class])
            ->andFilterWhere(['like', 'link_href', $this->link_href])
            ->andFilterWhere(['like', 'img_class', $this->img_class])
            ->andFilterWhere(['like', 'img_src', $this->img_src])
            ->andFilterWhere(['like', 'img_alt', $this->img_alt])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
