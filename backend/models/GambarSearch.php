<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Gambar;

/**
 * GambarSearch represents the model behind the search form about `backend\models\Gambar`.
 */
class GambarSearch extends Gambar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gambar_id', 'gambar_nama', 'gambar_file', 'gambar_ket', 'gambar_stat'], 'safe'],
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
        $query = Gambar::find();

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
        $query->andFilterWhere(['like', 'gambar_id', $this->gambar_id])
            ->andFilterWhere(['like', 'gambar_nama', $this->gambar_nama])
            ->andFilterWhere(['like', 'gambar_file', $this->gambar_file])
            ->andFilterWhere(['like', 'gambar_ket', $this->gambar_ket])
            ->andFilterWhere(['like', 'gambar_stat', $this->gambar_stat]);

        return $dataProvider;
    }
}
