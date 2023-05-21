<?php
use Dompdf\Dompdf;
use Dompdf\Options;
include '../../models/PrintPDF.php';
require '../../vendor/dompdf/autoload.inc.php';


//lấy data đơn ĐKKB theo id
$id = $_GET['id'];
$lxn = $_GET['lxn'];
$p = new DataPDF();

if($lxn == 'MÁU TỔNG QUÁT')
{
    $ex = $p->getXNM($id);
}
elseif($lxn == 'NƯỚC TIỂU')
{
    $ex = $p->getXNNT($id);
}
elseif($lxn == 'UNG THƯ GAN')
{
    $ex = $p->getXNUGT($id);
}
elseif($lxn == 'VI SINH')
{
    $ex = $p->getXNVS($id);
}

// $ex = $p->get1PXN($id);
// $sql = mysqli_fetch_row($ex);
$sql = $ex;

$dompdf = new Dompdf();
ob_start();
require('pdf_PXN.php');
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