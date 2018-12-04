<?php
namespace frontend\controllers;

use Yii;
use backend\models\Tokodepan;
use backend\models\Toko;
use backend\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class TokoController extends \yii\web\Controller
{

    /**
     * Updates an existing Toko model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tokodepan();
        $user = Yii::$app->user->identity->id;
        $user_id = User::findOne($user);
        $cari = Toko::find()->orderBy(['TOKO_ID'=>SORT_DESC])->limit(1)->one();
        $t_id = $cari->TOKO_ID;
        $pecah = substr($t_id, 4);
        $konvert = intval($pecah) + 1 ; 
        $kode = 'TOKO'.$konvert;
        if ($model->load(Yii::$app->request->post())) {
            $upload = UploadedFile::getInstance($model,'TOKO_FOTO');            
            //$toko = Toko::findOne($id);
            if ($upload == NULL) {                
                $model->TOKO_ID = $kode;
                $model->ID = $user;
                $model->TOKO_STATUS = 10;
                //$model->TOKO_FOTO = $toko->TOKO_FOTO;
                $model->save();

            }else{
                $imageName = $kode;     
                $model->TOKO_ID = $kode;
                $model->ID = $user;
                $model->TOKO_STATUS = 10;
                $model->TOKO_FOTO = UploadedFile::getInstance($model,'TOKO_FOTO');
                $model->TOKO_FOTO->saveAs('../../frontend/web/toko/'.$imageName.'.'.$model->TOKO_FOTO->extension);
                $model->TOKO_FOTO = $imageName.'.'.$model->TOKO_FOTO->extension;
                $model->save();
            }
            return $this->redirect(['user/index', 'id' => $user_id->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'kode' => $kode,
                'user' => $user,
            ]);
        }
    }


	/**
     * Updates an existing Toko model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $uid = Yii::$app->user->identity->ID;
        $a = Toko::find()->where(['ID'=>$uid])->one();
        if($id != $a->TOKO_ID){
            return $this->render('/site/page404');
        }else{
            $model = Toko::findOne($id);
            $user = Yii::$app->user->identity->id;
            $user_id = User::findOne($user);
            if ($model->load(Yii::$app->request->post())) {
                $upload = UploadedFile::getInstance($model,'TOKO_FOTO');            
                $toko = Toko::findOne($id);
                if ($upload == NULL) {
                    $model->TOKO_FOTO = $toko->TOKO_FOTO;
                    $model->save();

                }else{
                    try{
                        unlink($toko->TOKO_FOTO);
                    }catch (\Exception $e){
                    }
                    $imageName = $model->TOKO_ID;     
                    $model->TOKO_FOTO = UploadedFile::getInstance($model,'TOKO_FOTO');
                    $model->TOKO_FOTO->saveAs('../../frontend/web/toko/'.$imageName.'.'.$model->TOKO_FOTO->extension);
                    $model->TOKO_FOTO = $imageName.'.'.$model->TOKO_FOTO->extension;
                    $model->save();
                }
                return $this->redirect(['user/index', 'id' => $user_id->ID]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

}