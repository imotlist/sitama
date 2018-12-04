<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
Yii::setAlias('@katalog', '../../katalog/'.$katalog->GAMBAR);
/* @var $this yii\web\View */
/* @var $model backend\models\Toko */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Form Pemesanan';
?>
<div class="toko-form">
    <div class="row">
        <?php $form = ActiveForm::begin(['options'=>['multipart/form-data']]); ?>
        <div class="box box-success">
            <div class="box-header with-border">
                <div class="box-tittle">
                     <h2 class="text-left text-primary panel-title">Detail Barang</h2>
                </div>
            </div>
        <div class="box-body">
        <div class="col-md-12">
                <div class="col-md-5">
                        <h2><?= $katalog->KATALOG_BARANG; ?></h2>
                        <center><img src="<?= Url::to('@katalog'); ?>" alt="gambar" width="80%"></center><hr>
                        <p><?= $katalog->KATALOG_DISKRIPSI; ?></p>
                </div>
            
            <div class="col-md-7">
                <div style="font-size: 20px">
                    Kode Pemesanan : <b><?= $idorder?></b>
                    <hr>
                    Harga Rp . <?= number_format($katalog->KATALOG_HARGA); ?>
                    <hr>
                </div>
                <?= $form->field($model, 'ORDER_ID')->textInput(['maxlength' => true,'value'=>$idorder,'type'=>'hidden'])->label(false) ?>
                <div class="row">
                    <div class="col-md-4" style="font-size: 20px">Jumlah Pembelian</div>
                    <div class="col-md-2">
                        <?= $form->field($detail, 'DETAILORDER_QTY')->textInput(['type'=>'number','onchange'=>'hitung()','onkeyup'=>'hitung()','id'=>'jumlah','min'=>1,'step'=>1,'required'=>true])->label(false) ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4" style="font-size: 20px">
                        Total Bayar
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($detail, 'DETAILORDER_JUMLAH')->textInput(['readonly' => true,'type'=>'number','id'=>'total'])->label(false) ?>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Pesan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-flat' : 'btn btn-primary']) ?>
                </div>
                
            </div>
            
            <?= $form->field($model, 'ID')->textInput(['maxlength' => true,'value'=>$user->id,'type'=>'hidden'])->label(false) ?>

            <?= $form->field($katalog, 'KATALOG_HARGA')->textInput(['type'=>'hidden','id'=>'harga'])->label(false) ?>
            <?= $form->field($detail, 'ORDER_ID')->textInput(['maxlength' => true,'value'=>$idorder,'type'=>'hidden'])->label(false) ?>

            <?= $form->field($detail, 'KATALOG_ID')->textInput(['maxlength' => true,'value'=>$katalog->KATALOG_ID,'type'=>'hidden'])->label(false) ?>
            <input type="hidden" name="stok" id="stok" value="<?= $katalog->STOK?>">
            <?= $form->field($katalog, 'KATALOG_HARGA')->textInput(['type'=>'hidden','id'=>'harga'])->label(false) ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    </div>
</div>
</div>

    
<script type="text/javascript">
	function hitung() {
        var stok = document.getElementById('stok').value;
		var harga = document.getElementById('harga').value;
		var jumlah = document.getElementById('jumlah').value;		
		if (jumlah < 0 || jumlah == 0 || jumlah > stok ) {
            if (jumlah < 0 || jumlah > stok) {
                if(jumlah < 0){
                    jumlah = jumlah * -1;
                    //var angka = parseInt(document.getElementById('angka').value);
                    var total = harga * jumlah;
                    //var total = dumb + angka;
                    document.getElementById('jumlah').value = jumlah;
                    document.getElementById('total').value = total;
                }else{
                    jumlah = stok;      
                    var total = harga * jumlah;
                    //var total = dumb + angka;
                    document.getElementById('jumlah').value = jumlah;
                    document.getElementById('total').value = total;
                }
            } else {
                jumlah = 1;
                //var angka = parseInt(document.getElementById('angka').value);
                var total = harga * jumlah;
                //var total = dumb + angka;
                document.getElementById('jumlah').value = jumlah;
                document.getElementById('total').value = total;
            }
        }else{
            //var angka = parseInt(document.getElementById('angka').value);
            var total = harga * jumlah;
            //var total = dumb + angka;
            document.getElementById('total').value = total;
        }
        

	}
</script>