<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Toko */

$this->title = $model->TOKO_ID;
$this->params['breadcrumbs'][] = ['label' => 'Toko', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="toko-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->TOKO_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->TOKO_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah yakin hapus data ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'TOKO_ID',
            'ID',
            'TOKO_NAMA',
            'TOKO_ALAMAT',
            'TOKO_TELP',
            'TOKO_DISKRIPSI:ntext',
            'TOKO_STATUS',
            'TOKO_FOTO',
        ],
    ]) ?>

</div>
