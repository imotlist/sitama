<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use backend\models\Berita;
use Yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\Katalog */

$no = 1;
$this->title = "Daftar Artikel";
?>
<div class="container">
<div class="row">
    <div class="col-md-12">
        <?php $form = ActiveForm::begin(['options'=>['multipart/form-data'],'action' =>['berita/index']]); ?>

            <div class="col-md-9" style="padding-right: 0">
                <?= $form->field($cari, 'berita_judul')->textInput(['placeholder'=>'Masukan Kata Pencarian ...'])->label(false) ?>
            </div>
            <div  class="col-md-3" style="padding-left: 0">
                <?= Html::submitButton('Cari Artikel', ['class' => 'btn btn-info btn-flat','style'=>'min-width:100%;']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <?php foreach ($berita as $berita ):?>

        <div class="col-md-4" style="padding-bottom: 30px">
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <?php if($no % 2 == 1):  ?>
                    <div class="widget-user-header bg-blue" style="padding-bottom: 0">
                <?php else:  ?>
                    <div class="widget-user-header bg-green">
                <?php endif  ?>               
                    <h5 class="widget-user-username"><?= $berita->berita_judul ?></h5>
                    
                </div>
                    <i style="padding-left: 5px">Dibaca <?= $berita->berita_counter; ?> Kali</i>
                <div class="box-footer" style="min-height: 150px; max-height: 150px">
                    <div class="col-md-12"  style="min-height: 80px; max-height: 80px">
                        <?php $isi = substr($berita->berita_isi, 0,100); ?>
                        <?= $isi; ?> ...
                    </div>

                    <div class="pull-right" >
                        <a href="<?= Url::to(['berita/detail','id'=>$berita->berita_id]) ?>">
                            <button class="btn btn-warning btn-flat btn-sm">Baca</button>
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
