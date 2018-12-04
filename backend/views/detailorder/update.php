<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Detailorder */

$this->title = 'Update Detailorder: ' . $model->ORDER_ID;
$this->params['breadcrumbs'][] = ['label' => 'Detailorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ORDER_ID, 'url' => ['view', 'ORDER_ID' => $model->ORDER_ID, 'KATALOG_ID' => $model->KATALOG_ID, 'DETAILORDER_ID' => $model->DETAILORDER_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detailorder-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
