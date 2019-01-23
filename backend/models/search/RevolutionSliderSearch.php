<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RevolutionSlider;

/**
 * RevolutionSliderSearch represents the model behind the search form about `common\models\RevolutionSlider`.
 */
class RevolutionSliderSearch extends RevolutionSlider
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sort'], 'integer'],
            [['slide_image', 'banner_top', 'banner_middle', 'url', 'btn_name', 'btn_class', 'status'], 'safe'],
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
        $query = RevolutionSlider::find();

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

        $query->andFilterWhere([
            'id' => $this->id,
            'sort' => $this->sort,
        ]);

        $query->andFilterWhere(['like', 'slide_image', $this->slide_image])
            ->andFilterWhere(['like', 'banner_top', $this->banner_top])
            ->andFilterWhere(['like', 'banner_middle', $this->banner_middle])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'btn_name', $this->btn_name])
            ->andFilterWhere(['like', 'btn_class', $this->btn_class])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
