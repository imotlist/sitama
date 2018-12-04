    <div class="container">
        <div class="carousel slide" data-ride="carousel" id="carousel-1">
            <div class="carousel-inner" role="listbox">
                <div class="item active"><img src="../web/banner/1.jpg" width="1400" height="600" alt="Slide Image"></div>
                <div class="item"><img src="../web/banner/2.jpg" width="1400" height="600" alt="Slide Image"></div>
                <div class="item"><img src="../web/banner/3.jpg" width="1400" height="600" alt="Slide Image"></div>
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
    <div>
        <br>
    </div>   
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h2 class="text-left text-primary panel-title">Produk Terbaru</h2></div>
                    <div class="panel-body">
                        <?php
                            foreach ($model as $key) {
                        ?>
                        <div class="row">
                            <div class="col-md-3"><img class="img-responsive" src="../../web/katalog/<?php echo $key['GAMBAR']; ?>" alt="produk" width="200" height="200"></div>
                            <div class="col-md-6">
                                <h4><?php echo $key['KATALOG_JUDUL']; ?></h4>
                                <li><?php echo $key['KATALOG_BARANG']; ?></li>
                                <li>Harga : <?php echo $key['KATALOG_HARGA']; ?></li>
                                <div class="col-lg-12">
                                    <div class="panel panel-info">
                                        <div class="panel-body">
                                            <?php echo $key['KATALOG_DISKRIPSI']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                        <nav>
                            <ul class="pagination">
                                <li><a aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                <li><a>1</a></li>
                                <li><a>2</a></li>
                                <li><a>3</a></li>
                                <li><a>4</a></li>
                                <li><a>5</a></li>
                                <li><a aria-label="Next"><span aria-hidden="true">»</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Kategori</h3></div>
                        <div class="panel-body">
                    <?php foreach ($kategori as $kat) {
                    ?>
                    <a class="list-group-item list-group-item-success"><span><?php echo $kat['KATEGORI_NAMA']; ?></span></a>
                    <?php } ?>
                </div>
                </div>

                <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Panel Heading</h3></div>
                        <div class="panel-body"><span>Panel Body</span></div>
                    
                </div>
            </div>
    </div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab-1" role="tab" data-toggle="tab">Berita</a></li>
                            <li><a href="#tab-2" role="tab" data-toggle="tab">Harga Susidi</a></li>
                            <li><a href="#tab-3" role="tab" data-toggle="tab">Event</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="tab-1">
                                <p>Berita terbaru...</p>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-2">
                                <p>Harga Susidi barang...</p>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-3">
                                <p>Event yang akan ...</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>