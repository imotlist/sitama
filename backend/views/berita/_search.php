<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BeritaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="berita-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'berita_id') ?>

    <?= $form->field($model, 'berita_judul') ?>

    <?= $form->field($model, 'berita_isi') ?>

    <?= $form->field($model, 'berita_gambar') ?>

    <?= $form->field($model, 'berita_tgl') ?>

    <?php // echo $form->field($model, 'berita_counter') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
