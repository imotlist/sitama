<?php

namespace backend\controllers;

use Yii;
use backend\models\Testimoni;
use backend\models\TestimoniSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
Yii::$app->cache->flush();

/**
 * TestimoniController implements the CRUD actions for Testimoni model.
 */
class TestimoniController extends Controller
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
     * Lists all Testimoni models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TestimoniSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Testimoni model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Testimoni model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Testimoni();

         if ($model->load(Yii::$app->request->post())) {
            $nm2 = $model->testi_nama;
            $nm3 = "testi".$nm2;
            $imageName = $nm3;
            $model->testi_gambar = UploadedFile::getInstance($model,'testi_gambar');
            $model->testi_gambar->saveAs('../../backend/web/testimoni/'.$imageName.'.'.$model->testi_gambar->extension);
            $model->testi_gambar = '../../backend/web/testimoni/'.$imageName.'.'.$model->testi_gambar->extension;
            $model->save();
            return $this->redirect(['view', 'id' => $model->testi_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Testimoni model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $upload = UploadedFile::getInstance($model,'testi_gambar');            
            $testi = Testimoni::findOne($id);
            if ($upload == NULL) {
                $model->testi_gambar = $testi->testi_gambar;
                $model->save();

            }else{
                try {
                    unlink($testi->testi_gambar);
                } catch (\Exception $e) {
                    
                }                

                $nm2 = $model->testi_nama;
                $nm3 = "testi".$nm2;
                $imageName = $nm3;
                $model->testi_gambar = UploadedFile::getInstance($model,'testi_gambar');
                $model->testi_gambar->saveAs('../../backend/web/testimoni/'.$imageName.'.'.$model->testi_gambar->extension);
                $model->testi_gambar = '../../backend/web/testimoni/'.$imageName.'.'.$model->testi_gambar->extension;
                $model->save();
            }
            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Testimoni model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        try {
            unlink('../../backend/web/testimoni/'.$model->testi_gambar);
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
     * Finds the Testimoni model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Testimoni the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Testimoni::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
