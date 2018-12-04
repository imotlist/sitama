<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Berita;

/**
 * BeritaSearch represents the model behind the search form about `backend\models\Berita`.
 */
class BeritaSearch extends Berita
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['berita_id', 'berita_counter'], 'integer'],
            [['berita_judul', 'berita_isi', 'berita_gambar', 'berita_tgl'], 'safe'],
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
        $query = Berita::find();

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
            'berita_id' => $this->berita_id,
            'berita_tgl' => $this->berita_tgl,
            'berita_counter' => $this->berita_counter,
        ]);

        $query->andFilterWhere(['like', 'berita_judul', $this->berita_judul])
            ->andFilterWhere(['like', 'berita_isi', $this->berita_isi])
            ->andFilterWhere(['like', 'berita_gambar', $this->berita_gambar]);

        return $dataProvider;
    }
}
