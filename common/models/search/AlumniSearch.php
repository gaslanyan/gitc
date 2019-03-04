<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Alumni;

/**
 * AlumniSearch represents the model behind the search form about `common\models\Alumni`.
 */
class AlumniSearch extends Alumni
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'phone'], 'integer'],
            [['name', 'surname', 'fname', 'birthday', 'address', 'e_mail', 'languages', 'occupation', 'family_condition', 'graduate_year', 'technical_languages', 'education', 'experience', 'skills', 'lng_code', 'profession'], 'safe'],
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
        $query = Alumni::find();

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
            'phone' => $this->phone,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'birthday', $this->birthday])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'e_mail', $this->e_mail])
            ->andFilterWhere(['like', 'languages', $this->languages])
            ->andFilterWhere(['like', 'occupation', $this->occupation])
            ->andFilterWhere(['like', 'family_condition', $this->family_condition])
            ->andFilterWhere(['like', 'graduate_year', $this->graduate_year])
            ->andFilterWhere(['like', 'technical_languages', $this->technical_languages])
            ->andFilterWhere(['like', 'education', $this->education])
            ->andFilterWhere(['like', 'experience', $this->experience])
            ->andFilterWhere(['like', 'skills', $this->skills])
            ->andFilterWhere(['like', 'lng_code', $this->lng_code])
            ->andFilterWhere(['like', 'profession', $this->profession]);

        return $dataProvider;
    }
}
