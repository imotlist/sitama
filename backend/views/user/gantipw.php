<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\KelompokTani;


/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Ganti Password';
?>
<div class="user-form">
    
<div class="row">
    <div class="col-md-4">
        <?php $form = ActiveForm::begin(['options'=>['multipart/form-data']]); ?>

            <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true,'value'=>'','required'=> true]) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Simpan', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>
    <?php ActiveForm::end(); ?>
