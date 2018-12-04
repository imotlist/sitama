<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;
use backend\models\Detailorder;
use backend\models\Katalog;
use yii\widgets\ActiveForm;
use backend\models\Masterorder;
use yii\helpers\Url;

Yii::setAlias('@user', '../../foto/'.$user->USER_FOTO);
Yii::setAlias('@toko', '../../toko/'.$toko->TOKO_FOTO);
/* @var $this yii\web\View */
/* @var $model backend\models\Katalog */

$this->title = "User";
?>
<div class="container">

        <div class="row">
            <div class="col-md-3">
                <div class="box box-info">
                        <div class="box-header with-border">
                            <div class="box-tittle">
                            <h2 class="text-left text-primary panel-title">Detail User</h2>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                <center>
                                <?php if($user['USER_FOTO']==NULL): ?>
                                    <img class="img-responsive" src="../../backend/web/image/default.jpg" alt="user" width="70%">
                                <?php else: ?>
                                    <img class="img-responsive" src="<?= Url::to('@user'); ?>" alt="user" width="70%">
                                <?php endif ?>
                                    
                                </center>
                                </div>
                                <div class="col-md-12" style="margin-top:20px">

                                    <i class="glyphicon glyphicon-user"></i>Username <br>
                                    <div class="pull-right"><b><?= $user['username'] ?></b></div>
                                    <hr>
                                    <i class="glyphicon glyphicon-envelope"></i>E - Mail <br>
                                    <div class="pull-right"><b><?= $user['email'] ?></b></div>
                                    <hr>
                                    <i class="glyphicon glyphicon-globe"></i>Kelompok Tani <br>
                                    <div class="pull-right"><b><?= $tani['KELOMPOKTANI_NAMA'] ?></b></div>
                                    <hr>
                                    <i class="glyphicon glyphicon-phone"></i>No Telp <br>
                                    <div class="pull-right"><b><?= $user['USER_TELP'] ?></b></div>
                                    <hr>
                                    <i class="glyphicon glyphicon-home"></i> Alamat <br>
                                    <div class="pull-right"><?= $user['USER_ALAMAT'] ?></div>
                                    <hr>
                                    
                                    <a href="<?= Url::to(['user/update', 'id' => $user->ID])?>">
                                        <button class="btn btn-primary btn-flat pull-right">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                        </button>
                                    </a>                        
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <div class="box-tittle">
                            <h2 class="text-left text-primary panel-title">Detail Toko</h2>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <?php if ($toko['TOKO_ID']==NULL) { ?>
                                    <div class="col-md-12">
                                        <p>Tidak Ada Data Toko</p>
                                        <a href="index.php?r=toko/create">
                                            <button class="btn btn-primary btn-flat pull-right">Buat Toko</button>
                                        </a>
                                    </div>
                                <?php }else{ ?>
                                <div class="col-md-3"><img class="img-responsive" src="<?= Url::to('@toko'); ?>" alt="toko" width="300" height="300"></div>
                                <div class="col-md-9">
                                    <h3>
                                        <i class="glyphicon glyphicon-shopping-cart"></i> <?= $toko['TOKO_NAMA'] ?>
                                        <a href="<?= Url::to(['toko/update', 'id' => $toko->TOKO_ID])?>">
                                        <button class="btn btn-primary btn-flat pull-right">
                                            <i class="glyphicon glyphicon-pencil"></i></button>
                                        </a>
                                    </h3>
                                    <p>
                                       <?= $toko['TOKO_ALAMAT'] ?><br>
                                       <?= $toko['TOKO_TELP'] ?><br>
                                       <?= $toko['TOKO_DISKRIPSI'] ?>
                                    </p>

                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <div class="box-tittle">
                            <h2 class="text-left text-primary panel-title">Transaksi User
                                <?php if ($toko['TOKO_ID']!=NULL) { ?>
                                    <a href="<?= Url::to(['katalog/create', 'id' => $toko->TOKO_ID])?>">
                                        <button class="btn btn-info btn-flat pull-right">
                                            <i class="glyphicon glyphicon-plus"></i>
                                        </button>
                                    </a>
                                <?php }else{ ?>
                                        <p class="pull-right"><i>Buat Toko Untuk Tambah Katalog</i></p>
                                <?php } ?>
                            </h2>
                            </div>
                        </div>

                        <div class="box-body" style="min-height: 322px">
                            <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#tab_1" data-toggle="tab">Daftar Barang</a></li>
                              <li><a href="#tab_2" data-toggle="tab">Pembelian</a></li>
                              <li><a href="#tab_3" data-toggle="tab">Penjualan 
                                    <i style="color: blue" class="glyphicon glyphicon-info-sign"></i>
                                </a>
                            </li>
                              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                            </ul>
                            <div class="tab-content">
                              <div class="tab-pane active" id="tab_1">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Barang</th>
                                        <th>Harga</th>
                                        <th>Tgl Post</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php if ($katalog==NULL) { ?>
                                            <tr><td colspan="6">Tidak Ada Data</td></tr>
                                        <?php }else{ ?>
                                            <?php $no=1; ?>
                                            <?php foreach ($katalog as $katalog) { ?> 
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $katalog['KATALOG_JUDUL'] ?></td>
                                                    <td><?= $katalog['KATALOG_BARANG'] ?></td>
                                                    <td>Rp. <?= number_format($katalog['KATALOG_HARGA']) ?></td>
                                                    <td><?= $katalog['KATALOG_TGL_POST'] ?></td>
                                                    <td>
                                                        <a href="<?= Url::to(['katalog/update', 'id' => $katalog->KATALOG_ID,'tid'=>$toko->TOKO_ID])?>">
                                                        <i style="color:#00ac62;" class="glyphicon glyphicon-pencil"></i>
                                                        </a>
                                                        <a href="<?= Url::to(['katalog/delete', 'id' => $katalog->KATALOG_ID])?>" onclick="return confirm('Hapus Data Ini?')">
                                                        <i style="color: #f24e35;" class="glyphicon glyphicon-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php $no++; } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php if ($pages != NULL): ?>
                                <?= LinkPager::widget(['pagination' => $pages,]); ?>
                            <?php endif ?>                                            
                              </div>
                  <!-- /.tab-content -->
                      </div>
                            
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
