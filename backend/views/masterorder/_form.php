<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\Masterorder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="masterorder-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ORDER_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID')->dropDownList(ArrayHelper::map(User::find()->all(),'id','username')) ?>

    <?= $form->field($model, 'ORDER_TGL_ADD')->textInput() ?>

    <?= $form->field($model, 'ORDER_TGL_EXP')->textInput() ?>

    <?= $form->field($model, 'ORDER_STATUS')->dropDownList([10=>'Proses',5=>'Menunggu',0=>'Belum Konfirmasi']) ?>
    <?php if(!$model->isNewRecord): ?>
        <img src="<?= $model->BUKTI ?>" width="20%">
    <?php endif ?>

    <?= $form->field($model, 'BUKTI')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
