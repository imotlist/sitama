<br>
<br>
<br>
<div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <div class="box-tittle">
                        <h2 class="text-left text-primary panel-title">Produk Kategori</h2></div>
                    </div>
                    <div class="box-body">
                        <?php
                            foreach ($model as $key) {
                        ?>
                        <div class="row">
                            <div class="col-md-3"><img class="img-responsive" src="../../web/katalog/<?php echo $key['GAMBAR']; ?>" alt="produk" width="200" height="200"></div>
                            <div class="col-md-9">
                                <h4><?php echo $key['KATALOG_JUDUL']; ?></h4>
                                <p><?php echo $key['KATALOG_BARANG']; ?>
                                    <br>
                                    <b>Harga : Rp . <?php echo $key['KATALOG_HARGA']; ?></b>
                                    <br>
                                    <b>Penjelasan Produk :</b>
                                    <br><?php echo $key['KATALOG_DISKRIPSI']; ?>
                                </p>
                                <div class="pull-right">
                                    <a href="<?php echo Yii::$app->homeUrl?>?r=katalog/detail&id=<?php echo $key['KATALOG_ID']?>">
                                        <button class="btn btn-info">Lihat</button>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
    </div>
</div>