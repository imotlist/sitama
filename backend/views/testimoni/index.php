<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TestimoniSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Testimonis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimoni-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Testimoni', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'testi_id',
            'testi_nama',
            'testi_quote',
            'testi_gambar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
