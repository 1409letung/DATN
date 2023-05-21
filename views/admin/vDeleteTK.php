<?php
    include '../../controllers/cTK.php'; 
    if(isset($_GET['idTK'])){
        $MaTK = $_GET['idTK'];
        $p = new controllerTK();
        $tk = $p->deOneTK($MaTK);
        if($tk){
            echo '<script> 
             window.location.href="admin.php?action=QLTK&query=add";
             alert("Xóa này thành công!"); </script>';
        }else{
            echo '<script> 
             window.location.href="admin.php?action=QLTK&query=add";
            alert("Xóa tài khoản này thất bại!"); </script>';
        }
    }else{
        return false;
    }
?>