<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\KatalogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="katalog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'KATALOG_ID') ?>

    <?= $form->field($model, 'KATEGORI_ID') ?>

    <?= $form->field($model, 'TOKO_ID') ?>

    <?= $form->field($model, 'JENIS_BARANG_ID') ?>

    <?= $form->field($model, 'KATALOG_JUDUL') ?>

    <?php // echo $form->field($model, 'KATALOG_BARANG') ?>

    <?php // echo $form->field($model, 'KATALOG_HARGA') ?>

    <?php // echo $form->field($model, 'KATALOG_TGL_POST') ?>

    <?php // echo $form->field($model, 'KATALOG_DISKRIPSI') ?>

    <?php // echo $form->field($model, 'KATALOG_STATUS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
