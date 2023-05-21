<?php
include '../../controllers/cTK.php';
$p = new controlNVTN();

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $ex = $p->up1TCHT($id);
    if($ex)
    {
        echo "
       <script>
          alert('Hoàn thành dịch vụ này. Đã cập nhật dữ liệu lên hệ thống !!');
          document.location.href = 'NVTiepNhan.php?action=ql&query=dktc';
       </script>";
    }else
    {
       echo "
       <script>
          alert('Lỗi!!');
          document.location.href = 'NVTiepNhan.php?action=ql&query=dktc';
       </script>";
    }
}else{
    return 0;
}
?>