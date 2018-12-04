<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Detailorder */

$this->title = 'Create Detailorder';
$this->params['breadcrumbs'][] = ['label' => 'Detailorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detailorder-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
