<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Masterorder;

/**
 * MasterorderSearch represents the model behind the search form about `backend\models\Masterorder`.
 */
class MasterorderSearch extends Masterorder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_ID', 'ORDER_TGL_ADD', 'ORDER_TGL_EXP'], 'safe'],
            [['ID', 'ORDER_STATUS'], 'integer'],
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
        $query = Masterorder::find();

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
            'ID' => $this->ID,
            'ORDER_TGL_ADD' => $this->ORDER_TGL_ADD,
            'ORDER_TGL_EXP' => $this->ORDER_TGL_EXP,
            'ORDER_STATUS' => $this->ORDER_STATUS,
        ]);

        $query->andFilterWhere(['like', 'ORDER_ID', $this->ORDER_ID]);

        return $dataProvider;
    }
}
