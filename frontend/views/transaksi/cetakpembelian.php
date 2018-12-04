<?php 
use backend\models\Detailorder;
?>
<body>
<h2>Data Pembelian</h2>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
	        <th>Kode Pemesanan</th>
	        <th>Tanggal Beli</th>
	        <th>Barang</th>
	        <th>Harga</th>
	        <th>Total</th>
	    </tr>
	</thead>
	<tbody>
	<?php $no=1; $harga=0; ?>
        <?php foreach ($pembelian as $pem): ?>
        	<?php $det = Detailorder::find()->where(['ORDER_ID'=>$pem->ORDER_ID])->all() ?> 
                              <tr>
                                <td><?= $no ?></td>
                                <td><?= $pem->ORDER_ID ?></td>
                                <td><?= $pem->ORDER_TGL_ADD ?></td>
                                <td>
                                    <?php foreach($det as $det): ?>
                                    	<?= $det->kATALOG->KATALOG_BARANG ?>
                                    	<?php $harga = $det->kATALOG->KATALOG_HARGA ?>
                                    	<?php $total = $det->DETAILORDER_JUMLAH ?>
                                    	<?php $idkat = $det->kATALOG->KATALOG_ID ?>
                                    <?php endforeach ?>
                                    
                                </td>
                                <td align="right">Rp. <?= number_format($harga) ?></td>
                                <td align="right">Rp. <?= number_format($total) ?></td>
                                
                              </tr>
        	<?php $no++; ?>
        <?php endforeach ?>
	</tbody>
</table>
</body>