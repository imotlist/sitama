<?php

namespace frontend\controllers;
use Yii;
use backend\models\Katalog;
use backend\models\Toko;
use backend\models\KatalogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class KatalogController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDetail($id){
        try{
            $find = Katalog::findOne($id);
            try{
                $uid = Yii::$app->user->identity->id;
                $model = Katalog::findOne($id);
                $utoko = Toko::find()->where(['ID'=>$uid])->one();
                return $this->render('detail', [
                    'model' => $model,
                    'utoko' => $utoko,

                ]);
            }catch (\Exception $e){
                $model = Katalog::findOne($id);
                return $this->render('detail', [
                    'model' => $model,
                    'utoko'=> NULL,
                ]);
            }
        }catch (\Exception $e){
            return $this->render('/site/page404');
        }
        

    	
    }

    /**
     * Creates a new Katalog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $baru = new Katalog();
        $toko = Toko::findOne($id);
        $user = Yii::$app->user->identity->id;        
        if ($baru->load(Yii::$app->request->post())) {

            $query = Katalog::find()->andWhere(['TOKO_ID'=>$toko->TOKO_ID])
                                    ->andFilterWhere(['OR',
                                                    ['LIKE', 'KATALOG_JUDUL', $baru->KATALOG_BARANG],
                                                    ])->count();
            if($query > 0){
                $text = '<p style="color: #000">Ada barang dengan nama yang sama telah di post, Tambah data dibatalkan</p>';
                Yii::$app->getSession()->setFlash('danger', $text);
                return $this->redirect(['user/index/'.$user]);
            }else{
                $nm1 = $baru->TOKO_ID;
                $nm2 = $baru->KATALOG_JUDUL;
                $nm3 = "katalog".$nm1;
                $imageName = $nm1.$nm2.$nm3;
                $baru->GAMBAR = UploadedFile::getInstance($baru,'GAMBAR');
                $baru->GAMBAR->saveAs('../../frontend/web/katalog/'.$imageName.'.'.$baru->GAMBAR->extension);
                $baru->GAMBAR = $imageName.'.'.$baru->GAMBAR->extension;
                $baru->save();
                return $this->redirect(['user/index/'.$user]);
            }
            Yii::$app->getSession()->setFlash('warning', 'Data Gagal Di Simpan');
            return $this->redirect(['user/index/'.$user]);
        }
    }


    /**
     * Updates an existing Katalog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id,$tid)
    {
       // $model = Katalog::findOne($id);
        //$toko = Toko::findOne($tid);
        $model = Katalog::find()->where(['KATALOG_ID'=>$id,'TOKO_ID'=>$tid])->one();
        $user = Yii::$app->user->identity->id;
        if($model == NULL){
            return $this->render('/site/page404');
        }else{
            if ($model->load(Yii::$app->request->post())) {
                $upload = UploadedFile::getInstance($model,'GAMBAR');
                
                $katalog = Katalog::findOne($id);
                if ($upload == NULL) {
                    $model->GAMBAR = $katalog->GAMBAR;
                    $model->save();

                }else{
                    unlink($katalog->GAMBAR);
                    $nm1 = $model->TOKO_ID;
                    $nm2 = $model->KATALOG_JUDUL;
                    $nm3 = "katalog".$nm1;
                    $imageName = $nm1.$nm2.$nm3;     
                    $model->GAMBAR = UploadedFile::getInstance($model,'GAMBAR');
                    $model->GAMBAR->saveAs('../../frontend/web/katalog/'.$imageName.'.'.$model->GAMBAR->extension);
                    $model->GAMBAR = '../../frontend/web/katalog/'.$imageName.'.'.$model->GAMBAR->extension;
                    $model->save();
                }
                
                 return $this->redirect(['user/index/'.$user]);
                
            } else {
                return $this->render('update', [
                    'model' => $model,
                    'toko' => NULL,
                ]);
            }
        }

    }


    /**
     * Creates a new Katalog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionDelete($id){
        $model = Katalog::findOne($id);
        $user = Yii::$app->user->identity->id;
        try{
            unlink('../../frontend/web/katalog/'.$model->GAMBAR);
            $model->delete();
        }catch(\Exception $e){
            Yii::$app->getSession()->setFlash('warning', 'Data Gagal Di Hapus');
            return $this->redirect(['user/index/'.$user]);
        }
        return $this->redirect(['user/index/'.$user]);
    }

}
