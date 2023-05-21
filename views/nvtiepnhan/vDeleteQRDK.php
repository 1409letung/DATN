<?php
  include '../../controllers/cTK.php'; 
    if(isset($_GET['idQr'])){
        $idQr = $_GET['idQr'];
        $p = new controllerDDKKB();
        $p->deleteOneQRDDKKB($idQr);
        if($p->deleteOneDDKKB($idQr)){
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