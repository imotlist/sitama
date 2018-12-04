<?php

use backend\models\Kelompoktani;
use backend\models\User;
use backend\models\Katalog;
use backend\models\Masterorder;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

$tani = Kelompoktani::find()->where(['KELOMPOKTANI_STATUS'=>10])->count();
$user = User::find()->where(['STATUS'=>10])->count();
$katalog = Katalog::find()->where(['KATALOG_STATUS'=>10])->count();
$transaksi = Masterorder::find()->count();
/* @var $this yii\web\View */
$this->title = 'SITaMa - Sistem Informasi Tani Bersama';
?>
<div class="site-index">

    <!-- <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div> -->

    <div class="body-content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?= $tani; ?></h3>

                  <p>Kelompok Tani</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="<?= Yii::$app->homeUrl ?>?r=kelompok-tani" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?= $user ?></h3>

                  <p>Anggota</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <a href="<?= Yii::$app->homeUrl ?>?r=user" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?= $katalog ?></h3>

                  <p>Katalog</p>
                </div>
                <div class="icon">
                  <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="<?= Yii::$app->homeUrl ?>?r=katalog" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?= $transaksi ?></h3>

                  <p>Transaksi</p>
                </div>
                <div class="icon">
                  <i class="fa fa-money"></i>
                </div>
                <a href="<?= Yii::$app->homeUrl ?>?r=masterorder" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
        </div>
        <div class="row" style="min-height: 300px">
          
        </div>
        <div class="row">
          <div class="col-md-8">
            
          </div>
          <div class="col-md-4">
            <?php if(Yii::$app->user->identity->getRoleName()=='SuperAdminRole'): ?>
            <a href="index.php?r=site/kosongdetail" class="pull-right"
              onclick="return confirm('Kosongkan Data Table Detail Order?')">
              <button class="btn btn-danger btn-flat" style="width: 200px">Clear Detail Order</button>
            </a><hr>
            <a href="index.php?r=site/kosongmaster" class="pull-right"
            onclick="return confirm('Kosongkan Data Table Master Order?')">
              <button class="btn btn-danger btn-flat" style="width: 200px">Clear Master Order</button>
            </a>
            <?php endif ?>
          </div>
        </div>
        
</div>
</div>
