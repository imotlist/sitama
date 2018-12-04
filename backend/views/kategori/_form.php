<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Kategori */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kategori-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php if ($model->isNewRecord) { ?>
	    <?= $form->field($model, 'KATEGORI_ID')->textInput(['maxlength' => true]) ?>
    <?php }else{ ?>
    	<?= $form->field($model, 'KATEGORI_ID')->textInput(['maxlength' => true,'readonly'=>true]) ?>
    <?php } ?>
    <?= $form->field($model, 'KATEGORI_NAMA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KATEGORI_DISKRIPSI')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
