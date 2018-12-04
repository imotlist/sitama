<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use backend\models\Kelompoktani;
use Yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\Katalog */

$no = 1;
$this->title = "Kelompok Tani";
?>
<div class="container">
<div class="row">
    <div class="col-md-12">
        <?php $form = ActiveForm::begin(['options'=>['multipart/form-data'],'action' =>['kelompok/index']]); ?>

            <div class="col-md-9" style="padding-right: 0">
                <?= $form->field($cari, 'KELOMPOKTANI_NAMA')->textInput(['placeholder'=>'Masukan Kata Pencarian ...', 'required'=>true])->label(false) ?>
            </div>
            <div  class="col-md-3" style="padding-left: 0">
                <?= Html::submitButton('Cari', ['class' => 'btn btn-info btn-flat','style'=>'min-width:100%;']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <?php foreach ($kelompok as $kelompok ):?>

        <div class="col-md-4" style="padding-bottom: 30px">
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <?php if($no % 2 == 1):  ?>
                    <div class="widget-user-header bg-blue" style="padding-bottom: 0">
                <?php else:  ?>
                    <div class="widget-user-header bg-green">
                <?php endif  ?>               
                    <h5 class="widget-user-username"><?= $kelompok->KELOMPOKTANI_NAMA ?></h5>
                    
                </div>
                <div class="box-footer" style="min-height: 150px; max-height: 150px">
                    <div class="col-md-12"  style="min-height: 80px; max-height: 80px">
                        
                        <?= $kelompok->KELOMPOKTANI_DESA ?> ...
                    </div>

                    <div class="pull-right" >
                        <a href="<?= Url::to(['kelompok/detail','id'=>$kelompok->KELOMPOKTANI_ID]) ?>">
                            <button class="btn btn-success btn-flat btn-sm">Detail</button>
                        </a>
                    </div>
                    
                </div>

            </div>
                <!-- /.widget-user -->
        </div>
   

    <?php $no++; ?>
    <?php endforeach ?>
    </div>
    <div>
        <center>
            <?= LinkPager::widget(['pagination' => $pages,]); ?>
        </center>
    </div>
</div>
</div>
