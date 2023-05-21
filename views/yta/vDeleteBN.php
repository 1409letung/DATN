<?php
   include '../../controllers/cTK.php'; 
   if(isset($_GET['id'])){
    $id = $_GET['id'];
    $p = new controllerTTBN();
    $p->deleteBN($id);
    if($p->deleteBN($id)){
      echo '<script> alert("Đã xóa thông tin bệnh nhân thành công!"); </script>';
      header("refresh:0;url='./yta.php?action=ql&query=ttbn'");
    }else{
      echo '<script> alert("Xóa thông tin bệnh nhân thất bại!"); </script>';
      header("refresh:0;url='./yta.php?action=ql&query=ttbn'");
    }
   }
?>