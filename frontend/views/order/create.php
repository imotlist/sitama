<?php

use yii\helpers\Html;
$this->title = 'Form Pemesanan';
?>
<div class="Pemesanan-create">
    <?= $this->render('formpesan', [
        'model' => $model,
        'katalog' => $katalog,
                'detail' => $detail,
                'user' => $user,
                'idorder'=> $idorder,
                //'angka'=>$angka,
    ]) ?>

</div>
