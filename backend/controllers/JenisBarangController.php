<?php

namespace backend\controllers;

use Yii;
use backend\models\JenisBarang;
use backend\models\JenisBarangSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
Yii::$app->cache->flush();
/**
 * JenisBarangController implements the CRUD actions for JenisBarang model.
 */
class JenisBarangController extends Controller
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

            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index','create','update','view','delete'],
                        'allow' => false,
                        'roles' => ['KetuaRole'],
                    ],
                    [
                        'actions' => ['index','create','update','view','delete'],
                        'allow' => true,
                        'roles' => ['SuperAdminRole'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all JenisBarang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JenisBarangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JenisBarang model.
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
     * Creates a new JenisBarang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new JenisBarang();
        
        if ($model->load(Yii::$app->request->post())) {
            $id = JenisBarang::findOne($model->JENIS_BARANG_ID);
            if ($id) {
                Yii::$app->getSession()->setFlash('warning', 'ID Sudah Digunakan');
                return $this->render('create', [
                'model' => $model,
            ]);
            }else{
                $model->save();
                return $this->redirect(['view', 'id' => $model->JENIS_BARANG_ID]);    
            }         

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing JenisBarang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->JENIS_BARANG_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing JenisBarang model.
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
     * Finds the JenisBarang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return JenisBarang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JenisBarang::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
