<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use backend\models\Berita;

Yii::setAlias('@berita', '../../berita/'.$model->berita_gambar);
/* @var $this yii\web\View */
/* @var $model backend\models\Katalog */

                        $tgl1 = $model->berita_tgl;
                        $tgl = str_replace('-','', $tgl1);
                        $bln = substr($tgl,4,2);
                        $tgl2 = substr($tgl,6,2);
                        $thn = substr($tgl,0,4);
                        $fix = $tgl2.'-'.$bln.'-'.$thn;


$no = 1;
$this->title = "Detail Artikel";
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-widget widget-user">

                    <div class="widget-user-header bg-blue">
                    	<h2><?= $model->berita_judul; ?></h2>
                    	<i style="padding-left: 5px">Dibaca <?= $model->berita_counter; ?> Kali</i>
                    	<i class="pull-right">Di Posting Tanggal : <?= $fix ?></i>
					</div>
                    
                	<div class="box-body" style="min-height: 500px">
                    <div class="col-md-7">
                    	<?= $model->berita_isi ?>
                    </div>
                    <div class="col-md-5">
                    	<img class="img-responsive" src="<?= Url::to('@berita')?>">
                    </div>
                                      
                </div>

            </div>
                <!-- /.widget-user -->
        </div>
		</div>
	</div>
</div>