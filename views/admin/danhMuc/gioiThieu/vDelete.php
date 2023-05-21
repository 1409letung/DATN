<?php
 include '../../models/mDanhMucBaiDang.php';
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    //echo $id;
    $p = new modelBaiDang();
    $ex = $p->deleteGT($id);
    if($ex){
        echo '<script> 
                        window.location.href="admin.php?c=baiviet&qr=gioithieu&action";
                        alert("Đã xóa bài viết này!");
                      </script>';
    }else{
        echo '<script> 
                        window.location.href="admin.php?c=baiviet&qr=gioithieu&action";
                        alert("Xóa bài viết không thành công!");
                      </script>';
    }
  }else{
    return false;
  }
?>