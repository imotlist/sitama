<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\KelompokTani;

use yii\helpers\Url;
Yii::setAlias('@user', '../../foto/'.$model->USER_FOTO);
/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="user-form">
<?php $form = ActiveForm::begin(['options'=>['multipart/form-data']]); ?>
<div class="row">
    <div class="col-md-1"></div>
    <div class="box box-info">
        <div class="box-header with-border">
              <h3 class="box-title">Edit Profil User</h3>
              <div class="pull-right"><b><i>Semua kolom wajib diisi</i></b></div>
        </div>
        <div class="box-body">
            <div class="col-md-10" style="min-height: 600px">
                <div class="col-md-4">
                    <center>
                        <a href="" class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#pass">
                            Ganti Password
                        </a>
                    </center>
                     
                    <hr>
                    <?php
                    if (!$model->isNewRecord): ?>                
                        <img src="<?= Url::to('@user'); ?>"  class="img-responsive">
                        <?= $form->field($model, 'USER_FOTO')->fileInput(['onchange'=>'js:readURL(this)']) ?>
                    <?php else: ?>
                        <?= $form->field($model, 'USER_FOTO')->fileInput(['onchange'=>'js:readURL(this)','required'=>true]) ?>
                        <img class="img-responsive" alt="Review Gambar" src="#" id="test" style="display: none">
                    <?php endif ?>
                </div>
                <div class="col-md-8">
                    <?= $form->field($model, 'username')->textInput(['maxlength' => true,'required'=>true]) ?>

                    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'type'=> 'email','required'=>true]) ?>

                    <?= $form->field($model, 'USER_ALAMAT')->textArea(['required'=>true])->label('Alamat Lengkap') ?>

                    <?= $form->field($model, 'USER_TELP')->textInput(['maxlength' => true,'required'=>true])->label('No Telp') ?>            

                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Simpan', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
    

    <?php ActiveForm::end(); ?>
<!-- Modal -->
                              <div class="modal fade" id="pass">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header bg-orange">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title">Ganti Password</h4>
                                    </div>
                                    <div class="modal-body" style="min-height:200px;">
                                    <?php $form = ActiveForm::begin(['action'=>['user/gantipass','id'=>$model->ID]]); ?>
                                        <label>Password Baru</label>
                                        <input id="pass1" onkeyup="pass()" type="password" name="pass1" class="form-control">
                                        <label>Masukan Lagi</label>
                                        <input id="pass2" onkeyup="cek()" type="password" name="pass2" class="form-control">
                                        <p id="notif"></p>
                                    
                                    </div>
                                    <div class="modal-footer bg-orange">
                                      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
                                      <?= Html::submitButton('Simpan', ['class' => 'btn btn-outline pull-right','id'=>'tombol']) ?>
                                      <?php ActiveForm::end(); ?>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->
</div>

<script type="text/javascript">
        function readURL(input){
            if (input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#test').attr('src',e.target.result);
                }
                document.getElementById('test').style.display='inline-block';
                reader.readAsDataURL(input.files[0]);

            }
        }
</script>
<script type="text/javascript">
    function cek(){
        var pass1 = document.getElementById('pass1').value;
        var pass2 = document.getElementById('pass2').value;
        if(pass1 != pass2){
            document.getElementById('notif').innerHTML='Password Tidak Sama';
            document.getElementById('tombol').style.display='none';
        }else{
            document.getElementById('notif').innerHTML='';
            document.getElementById('tombol').style.display='inline-block';
        }
    }
</script>
<script type="text/javascript">
    function pass(){
        var pass1 = document.getElementById('pass1').value;
        var pass2 = document.getElementById('pass2').value;
        if(pass1.length < 6){
            document.getElementById('notif').innerHTML='Password Minimal 6 Karakter';
            document.getElementById('tombol').style.display='none';
        }else{
            document.getElementById('notif').innerHTML='';
            document.getElementById('tombol').style.display='inline-block';
        }
    }
</script>