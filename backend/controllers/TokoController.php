<?php

namespace backend\controllers;

use Yii;
use backend\models\Toko;
use backend\models\TokoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
Yii::$app->cache->flush();

/**
 * TokoController implements the CRUD actions for Toko model.
 */
class TokoController extends Controller
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
     * Lists all Toko models.
     * @return mixed
     */
    public function actionIndex()
    {
        //$role=Yii::$app->user->identity->getRoleName();
        $searchModel = new TokoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Toko model.
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
     * Creates a new Toko model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Toko();

        if ($model->load(Yii::$app->request->post())) {
            $model->TOKO_FOTO = UploadedFile::getInstance($model,'TOKO_FOTO');
            $ext = $model->TOKO_FOTO->extension;
            if($ext=='jpg'||$ext=='png'||$ext=='jpeg'){
                $imageName = $model->TOKO_ID;
                
                $model->TOKO_FOTO->saveAs('../../frontend/web/toko/'.$imageName.'.'.$model->TOKO_FOTO->extension);
                $model->TOKO_FOTO = $imageName.'.'.$model->TOKO_FOTO->extension;
                $model->save();
                return $this->redirect(['view', 'id' => $model->TOKO_ID]);
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
     * Updates an existing Toko model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $upload = UploadedFile::getInstance($model,'TOKO_FOTO');            
            $toko = Toko::findOne($id);
            if ($upload == NULL) {
                $model->TOKO_FOTO = $toko->TOKO_FOTO;
                $model->save();

            }else{
                try {
                    unlink($toko->TOKO_FOTO);
                } catch (\Exception $e) {
                    
                }

                $model->TOKO_FOTO = UploadedFile::getInstance($model,'TOKO_FOTO');
                $ext = $model->TOKO_FOTO->extension;
                if($ext=='jpg'||$ext=='png'||$ext=='jpeg'){ 
                    $imageName = $model->TOKO_ID;
                    $model->TOKO_FOTO->saveAs('../../frontend/web/toko/'.$imageName.'.'.$model->TOKO_FOTO->extension);
                    $model->TOKO_FOTO =$imageName.'.'.$model->TOKO_FOTO->extension;
                    $model->save();
                }else{
                    Yii::$app->getSession()->setFlash('warning', 'File Yang Di Upload Harus Format Gambar');
                    return $this->redirect(['update','id'=>$id]);
                }
            }
            return $this->redirect(['view', 'id' => $model->TOKO_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Toko model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        try {
            unlink('../../frontend/web/toko/'.$model->TOKO_FOTO);
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
     * Finds the Toko model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Toko the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Toko::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
