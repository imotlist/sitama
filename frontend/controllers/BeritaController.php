<?php

namespace frontend\controllers;
use Yii;
use backend\models\Berita;
use backend\models\BeritaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\Pagination;

class BeritaController extends \yii\web\Controller
{
    public function actionIndex()
    {   
        $cari = new Berita();
        if ($cari->load(Yii::$app->request->post())) {
            
            $query = Berita::find()->andFilterWhere(['OR',
                                                    ['LIKE', 'berita_judul', $cari->berita_judul],
                                                    ])
                                    ->orderBy(['berita_tgl'=>SORT_DESC]);
        }else{
            $query = Berita::find()->orderBy(['berita_tgl'=>SORT_DESC]);
        }

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),  'defaultPageSize' => 9]);
        $berita = $query->offset($pages->offset)->limit($pages->limit)->all(); 

        return $this->render('index',['berita'=>$berita,'pages'=>$pages,'cari'=>$cari,]);
    }

    public function actionDetail($id){
    	$model = Berita::findOne($id);

        try{
            $model->berita_counter++;
            $model->save();
        
        }catch(\Exception $e){
            return $this->redirect(['index']);
        }
    	return $this->render('detail', [
            'model' => $model,
        ]);
    }

}
