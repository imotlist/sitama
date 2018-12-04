<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Kategori;

/**
 * KategoriSearch represents the model behind the search form about `backend\models\Kategori`.
 */
class KategoriSearch extends Kategori
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KATEGORI_ID', 'KATEGORI_NAMA', 'KATEGORI_DISKRIPSI'], 'safe'],
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
        $query = Kategori::find();

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
        $query->andFilterWhere(['like', 'KATEGORI_ID', $this->KATEGORI_ID])
            ->andFilterWhere(['like', 'KATEGORI_NAMA', $this->KATEGORI_NAMA])
            ->andFilterWhere(['like', 'KATEGORI_DISKRIPSI', $this->KATEGORI_DISKRIPSI]);

        return $dataProvider;
    }
}
