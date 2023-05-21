<?php
include '../../models/PrintPDF.php';
require '../../vendor/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

//lấy data đơn ĐKKB theo id
$id = $_GET['id'];
$p = new DataPDF();
$ex = $p->getDKKB($id);
$sql = mysqli_fetch_assoc($ex);

//khai báo class
$dompdf = new Dompdf();
ob_start();
require('pdf_DKKB.php');
$html = ob_get_contents(); 
ob_get_clean();
$dompdf->loadHtml($html, 'UTF-8');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'protrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('DKKB_TungThinh.pdf',['Attachment'=>false]); //true: cho phép tải xuống tức thì, còn false thì cho phép xem

?>