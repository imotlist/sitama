<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<div class="container">
            <div class="row">
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-4">

                    <div class="box box-info"   style="background-image: url('../../backend/web/image/padi.jpg'); background-repeat: no-repeat; background-position: right bottom">
                        <div class="box-header with-border">
                            <div class="box-tittle">
                            <h2 class="text-left text-primary panel-title">Masukan Username dan Password</h2>
                        </div>
                        </div>
                        <div class="box-body" style="min-height: 300px">
                                <a class="pull-right" href="<?= Url::to(['request-password-reset']) ?>">Lupa Password?</a>
                                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                                <?= $form->field($model, 'password')->passwordInput() ?>

                                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                                

                                <div class="form-group">
                                    <?= Html::submitButton('Masuk', ['class' => 'btn btn-primary btn-flat', 'name' => 'login-button']) ?>
                                </div>

                                <?php ActiveForm::end(); ?>                        
                        </div>
                        
</div>
                </div>

            </div>
        </div>
