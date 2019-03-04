<?php


namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Training;

/**
 * TrainingSearch represents the model behind the search form about `common\models\Training`.
 */
class TrainingSearch extends Training

{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'is_active'], 'integer'],
            [['title', 'img_name', 'status', 'content', 'icon'], 'safe'],
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
        $query = Training::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'img_name', $this->img_name])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'icon', $this->icon]);


        return $dataProvider;
    }
}
