<?php
  include '../../controllers/cTK.php'; 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $p = new controllerDDKKB();
        $p->deleteOneDDKKB($id);
        if($p->deleteOneDDKKB($id)){
            echo '<script> alert("Đã xóa đơn đăng ký này thành công!"); </script>';
            header("refresh:0;url='./NVTiepNhan.php?action=ql&query=dkkb'");
        }else{
            echo '<script> alert("Xóa đơn đăng ký này thất bại!"); </script>';
            header("refresh:0;url='./NVTiepNhan.php?action=ql&query=dkkb'");
        }
    }else{
        return false;
    }
?>