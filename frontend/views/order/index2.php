<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;
use backend\models\Katalog;

$katalog = Katalog::findOne($dorder['KATALOG_ID']);

/* @var $this yii\web\View */
/* @var $model backend\models\Katalog */

$this->title = "Hasil Order";
?>
<div class="container">
	<div class="row">
		<div class="col-md-2">
			
		</div>

		<div class="col-md-8">
			<div class="box box-success">
                <div class="box-header with-border">
                    <div class="box-tittle">
                        <h2>Pemesanan Berhasil</h2>
                    </div>
                </div>
                <div class="box-body">

                	<div class="row">
                		<div class="col-md-8">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <td>Kode Pemesanan</td>
                                        <td><b><?= $morder['ORDER_ID'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Barang</td>
                                        <td><b><?= $katalog['KATALOG_BARANG'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Harga</td>
                                        <td><b>Rp. <?= number_format($katalog['KATALOG_HARGA']) ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Pembelian</td>
                                        <td><b><?= $dorder['DETAILORDER_QTY'] ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Bayar</td>
                                        <td><b>Rp. <?= number_format($dorder['DETAILORDER_JUMLAH']) ?></b></td>
                                    </tr>
                                </tbody>
                            </table>
                		</div>
                		<div class="col-md-4">
                			<img src="../../web/katalog/<?= $katalog['GAMBAR']?>" width="200" height="200">
                		</div>
                	</div>
                	<div class="row">
                		<div class="col-md-12">                			
                			<p style="font-size: 18px">
                                Silahkan transfer sesuai dengan total yang tertera melalui <?= $katalog->tOKO->NAMA_BANK ?> No rek <b><?= $katalog->tOKO->NO_REK ?> A/N <?= $katalog->tOKO->ATAS_NAMA?></b></p>
                			<p style="font-size: 18px"> Setelah melakukan transfer klik tombol di bawah atau pada halaman user bagian pembelian untuk konfirmasi pembayaran.
                            <hr>
                            <?php $form = ActiveForm::begin(); ?>

                                <?= $form->field($morder, 'BUKTI')->fileInput() ?>
                                <div class="form-group">
                                    <?= Html::submitButton($morder->isNewRecord ? 'Create' : 'Upload', ['class' => $morder->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                </div>

                            <?php ActiveForm::end(); ?>
                			</p>
                		</div>
                	</div>
                </div>
            </div>
		</div>
	</div>
</div>