<?php

namespace backend\controllers;

use Yii;
use backend\models\Masterorder;
use backend\models\MasterorderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
Yii::$app->cache->flush();
/**
 * MasterorderController implements the CRUD actions for Masterorder model.
 */
class MasterorderController extends Controller
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
     * Lists all Masterorder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MasterorderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Masterorder model.
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
     * Creates a new Masterorder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Masterorder();

        if ($model->load(Yii::$app->request->post())) {
            $imageName = $model->ORDER_ID;
            $model->BUKTI = UploadedFile::getInstance($model,'BUKTI');
            $model->BUKTI->saveAs('bukti/'.$imageName.'.'.$model->BUKTI->extension);
            $model->BUKTI = 'bukti/'.$imageName.'.'.$model->BUKTI->extension;
            $model->save();
            return $this->redirect(['view', 'id' => $model->ORDER_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Masterorder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $upload = UploadedFile::getInstance($model,'BUKTI');
            
            $foto = Masterorder::find()->where(['ORDER_ID' => $id])->one();
            if ($upload == NULL) {
                $model->BUKTI = $foto->BUKTI;
                $model->save();
            }else{
                try {
                    unlink($foto->BUKTI);
                }catch (\Exception $e){
                }                
                $imageName = $model->ORDER_ID;
                $model->BUKTI = UploadedFile::getInstance($model,'BUKTI');
                $model->BUKTI->saveAs('bukti/'.$imageName.'.'.$model->BUKTI->extension);
                $model->BUKTI = 'bukti/'.$imageName.'.'.$model->BUKTI->extension;
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->ORDER_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Masterorder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $transaction = \Yii::$app->db->beginTransaction();
        try {
            $model->delete();
            $transaction->commit();
            return $this->redirect(['index']);
        }catch (\Exception $e){
            $transaction->rollBack();
            Yii::$app->getSession()->setFlash('warning', 'Data Gagal Di Hapus');
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Masterorder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Masterorder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Masterorder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
