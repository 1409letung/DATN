<?php
   include '../../controllers/cTK.php'; 
   if(isset($_GET['idbenhan'])){
    $id = $_GET['idbenhan'];
    $p = new controllerBenhAn();
    $p->deleteBA($id);
    if($p->deleteBA($id)){
      echo '<script> alert("Đã xóa bệnh án thành công!"); </script>';
      header("refresh:0;url='./yta.php?action=ql&query=benhan'");
    }else{
      echo '<script> alert("Xóa bệnh án thất bại!"); </script>';
      header("refresh:0;url='./yta.php?action=ql&query=benhan'");
    }
   }
?>