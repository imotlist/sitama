<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\AuthAssignment;
use backend\models\Toko;
use backend\models\User;
use backend\models\UserSearch;
use yii\web\UploadedFile;
Yii::$app->cache->flush();
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        
        if ($model->load(Yii::$app->request->post())) {
            $model->USER_FOTO = UploadedFile::getInstance($model,'USER_FOTO');
            $ext = $model->USER_FOTO->extension;
            if($ext=='jpg'||$ext=='png'||$ext=='jpeg'){
                $imageName = $model->username;
                
                $model->USER_FOTO->saveAs('../../frontend/web/foto/'.$imageName.'.'.$model->USER_FOTO->extension);
                $model->USER_FOTO = $imageName.'.'.$model->USER_FOTO->extension;
                $model->setPassword($model->password_hash);
                $model->generateAuthKey();
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                Yii::$app->getSession()->setFlash('warning', 'Foto Bukan Format Gambar');
                return $this->redirect(['create']);
            }            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $upload = UploadedFile::getInstance($model,'USER_FOTO');
            //ProsentaseNilai::find()->where(['ID_PROSENTASE' => $kd_rumus]) -> one();
            $foto = User::find()->where(['id' => $id])->one();
            if ($upload == NULL) {
                $model->USER_FOTO = $foto->USER_FOTO;
                $model->save();
            }else{
                try {
                    unlink($foto->USER_FOTO);
                }catch (\Exception $e){
                }   
                    $model->USER_FOTO = UploadedFile::getInstance($model,'USER_FOTO');
                    $ext = $model->USER_FOTO->extension;
                    if($ext=='jpg'||$ext=='png'||$ext=='jpeg'){                
                        $imageName = $model->username;
                        
                        $model->USER_FOTO->saveAs('../../frontend/web/foto/'.$imageName.'.'.$model->USER_FOTO->extension);
                        $model->USER_FOTO = $imageName.'.'.$model->USER_FOTO->extension;
                        $model->save();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }else{
                        Yii::$app->getSession()->setFlash('warning', 'Foto Bukan Format Gambar');
                        return $this->redirect(['update','id'=>$id]);
                    }

            }
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        try {
            unlink('../../frontend/web/foto/'.$model->USER_FOTO);
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionConfirm($id)
    {
        $auth = new AuthAssignment();
        $model = User::findOne($id);
        $model->status=10;
        $model->save();

        try {
            $auth->item_name = 'UserRole';
            $auth->user_id = $id;
            $auth->save();

            $cari = Toko::find()->orderBy(['TOKO_ID'=>SORT_DESC])->limit(1)->one();
            $t_id = $cari->TOKO_ID;
            $pecah = substr($t_id, 4);
            $konvert = intval($pecah) + 1 ; 
            $kode = 'TOKO'.$konvert;
            $toko = new Toko();
            $toko->TOKO_ID = $kode;
            $toko->ID = $id;
            $toko->TOKO_NAMA ='Isi Nama Toko';
            $toko->TOKO_ALAMAT ='Isi Alamat Toko';
            $toko->TOKO_TELP ='Isi No Telp Toko';
            $toko->TOKO_DISKRIPSI ='Diskripsi Toko Anda';
            $toko->TOKO_STATUS = 10;
            $toko->NO_REK = 'Isikan No Rekening Aktif Anda';
            $toko->ATAS_NAMA = 'Atas Nama Dari No Rekening';
            $toko->NAMA_BANK = 'Nama Bank No Rekening';
            $toko->save();
        } catch (\Exception $e) {
                
        }

        //kirim email notif
        // Yii::$app->mailer->compose('contact/html')
        //  ->setFrom('imotlist@gmail.com')
        //  ->setTo('tommynurchomsah@gmail.com')
        //  ->setSubject('pendaftaran berhasil')
        //  ->send();

         // Yii::$app->mailer->compose()
         //        ->setFrom('imotlist@gmail.com')
         //        ->setTo('tommynurchomsah@gmail.com')
         //        ->setSubject('notifikasi')
         //        ->setHtmlBody('berhasil')
         //        ->send();

        

        return $this->redirect(['index']);
        
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGantipw($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
                $model->setPassword($model->password_hash);
                $model->generateAuthKey();
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('gantipw', [
                'model' => $model,
            ]);
        }
    }
}
