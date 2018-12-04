<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\LinkPager;
use backend\models\Katalog;
$this->title = 'SITaMa';

?>  
    <div class="container">
        <div class="carousel slide" data-ride="carousel" id="carousel-1">
            <div class="carousel-inner" role="listbox">
                <div class="item active"><img src="../../frontend/web/site-img/Banner1.jpg" width="1200" height="500" alt="Slide Image"></div>
                <div class="item"><img src="../../frontend/web/site-img/Banner2.jpg" width="1200" height="500" alt="Slide Image"></div>
                <div class="item"><img src="../../frontend/web/site-img/Banner3.jpg" width="1200" height="500" alt="Slide Image"></div>
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
                        <div class="box-title"><h3>Produk Terbaru</h3></div>
                    <div class="box-body">
                        <?php foreach ($model as $key): ?>
                        <div class="row" style="border-bottom: solid 1px #009f86; min-height: 180px; margin-top: 20px">
                            <div class="col-md-3"><img class="img-responsive" src="../../web/katalog/<?php echo $key['GAMBAR']; ?>" alt="produk" width="200" height="200"></div>
                            <div class="col-md-9">
                                <h2 style="color: #00ac62; margin: 0">
                                <?= $key['KATALOG_JUDUL']; ?>
                                </h2>
                                <p>
                                  <b style="font-size: 26px; color:#009adb; ">Rp.
                                    <?= number_format($key['KATALOG_HARGA']);?></b>
                                  <br><b>Diskripsi</b>
                                  <br><?= $key['KATALOG_DISKRIPSI']; ?>
                                </p>
                                <div class="pull-right">
                                    <a href="<?php echo Yii::$app->homeUrl?>?r=katalog/detail&id=<?php echo $key['KATALOG_ID']?>">
                                        <button class="btn btn-flat btn-info"> Detail
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
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
                      <h3 class="box-title">Kategori</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="list-group">
                        <?php foreach ($kategori as $kat): ?>
                        <?php $jml = Katalog::find()->where(['KATEGORI_ID'=>$kat->KATEGORI_ID])->count(); ?>
                      <a href="index.php?r=kategori/tampilkategori&id=<?= $kat->KATEGORI_ID; ?>" class="list-group-item">
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
                      <h3 class="box-title">Kelompok Tani</h3>
                        <div class="box-body">
                            <?php foreach ($tani as $tani):?>
                            <ul class="list-group">
                                <li class="list-group-item"><?= $tani['KELOMPOKTANI_NAMA']; ?></li>
                            </ul>
                            <?php endforeach ?>
                        </div>
                    
                </div>
            </div>

                <div class="box box-success">
                    <div class="box-header with-border">
                      <i class="fa fa-bullhorn"></i>
                      <h3 class="box-title">Sponsor</h3>
                    </div>
                        <div class="box-body">
                            <img class="col-md-12" src="../web/site-img/Sponsor1.jpg" alt="sponsor">
                        </div>                    
                </div>

            </div>
    </div>
</div>
    <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- Custom Tabs -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                        </div>
                        <div class="box-body">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#tab_1" data-toggle="tab">Berita</a></li>
                              <li><a href="#tab_2" data-toggle="tab">Event</a></li>
                              <li><a href="#tab_3" data-toggle="tab">Harga Subsidi</a></li>
                              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                            </ul>
                            <div class="tab-content">
                              <div class="tab-pane active" id="tab_1">
                                <?php foreach ($berita as $news) { ?>
                                  <a href="?r=berita/detail&id=<?= $news['berita_id'];?>">
                                    <li class="hov"><?= $news['berita_judul'];?></li>
                                  </a>
                                <?php } ?>              
                              </div>
                              <!-- /.tab-pane -->
                              <div class="tab-pane" id="tab_2">
                                <li>Pertemuan Rutin Bulanan</li>
                                <li>Pertemuan Rutin Bulanan</li>
                                <li>Pertemuan Rutin Bulanan</li>
                              </div>
                              <!-- /.tab-pane -->
                              <div class="tab-pane" id="tab_3">
                                 <li>Harga Subsidi</li>
                                 <li>Harga Subsidi</li>
                                 <li>Harga Subsidi</li>
                              </div>
                              <!-- /.tab-pane -->
                        </div>
                  <!-- /.tab-content -->
                      </div>
                      </div>        
                        
                    <!-- endbox -->    
                    </div>

                </div>
                
            </div>
        
    </div>
<style type="text/css">
  a:hover{
    color: #fff;
  }
</style>