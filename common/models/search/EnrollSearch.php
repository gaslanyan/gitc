<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Enroll;

/**
 * EnrollSearch represents the model behind the search form about `common\models\Enroll`.
 */
class EnrollSearch extends Enroll
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'course_id'], 'integer'],
            [['firstname', 'lastname', 'state', 'city', 'dob', 'email', 'subjects'], 'safe'],
            [['phone'], 'number'],
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
        $query = Enroll::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'dob' => $this->dob,
            'phone' => $this->phone,
            'course_id' => $this->course_id,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'subjects', $this->subjects]);

        return $dataProvider;
    }
}
