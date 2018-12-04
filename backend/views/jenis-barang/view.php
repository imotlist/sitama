<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\JenisBarang */

$this->title = $model->JENIS_BARANG_ID;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-barang-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->JENIS_BARANG_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->JENIS_BARANG_ID], [
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
            'JENIS_BARANG_ID',
            'JENIS_BARANG_NAMA',
            'KETERANGAN',
        ],
    ]) ?>

</div>
