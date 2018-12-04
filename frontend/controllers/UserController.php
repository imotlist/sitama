<?php
namespace frontend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserSearch;
use backend\models\Katalog;
use backend\models\KatalogSearch;
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

class UserController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $uid = Yii::$app->user->identity->ID;
        if($id != $uid){
            return $this->render('/site/page404');
        }else{
            $user = User::findOne($id);
            $tani = Kelompoktani::findOne($user->KELOMPOKTANI_ID);
            $toko = Toko::find()->where(['ID'=> $id])->one();
            $pembelian = Masterorder::find()->where(['ID'=> $id])->all();
            $stat = $toko['TOKO_ID'];
            $baru = new Katalog();

            $searchModel = new KatalogSearch();
            $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

            if ($stat) {
                //$katalog = Katalog::find()->where(['TOKO_ID' => $toko->TOKO_ID])->all();
                

                $query = Katalog::find()->where(['TOKO_ID' => $toko->TOKO_ID])->orderBy(['KATALOG_TGL_POST'=>SORT_DESC]);
                $countQuery = clone $query;
                $pages = new Pagination(['totalCount' => $countQuery->count(),  'defaultPageSize' => 20]);
                $model = $query->offset($pages->offset)->limit($pages->limit)->all();
                return $this->render('index',['katalog' => $model,'user'=>$user,'toko'=>$toko,'tani'=>$tani,'pembelian'=>$pembelian,'baru'=>$baru,'pages'=>$pages,'searchModel' => $searchModel,'dataProvider' => $dataProvider,]);
            }else{
                return $this->render('index',['katalog' => NULL,'user'=>$user,'toko'=>$toko,'tani'=>$tani,'pages'=>NULL,'searchModel' => $searchModel,'dataProvider' => $dataProvider,]);
            }
        }
        
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $uid = Yii::$app->user->identity->ID;
        if($id != $uid){
            return $this->render('/site/page404');
        }else{
            $model = User::findOne($id);

            if ($model->load(Yii::$app->request->post())) {
                $upload = UploadedFile::getInstance($model,'USER_FOTO');
                //ProsentaseNilai::find()->where(['ID_PROSENTASE' => $kd_rumus]) -> one();
                $foto = User::find()->where(['id' => $id])->one();
                if ($upload == NULL) {
                    $model->USER_FOTO = $foto->USER_FOTO;
                    $model->save();
                }else{
                    try{
                        unlink('../../frontend/web/foto/'.$foto->USER_FOTO);
                    }catch (\Exception $e){
                        //Yii::$app->getSession()->setFlash('warning', 'Foto gagal di hapus');
                    }
                    $model->USER_FOTO = UploadedFile::getInstance($model,'USER_FOTO');
                    $ext = $model->USER_FOTO->extension;
                    if($ext=='jpg'||$ext=='png'||$ext=='jpeg'){    
                        $imageName = $model->username;
                        $model->USER_FOTO = UploadedFile::getInstance($model,'USER_FOTO');
                        $model->USER_FOTO->saveAs('../../frontend/web/foto/'.$imageName.'.'.$model->USER_FOTO->extension);
                        $model->USER_FOTO = $imageName.'.'.$model->USER_FOTO->extension;
                        $model->save();
                        return $this->redirect(['index', 'id' => $model->id]);
                    }else{
                        Yii::$app->getSession()->setFlash('warning', '<b style="color:#000">Foto Bukan Format Gambar</b>');
                        return $this->redirect(['update','id'=>$id]);
                    }
                }            
                return $this->redirect(['index', 'id' => $model->id]);
                
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    public function actionKonbeli(){
        $pembelian = new Masterorder();
        $user = Yii::$app->user->identity->id;

        if ($pembelian->load(Yii::$app->request->post())) {
            $konfirm = Masterorder::findOne($pembelian->ORDER_ID);
            $konfirm->ORDER_STATUS = 5;
            $imageName = $pembelian->ORDER_ID;
            $konfirm->BUKTI = UploadedFile::getInstance($konfirm,'BUKTI');
            $konfirm->BUKTI->saveAs('../../backend/web/bukti/'.$imageName.'.'.$konfirm->BUKTI->extension);
            $konfirm->BUKTI = $imageName.'.'.$konfirm->BUKTI->extension;
            $konfirm->save();
            return $this->redirect(['user/index/'.$user]);
        }

    }

    public function actionKonjual(){
        
        $order = new Masterorder();
        $user = Yii::$app->user->identity->id;
        if ($order->load(Yii::$app->request->post())) {
            // echo $order->ORDER_ID."<br>";
            // echo $order->ORDER_STATUS."<br>";
            $konfirm = Masterorder::findOne($order->ORDER_ID);
            $konfirm->ORDER_STATUS = $order->ORDER_STATUS;
            $konfirm->save();
            return $this->redirect(['index', 'id' => $user]);
        }else{
            echo "string";
        }
    }

    public function actionGantipass($id){
        $data = Yii::$app->request->post();
        $pass = $data['pass1'];
        $user = User::findOne($id);
        $user->setPassword($pass);
        $user->generateAuthKey();
        $user->save();
        Yii::$app->getSession()->setFlash('info', 'Password Berhasil Diubah');
        return $this->redirect(['update','id'=>$id]);
    }

    
}
