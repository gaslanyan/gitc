<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Subjects;

/**
 * SubjectsSearch represents the model behind the search form about `common\models\Subjects`.
 */
class SubjectsSearch extends Subjects
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'course_id', 'is_status'], 'integer'],
            [['title', 'title_hy'], 'safe'],
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
        $query = Subjects::find();

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
            'course_id' => $this->course_id,
            'is_status' => $this->is_status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'title_hy', $this->title_hy]);

        return $dataProvider;
    }
}
