<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Toko */

$this->title = 'Ubah Toko: ' . $model->TOKO_ID;
$this->params['breadcrumbs'][] = ['label' => 'Toko', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TOKO_ID, 'url' => ['view', 'id' => $model->TOKO_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="toko-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
