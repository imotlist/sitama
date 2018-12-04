<?php

namespace frontend\controllers;
use Yii;
use backend\models\User;
use backend\models\Katalog;
use backend\models\Masterorder;
use backend\models\Detailorder;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class OrderController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $user = Yii::$app->user->identity->id;
        $morder = Masterorder::findOne($id);
        $dorder = Detailorder::findOne($id);

        if ($morder->load(Yii::$app->request->post())){
            $imageName = $morder->ORDER_ID;
            $morder->BUKTI = UploadedFile::getInstance($morder,'BUKTI');
            $morder->BUKTI->saveAs('../../backend/web/bukti/'.$imageName.'.'.$morder->BUKTI->extension);
            $morder->BUKTI = '../../backend/web/bukti/'.$imageName.'.'.$morder->BUKTI->extension;
            $morder->ORDER_STATUS = 5;
            $morder->save();
            return $this->redirect('index.php?r=user&id='.$user);
        }else{
            
            return $this->render('index',['morder'=>$morder,'dorder' => $dorder, ]);
        }

    }

    public function actionPesan($id){

        try{
            $uname = Yii::$app->user->identity->id;
        }catch(\Exception $e){
            $uname= NULL;
        }

        if ($uname) {

            $model = new Masterorder;
            $detail = new Detailorder;
            $katalog = Katalog::findOne($id);
            $user = User::findOne($uname);
            $kode = date('ymdhms');
            $kode = 'order'.$kode;
            //$angka = substr($kode, 14);
            $acak = rand(100,999);
            if ($model->load(Yii::$app->request->post()) && $detail->load(Yii::$app->request->post())) {
                $data = Yii::$app->request->post();
                if($detail->DETAILORDER_QTY <= $data['stok']){
                    $jml = $detail->DETAILORDER_JUMLAH + $acak;
                    $a = strlen($jml);
                    $no = $a - 3;
                    $ambil = substr($jml, $no);
                    $orderid = $model->ORDER_ID.$acak;
                    $model->ORDER_ID = $orderid;
                    

                    $model->ORDER_STATUS = 0;
                    // $now = date('Y-m-d h:m:s');
                    $model->ORDER_TGL_ADD = date('Y-m-d');
                    $model->ORDER_TGL_EXP = date('Y-m-d', strtotime('2 day'));
                    $detail->ORDER_ID = $orderid;
                    $detail->DETAILORDER_JUMLAH = $jml;
                    //echo $jml.'<br>'.$model->ORDER_ID;
                    $model->save();
                    $detail->save();
                    return $this->redirect(['index','id' => $model->ORDER_ID]);
                }else{
                    Yii::$app->getSession()->setFlash('info', 'Stok Barang Kurang');
                return $this->redirect(['order/pesan','id'=>$id]);
                }
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'katalog' => $katalog,
                    'detail' => $detail,
                    'user' => $user,
                    'idorder' =>$kode,
                    //'angka' => $angka,
                ]);
            }
        }else{
            Yii::$app->getSession()->setFlash('info', 'Login Terlebih Dahulu');
            return $this->redirect(['site/login']);
        }

    }



}
