<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\KelompokTaniSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kelompok-tani-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'KELOMPOKTANI_ID') ?>

    <?= $form->field($model, 'KELOMPOKTANI_NAMA') ?>

    <?= $form->field($model, 'KELOMPOKTANI_DESA') ?>

    <?= $form->field($model, 'KELOMPOKTANI_STATUS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
