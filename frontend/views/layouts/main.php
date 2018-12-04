<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../vendor/almasaeed2010/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body style="background-color: #ecf0f5;">
<?php $this->beginBody() ?>

<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="<?php echo Yii::$app->homeUrl?>">SI<span>TaMa </span> </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right links">
                    <li role="presentation"><a href="<?php echo Yii::$app->homeUrl?>">Beranda </a></li>
                    <li role="presentation"><a href="<?=Url::to(['/kelompok/index']);?>">Kelompok Tani </a></li>
                    <li role="presentation"><a href="<?=Url::to(['/daerah/index']);?>">Komoditas </a></li>
                    <li role="presentation"><a href="<?=Url::to(['/berita/index']);?>">Artikel</a></li>
                    <?php if (Yii::$app->user->isGuest) {
                    ?>
                    <li role="presentation"><a href="<?= Url::to(['/site/signup']);?>" class="custom-navbar"> Daftar</a></li>
                    <li role="presentation"><a href="<?= Url::to(['/site/login']);?>" class="custom-navbar"> Masuk</a></li>
                    <?php }else{
                        $user_id = Yii::$app->user->identity->id;
                        ?>
                    <li role="presentation"><a href="<?= Url::to(['/user/index','id'=> $user_id]);?>" class="custom-navbar"> Akun Saya</a></li>
                    <?php
                    echo '<li role="presentation" style="margin-top:8px;">'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Keluar (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>';
                    ?>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <br>
        <br>
        <br>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    <footer>
        <div class="row" style="background-color: #343a40">
            <div class="col-md-1">
                
            </div>
            <div class="col-md-6">
                <p>
                    <h2 style="color: #fff">Sistem Informasi Tani Bersama</h2>
                </p>
                <br>
                <br>
                <br>
            </div>
        </div>
        
    </footer>
<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
