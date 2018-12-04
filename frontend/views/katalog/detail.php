<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;


Yii::setAlias('@katalog', '../../katalog/'.$model->GAMBAR);
Yii::setAlias('@toko', '../../toko/'.$model->tOKO->TOKO_FOTO);
/* @var $this yii\web\View */
/* @var $model backend\models\Katalog */
if ($utoko != NULL) {
    $tokoid= $utoko->TOKO_ID;
}else{
    $tokoid = 1;
}
$this->title = $model->KATALOG_JUDUL;
?>
<div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <div class="box-tittle">
                        <h2 class="text-left text-primary panel-title">Informasi Toko</h2>
                        </div>
                    </div>
                    <div class="box-body"  style="min-height: 450px;">
                        <div class="col-md-3">
                            <img class="img-responsive" src="<?= Url::to('@toko'); ?>">
                        </div>
                        <div class="col-md-9">
                            <h3><?= $model->tOKO->TOKO_NAMA ?></h3>
                        </div>
                    <br>
                    No Telp <br><div class="pull-right"><?= $model->tOKO->TOKO_TELP?></div><hr>    
                    Alamat <br><div class="pull-right"><?= $model->tOKO->TOKO_ALAMAT ?></div><hr>
                    Tentang Toko <br><div class="pull-right"><?= $model->tOKO->TOKO_DISKRIPSI ?></div><hr>
                                     
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                
                <div class="box box-success">
                    <div class="box-header with-border">
                        <div class="box-tittle">
                        <h2 class="text-left text-primary panel-title">Detail Katalog</h2>
                        </div>
                    </div>
                    <div class="box-body" style="min-height: 450px; ">
                        <div class="row">
                            <div class="col-md-4"><img class="img-responsive" src="<?= Url::to('@katalog'); ?>" alt="produk" width="300" height="300"></div>
                            <div class="col-md-8" style="border-left: solid 1px #009f86; ">
                                <h2 style="margin-top: 0"><?= $model->KATALOG_JUDUL; ?></h2>
                                <h3><b>Rp.<?= number_format($model->KATALOG_HARGA);?></b></h3>
                                <p style="min-height: 200px">
                                    <?= $model->KATALOG_DISKRIPSI; ?>
                                </p>
                                <p>
                                    Barang <?= $model->jENISBARANG->JENIS_BARANG_NAMA; ?><br>
                                    <i class="pull-right">Kategori : <?= $model->kATEGORI->KATEGORI_NAMA; ?></i>
                                </p>
                                <br>

                                   <div class="pull-right">
                                        <?php if($model->tOKO->TOKO_ID == $tokoid ): ?>
                                            <button class="btn btn-flat btn-warning">Barang Sendiri</button>
                                        <?php else: ?>
                                            <a  href="<?= Url::to(['order/pesan', 'id' => $model->KATALOG_ID])?>">
                                           <button class="btn btn-flat btn-info"><i class="glyphicon glyphicon-shopping-cart"></i> Beli</button>
                                       </a>
                                        <?php endif ?>
                                   </div>                            	
                            </div>
                        </div>
                    </div>
                </div>
                <!-- space -->
            </div>
    </div>
</div>

