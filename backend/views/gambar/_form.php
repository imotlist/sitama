<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Gambar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gambar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'gambar_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gambar_nama')->textInput(['maxlength' => true]) ?>

    <?php
    if (!$model->isNewRecord) {
        echo "<img src='".$model->gambar_file."' width='30%' height='20%'>";
    }
    ?>
    <?= $form->field($model, 'gambar_file')->fileInput() ?>

    <?= $form->field($model, 'gambar_ket')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gambar_stat')->dropDownList(['10' => 'Aktif','0' => 'Tidak Aktif']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
