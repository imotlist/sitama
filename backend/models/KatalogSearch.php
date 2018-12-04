<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Katalog;

/**
 * KatalogSearch represents the model behind the search form about `backend\models\Katalog`.
 */
class KatalogSearch extends Katalog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KATALOG_ID', 'KATEGORI_ID', 'TOKO_ID', 'JENIS_BARANG_ID', 'KATALOG_JUDUL', 'KATALOG_BARANG', 'KATALOG_TGL_POST', 'KATALOG_DISKRIPSI'], 'safe'],
            [['KATALOG_HARGA', 'KATALOG_STATUS'], 'integer'],
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
        $query = Katalog::find();

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
            'KATALOG_HARGA' => $this->KATALOG_HARGA,
            'KATALOG_TGL_POST' => $this->KATALOG_TGL_POST,
            'KATALOG_STATUS' => $this->KATALOG_STATUS,
        ]);

        $query->andFilterWhere(['like', 'KATALOG_ID', $this->KATALOG_ID])
            ->andFilterWhere(['like', 'KATEGORI_ID', $this->KATEGORI_ID])
            ->andFilterWhere(['like', 'TOKO_ID', $this->TOKO_ID])
            ->andFilterWhere(['like', 'JENIS_BARANG_ID', $this->JENIS_BARANG_ID])
            ->andFilterWhere(['like', 'KATALOG_JUDUL', $this->KATALOG_JUDUL])
            ->andFilterWhere(['like', 'KATALOG_BARANG', $this->KATALOG_BARANG])
            ->andFilterWhere(['like', 'KATALOG_DISKRIPSI', $this->KATALOG_DISKRIPSI]);

        return $dataProvider;
    }


}
