<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\JenisBarang;

/**
 * JenisBarangSearch represents the model behind the search form about `backend\models\JenisBarang`.
 */
class JenisBarangSearch extends JenisBarang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['JENIS_BARANG_ID', 'JENIS_BARANG_NAMA', 'KETERANGAN'], 'safe'],
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
        $query = JenisBarang::find();

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
        $query->andFilterWhere(['like', 'JENIS_BARANG_ID', $this->JENIS_BARANG_ID])
            ->andFilterWhere(['like', 'JENIS_BARANG_NAMA', $this->JENIS_BARANG_NAMA])
            ->andFilterWhere(['like', 'KETERANGAN', $this->KETERANGAN]);

        return $dataProvider;
    }
}
