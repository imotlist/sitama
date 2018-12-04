<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Masterorder */

$this->title = 'Update Masterorder: ' . $model->ORDER_ID;
$this->params['breadcrumbs'][] = ['label' => 'Masterorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ORDER_ID, 'url' => ['view', 'id' => $model->ORDER_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="masterorder-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
