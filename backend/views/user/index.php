<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username',
            'KELOMPOKTANI_ID',
            //'auth_key',
            //'password_hash',
            // 'password_reset_token',
            'email:email',
            //'status',
            //'created_at',
            //'updated_at',
            //'USER_ALAMAT',
            'USER_TELP',
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{confirm} {stat}',
                'buttons'=>[

                    'confirm'=>function($url,$model){
                            if ($model->status==0) {
                                return Html::a('<span class="fa fa-check"></span>Confirm',['confirm','id'=>$model->id],
                                    ['title'=>Yii::t('app','confirm'),
                                      'class'=>'btn btn-primary btn-xs',
                                      'data-pjax'=>'0',
                                    ]);
                            }
                    },

                    'stat'=>function($url,$model){
                            if ($model->status==10) {
                                return ('<button class="btn btn-success btn-xs">Aktif</button');
                            }else{
                                return ('<button class="btn btn-danger btn-xs">Tidak Aktif</button');
                            }
                    }
                ],

            ],
            ['class' => 'yii\grid\ActionColumn'],
            
        ],
    ]); ?>
</div>
