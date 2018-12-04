<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MasterorderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Masterorders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masterorder-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Masterorder', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ORDER_ID',
            'ID',
            'ORDER_TGL_ADD',
            'ORDER_TGL_EXP',
            'ORDER_STATUS',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
