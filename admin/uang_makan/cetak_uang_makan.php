<?php 
require_once '../../vendor/autoload.php';
$html = '';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>aaaa</h1>');
$mpdf->Output();
?>