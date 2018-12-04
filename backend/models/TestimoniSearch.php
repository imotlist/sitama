<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Testimoni;

/**
 * TestimoniSearch represents the model behind the search form about `backend\models\Testimoni`.
 */
class TestimoniSearch extends Testimoni
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['testi_id'], 'integer'],
            [['testi_nama', 'testi_quote', 'testi_gambar'], 'safe'],
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
        $query = Testimoni::find();

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
            'testi_id' => $this->testi_id,
        ]);

        $query->andFilterWhere(['like', 'testi_nama', $this->testi_nama])
            ->andFilterWhere(['like', 'testi_quote', $this->testi_quote])
            ->andFilterWhere(['like', 'testi_gambar', $this->testi_gambar]);

        return $dataProvider;
    }
}
