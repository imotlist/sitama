<?php
$nama ='Laporan_User_';
define('_MPDF_PATH', '../../frontend/web/mpdf60/');
include(_MPDF_PATH."mpdf.php");
$mpdf = new mPDF('utf-8','A4',10.5,'arial');
ob_start();
?>

<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->shrink_tables_to_fit=1;
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama.".pdf",'I');
exit;
?>