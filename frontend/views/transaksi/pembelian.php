<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;
use backend\models\Detailorder;
use backend\models\Katalog;
use yii\widgets\ActiveForm;
use backend\models\Masterorder;

/* @var $this yii\web\View */
/* @var $model backend\models\Katalog */
$uid = Yii::$app->user->identity->id;
$this->title = "Pembelian User";
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
	            <div class="box-header bg-blue with-border">
	              <h3 class="box-title">Daftar Pembelian</h3>
                <div class="btn-group pull-right">
                  <a href="<?= Url::to(['transaksi/cetakpembelian','id'=>$uid]); ?>" target="_blank">
                    <button type="button" class="btn bg-orange btn-flat">
                      <i class="glyphicon glyphicon-print"></i> Print Out
                    </button>
                  </a>
                </div>  
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body" style="min-height: 500px">
		            <table class="table table-bordered table-hover">
                    <thead>
                      <th>No</th>
                      <th>Kode Pemesanan</th>
                      <th>Tanggal Beli</th>
                      <th>Barang</th>
                      <th>Harga</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php if ($pembelian==NULL) { ?>
                          <tr><td colspan="6">Tidak Ada Data</td></tr>
                      <?php }else{ ?>
                          <?php $no=1; $harga=0; ?>
                          <?php foreach ($pembelian as $pem) { ?>
                          <?php $det = Detailorder::find()->where(['ORDER_ID'=>$pem->ORDER_ID])->all() ?> 
                              <tr>
                                <td><?= $no ?></td>
                                <td>
                                <a href="<?= Url::to(['order/index','id'=>$pem->ORDER_ID]) ?>" target="_blank">
                                  <?= $pem->ORDER_ID ?>
                                </a>
                                </td>
                                <td><?= $pem->ORDER_TGL_ADD ?></td>
                                <td>
                                  <a href="#" data-toggle="modal" data-target="#modal<?=$no?>">
                                    <?php foreach($det as $det): ?>
                                    	<?php $barang = $det->kATALOG->KATALOG_BARANG ?>
                                    	<?php $harga = $det->kATALOG->KATALOG_HARGA ?>
                                      <?php $total = $det->DETAILORDER_JUMLAH ?>
                                    	<?php $qty = $det->DETAILORDER_QTY ?>
                                    	<?php $idkat = $det->kATALOG->KATALOG_ID ?>
                                    <?php endforeach ?>
                                    <?= $barang?>
                                  </a>  
                                </td>
                                <td>Rp. <?= number_format($harga) ?></td>
                                <td>Rp. <?= number_format($total) ?></td>
                                <td><?php $stat=$pem->ORDER_STATUS ?>
                                  <?php if($stat==0): ?>
                                    <div class="btn bg-orange btn-block">Belum Konfirmasi</div>
                                  <?php elseif($stat==5): ?>
                                  <div class="btn bg-purple btn-block">Tertunda</div>
                                  <?php elseif($stat==10): ?>

                                  <div class="btn bg-olive btn-block" data-toggle="modal" data-target="#hasil<?=$no?>">Berhasil</div>

                                  <?php else: ?>
                                  <div class="btn bg-maroon btn-block">Non Kat</div>
                                  <?php endif ?>
                                </td>
                                <td>
                                  <?php if($stat==0): ?>
                                	<button class="btn btn-info btn-sm btn-flat"  data-toggle="modal" data-target="#bukti<?=$no?>">
                                		Unggah
                                	</button>
                                  <?php else: ?>
                                    <button class="btn btn-info btn-sm btn-flat disabled">
                                    Unggah
                                  </button>
                                  <?php endif ?>

                                </td>
                              </tr>

                              <!-- Modal  Bukti-->
                              <div class="modal fade" id="hasil<?=$no?>">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header bg-green">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title">Struk Pembelian</h4>
                                    </div>
                                    <div class="modal-body" style="min-height: 300px;">
                                      <div class="col-md-12">
                                        <div class="col-md-6">
                                          <b>Kode Transaksi</b>
                                          <br>
                                          <b>Tanggal Order</b> 
                                        </div>
                                        <div class="col-md-6">
                                          <b class="pull-right"><?=$pem->ORDER_ID?></b>
                                          <br>
                                          <b class="pull-right"><?=$pem->ORDER_TGL_ADD?></b>  
                                        </div>
                                      </div>
                                      
                                      <br><br>
                                      <br><br><br>
                                      <div class="col-md-12">
                                        <div class="col-md-4">
                                          Barang
                                          <hr>
                                          <?= $barang?>
                                        </div>
                                        <div class="col-md-4">
                                          @<hr><?= $qty?>
                                        </div>
                                        <div class="col-md-4">
                                          Total<hr>Rp. <?= number_format($total)?>
                                        </div>
                                      </div>
                                      <br><br><br>
                                      <br><br><br>
                                      <b class="pull-right">Status : Sedang diproses</b>
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

                              <!-- Modal  Bukti-->
                              <div class="modal fade" id="bukti<?=$no?>">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header bg-green">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title">Unggah Bukti Pembayaran</h4>
                                    </div>
                                    <div class="modal-body" style="min-height: 300px;">

                                      <h3>Kode Pemesanan : <?= $pem->ORDER_ID ?></h3>
                                      <?php $form = ActiveForm::begin(['options'=>['multipart/form-data'],'action' =>['transaksi/konbeli/'.$pem->ORDER_ID]]); ?>

                                      <?= $form->field($pem, 'BUKTI')->fileInput(['onchange'=>'js:readURL(this)'])->label('Bukti Pembayaran') ?>
                                      <img class="img-responsive" alt="Review Gambar" src="#" id="test" style="display: none"                                      
                                      </div>
                                    </div>
                                    <div class="modal-footer bg-green">
                                      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
                                      <div class="form-group">
                                          <?= Html::submitButton('Upload', ['class' => 'btn btn-outline pull-right']) ?>
                                          
                                          <?php ActiveForm::end(); ?>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->


                              <!-- Modal -->
                              <div class="modal fade" id="modal<?=$no?>">
                              	<?php $barang = Katalog::findOne($idkat); ?>
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header bg-blue">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title"><?= $barang->KATALOG_JUDUL?></h4>
                                    </div>
                                    <div class="modal-body" style="min-height: 500px;">
                                      <div class="col-md-6">
                                      	<?= $barang->KATALOG_BARANG ?><hr>
                                      	<?= $barang->KATALOG_HARGA ?><hr>
                                      	<?= $barang->jENISBARANG->JENIS_BARANG_NAMA ?><hr>
                                      </div>
                                      <div class="col-md-6">
                                        <img class="img-responsive" src="">
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
                <center>
		            <?= LinkPager::widget(['pagination' => $pages,]); ?>
		            </center>
		          </div>
          
	            <div class="box-footer bg-blue">
	            	<a href="<?= Url::to(['user/index/'.Yii::$app->user->identity->ID]) ?>">
		              <button type="button" class="btn btn-outline pull-left">
		              	<i class="glyphicon glyphicon-arrow-left"></i> Kembali
		              </button>
		          	</a>
	            </div>
	            <!-- /.box-body -->
        </div>
		</div>
	</div>
</div>
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