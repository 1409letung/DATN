<!-- Duyệt: update trạng thái -->
<?php
  include '../../controllers/cTK.php'; 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $p = new controllerDDKKB();
        $p->duyetOneDDKKB($id);
        if($p->duyetOneDDKKB($id)){
            echo '<script> alert("Duyệt thành công. Đơn đăng ký đã được chuyển tới bác sĩ!"); </script>';
            header("refresh:0;url='./NVTiepNhan.php?action=ql&query=dkkb'");
        }else{
            echo '<script> alert("Duyệt thất bại!"); </script>';
            header("refresh:0;url='./NVTiepNhan.php?action=ql&query=dkkb'");
        }
    }else{
        return false;
    }
?>


