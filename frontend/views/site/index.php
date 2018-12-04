<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\LinkPager;
use backend\models\Katalog;
use yii\helpers\Url;
$this->title = 'SITaMa';

?>  
    <div class="container">
        <div class="carousel slide" data-ride="carousel" id="carousel-1">
            <div class="carousel-inner" role="listbox" style="max-height: 400px">
                <div class="item active"><img src="/sitama/frontend/web/site-img/Banner1.jpg" alt="Slide Image"></div>
                <div class="item"><img src="/sitama/frontend/web/site-img/Banner2.jpg" alt="Slide Image"></div>
                <div class="item"><img src="/sitama/frontend/web/site-img/Banner3.jpg" alt="Slide Image"></div>
            </div>
            <div><a class="left carousel-control" href="#carousel-1" role="button" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#carousel-1" role="button"
                data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i><span class="sr-only">Next</span></a></div>
            <ol class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
                <li data-target="#carousel-1" data-slide-to="2"></li>
            </ol>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <div class="box-title"><h3><?= $judul?></h3></div>
                    <div class="box-body">
                      <div class="row">
                        <?php if($model==NULL): ?>
                          <div class="col-md-12">
                            <center><h2 class="alert bg-red">Pencarian Tidak Ditemukan</h2></center>
                          </div>
                        <?php else:?>
                          <?php foreach ($model as $key): ?>
                          <a href="<?= Url::to(['katalog/detail', 'id' => $key->KATALOG_ID])?>">
                            <div class="col-md-4"">
                              <div class="box box-info">
                                <div class="box-header bg-green" style="min-height: 100px;">
                                  <div class="box-title" style="width: 100%">
                                    <?= $key->KATALOG_JUDUL?><br>
                                    <div style="right:20px; bottom: 0; top: auto; position: absolute;">
                                      Rp. <?= number_format($key->KATALOG_HARGA);?>
                                      </div>
                                  </div>
                                </div>
                                <div class="box-body" style="min-height: 250px;">
                                  <?php Yii::setAlias('@katalog', '/sitama/frontend/web/katalog/'.$key->GAMBAR); ?>
                                  <img class="img-responsive" src="<?= Url::to('@katalog'); ?>" alt="produk" width="100%">                                  
                                  
                                </div>
                                <div class="box-footer bg-green">
                                  <i class="pull-left">Toko : <?= $key->tOKO->TOKO_NAMA;?></i>
                                </div>
                              </div>
                            </div>
                          </a>
                        <?php endforeach ?>
                        <?php endif ?>


                      </div>
                    </div>
                    <div><center>
                      <?= LinkPager::widget(['pagination' => $pages,]); ?>
                      </center>
                    </div>
                </div>
            </div>

            </div>

            <div class="col-md-4">
              <div class="box box-success">
                    <div class="box-header with-border">
                      <i class="fa fa-bullhorn"></i>
                      <h3 class="box-title">Pencarian</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                    <?php $form = ActiveForm::begin(['class'=>'form-horizontal','action' =>['/cari']]); ?>
                    <div class="row">
                      <div class="col-md-10" style="padding-right: 0">
                        <?= $form->field($cari, 'KATALOG_JUDUL')->textInput(['required'=>true])->label(false) ?>
                      </div>
                      <div class="col-md-2" style="padding-left: 0">
                        <div class="form-group">
                          <?= Html::submitButton('<i class="glyphicon glyphicon-search"></i>', ['class' => 'btn btn-success btn-flat']) ?>
                        </div>
                      </div>
                    </div>
                    <?php ActiveForm::end(); ?>

                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box box-success">
                    <div class="box-header with-border">
                      <i class="fa fa-bullhorn"></i>
                      <h3 class="box-title">Kategori</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="list-group">
                        <?php foreach ($kategori as $kat): ?>
                        <?php $jml = Katalog::find()->where(['KATEGORI_ID'=>$kat->KATEGORI_ID])->count(); ?>
                      <a href="<?= Url::to(['kategori/'.$kat->KATEGORI_ID])?>" class="list-group-item">
                        <?= $kat->KATEGORI_NAMA; ?>
                        <span class="badge"><?= $jml; ?></span>
                      </a>
                      <?php endforeach ?>
                      </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                  <!-- /.box -->

                <div class="box box-success">
                    <div class="box-header with-border">
                      <i class="fa fa-bullhorn"></i>
                      <h3 class="box-title">Testimoni</h3>
                    </div>
                        <div class="box-body">
                          <?php $no=1; ?>
                            <?php foreach ($testi as $testi): ?>

                              <!-- Widget: user widget style 1 -->
                              <div class="box box-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-black" style="background: url('/sitama/frontend/web/site-img/Sponsor1.jpg') center center;">
                                  <h4 class="widget-user-username"><?= $testi->testi_nama ?></h4>
                                </div>
                                <a href="#" data-toggle="modal" data-target="#myModal<?=$no?>">
                                <div class="widget-user-image">
                                  <img class="img-circle" style="min-height:90px " src="/sitama/frontend/web/<?= $testi->testi_gambar;?>" alt="User Avatar">
                                </div>
                                </a>
                                <div class="box-footer">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <p><?=$testi->testi_quote;?></p>
                                    </div>
                                  </div>
                                  <!-- /.row -->
                                </div>
                              </div>
                              <!-- /.widget-user -->

                              <div class="modal fade" id="myModal<?=$no?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Testimoni Pengguna</h4>
                                </div>
                                <div class="modal-body">
                                    <img class="img-responsive" src="<?= $testi->testi_gambar; ?>">
                                    
                                    <blockquote>
                                      <?= $testi->testi_quote ?>
                                      <small class="pull-right">User <cite title="Source Title"><?= $testi->testi_nama ?></cite></small>
                                    </blockquote>
                                </div>
                                <div class="modal-footer">                                                          
                                </div>
                                  </div>
                                </div>
                              </div>


                            <?php $no++; ?>
                            <?php endforeach ?>
                        </div>                    
                </div>

            </div>
    </div>
</div>



<style type="text/css">
  a:hover{
    color: #009adb;
  }
</style>