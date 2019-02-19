<?php

namespace backend\modules\user\models\search;

use yeesoft\models\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * UserSearch represents the model behind the search form about `yeesoft\models\User`.
 */
class UserSearch extends User
{
 /**
 * @var string
 */
    public $fullName;

    public function rules()
    {
        return [
            [['id', 'superadmin', 'status', 'user_category', 'created_at', 'updated_at', 'email_confirmed'], 'integer'],
            [['username', 'gridRoleSearch', 'registration_ip', 'email'], 'string'],
            [['fullName'], 'string'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = User::find();

        $query->with(['roles']);

        if (!Yii::$app->user->isSuperadmin) {
            $query->where(['superadmin' => 0]);
        }

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
        
    $dataProvider->setSort([
            'attributes' => [
                'id',
                'superadmin',
                'status',
                'registration_ip',
                'created_at',
                'updated_at',
                'email_confirmed',
                'user_category',
                'fullName' => [
                    'asc' => ['last_name' => SORT_ASC, 'first_name' => SORT_ASC, 'middle_name' => SORT_ASC],
                    'desc' => ['last_name' => SORT_DESC, 'first_name' => SORT_DESC, 'middle_name' => SORT_DESC],
                ]
            ]
        ]);

 $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        if ($this->gridRoleSearch) {
            $query->joinWith(['roles']);
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'superadmin' => $this->superadmin,
            'status' => $this->status,
            'user_category' => $this->user_category,
            Yii::$app->yee->auth_item_table . '.name' => $this->gridRoleSearch,
            'registration_ip' => $this->registration_ip,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'email_confirmed' => $this->email_confirmed,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email]);
        
        $query->andWhere('first_name LIKE "%' . $this->fullName . '%" '.
        'OR last_name LIKE "%' . $this->fullName . '%"'. 
        'OR middle_name LIKE "%' . $this->fullName . '%"'
    );
        return $dataProvider;
    }
}