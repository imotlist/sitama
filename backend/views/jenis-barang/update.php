<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JenisBarang */

$this->title = 'Ubah Jenis Barang: ' . $model->JENIS_BARANG_ID;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->JENIS_BARANG_ID, 'url' => ['view', 'id' => $model->JENIS_BARANG_ID]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="jenis-barang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
