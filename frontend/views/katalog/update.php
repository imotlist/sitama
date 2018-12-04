<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Katalog */

$this->title = 'Ubah Katalog ' . $model->KATALOG_JUDUL;
$this->params['breadcrumbs'][] = ['label' => 'Katalog', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Ubah Data';
?>
<div class="katalog-update">

    <?= $this->render('_form', [
        'model' => $model,
        'toko'=> $toko,
    ]) ?>

</div>
