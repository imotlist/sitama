<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Gambar */

$this->title = 'Update Gambar: ' . $model->gambar_id;
$this->params['breadcrumbs'][] = ['label' => 'Gambars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->gambar_id, 'url' => ['view', 'id' => $model->gambar_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gambar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
