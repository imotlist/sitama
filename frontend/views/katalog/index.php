<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Katalog */

$this->title = "User";
?>
<div class="container">
    <br>
    <br>
    <br>
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
                                <div class="col-md-12"><img class="img-responsive" src="../../backend/web/<?= $user['USER_FOTO'] ?>" alt="toko" width="300" height="300"></div>
                                <div class="col-md-12">
                                    <h3>Username : <?= $user['username'] ?></h3>
                                    <hr>
                                    <i class="glyphicon glyphicon-envelope"></i> <?= $user['email']?><hr>
                                    <i class="glyphicon glyphicon-user"></i> <?= $tani['KELOMPOKTANI_NAMA']?><hr>
                                    <i class="glyphicon glyphicon-home"></i> <?= $user['USER_ALAMAT']?><hr>
                                    <i class="glyphicon glyphicon-phone"></i> <?= $user['USER_TELP']?><hr>
                                    <a href="index.php?r=user/update&id=<?= $user['id'] ?>">
                                        <button class="btn btn-primary btn-flat pull-right">
                                        <i class="glyphicon glyphicon-pencil"></i> Edit Profil
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
                                <div class="col-md-3"><img class="img-responsive" src="<?= $toko['TOKO_FOTO'] ?>" alt="toko" width="300" height="300"></div>
                                <div class="col-md-9">
                                    <h3>
                                        <i class="glyphicon glyphicon-shopping-cart"></i> <?= $toko['TOKO_NAMA'] ?>
                                        <button class="btn btn-primary btn-flat pull-right">
                                            <i class="glyphicon glyphicon-pencil"></i> Edit Toko</button>
                                    </h3>
                                    <p>
                                       <?= $toko['TOKO_ALAMAT'] ?><br>
                                       <?= $toko['TOKO_TELP'] ?><br>
                                       <?= $toko['TOKO_DISKRIPSI'] ?>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <div class="box-tittle">
                            <h2 class="text-left text-primary panel-title">Detail Barang
                            <a href="?r=katalog/create&id=<?=$toko['TOKO_ID']?>">
                                <button class="btn btn-info btn-flat pull-right">Tambah Barang</button>
                            </a>
                            </h2>
                            </div>
                        </div>
                        <div class="box-body">
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
                                    <?php $no=1; ?>
                                    <?php foreach ($katalog as $katalog) { ?> 
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $katalog['KATALOG_JUDUL'] ?></td>
                                            <td><?= $katalog['KATALOG_BARANG'] ?></td>
                                            <td><?= $katalog['KATALOG_HARGA'] ?></td>
                                            <td><?= $katalog['KATALOG_TGL_POST'] ?></td>
                                            <td>
                                                <button class="btn btn-success btn-flat"><i class="glyphicon glyphicon-pencil"></i></button>
                                                <a href="?r=katalog/delete&id=<?=$katalog['KATALOG_ID']?>">
                                                <button class="btn btn-danger btn-flat"><i class="glyphicon glyphicon-trash"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php $no++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>