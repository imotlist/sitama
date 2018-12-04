<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Testimoni */

$this->title = $model->testi_id;
$this->params['breadcrumbs'][] = ['label' => 'Testimonis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimoni-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->testi_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->testi_id], [
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
            'testi_id',
            'testi_nama',
            'testi_quote',
            'testi_gambar',
        ],
    ]) ?>

</div>
