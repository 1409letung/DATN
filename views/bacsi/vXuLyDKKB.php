<?php
  include '../../controllers/cTK.php'; 
    if(isset($_GET['iddkb']))
    {
        $id = $_GET['iddkb'];
        echo $id;
        $p = new controllerDDKKB();
        $p->duyetOneDDKKB($id);
        if($p->duyetOneDDKKB($id)){
            echo '<script> alert("Đã xử lý!"); </script>';
            header("refresh:0;url='bacsi.php?action=show&query=listbenhnhan'");
        }else{
            echo '<script> alert("Xử lý không thành công!"); </script>';
            header("refresh:0;url='bacsi.php?action=show&query=listbenhnhan'");
        }
    }else
    {
        return false;
    }
?>
