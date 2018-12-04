<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TokoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="toko-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'TOKO_ID') ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'TOKO_NAMA') ?>

    <?= $form->field($model, 'TOKO_ALAMAT') ?>

    <?= $form->field($model, 'TOKO_TELP') ?>

    <?php // echo $form->field($model, 'TOKO_DISKRIPSI') ?>

    <?php // echo $form->field($model, 'TOKO_STATUS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
