<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\GambarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gambar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'gambar_id') ?>

    <?= $form->field($model, 'gambar_nama') ?>

    <?= $form->field($model, 'gambar_file') ?>

    <?= $form->field($model, 'gambar_ket') ?>

    <?= $form->field($model, 'gambar_stat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
