<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DetailorderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detailorders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detailorder-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Detailorder', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ORDER_ID',
            'KATALOG_ID',
            'DETAILORDER_ID',
            'DETAILORDER_QTY',
            'DETAILORDER_JUMLAH',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
