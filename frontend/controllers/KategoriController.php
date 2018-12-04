<?php

namespace frontend\controllers;
use Yii;
use backend\models\Katalog;
use backend\models\Kategori;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use backend\models\Kelompoktani;
use backend\models\Berita;
use backend\models\Gambar;
use backend\models\Testimoni;
use yii\data\Pagination;

class KategoriController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $query = Katalog::find()->where(['KATEGORI_ID'=> $id])->orderBy(['KATALOG_TGL_POST'=>SORT_DESC]);
        $jd = Kategori::findOne($id);
        if($jd == NULL){
            return $this->render('/site/page404');
        }else{            
            
            $judul = $jd->KATEGORI_NAMA;
            $testi = Testimoni::find()->orderBy(['testi_id'=>SORT_DESC])->limit(3)->all();        
            $countQuery = clone $query;
            $pages = new Pagination(['totalCount' => $countQuery->count(),  'defaultPageSize' => 9]);
            $model = $query->offset($pages->offset)->limit($pages->limit)->all();
            $model2 = Kategori::find()->all();
            $model3 = Kelompoktani::find()->all();
            $model4 = Berita::find()->all();
            $gambar = Gambar::find()->all();
            $cari = new Katalog();
            return $this->render('/site/index', [
                    'pages' => $pages,
                    'model' => $model,
                    'kategori' => $model2,
                    'tani' => $model3,
                    'berita' => $model4,
                    'judul' => $judul,
                    'testi' => $testi,
                    'gambar' => $gambar,
                    'cari' => $cari,
                ]);
        }
    }

    public function actionTampilkategori($id){
    	$model = Katalog::find()->where(['KATEGORI_ID'=> $id])->all();
    	return $this->render('tampilkategori', [
            'model' => $model,
        ]);
    }

}
