<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;
use backend\models\Detailorder;
use backend\models\Katalog;
use yii\widgets\ActiveForm;
use backend\models\Masterorder;

use yii\helpers\ArrayHelper;
use backend\models\Kategori;
use backend\models\Toko;
use backend\models\JenisBarang;

use dosamigos\leaflet\LeafLet;
use dosamigos\leaflet\layers\Marker;
use dosamigos\leaflet\layers\TileLayer;
use dosamigos\leaflet\types\LatLng;
use dosamigos\leaflet\plugins\geocoder\GeoCoder;
use dosamigos\leaflet\plugins\geocoder\ServiceNominatim;

use yii\helpers\Url;

Yii::setAlias('@user', '../../foto/'.$user->USER_FOTO);
Yii::setAlias('@toko', '../../toko/'.$toko->TOKO_FOTO);

/* @var $this yii\web\View */
/* @var $model backend\models\Katalog */
$uid = Yii::$app->user->identity->ID;
$this->title = "Profil User";
?>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php if($user->USER_FOTO != NULL): ?>
              <img class="profile-user-img img-responsive img-circle" src="<?= Url::to('@user')?>" alt="User profile picture">
              <?php else: ?>
                <img class="profile-user-img img-responsive img-circle" src="/sitama/frontend/web/foto/default.jpg" alt="User profile picture">
              <?php endif ?>

              <h3 class="profile-username text-center"><?= $user->username ?></h3>

              <p class="text-muted text-center"><?= $user->kELOMPOKTANI->KELOMPOKTANI_NAMA ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <a href="#" data-toggle="modal" data-target="#modal-user">
                    <b>Profil Saya</b>
                  </a>
                  <a class="pull-right"><i class="glyphicon glyphicon-user"></i></a>
                </li>
                <li class="list-group-item">
                  <a href="<?= Url::to(['transaksi/index'])?>">
                    <b>Pembelian</b>
                  </a>
                  <a class="pull-right"><i class="glyphicon glyphicon-new-window"></i></a>
                </li>
                <li class="list-group-item">
                  <a href="<?= Url::to(['transaksi/penjualan/'.$user->ID])?>">
                    <b>Penjualan</b>
                  </a>
                  <a class="pull-right"><i class="glyphicon glyphicon-piggy-bank"></i></a>
                </li>
              </ul>

              <a href="<?= Url::to(['user/update/'.$user->ID]) ?>" class="btn btn-primary btn-block">
                <b>Edit Profil</b>
              </a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- modal -->
        <div class="modal fade" id="modal-user">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-green">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Profil User</h4>
              </div>
              <div class="modal-body" style="min-height: 300px;">
                <div class="col-md-12">
                  <div class="col-md-6">
                    <i class="glyphicon glyphicon-user"></i> <?= $user->username ?><hr>
                    <i class="glyphicon glyphicon-new-window"></i> <?= $user->kELOMPOKTANI->KELOMPOKTANI_NAMA ?><hr>
                    <i class="glyphicon glyphicon-home"></i> <?= $user->USER_ALAMAT ?><hr>
                    <i class="glyphicon glyphicon-envelope"></i> <?= $user->email ?><hr>
                  </div>
                  <div class="col-md-6">
                    <?php if($user->USER_FOTO != NULL): ?>
                      <img class="profile-user-img img-responsive img-circle" src="<?= Url::to('@user')?>" alt="User profile picture">
                    <?php else: ?>
                      <img class="profile-user-img img-responsive img-circle" src="/sitama/frontend/web/foto/default.jpg" alt="User profile picture">
                    <?php endif ?>
                  </div>
                </div>
              </div>
              <div class="modal-footer bg-green">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->




          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Toko Saya</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="glyphicon glyphicon-home margin-r-5"></i> <?= $toko->TOKO_NAMA?></strong>

              <p class="text-muted">
                
                  <?= $toko->TOKO_DISKRIPSI ?>
              
              </p>
              <!-- Modal -->
              <div class="modal fade" id="map">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-blue">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Lokasi</h4>
                    </div>
                    <div class="modal-body" style="min-height: 500px;">
                      <div class="col-md-12">
                        <?php
                            //     $lokasi=Post::find()->where(['id_post' => $model->id_post])->one();
                                    //tentukan dulu lokasi awal yang akan kita tampilkan di peta 
                                 function multiexplode ($delimiters,$string) {
                                
                                $ready = str_replace($delimiters, $delimiters[0], $string);
                                $launch = explode($delimiters[0], $ready);
                                return  $launch;
                            }   
                                 
                                 if(isset($toko->location)){
                                     $exploded=multiexplode(array("LatLng","(",",",")"), $toko->location);
                                    $lat = $exploded[2];
                                    $lon = $exploded[3];
                                     $center = new LatLng(['lat' => $lat, 'lng' =>$lon]);
                                    $marker = new Marker([
                                'name' => 'marker',
                                'latLng' => $center,
                                'clientOptions' => ['draggable' => false], // draggable marker
                                'clientEvents' => [                     
                                    
                                ]
                            ]);
                                 }
                                 else{
                                     $center = new LatLng(['lat' => -8.01997, 'lng' =>112.64351]);
                                     $marker = new Marker([
                                'name' => 'marker',
                                'latLng' => $center,
                                'clientOptions' => ['draggable' => false], // draggable marker
                                'clientEvents' => [                               
                                ]
                            ]);
                            }
                            //        
                            //         setelah itu kita buat layer marker atau poin untuk ditampilkan pada peta kita

                            // lets use nominating service
                            $nominatim = new ServiceNominatim();

                            // create geocoder plugin and attach the service
                            $geoCoderPlugin = new GeoCoder([
                                'service' => $nominatim,
                                'clientOptions' => [
                                    // we could leave it to allocate a marker automatically
                                    // but I want to have some fun
                                    'showMarker' => false
                                ]
                            ]);
                                       
                                    // kita tambahkan tile layer agar kita bisa terlihat
                                    $tileLayer = new TileLayer([            
                                        'urlTemplate' => 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                                    'clientOptions' => [
                                        'attribution' => '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                                       
                                        ],
                                    ]);
                                    // sekarang kita buat dan konfigurasi peta nya
                                    $leaflet = new LeafLet([
                                        'name'=>'map',
                                        'center' => $center, // set center pada peta
                                        'zoom'=> 13, //set zoom pada peta
                                        'clientOptions' => [
                                        ],
                                            'clientEvents' => [
                                    // setting up one of the geo search events for fun
                                    "geocoder_showresult" => "function(e){
                                        // set markers position
                                        geoMarker.setLatLng(e.Result.center);}",
                                    
                                ]
                                    ]);


                                    // kita tambahkan layer poin dan tile pada peta kita
                                    $leaflet
                                           ->addLayer($marker)
                                            ->addLayer($tileLayer);  // menambahkan ti');
                                    // tampilkan peta
                                    // install the plugin
                            //                $leaflet->appendJS('globalMap = map;marker=marker;');

                                    echo $leaflet->widget(['height'=>'400px']);    
                            //        echo markerasal;
                                ?>

                      </div>
                      
                    </div>
                    <div class="modal-footer bg-blue">
                      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->

              <hr>

              <strong><i class="glyphicon glyphicon-map-marker margin-r-5"></i> Alamat</strong>

              <p class="text-muted">
                <a href="" data-toggle="modal" data-target="#map">
                  <?= $toko->TOKO_ALAMAT ?>
                </a> 
              </p>

              <hr>
              <?php if($toko->TOKO_FOTO != NULL): ?>
              <strong><i class="glyphicon glyphicon-camera margin-r-5"></i> Foto</strong>
              <img class="img-responsive" src="<?= Url::to('@toko')?>" alt="Shop picture">

              <hr>
              <?php endif ?>
              <strong><i class="glyphicon glyphicon-phone-alt margin-r-5"></i> Telp/Hp</strong>

              <p>
                <?= $toko->TOKO_TELP ?>
              </p>
              <a href="<?= Url::to(['toko/update/'.$toko->TOKO_ID]) ?>" class="btn btn-primary btn-block">
                <b>Edit Toko</b>
              </a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#barang" data-toggle="tab">Daftar Barang</a></li>          
              <li><a href="#tambah" data-toggle="tab">Tambah Barang</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="barang" style="min-height: 815px">
              <div class="btn-group pull-right">
                <a href="<?= Url::to(['transaksi/cetakbarang','id'=>$uid]); ?>" target="_blank">
                  <button type="button" class="btn btn-info btn-flat">
                    <i class="glyphicon glyphicon-print"></i> Print Out
                  </button>
                </a>
                </div>  
               <!-- start  -->
                <table class="table table-bordered table-hover">
                    <thead>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Harga</th>
                      <th>Tgl Post</th>
                      <th>Stok</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php if ($katalog==NULL) { ?>
                          <tr><td colspan="6">Tidak Ada Data</td></tr>
                      <?php }else{ ?>
                          <?php $no=1; ?>
                          <?php foreach ($katalog as $katalog) { ?>
                          <?php Yii::setAlias('@katalog', '../../katalog/'.$katalog->GAMBAR); ?> 
                              <tr>
                                <td><?= $no ?></td>
                                <td>
                                  <a href="#" data-toggle="modal" data-target="#modal<?=$no?>">
                                    <?= $katalog['KATALOG_JUDUL'] ?>
                                  </a>  
                                </td>
                                <td>Rp. <?= number_format($katalog['KATALOG_HARGA']) ?></td>
                                <td><?= $katalog['KATALOG_TGL_POST'] ?></td>
                                <td><?= $katalog['STOK'] ?></td>
                                <td>
                                  <a href="<?= Url::to(['katalog/update', 'id' => $katalog->KATALOG_ID,'tid'=>$toko->TOKO_ID])?>">
                                  <i style="color:#00ac62;" class="glyphicon glyphicon-pencil"></i>
                                      </a>
                                  <a href="<?= Url::to(['katalog/delete', 'id' => $katalog->KATALOG_ID])?>" onclick="return confirm('Hapus Data Ini?')">
                                  <i style="color: #f24e35;" class="glyphicon glyphicon-trash"></i>
                                  </a>
                                </td>
                              </tr>

                              <!-- Modal -->
                              <div class="modal fade" id="modal<?=$no?>">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header bg-blue">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title"><?= $katalog['KATALOG_JUDUL'] ?></h4>
                                    </div>
                                    <div class="modal-body" style="min-height: 500px;">
                                      <div class="col-md-6">
                                        <?= $katalog->KATALOG_BARANG; ?><hr>
                                        Rp. <?= number_format($katalog->KATALOG_HARGA) ?><hr>
                                        <?= $katalog->jENISBARANG->JENIS_BARANG_NAMA ?><hr>
                                        <?= $katalog->kATEGORI->KATEGORI_NAMA ?><hr>
                                      </div>
                                      <div class="col-md-6">
                                        <img class="img-responsive" src="<?= Url::to('@katalog')?>">
                                      </div>
                                    </div>
                                    <div class="modal-footer bg-blue">
                                      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->
                          <?php $no++; } ?>
                      <?php } ?>
                    </tbody>
                </table>
                <?php if ($pages != NULL): ?>
                    <?= LinkPager::widget(['pagination' => $pages,]); ?>
                <?php endif ?>
               <!-- end -->
              </div>
              <!-- /.tab-pane -->
             

              <div class="tab-pane" id="tambah" style="min-height: 815px">
                <?php $form = ActiveForm::begin(['class'=>'form-horizontal','action' =>['katalog/create/'.$toko->TOKO_ID]]); ?>
                <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-6">
                        <?= $form->field($baru, 'KATALOG_JUDUL')->textInput(['maxlength' => true])->label('Judul Post') ?>

                        <?= $form->field($baru, 'KATALOG_BARANG')->textInput(['maxlength' => true])->label('Barang') ?>

                        <?= $form->field($baru, 'KATALOG_HARGA')->textInput()->label('Harga Satuan') ?>
                        <?= $form->field($baru, 'STOK')->textInput()->label('Stok Barang') ?>

                      </div>
                      <div class="col-md-6">
                        <?= $form->field($baru, 'KATEGORI_ID')->dropDownList(ArrayHelper::map(Kategori::find()->all(),'KATEGORI_ID','KATEGORI_NAMA'))->label('Kategori Barang') ?>

                        <?= $form->field($baru, 'TOKO_ID')->textInput(['value'=>$toko->TOKO_ID,'type'=>'hidden'])->label(false) ?>

                        <?= $form->field($baru, 'JENIS_BARANG_ID')->dropDownList(ArrayHelper::map(JenisBarang::find()->all(),'JENIS_BARANG_ID','JENIS_BARANG_NAMA'))->label('Jenis Barang') ?>

                        <?= $form->field($baru, 'KATALOG_STATUS')->dropDownList([10 => 'Aktif', 0 => 'Tidak Aktif']) ?> 
                      </div>
                    </div>

                  <div class="row">
                    <div class="col-md-4">
                      <?= $form->field($baru, 'GAMBAR')->fileInput(['onchange'=>'js:readURL(this)']) ?>
                      <img class="img-responsive" alt="Review Gambar" src="#" id="test" style="display: none">

                    </div>
                    <div class="col-md-8">
                      <?= $form->field($baru, 'KATALOG_DISKRIPSI')->textArea(['rows'=>'6','id'=>'editor1'])->label('Diskripsi') ?>
                      <div class="form-group">
                          <?= Html::submitButton($baru->isNewRecord ? 'Simpan' : 'Update', ['class' => $baru->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                      </div>
                    </div>
                  </div>
                </div>
                <?php ActiveForm::end(); ?>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

<script type="text/javascript">
        function readURL(input){
            if (input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#test').attr('src',e.target.result);
                }
                document.getElementById('test').style.display='inline-block';
                reader.readAsDataURL(input.files[0]);

            }
        }
</script>