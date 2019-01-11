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
    
     public $placeName;
     public $programmName;
     public $groupName;
     public $eventItemName;


     /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'item_programm_id', 'place_id'], 'integer'],
            [['description', 'price', 'all_day'], 'safe'],
            [['programmId', 'groupId', 'eventItemId'], 'integer'],
            [['placeName','programmName','groupName','eventItemName'], 'string'],
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

         //    жадная загрузка
        $query->joinWith(['itemProgramm']);
        $query->joinWith(['itemGroup']);
        $query->joinWith(['eventItem']);
        
        if ($this->programmId) {
            $query->joinWith(['itemProgramm']);
        } 
        if ($this->groupId) {
            $query->joinWith(['itemGroup']);
        }
        if ($this->eventItemId) {
            $query->joinWith(['eventItem']);
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'event_item_programm.programm_id' => $this->programmId,
            'event_group.id' => $this->groupId,
            'event_item_programm.item_id' => $this->eventItemId,
            'place_id' => $this->place_id,
//            'start_timestamp' => $this->start_timestamp,
//            'end_timestamp' => $this->end_timestamp,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'all_day', $this->all_day]);

        return $dataProvider;
    }
}
