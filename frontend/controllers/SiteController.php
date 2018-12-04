<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use backend\models\Katalog;
use backend\models\Kategori;
use backend\models\Kelompoktani;
use backend\models\Berita;
use backend\models\Gambar;
use backend\models\Testimoni;
use yii\data\Pagination;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
                
            $judul = 'Produk Terbaru';
            $query = Katalog::find()->where(['KATALOG_STATUS' => 10])->orderBy(['KATALOG_TGL_POST'=>SORT_DESC]);
            $testi = Testimoni::find()->orderBy(['testi_id'=>SORT_DESC])->limit(3)->all();        
            $countQuery = clone $query;
            $pages = new Pagination(['totalCount' => $countQuery->count(),  'defaultPageSize' => 9]);
            $model = $query->offset($pages->offset)->limit($pages->limit)->all();
            //$model = Katalog::find()->orderBy(['KATALOG_TGL_POST'=>SORT_DESC])->limit(5)->all();
            $model2 = Kategori::find()->all();
            
            $model4 = Berita::find()->all();
            $gambar = Gambar::find()->all();
            $cari = new Katalog();
            return $this->render('index', [
                'pages' => $pages,
                'model' => $model,
                'kategori' => $model2,
                
                'berita' => $model4,
                'judul' => $judul,
                'testi' => $testi,
                'gambar' => $gambar,
                'cari' => $cari,
            ]);
        
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionCari()
    {
        $post_var = Yii::$app->request->post('Katalog');
        $cari = $post_var['KATALOG_JUDUL'];
        $query = Katalog::find()->joinWith('kATEGORI')
                                    ->joinWith('tOKO')
                                    ->where(['Katalog.KATALOG_STATUS' => 10])
                                    ->andFilterWhere(['OR',
                                                    ['LIKE', 'Katalog.KATALOG_JUDUL', $cari],
                                                    ['LIKE', 'Katalog.KATALOG_BARANG', $cari],
                                                    ['LIKE', 'kATEGORI.KATEGORI_NAMA', $cari],
                                                    ['LIKE', 'tOKO.TOKO_NAMA', $cari],
                                                    ])
                                    ->orderBy(['KATALOG_TGL_POST'=>SORT_DESC]);
        $testi = Testimoni::find()->orderBy(['testi_id'=>SORT_DESC])->limit(2)->all();        
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),  'defaultPageSize' => 9]);
        $model = $query->offset($pages->offset)->limit($pages->limit)->all();
        $model2 = Kategori::find()->all();
        $model3 = Kelompoktani::find()->all();
        $model4 = Berita::find()->all();
        $gambar = Gambar::find()->all();
        $cari = new Katalog();
        $judul = 'Hasil Pencarian';
        return $this->render('index', [
                'pages' => $pages,
                'model' => $model,
                'kategori' => $model2,
                'tani' => $model3,
                'berita' => $model4,
                'judul' => $judul,
                'testi' => $testi,
                'gambar' => $gambar,
                'cari' => $cari,
            ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Silahkan Cek Email Anda Untuk Instruksi Lebih Lanjut');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Maaf kami tidak bisa menemukan email anda');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    
}
