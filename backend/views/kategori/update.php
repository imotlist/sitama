<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kategori */

$this->title = 'Ubah Kategori: ' . $model->KATEGORI_ID;
$this->params['breadcrumbs'][] = ['label' => 'Kategori', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KATEGORI_ID, 'url' => ['view', 'id' => $model->KATEGORI_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kategori-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
