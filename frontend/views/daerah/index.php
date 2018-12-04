<?php 

use dosamigos\chartjs\ChartJs;
use backend\models\User;
use backend\models\Toko;
use backend\models\Katalog;
use backend\models\Daerah;
use Yii\helpers\Url;

$this->title = "Data Kelompok";
?>

<div class="col-md-12">
    <div class="box box-info">
        <div class="box box-header bg-blue">
            <h2>Komoditas Berdasar Daerah</h2>
        </div>
        <div class="box-body" style="min-height: 500px">
            <div class="list-group">
          <?php foreach ($daerah as $d): ?>            
            <a class="list-group-item" href="/sitama/frontend/web/daerah/detail/<?=$d->DAERAH_ID?>"><?= $d->DAERAH_NAMA?></a>
          <?php endforeach ?>            
      </div>
        </div>
        <div class="box-footer bg-blue">
            <center>Sistem Informasi Tani Bersama</center>   
        </div>
    </div>
</div>
