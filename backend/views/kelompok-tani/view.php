<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\KelompokTani */

$this->title = $model->KELOMPOKTANI_ID;
$this->params['breadcrumbs'][] = ['label' => 'Kelompok Tani', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelompok-tani-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->KELOMPOKTANI_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->KELOMPOKTANI_ID], [
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
            'KELOMPOKTANI_ID',
            'KELOMPOKTANI_NAMA',
            'KELOMPOKTANI_DESA',
            'KELOMPOKTANI_STATUS',
        ],
    ]) ?>

</div>
