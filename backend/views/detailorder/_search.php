<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DetailorderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detailorder-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ORDER_ID') ?>

    <?= $form->field($model, 'KATALOG_ID') ?>

    <?= $form->field($model, 'DETAILORDER_ID') ?>

    <?= $form->field($model, 'DETAILORDER_QTY') ?>

    <?= $form->field($model, 'DETAILORDER_JUMLAH') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
