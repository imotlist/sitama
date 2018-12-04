<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Berita */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="berita-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'berita_judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'berita_isi')->textarea(['rows' => 6,'id'=>'editor1']) ?>

    <?php if($model->isNewRecord): ?>
        <?= $form->field($model, 'berita_gambar')->fileInput(['maxlength' => true,'required'=>true]) ?>
    <?php else: ?>
        <?= $form->field($model, 'berita_gambar')->fileInput(['maxlength' => true]) ?>
    <?php endif ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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