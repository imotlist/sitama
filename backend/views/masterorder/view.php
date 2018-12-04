<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Masterorder */

$this->title = $model->ORDER_ID;
$this->params['breadcrumbs'][] = ['label' => 'Masterorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masterorder-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ORDER_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ORDER_ID], [
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
            'ID',
            'ORDER_TGL_ADD',
            'ORDER_TGL_EXP',
            'ORDER_STATUS',
            'BUKTI',
        ],
    ]) ?>

</div>
