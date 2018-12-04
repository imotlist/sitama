<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\KelompokTani;



/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */


$role = Yii::$app->user->identity->getRoleName();

?>
<div class="user-form">
<div class="row">
    <div class="col-md-12">
        
        <div class="col-md-3">
            <?php if (!$model->isNewRecord): ?>
                <center>
                    <a href="index.php?r=user/gantipw&id=<?= $model->ID; ?>">
                    <button class="btn btn-warning btn-flat">Ganti Password</button>
                    </a>
                </center>
                <img src="/sitama/frontend/web/foto/<?= $model->USER_FOTO; ?>" width="100%">
                <?php endif ?>
            <?php $form = ActiveForm::begin(['options'=>['multipart/form-data']]); ?>                
            <?php if($model->isNewRecord): ?>
                <?= $form->field($model, 'USER_FOTO')->fileInput(['required'=>true]) ?>
            <?php else: ?>
                <?= $form->field($model, 'USER_FOTO')->fileInput() ?>
            <?php endif ?>

        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'username')->textInput(['maxlength' => true,'required'=>true]) ?>
                    <?php if($role=='KetuaRole'): ?>
                    <?php $idkel = Yii::$app->user->identity->KELOMPOKTANI_ID ?>
                    <?= $form->field($model, 'KELOMPOKTANI_ID')->dropDownList(ArrayHelper::map(KelompokTani::find()->where(['KELOMPOKTANI_ID'=>$idkel])->all(),'KELOMPOKTANI_ID','KELOMPOKTANI_NAMA'))->label('Nama Kelompok') ?>
                    <?php else: ?>
                        <?= $form->field($model, 'KELOMPOKTANI_ID')->dropDownList(ArrayHelper::map(KelompokTani::find()->all(),'KELOMPOKTANI_ID','KELOMPOKTANI_NAMA'))->label('Nama Kelompok') ?>
                    <?php endif ?>
                    <?= $form->field($model, 'status')->dropDownList([10 => 'Aktif', 0 => 'Tidak Aktif'],['prompt' => 'Pilih Status User']) ?>
                    
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true,'required'=>true]) ?>
                    <?php if ($model->isNewRecord):?>
                    <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true,'required'=>true]) ?>
                    <?php endif ?>
                    <?= $form->field($model, 'USER_TELP')->textInput(['maxlength' => true,'placeholder'=>'08x-xxx-xxx-xxx'])->label('No Telp / Hp') ?>
                </div>  
            </div>          
            <?= $form->field($model, 'USER_ALAMAT')->textArea(['required'=>true])->label('Alamat') ?>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            <p class="pull-right">* Semua Kolom Wajib Diisi</p>
        </div>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
