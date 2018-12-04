<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Katalog */

$this->title = 'Tambah Barang';
$this->params['breadcrumbs'][] = ['label' => 'Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="katalog-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
