<?php

namespace backend\controllers;

use Yii;
use backend\models\Detailorder;
use backend\models\DetailorderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
Yii::$app->cache->flush();

/**
 * DetailorderController implements the CRUD actions for Detailorder model.
 */
class DetailorderController extends Controller
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
     * Lists all Detailorder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DetailorderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Detailorder model.
     * @param string $ORDER_ID
     * @param integer $KATALOG_ID
     * @param integer $DETAILORDER_ID
     * @return mixed
     */
    public function actionView($ORDER_ID, $KATALOG_ID, $DETAILORDER_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ORDER_ID, $KATALOG_ID, $DETAILORDER_ID),
        ]);
    }

    /**
     * Creates a new Detailorder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Detailorder();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ORDER_ID' => $model->ORDER_ID, 'KATALOG_ID' => $model->KATALOG_ID, 'DETAILORDER_ID' => $model->DETAILORDER_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Detailorder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $ORDER_ID
     * @param integer $KATALOG_ID
     * @param integer $DETAILORDER_ID
     * @return mixed
     */
    public function actionUpdate($ORDER_ID, $KATALOG_ID, $DETAILORDER_ID)
    {
        $model = $this->findModel($ORDER_ID, $KATALOG_ID, $DETAILORDER_ID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ORDER_ID' => $model->ORDER_ID, 'KATALOG_ID' => $model->KATALOG_ID, 'DETAILORDER_ID' => $model->DETAILORDER_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Detailorder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $ORDER_ID
     * @param integer $KATALOG_ID
     * @param integer $DETAILORDER_ID
     * @return mixed
     */
    public function actionDelete($ORDER_ID, $KATALOG_ID, $DETAILORDER_ID)
    {
        $this->findModel($ORDER_ID, $KATALOG_ID, $DETAILORDER_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Detailorder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $ORDER_ID
     * @param integer $KATALOG_ID
     * @param integer $DETAILORDER_ID
     * @return Detailorder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ORDER_ID, $KATALOG_ID, $DETAILORDER_ID)
    {
        if (($model = Detailorder::findOne(['ORDER_ID' => $ORDER_ID, 'KATALOG_ID' => $KATALOG_ID, 'DETAILORDER_ID' => $DETAILORDER_ID])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
