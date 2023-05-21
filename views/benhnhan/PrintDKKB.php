<?php
use Dompdf\Dompdf;
use Dompdf\Options;
include '../../models/PrintPDF.php';
require '../../vendor/dompdf/autoload.inc.php';


$id = $_GET['id'];
$p = new DataPDF();
$ex = $p->getDKKB($id);
$sql = mysqli_fetch_assoc($ex);

$dompdf = new Dompdf();
ob_start();
require('pdf_DKKB.php');
$html = ob_get_contents();
ob_get_clean();
$dompdf->loadHtml($html, 'UTF-8');


$dompdf->setPaper('A4', 'protrait');


$dompdf->render();


$dompdf->stream('DKKB_TungThinh.pdf',['Attachment'=>false]); 
?>