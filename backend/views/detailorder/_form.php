<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Masterorder;
use backend\models\Katalog;

/* @var $this yii\web\View */
/* @var $model backend\models\Detailorder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detailorder-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ORDER_ID')->dropDownList(ArrayHelper::map(Masterorder::find()->all(),'ORDER_ID','ID')) ?>

    <?= $form->field($model, 'KATALOG_ID')->dropDownList(ArrayHelper::map(Katalog::find()->all(),'KATALOG_ID','KATALOG_JUDUL')) ?>

    <?= $form->field($model, 'DETAILORDER_ID')->textInput() ?>

    <?= $form->field($model, 'DETAILORDER_QTY')->textInput() ?>

    <?= $form->field($model, 'DETAILORDER_JUMLAH')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
