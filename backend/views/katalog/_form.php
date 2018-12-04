<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Kategori;
use backend\models\Toko;
use backend\models\JenisBarang;

use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\Katalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="katalog-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
    <div class="col-md-12">
        <div class="col-md-3">
            <?= $form->field($model, 'KATEGORI_ID')->dropDownList(ArrayHelper::map(Kategori::find()->all(),'KATEGORI_ID','KATEGORI_NAMA')) ?>
            <?= $form->field($model, 'TOKO_ID')->dropDownList(ArrayHelper::map(Toko::find()->all(),'TOKO_ID','TOKO_NAMA')) ?>
            <?php
                if (!$model->isNewRecord) {
                    echo "<img src='/sitama/frontend/web/katalog/".$model->GAMBAR."' width='100%'>";
                }
            ?>
            <?php if($model->isNewRecord): ?>
                <?= $form->field($model, 'GAMBAR')->fileInput(['required'=>true]) ?>
            <?php else: ?>
                <?= $form->field($model, 'GAMBAR')->fileInput() ?>
            <?php endif ?>
            

        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                <?= $form->field($model, 'KATALOG_JUDUL')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'KATALOG_BARANG')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'KATALOG_HARGA')->textInput() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'JENIS_BARANG_ID')->dropDownList(ArrayHelper::map(JenisBarang::find()->all(),'JENIS_BARANG_ID','JENIS_BARANG_NAMA')) ?>
                <?= $form->field($model, 'KATALOG_STATUS')->dropDownList([10 => 'Aktif', 0 => 'Tidak AKtif']) ?>
            </div>  
            </div>          

            <?= $form->field($model, 'KATALOG_DISKRIPSI')->textArea(['maxlength' => true,'id'=>'editor1']) ?>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
        <div class="col-md-1">
            
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<script src="../../vendor/almasaeed2010/adminlte/bower_components/ckeditor/ckeditor.js"></script>
<script src="../../vendor/almasaeed2010/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>