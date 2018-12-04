<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\KelompokTani */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kelompok-tani-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KELOMPOKTANI_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KELOMPOKTANI_NAMA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KELOMPOKTANI_DESA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KELOMPOKTANI_STATUS')->dropDownList([10 => 'Aktif', 0 => 'Tidak Aktif'],['prompt' => 'Pilih Status']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
