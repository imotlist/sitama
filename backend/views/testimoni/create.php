<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Testimoni */

$this->title = 'Create Testimoni';
$this->params['breadcrumbs'][] = ['label' => 'Testimonis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimoni-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
