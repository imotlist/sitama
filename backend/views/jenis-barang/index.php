<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JenisBarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jenis Barang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-barang-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Jenis Barang', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'JENIS_BARANG_ID',
            'JENIS_BARANG_NAMA',
            'KETERANGAN',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
