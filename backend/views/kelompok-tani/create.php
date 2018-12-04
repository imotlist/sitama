<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\KelompokTani */

$this->title = 'Tambah Kelompok Tani';
$this->params['breadcrumbs'][] = ['label' => 'Kelompok Tani', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelompok-tani-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
