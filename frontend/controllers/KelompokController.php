<?php

namespace frontend\controllers;
use Yii;
use backend\models\Kategori;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Kelompoktani;
use yii\data\Pagination;

use backend\models\user;
use backend\models\Katalog;


class KelompokController extends \yii\web\Controller
{

    public function actionIndex()
    {   
        $cari = new Kelompoktani();
        if ($cari->load(Yii::$app->request->post())) {
            $var = $cari->KELOMPOKTANI_NAMA;
            $query = Kelompoktani::find()->andFilterWhere(['OR',
                                                    ['LIKE', 'KELOMPOKTANI_NAMA', $var],
                                                    ['LIKE', 'KELOMPOKTANI_DESA', $var],
                                                    
                                                    ])
                                    ->orderBy(['KELOMPOKTANI_ID'=>SORT_DESC]);
        }else{
            $query = Kelompoktani::find()->orderBy(['KELOMPOKTANI_ID'=>SORT_ASC]);
        }

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),  'defaultPageSize' => 9]);
        $kelompok = $query->offset($pages->offset)->limit($pages->limit)->all(); 

        return $this->render('index',['kelompok'=>$kelompok,'pages'=>$pages,'cari'=>$cari,]);
    }

    public function actionDetail($id){

    	$a = user::find()->where(['KELOMPOKTANI_ID'=>$id])->all();
    	
    	$jml1=0;
    	$jml2=0;
    	$jml3=0;
    	$jml4=0;
    	$jml5=0;
    	foreach ($a as $b) {
    		
    		$k11 = Katalog::find()->joinWith(['tOKO'])
    							 ->andWhere(['toko.ID'=>$b->id])
    							 ->andWhere(['katalog.KATEGORI_ID'=>'KT11'])
    							 ->count('KATALOG_ID');
    		$k12 = Katalog::find()->joinWith(['tOKO'])
    							 ->andWhere(['toko.ID'=>$b->id])
    							 ->andWhere(['katalog.KATEGORI_ID'=>'KT12'])
    							 ->count('KATALOG_ID');
    		$k13 = Katalog::find()->joinWith(['tOKO'])
    							 ->andWhere(['toko.ID'=>$b->id])
    							 ->andWhere(['katalog.KATEGORI_ID'=>'KT13'])
    							 ->count('KATALOG_ID');
    		$k14 = Katalog::find()->joinWith(['tOKO'])
    							 ->andWhere(['toko.ID'=>$b->id])
    							 ->andWhere(['katalog.KATEGORI_ID'=>'KT14'])
    							 ->count('KATALOG_ID');
    		$k15 = Katalog::find()->joinWith(['tOKO'])
    							 ->andWhere(['toko.ID'=>$b->id])
    							 ->andWhere(['katalog.KATEGORI_ID'=>'KT15'])
    							 ->count('KATALOG_ID');
    		$jml1+=$k11; 
    		$jml2+=$k12; 
    		$jml3+=$k13; 
    		$jml4+=$k14; 
    		$jml5+=$k15; 
    	}
        $kel = Kelompoktani::findOne($id);
    	$data =[$jml1,$jml2,$jml3,$jml4,$jml5];

    	return $this->render('detail',['data'=>$data,'kel'=>$kel]);
    }
}