<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KelompokTaniSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kelompok Tani';
$this->params['breadcrumbs'][] = $this->title;
$role=Yii::$app->user->identity->getRoleName();
?>
<div class="kelompok-tani-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php if($role=='SuperAdminRole'): ?>
        <?php $button = '{view} {update} {delete}'; ?>
    <p>
        <?= Html::a('Tambah Kelompok Tani', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php else: ?>
    <?php $button = '{view} {update}' ?>    
    <?php endif ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'KELOMPOKTANI_ID',
            'KELOMPOKTANI_NAMA',
            'KELOMPOKTANI_DESA',
            'KELOMPOKTANI_STATUS',

            ['class' => 'yii\grid\ActionColumn','template' => $button,],
        ],
    ]); ?>
</div>
