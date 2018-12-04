<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Toko;

/**
 * TokoSearch represents the model behind the search form about `backend\models\Toko`.
 */
class TokoSearch extends Toko
{
    public $username;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TOKO_ID', 'TOKO_NAMA', 'TOKO_ALAMAT', 'TOKO_TELP', 'TOKO_DISKRIPSI','username'], 'safe'],
            [['ID', 'TOKO_STATUS'], 'integer'],
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
        $query = Toko::find();

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

        // tambahan join tabel
        $query->joinWith('iD');

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'TOKO_STATUS' => $this->TOKO_STATUS,
        ]);

        $query->andFilterWhere(['like', 'TOKO_ID', $this->TOKO_ID])
            ->andFilterWhere(['like', 'TOKO_NAMA', $this->TOKO_NAMA])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'TOKO_ALAMAT', $this->TOKO_ALAMAT])
            ->andFilterWhere(['like', 'TOKO_TELP', $this->TOKO_TELP])
            ->andFilterWhere(['like', 'TOKO_DISKRIPSI', $this->TOKO_DISKRIPSI]);

        return $dataProvider;
    }
}
