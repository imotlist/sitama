<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TokoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Toko';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="toko-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Toko', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'TOKO_ID',
            //'ID',
            [
                'attribute'=>'username',
                'label' => 'Username',
                'value' => function($data){
                    return $data->iD->username;
                }
            ],
            'TOKO_NAMA',
            'TOKO_ALAMAT',
            'TOKO_TELP',
            // 'TOKO_DISKRIPSI:ntext',
            // 'TOKO_STATUS',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
