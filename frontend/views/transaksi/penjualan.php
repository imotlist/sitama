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
$this->title = "Penjualan User";
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
	            <div class="box-header bg-blue with-border">
	              <h3 class="box-title">Daftar Penjualan</h3>
                <div class="btn-group pull-right">
                  <a href="<?= Url::to(['transaksi/cetakpenjualan','id'=>$uid]); ?>" target="_blank">
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
                      <?php if ($penjualan==NULL) { ?>
                          <tr><td colspan="6">Tidak Ada Data</td></tr>
                      <?php }else{ ?>
                          <?php $no=1; $harga=0; ?>
                          <?php foreach ($penjualan as $pem) { ?>
                          <?php $det = Detailorder::find()->where(['ORDER_ID'=>$pem->ORDER_ID])->all() ?> 
                              <tr>
                                <td><?= $no ?></td>
                                <td><?= $pem->oRDER->ORDER_ID ?></td>
                                <td><?= $pem->oRDER->ORDER_TGL_ADD ?></td>
                                <td>
                                  <a href="#" data-toggle="modal" data-target="#modal<?=$no?>">
                                    <?php foreach($det as $det): ?>
                                    	<?= $det->kATALOG->KATALOG_BARANG ?>
                                    	<?php $harga = $det->kATALOG->KATALOG_HARGA ?>
                                    	<?php $total = $det->DETAILORDER_JUMLAH ?>
                                    	<?php $idkat = $det->kATALOG->KATALOG_ID ?>
                                    <?php endforeach ?>
                                  </a>  
                                </td>
                                <td>Rp. <?= number_format($harga) ?></td>
                                <td>Rp. <?= number_format($total) ?></td>
                                <td><?php $stat=$pem->oRDER->ORDER_STATUS ?>
                                  <?php if($stat==0): ?>
                                    <div class="btn bg-orange btn-block">Belum Konfirmasi</div>
                                  <?php elseif($stat==5): ?>
                                  <div class="btn bg-purple btn-block">Tertunda</div>
                                  <?php elseif($stat==10): ?>
                                  <div class="btn bg-olive btn-block">Berhasil</div>
                                  <?php else: ?>
                                  <div class="btn bg-maroon btn-block">Berhasil</div>
                                  <?php endif ?>
                                </td>
                                <td>
                                	<button class="btn btn-info btn-sm btn-flat"  data-toggle="modal" data-target="#bukti<?=$no?>">
                                		Cek
                                	</button>
                                </td>
                              </tr>
                              <!-- Modal  Bukti-->
                              <div class="modal fade" id="bukti<?=$no?>">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header bg-green">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title">Bukti Pembayaran <?= $pem->ORDER_ID ?></h4>
                                    </div>
                                    <div class="modal-body" style="min-height: 300px;">
                                      <?php $form = ActiveForm::begin(['options'=>['multipart/form-data'],'action' =>['transaksi/konjual/'.$pem->ORDER_ID]]); ?>

                                      <?= $form->field($pem->oRDER, 'ORDER_STATUS')->dropDownList([0=>'Belum Konfirmasi',5=>'Tertunda',10=>'Berhasil']) ?>
                                      <?php Yii::setAlias('@bukti','/sitama/backend/web/bukti/'.$pem->oRDER->BUKTI); ?>
                                      <?php if($pem->oRDER->BUKTI != NULL): ?>
                                        <img class="img-responsive" src="<?= Url::to('@bukti')?>" alt="Bukti picture">
                                      <?php else: ?>
                                        <h3>Belum Ada Bukti Pembayaran</h3>
                                      <?php endif ?>

                                    </div>
                                    <div class="modal-footer bg-green">
                                      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
                                      <div class="form-group">
                                          <?= Html::submitButton('Update',['class' => 'btn btn-outline pull-right']) ?>
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
