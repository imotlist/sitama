<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\KelompokTani;

/**
 * KelompokTaniSearch represents the model behind the search form about `backend\models\KelompokTani`.
 */
class KelompokTaniSearch extends KelompokTani
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KELOMPOKTANI_ID', 'KELOMPOKTANI_NAMA', 'KELOMPOKTANI_DESA'], 'safe'],
            [['KELOMPOKTANI_STATUS'], 'integer'],
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
        $role=Yii::$app->user->identity->getRoleName();
        $query = KelompokTani::find();

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
            'KELOMPOKTANI_STATUS' => $this->KELOMPOKTANI_STATUS,
        ]);

        if($role=='KetuaRole'){
            $uid = Yii::$app->user->identity->KELOMPOKTANI_ID;
            $query->andWhere(['KELOMPOKTANI_ID'=>$uid]);

        }

        $query->andFilterWhere(['like', 'KELOMPOKTANI_ID', $this->KELOMPOKTANI_ID])
            ->andFilterWhere(['like', 'KELOMPOKTANI_NAMA', $this->KELOMPOKTANI_NAMA])
            ->andFilterWhere(['like', 'KELOMPOKTANI_DESA', $this->KELOMPOKTANI_DESA]);

        return $dataProvider;
    }
}
