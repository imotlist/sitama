<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;
use backend\models\Katalog;
use backend\models\Toko;

$katalog = Katalog::findOne($dorder['KATALOG_ID']);
$toko = Toko::findOne($katalog->TOKO_ID);

/* @var $this yii\web\View */
/* @var $model backend\models\Katalog */

$this->title = "Hasil Order";
?>
<div class="toko-form">
    <div class="row">
        <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> SITaMa
            <small class="pull-right">Tanggal : <?= date('d-M-Y'); ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        
        <div class="col-sm-4 invoice-col">
          Dari
          <address>
            <strong><?= $toko->iD->username; ?></strong><br>
            Pemilik : <?= $toko->TOKO_NAMA ?><br>
            <?= $toko->iD->USER_ALAMAT; ?><br>
            Phone: <?= $toko->iD->USER_TELP ?><br>
            Email: <?= $toko->iD->email ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Kepada
          <address>
            <strong><?= $morder->iD->username; ?></strong><br>
            <?= $morder->iD->USER_ALAMAT; ?><br>
            Phone: <?= $morder->iD->USER_TELP ?><br>
            Email: <?= $morder->iD->email ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <br>
          <b>Kode Pemesanan : </b><?= $morder['ORDER_ID'] ?><br>
          <b>Batas Pembayaran : </b> <?= $morder['ORDER_TGL_EXP'] ?><br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Nama Barang</th>
              <th>Harga Satuan</th>
              <th>Jumlah Beli</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td><?= $katalog['KATALOG_BARANG'] ?></td>
              <td>Rp. <?= number_format($katalog['KATALOG_HARGA']) ?></td>
              <td><?= $dorder['DETAILORDER_QTY'] ?></td>
              <td>Rp. <?= number_format($dorder['DETAILORDER_JUMLAH']) ?></td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods:</p>

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Silahkan transfer sesuai dengan total pembelian yang tertera melalui <b><?= $katalog->tOKO->NAMA_BANK ?></b> dengan No rek <b><?= $katalog->tOKO->NO_REK ?></b> Atas Nama <b><?= $katalog->tOKO->ATAS_NAMA?></b><br>Setelah melakukan transfer klik tombol di bawah atau pada halaman user bagian pembelian untuk konfirmasi pembayaran.
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">

          <p class="lead">Batas Pembayaran <?= date('d-M-Y', strtotime('2 day')); ?></p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>Rp. <?= number_format($dorder['DETAILORDER_JUMLAH']) ?></td>
              </tr>
              <tr>
                <?php $pajak = $dorder['DETAILORDER_JUMLAH'] * 0.1 ; ?>
                <th>Pajak PPN (10%):</th>
                <td>Rp. <?= number_format($pajak); ?></td>
              </tr>
              <tr>
                <th>Pengiriman:</th>
                <td>Rp. 0</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>Rp. <?= number_format($pajak + $dorder['DETAILORDER_JUMLAH'])  ?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <button type="button" class="btn bg-red btn-md btn-flat pull-left" onclick="cetak()">Cetak</button>
          <button type="button" class="btn btn-primary btn-md btn-flat pull-right" data-toggle="modal" data-target="#myModal">Kirim Bukti Pembayaran</button>
<!-- Modal -->
                                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Konfirmasi Pembayaran</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                        <?php $form = ActiveForm::begin(['options'=>['multipart/form-data'],'action' =>['order/index','id'=>$morder->ORDER_ID]]); ?>
                                                        <?= $form->field($morder, 'ORDER_ID')->textInput(['readonly'=>true])->label('Kode Order') ?>
                                                        <?= $form->field($morder, 'BUKTI')->fileInput(['required'=>true]) ?>
                                                        
                                                        </div>
                                                      <div class="modal-footer">
                                                        <?= Html::submitButton($morder->isNewRecord ? 'Create' : 'Update', ['class' => $morder->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                                        <?php ActiveForm::end(); ?>
                                                      </div>
                                                          </div>
                                                        </div>
                                                      </div>

                                                    
        </div>
      </div>
    </section>
    </div>
</div>
<script>
  function cetak() {
    window.print();
  }
</script>