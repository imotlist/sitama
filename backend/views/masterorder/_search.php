<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MasterorderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="masterorder-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ORDER_ID') ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'ORDER_TGL_ADD') ?>

    <?= $form->field($model, 'ORDER_TGL_EXP') ?>

    <?= $form->field($model, 'ORDER_STATUS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
