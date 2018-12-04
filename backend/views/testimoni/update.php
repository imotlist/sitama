<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Testimoni */

$this->title = 'Update Testimoni: ' . $model->testi_id;
$this->params['breadcrumbs'][] = ['label' => 'Testimonis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->testi_id, 'url' => ['view', 'id' => $model->testi_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="testimoni-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
