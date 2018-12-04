<?php

namespace backend\controllers;

use Yii;
use backend\models\Berita;
use backend\models\BeritaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
Yii::$app->cache->flush();

/**
 * BeritaController implements the CRUD actions for Berita model.
 */
class BeritaController extends Controller
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
     * Lists all Berita models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BeritaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Berita model.
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
     * Creates a new Berita model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Berita();
        if ($model->load(Yii::$app->request->post())) {
            
            $link = str_replace(' ','-',$model->berita_judul);
            $link = strtolower($link);
            $link = $link.'.html';

            $nm2 = $model->berita_judul;
            $nm3 = date('Ymd');
            $string = $nm2.$nm3;
            $imageName = str_replace(' ','_', $string);
            $model->berita_gambar = UploadedFile::getInstance($model,'berita_gambar');
            $model->berita_gambar->saveAs('../../frontend/web/berita/'.$imageName.'.'.$model->berita_gambar->extension);
            $model->berita_gambar = $imageName.'.'.$model->berita_gambar->extension;
            $model->berita_link = $link;
            $model->save();
            return $this->redirect(['view', 'id' => $model->berita_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Berita model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $upload = UploadedFile::getInstance($model,'berita_gambar');
            $link = str_replace(' ','-',$model->berita_judul);
            $link = strtolower($link);
            $link = $link.'.html';
            $katalog = Berita::findOne($id);
            if ($upload == NULL) {
                $model->berita_gambar = $katalog->berita_gambar;
                $model->berita_link = $link;
                $model->save();

            }else{
                try {
                    unlink($katalog->berita_gambar);
                }catch (\Exception $e){
                }
                $nm2 = $model->berita_judul;
                $nm3 = date('Ymd');
                $string = $nm2.$nm3;
                $imageName = str_replace(' ','_', $string);   
                $model->berita_gambar = UploadedFile::getInstance($model,'berita_gambar');
                $model->berita_gambar->saveAs('../../frontend/web/berita/'.$imageName.'.'.$model->berita_gambar->extension);
                $model->berita_gambar = $imageName.'.'.$model->berita_gambar->extension;
                $model->berita_link = $link;
                $model->save();
            }
            
            return $this->redirect(['view', 'id' => $model->berita_id]);
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Berita model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $model = $this->findModel($id);
        try {
            unlink('../../frontend/web/berita/'.$model->berita_gambar);
            $model->delete();
        } catch (\Exception $e) {
            $model->delete();
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Berita model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Berita the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Berita::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
