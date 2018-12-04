<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Testimoni */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="testimoni-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-12">
    	<div class="col-md-4">
			<?= $form->field($model, 'testi_gambar')->fileInput(['maxlength' => true]) ?>
			<div class="form-group">
        	<?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Edit', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    		</div>		
    	</div>
    	<div class="col-md-8">
    		<?= $form->field($model, 'testi_nama')->textInput(['maxlength' => true]) ?>

		    <?= $form->field($model, 'testi_quote')->textarea(['rows' => 6,'id'=>'editor1'])  ?>		    
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