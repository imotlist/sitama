<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Detailorder */

$this->title = $model->ORDER_ID;
$this->params['breadcrumbs'][] = ['label' => 'Detailorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detailorder-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ORDER_ID' => $model->ORDER_ID, 'KATALOG_ID' => $model->KATALOG_ID, 'DETAILORDER_ID' => $model->DETAILORDER_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ORDER_ID' => $model->ORDER_ID, 'KATALOG_ID' => $model->KATALOG_ID, 'DETAILORDER_ID' => $model->DETAILORDER_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ORDER_ID',
            'KATALOG_ID',
            'DETAILORDER_ID',
            'DETAILORDER_QTY',
            'DETAILORDER_JUMLAH',
        ],
    ]) ?>

</div>
