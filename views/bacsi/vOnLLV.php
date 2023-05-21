<!-- Bật trạng thái làm việc-->
<?php
  include '../../controllers/cTK.php'; 
    if(isset($_GET['idca'])){
        $id = $_GET['idca'];
        $p = new controllerTKBS();
        $p->onLLV($id);
        if($p->onLLV($id)){
            echo '<script> alert("Đã bật giờ làm việc"); </script>';
            header("refresh:0;url='./bacsi.php?action=ql&query=ca'");
        }else{
            echo '<script> alert("Thao tác thất bại!"); </script>';
            header("refresh:0;url='./bacsi.php?action=ql&query=ca'");
        }
    }else{
        return false;
    }
?>