<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Kategori;
use backend\models\Toko;
use backend\models\JenisBarang;

use yii\helpers\Url;
Yii::setAlias('@katalog', '../../katalog/'.$model->GAMBAR);
/* @var $this yii\web\View */
/* @var $model backend\models\Katalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="katalog-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
    <div class="col-md-1"></div>

    <div class="box box-info">
        <div class="box-header with-border">
              <h3 class="box-title">Edit Data Barang</h3>
        </div>
        <div class="box-body">
            <div class="col-md-10" style="min-height: 600px">
            <div class="col-md-4">
                <?php
                if (!$model->isNewRecord): ?>                
                    <img src='<?= Url::to('@katalog'); ?>' class="img-responsive">
                <?php endif ?>
                    <?= $form->field($model, 'GAMBAR')->fileInput(['onchange'=>'js:readURL(this)']) ?>
                    <img class="img-responsive" alt="Review Gambar" src="#" id="test" style="display: none">
            </div>
            <div  class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'KATEGORI_ID')->dropDownList(ArrayHelper::map(Kategori::find()->all(),'KATEGORI_ID','KATEGORI_NAMA'))->label('Kategori Barang') ?>
                        <?= $form->field($model, 'JENIS_BARANG_ID')->dropDownList(ArrayHelper::map(JenisBarang::find()->all(),'JENIS_BARANG_ID','JENIS_BARANG_NAMA'))->label('Jenis Barang') ?>

                        <?= $form->field($model, 'TOKO_ID')->textInput(['type'=>'hidden'])->label(false) ?>
                    </div>
                    <div class="col-md-6">
                        
                        <?= $form->field($model, 'KATALOG_HARGA')->textInput()->label('Harga Barang') ?>
                        <?= $form->field($model, 'STOK')->textInput()->label('Stok Barang') ?>

                        <?= $form->field($model, 'KATALOG_STATUS')->dropDownList([10 => 'Aktif', 0 => 'Tidak Aktif']) ?> 
                    </div>
                </div>

                <?= $form->field($model, 'KATALOG_JUDUL')->textInput(['maxlength' => true])->label('Judul Post') ?>

                <?= $form->field($model, 'KATALOG_BARANG')->textInput(['maxlength' => true])->label('Barang') ?>


                <?= $form->field($model, 'KATALOG_DISKRIPSI')->textArea(['id'=>'editor1'])->label('Diskripsi') ?>

                  

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>
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