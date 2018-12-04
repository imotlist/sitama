<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Katalog */

$this->title = $model->KATALOG_ID;
$this->params['breadcrumbs'][] = ['label' => 'Katalog', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="katalog-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->KATALOG_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->KATALOG_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah yakin hapus data ini ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'KATALOG_ID',
            'KATEGORI_ID',
            'TOKO_ID',
            'JENIS_BARANG_ID',
            'KATALOG_JUDUL',
            'KATALOG_BARANG',
            'KATALOG_HARGA',
            'KATALOG_TGL_POST',
            'KATALOG_DISKRIPSI',
            'KATALOG_STATUS',
        ],
    ]) ?>
    <a href="<?= $model->GAMBAR?>"> donlod</a>

</div>
