<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Detailorder;

/**
 * DetailorderSearch represents the model behind the search form about `backend\models\Detailorder`.
 */
class DetailorderSearch extends Detailorder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_ID'], 'safe'],
            [['KATALOG_ID', 'DETAILORDER_ID', 'DETAILORDER_QTY', 'DETAILORDER_JUMLAH'], 'integer'],
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
        $query = Detailorder::find();

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
            'KATALOG_ID' => $this->KATALOG_ID,
            'DETAILORDER_ID' => $this->DETAILORDER_ID,
            'DETAILORDER_QTY' => $this->DETAILORDER_QTY,
            'DETAILORDER_JUMLAH' => $this->DETAILORDER_JUMLAH,
        ]);

        $query->andFilterWhere(['like', 'ORDER_ID', $this->ORDER_ID]);

        return $dataProvider;
    }
}
