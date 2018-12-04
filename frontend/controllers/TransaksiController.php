<?php
namespace frontend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserSearch;
use backend\models\Katalog;
use backend\models\Toko;
use backend\models\Kelompoktani;
use backend\models\Masterorder;
use backend\models\Detailorder;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\Pagination;
use Mpdf\Mpdf;
use kartik\mpdf\Pdf;

class TransaksiController extends \yii\web\Controller
{


    public function actionIndex()
    {
        $user = Yii::$app->user->identity->id;
        $query = Masterorder::find()->joinWith('detailorders')
                                        ->andWhere(['ID'=>$user]);

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),  'defaultPageSize' => 15]);
        $pembelian = $query->offset($pages->offset)->limit($pages->limit)->all(); 

        return $this->render('pembelian',['pembelian'=>$pembelian,'pages'=>$pages,]);        

    }

    public function actionPenjualan($id)
    {
        $uid = Yii::$app->user->identity->id;
        if($uid == $id){
        $toko = Toko::find()->where(['ID'=>$id])->one();
        $query = Detailorder::find()->joinWith('kATALOG')
                                    ->andWhere(['kATALOG.TOKO_ID'=>$toko->TOKO_ID]);
                                    

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),  'defaultPageSize' => 15]);
        $penjualan = $query->offset($pages->offset)->limit($pages->limit)->all(); 

        return $this->render('penjualan',['penjualan'=>$penjualan,'pages'=>$pages,]);
        }else{
            return $this->render('/site/page404');
        }

    }

    public function actionKonbeli($id)
    {   
        $pem = new Masterorder();
        if ($pem->load(Yii::$app->request->post())) {
            $konfirm = Masterorder::findOne($id);
            $d = Detailorder::findOne($id);
            $brg = Katalog::findOne($d->KATALOG_ID);
            $brg->STOK -= $d->DETAILORDER_QTY;
            $brg->save();
            $konfirm->ORDER_STATUS = 5;
            $imageName = $konfirm->ORDER_ID;
            $konfirm->BUKTI = UploadedFile::getInstance($konfirm,'BUKTI');
            $konfirm->BUKTI->saveAs('../../backend/web/bukti/'.$imageName.'.'.$konfirm->BUKTI->extension);
            $konfirm->BUKTI = $imageName.'.'.$konfirm->BUKTI->extension;

            $konfirm->save();
            return $this->redirect(['transaksi/index']);
        }
    }

    public function actionKonjual($id)
    {   
        $post_var = Yii::$app->request->post('Masterorder');
        $status = $post_var['ORDER_STATUS'];
        $user = Yii::$app->user->identity->ID;

        $konfirm = Masterorder::findOne($id);
        $konfirm->ORDER_STATUS = $status;
        $konfirm->save();
        return $this->redirect(['transaksi/penjualan/'.$user]);
        
    }

    public function actionCetakpembelian($id){

        $query = Masterorder::find()->joinWith('detailorders')
                                        ->andWhere(['ID'=>$id])->all();

        $content = $this->renderPartial('cetakpembelian', [
            'pembelian' => $query,
        ]);

        $pdf = new Pdf([
            'mode'=>Pdf::MODE_UTF8,
            'format'=>Pdf::FORMAT_FOLIO,
            'orientation'=>Pdf::ORIENT_PORTRAIT,
            'destination'=>Pdf::DEST_BROWSER,
            'content'=>$content,
            'marginTop'=>10,
            'marginLeft'=>10,
            'marginBottom'=>10,
            'marginRight'=>10,
            'filename'=>'Laporan_Pembelian',
            'options'=>['title' => 'Cetak'],
        ]);
        return $pdf->render();
    }

    public function actionCetakpenjualan($id){

        $toko = Toko::find()->where(['ID'=>$id])->one();
        $query = Detailorder::find()->joinWith('kATALOG')
                                    ->andWhere(['kATALOG.TOKO_ID'=>$toko->TOKO_ID])->all();

        $content = $this->renderPartial('cetakpenjualan', [
            'penjualan' => $query,
        ]);

        $pdf = new Pdf([
            'mode'=>Pdf::MODE_UTF8,
            'format'=>Pdf::FORMAT_FOLIO,
            'orientation'=>Pdf::ORIENT_PORTRAIT,
            'destination'=>Pdf::DEST_BROWSER,
            'content'=>$content,
            'marginTop'=>10,
            'marginLeft'=>10,
            'marginBottom'=>10,
            'marginRight'=>10,
            'filename'=>'Laporan_Penjualan',
            'options'=>['title' => 'Cetak'],
        ]);
        return $pdf->render();        


    }

    public function actionCetakbarang($id){

        $toko = Toko::find()->where(['ID'=> $id])->one();
        $katalog = Katalog::find()->where(['TOKO_ID' => $toko->TOKO_ID])
                                ->orderBy(['KATALOG_TGL_POST'=>SORT_DESC])
                                ->all();

        $content = $this->renderPartial('cetakbarang', [
            'katalog' => $katalog,
        ]);

        $pdf = new Pdf([
            'mode'=>Pdf::MODE_UTF8,
            'format'=>Pdf::FORMAT_FOLIO,
            'orientation'=>Pdf::ORIENT_PORTRAIT,
            'destination'=>Pdf::DEST_BROWSER,
            'content'=>$content,
            'marginTop'=>10,
            'marginLeft'=>10,
            'marginBottom'=>10,
            'marginRight'=>10,
            'filename'=>'Laporan_Barang',
            'options'=>['title' => 'Cetak'],
        ]);
        return $pdf->render();
    }

}
