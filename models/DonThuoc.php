<?php

//connect db with PDO
$connect = new PDO("mysql:host=localhost; dbname=pk_da_lieu", "root", "");

function giaThuoc($connect, $tenthuoc)
{
    $query = "SELECT gia FROM `tb_thuoc` WHERE `tenthuoc`='$tenthuoc' ";
    $stmt = $connect->query($query); 
    $stmt->excute();
    $output = '';
    $output .= '<input type="text" class="form-control" name="gia[]" id="gia" value="'.$stmt['gia'].'">';
    return $output;
}
?>