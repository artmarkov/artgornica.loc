<?php

namespace backend\modules\event\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\event\models\EventSchedule;

/**
 * EventScheduleSearch represents the model behind the search form about `backend\modules\event\models\EventSchedule`.
 */
class EventScheduleSearch extends EventSchedule
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'event_id', 'place_id', 'timestamp_in', 'timestamp_out'], 'integer'],
            [['description', 'price', 'status'], 'safe'],
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
        $query = EventSchedule::find();

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
            'event_id' => $this->event_id,
            'place_id' => $this->place_id,
            'timestamp_in' => $this->timestamp_in,
            'timestamp_out' => $this->timestamp_out,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
