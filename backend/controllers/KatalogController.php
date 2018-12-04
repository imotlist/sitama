<?php

namespace backend\controllers;

use Yii;
use backend\models\Katalog;
use backend\models\KatalogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
Yii::$app->cache->flush();
/**
 * KatalogController implements the CRUD actions for Katalog model.
 */
class KatalogController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Katalog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KatalogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Katalog model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Katalog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Katalog();

        if ($model->load(Yii::$app->request->post())) {
            $model->GAMBAR = UploadedFile::getInstance($model,'GAMBAR');
            $ext = $model->GAMBAR->extension;
            if($ext=='jpg'||$ext=='png'||$ext=='jpeg'){
                $nm1 = $model->TOKO_ID;
                $nm2 = $model->KATALOG_JUDUL;
                $nm3 = "katalog".$nm1;
                $imageName = $nm1.$nm2.$nm3;
                
                $model->GAMBAR->saveAs('../../frontend/web/katalog/'.$imageName.'.'.$model->GAMBAR->extension);
                $model->GAMBAR = $imageName.'.'.$model->GAMBAR->extension;
                $model->save();
                return $this->redirect(['view', 'id' => $model->KATALOG_ID]);
            }else{
                Yii::$app->getSession()->setFlash('warning', 'File Yang Di Upload Harus Format Gambar');
                return $this->redirect(['create']);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Katalog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $upload = UploadedFile::getInstance($model,'GAMBAR');
            
            $katalog = Katalog::findOne($id);
            if ($upload == NULL) {
                $model->GAMBAR = $katalog->GAMBAR;
                $model->save();

            }else{
                try {
                    
                unlink($katalog->GAMBAR);
                } catch (\Exception $e) {
                    
                }
                $model->GAMBAR = UploadedFile::getInstance($model,'GAMBAR');
                $ext = $model->GAMBAR->extension;
                if($ext=='jpg'||$ext=='png'||$ext=='jpeg'){    
                    $nm1 = $model->TOKO_ID;
                    $nm2 = $model->KATALOG_JUDUL;
                    $nm3 = "katalog".$nm1;
                    $imageName = $nm1.$nm2.$nm3;     
                    
                    $model->GAMBAR->saveAs('../../frontend/web/katalog/'.$imageName.'.'.$model->GAMBAR->extension);
                    $model->GAMBAR = $imageName.'.'.$model->GAMBAR->extension;
                    $model->save();
                }else{
                    Yii::$app->getSession()->setFlash('warning', 'File Yang Di Upload Harus Format Gambar');
                    return $this->redirect(['update','id'=>$id]);
                }
            }
            
            return $this->redirect(['view', 'id' => $model->KATALOG_ID]);
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Katalog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        try {
            unlink('../../frontend/web/katalog/'.$model->GAMBAR);
        } catch (\Exception $e) {
        }


        try {
            $model->delete();
            return $this->redirect(['index']);
        }catch (\Exception $e){
            Yii::$app->getSession()->setFlash('warning', 'Data Gagal Di Hapus');
            return $this->redirect(['index']);
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Katalog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Katalog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Katalog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
