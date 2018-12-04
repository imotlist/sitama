<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * UserSearch represents the model behind the search form about `backend\models\User`.
 */
class UserSearch extends User
{
    public $kel_id;
    //$kel_id => Yii::$app->user->identity->KELOMPOKTANI_ID;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'KELOMPOKTANI_ID', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'USER_ALAMAT', 'USER_TELP'], 'safe'],
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

        $role = Yii::$app->user->identity->getRoleName();
        $query = User::find();

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

        //join table


        // grid filtering conditions
        if ($role == 'SuperAdminRole') {
            $query->andFilterWhere([
                'id' => $this->id,
                'status' => $this->status,
                //'KELOMPOKTANI_ID' => $this->kel_id = Yii::$app->user->identity->KELOMPOKTANI_ID,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]);
        }else{
            $query->andFilterWhere([
                'id' => $this->id,
                'status' => $this->status,
                'KELOMPOKTANI_ID' => $this->kel_id = Yii::$app->user->identity->KELOMPOKTANI_ID,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]);
            $query->andWhere(['<>','username','admin']);
        }

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'KELOMPOKTANI_ID', $this->KELOMPOKTANI_ID])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'USER_ALAMAT', $this->USER_ALAMAT])
            ->andFilterWhere(['like', 'USER_TELP', $this->USER_TELP]);

        return $dataProvider;
    }
}
