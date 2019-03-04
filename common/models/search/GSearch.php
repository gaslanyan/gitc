<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Classified;

/**
 * ClassifiedSearch represents the model behind the search form about `common\models\Classified`.
 */
class GSearch extends Classified {

    public $keyword;
    public $cat;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'category_id', 'country_id', 'region_id', 'city_id', 'price', 'user_id', 'is_status', 'type'], 'integer'],
            [['title', 'category', 'region', 'city', 'keyword', 'cat', 'description', 'create_at', 'update_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {

        $query = new \yii\db\Query();
        $query->select([
                    'classified.id',
                    'classified.title',
                    'classified.description',
                    'classified.price',
                    'classified.create_at',
                    'classified.is_status',
                    'classified.type',
                    'classified.user_id',
                    'main_category.main_category',
                    'category.category',
                    'country.country',
                    'region.region',
                    'city.city'
                ])
                ->from('classified')
                ->join('JOIN', 'category', 'category.id = classified.category_id')
                ->join('JOIN', 'main_category', 'main_category.id = classified.main_category_id')
                ->join('JOIN', 'country', 'country.id = classified.country_id')
                ->join('JOIN', 'region', 'region.id = classified.region_id')
                ->join('JOIN', 'city', 'city.id = classified.city_id')
                ->createCommand()->queryAll();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => array('pageSize' => 10),
                //'sortData' => $sort,
                //'sort' => ['defaultOrder' => ['create_at' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if ($this->keyword) {
            $query->andFilterWhere(['or',
                ['like', 'title', $this->keyword],
                ['like', 'description', $this->keyword],
                ['like', 'category.category', $this->keyword],
                    //['like', 'region.region', $this->keyword],
                    //['like', 'city.city', $this->keyword]
            ]);
        }
        if ($this->cat) {
            $query->andFilterWhere(['or',
                ['category_id' => $this->cat]
            ]);
        }



        return $dataProvider;
    }

}
