<!-- Tắt trạng thái làm việc-->
<?php
  include '../../controllers/cTK.php'; 
    if(isset($_GET['idca'])){
        $id = $_GET['idca'];
        $p = new controllerTKBS();
        $p->updateLLV($id);
        if($p->updateLLV($id)){
            echo '<script> alert("Đã tắt giờ làm việc"); </script>';
            header("refresh:0;url='./bacsi.php?action=ql&query=ca'");
        }else{
            echo '<script> alert("Thao tác thất bại!"); </script>';
            header("refresh:0;url='./bacsi.php?action=ql&query=ca'");
        }
    }else{
        return false;
    }
?>