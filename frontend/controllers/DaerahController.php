<?php

namespace frontend\controllers;
use Yii;
use backend\models\Daerah;
use backend\models\Katalog;
use backend\models\Kategori;
use backend\models\BeritaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii\helpers\Url;

class DaerahController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $daerah = Daerah::find()->all();
        return $this->render('index',['daerah'=>$daerah]);
    }
    public function actionDetail($id){
        
        $kategori = Kategori::find()->all();

        $data = array();
        $i=0;
        foreach ($kategori as $k) {
            $data[$i] = Katalog::find()->joinWith('tOKO')
                                  ->where(['DAERAH_ID'=>$id])
                                  ->andWhere(['KATEGORI_ID'=>$k->KATEGORI_ID])
                                  ->count();
            $i++;
        }

        return $this->render('detail',['data'=>$data,'id'=>$id]);
    }
}
