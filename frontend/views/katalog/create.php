<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Katalog */

$this->title = 'Tambah Katalog';
$this->params['breadcrumbs'][] = ['label' => 'Katalog', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="katalog-create">

    <center><h1><?= Html::encode($this->title) ?></h1></center>

    <?= $this->render('_form', [
        'model' => $model,
        'toko' => $toko,
    ]) ?>

</div>
