<?php 
use dosamigos\chartjs\ChartJs;
use backend\models\User;
use backend\models\AuthAssignment;

$this->title = "Data Kelompok";
?>

<div class="col-md-12">
    <div class="box box-info">
        <div class="box box-header">
            <h2>Komoditas Kelompok Pertanian</h2>
        </div>
        <div class="box-body">
            <div class="col-md-6">
                <?= ChartJs::widget([
                        'type' => 'pie',
                        'options' => [
                            'height' => 400,
                            'width' => 400
                        ],
                        'data' => [
                            'labels' => ["Alat Pertanian", "Obat Pertanian", "Pupuk", "Hasil Panen", "Bibit Tanaman"],
                            'datasets' => [
                                [
                                    'label' => "My First dataset",
                                    'backgroundColor' => ["#2474f4","#f43c24","#ffe53d","#28ff4c","#c9cdd3"],
                                    'borderColor' => "rgba(179,181,198,1)",
                                    'pointBackgroundColor' => "rgba(179,181,198,1)",
                                    'pointBorderColor' => "#fff",
                                    'pointHoverBackgroundColor' => "#fff",
                                    'pointHoverBorderColor' => "rgba(179,181,198,1)",
                                    'data' => [$data[0], $data[1],$data[2],$data[3],$data[4]],
                                ],
                            ]
                        ]
                    ])
                ?>
            </div>
            <?php
                $jml = User::find()->where(['KELOMPOKTANI_ID'=>$kel->KELOMPOKTANI_ID])
                                   ->count('ID');
                                      //->all();
                $ket = User::find()->where(['KELOMPOKTANI_ID'=>$kel->KELOMPOKTANI_ID])->all();
            ?>
            <div class="col-md-6">
                <div class="box box-info" style="min-height: 500px">
                    <div class="box-header bg-blue">
                        <center><h2><?= $kel->KELOMPOKTANI_NAMA; ?></h2></center>
                    </div>
                    <div class="box-body bg-success" style="min-height: 415px">
                        <h4><i class="glyphicon glyphicon-leaf"></i> Desa
                            <br>
                            <div class="pull-right"><?= $kel->KELOMPOKTANI_DESA ?></div>
                        <hr>
                        </h4>
                        <h4><i class="glyphicon glyphicon-user"></i> Jumlah Anggota
                            <br>
                            <div class="pull-right"><?= $jml ?></div>
                        </h4>
                        <hr>
                        <h4><i class="glyphicon glyphicon-tower"></i> Ketua
                            <br>
                            <div class="pull-right">
                            <?php
                                foreach ($ket as $k) {
                                    $cari = AuthAssignment::find()->where(['item_name'=>'KetuaRole','user_id'=>$k->ID])->all();
                                    foreach ($cari as $key) {
                                        
                                        $user = User::findOne($key->user_id);
                                        echo $user->username;
                                    }
                                }
                            ?>
                            </div>
                        </h4>
                        <hr>
                    </div>
                    <div class="box-footer bg-blue">
                     <center>Sistem Informasi Tani Bersama</center>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
