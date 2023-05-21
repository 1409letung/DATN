<?php
    include '../../models/mDanhMucBaiDang.php';
    $p = new modelBaiDang();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $ex = $p->deleteDM($id);
        if($ex){
            echo '<script> 
                       window.location.href="admin.php?c=baiviet&qr=danhmuc&action";
                       alert("Đã xóa danh mục này!"); 
                  </script>';
        }else{
            echo '<script> 
                       window.location.href="admin.php?c=baiviet&qr=danhmuc&action";
                       alert("Xóa danh mục thất bại!"); 
                  </script>';
        }
    }else{
        return false;
    }
?>