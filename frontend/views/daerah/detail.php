<?php 
use dosamigos\chartjs\ChartJs;
use backend\models\User;
use backend\models\Daerah;

use backend\models\AuthAssignment;
$daerah = Daerah::findOne($id);
$this->title = "Data Komoditas";
?>

<div class="col-md-12">
    <div class="box box-info">
        <div class="box box-header">
            <h2>Komoditas Daerah <?= $daerah->DAERAH_NAMA ?></h2>
        </div>
        <div class="box-body">
            <div class="col-md-3"></div>
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
        </div>
    </div>
</div>

