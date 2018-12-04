<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Katalog */

$this->title = 'Ubah Barang: ' . $model->KATALOG_ID;
$this->params['breadcrumbs'][] = ['label' => 'Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KATALOG_ID, 'url' => ['view', 'id' => $model->KATALOG_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="katalog-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
