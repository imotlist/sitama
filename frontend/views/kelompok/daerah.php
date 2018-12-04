<?php 
use dosamigos\chartjs\ChartJs;
use backend\models\User;
use backend\models\Toko;
use backend\models\Katalog;
use backend\models\Daerah;
use backend\models\AuthAssignment;

$daerah = Daerah::find()->all();

$this->title = "Data Kelompok";
?>

<div class="col-md-12">
    <div class="box box-info">
        <div class="box box-header">
            <h2>Komoditas Kelompok Pertanian</h2>
        </div>
        <div class="box-body">
            
        </div>
        <div class="box-footer bg-blue">
            <center>Sistem Informasi Tani Bersama</center>   
        </div>
    </div>
</div>
