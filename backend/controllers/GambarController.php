<?php

namespace backend\controllers;

use Yii;
use backend\models\Gambar;
use backend\models\GambarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
Yii::$app->cache->flush();
/**
 * GambarController implements the CRUD actions for Gambar model.
 */
class GambarController extends Controller
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
     * Lists all Gambar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GambarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gambar model.
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
     * Creates a new Gambar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Gambar();

        if ($model->load(Yii::$app->request->post())) {
            $imageName = $model->gambar_nama;
            $model->gambar_file = UploadedFile::getInstance($model,'gambar_file');
            $model->gambar_file->saveAs('../../frontend/web/site-img/'.$imageName.'.'.$model->gambar_file->extension);
            $model->gambar_file = '../../frontend/web/site-img/'.$imageName.'.jpg';
            $model->save();
            return $this->redirect(['view', 'id' => $model->gambar_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Gambar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $upload = UploadedFile::getInstance($model,'gambar_file');
            
            $gambar = Gambar::findOne($id);
            if ($upload == NULL) {
                $model->gambar_file = $gambar->gambar_file;
                $model->save();

            }else{
                try {
                    unlink($gambar->gambar_file);
                } catch (\Exception $e) {
                    
                }
                
                $imageName = $model->gambar_nama;
                $model->gambar_file = UploadedFile::getInstance($model,'gambar_file');
                $model->gambar_file->saveAs('../../frontend/web/site-img/'.$imageName.'.'.$model->gambar_file->extension);
                $model->gambar_file = '../../frontend/web/site-img/'.$imageName.'.jpg';
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->gambar_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Gambar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        try {
            unlink('../../frontend/web/site-img/'.$model->gambar_file);
            
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
     * Finds the Gambar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Gambar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gambar::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
