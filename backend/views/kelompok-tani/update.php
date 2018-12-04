<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\KelompokTani */

$this->title = 'Ubah Kelompok Tani: ' . $model->KELOMPOKTANI_ID;
$this->params['breadcrumbs'][] = ['label' => 'Kelompok Tani', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KELOMPOKTANI_ID, 'url' => ['view', 'id' => $model->KELOMPOKTANI_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kelompok-tani-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
