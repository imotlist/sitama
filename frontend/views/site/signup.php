<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Kelompoktani;

$this->title = 'Halaman Daftar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="row">
        <div class="col-md-4">                    
                </div>
        <div class="col-lg-4">
            <div class="box box-info" style="background-image: url('../../backend/web/image/padi.jpg'); background-repeat: no-repeat; background-position: right bottom">
                <div class="box-header with-border">
                            <div class="box-tittle">
                            <h2 class="text-left text-primary panel-title">Masukan Data Diri</h2>
                        </div>
                        </div>
                <div class="box-body">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'KELOMPOKTANI_ID')->dropDownList(ArrayHelper::map(Kelompoktani::find()->all(),'KELOMPOKTANI_ID','KELOMPOKTANI_NAMA')) ?>

                        <?= $form->field($model, 'email') ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <div class="form-group">
                            <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
        </div>
    </div>
</div>
</div>