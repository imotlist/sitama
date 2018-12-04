<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Permintaan Lupa Password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">
    

    

    <div class="row">
        <div class="col-lg-3">
            
        </div>
        <div class="col-lg-6">
            <div class="box box-info">
                <div class="box-header">
                    <h1><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="box-body">
                    <p>Isikan email anda.</p>
                    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                        <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Kirim', ['class' => 'btn btn-primary']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            
        </div>
    </div>
</div>
