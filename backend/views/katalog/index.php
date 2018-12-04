<?php

use yii\helpers\Html;
use yii\grid\GridView;
use phpnt\exportFile\ExportFile;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\KatalogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Katalog';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="katalog-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Katalog', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'KATALOG_ID',
            'KATEGORI_ID',
            'TOKO_ID',
            'JENIS_BARANG_ID',
            'KATALOG_JUDUL',
            // 'KATALOG_BARANG',
            // 'KATALOG_HARGA',
            // 'KATALOG_TGL_POST',
            // 'KATALOG_DISKRIPSI',
            // 'KATALOG_STATUS',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
