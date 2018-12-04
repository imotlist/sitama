<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Masterorder */

$this->title = 'Create Masterorder';
$this->params['breadcrumbs'][] = ['label' => 'Masterorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masterorder-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
