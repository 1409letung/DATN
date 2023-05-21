<?php
include '../../controllers/cTK.php';
$p = new controlNVTN();

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $ex = $p->del1LH($id);
    if($ex)
    {
       echo "
       <script>
          alert('Đã xóa thông tin này!!');
          document.location.href = 'NVTiepNhan.php?action=ql&query=lh';
       </script>";
    }else
    {
      echo "
       <script>
          alert('Xóa thông tin này thất bại!!');
          document.location.href = 'NVTiepNhan.php?action=ql&query=lh';
       </script>";
    }
}else{
    return 0;
}
?>