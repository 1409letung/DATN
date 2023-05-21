<?php
include '../../controllers/cTK.php';
$p = new controlNVTN();

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $ex = $p->UpdateTTOffline($id);
    if($ex)
    {
       echo "
       <script>
          alert('Đã xử lý giao dịch này!!');
       </script>";
       echo  '<meta http-equiv="refresh" content="3;url=NVTiepNhan.php?action=ql&query=dkoff">';
    }else
    {
      echo "
       <script>
          alert('Xử lý giao dịch thất bại!!');
          document.location.href = 'NVTiepNhan.php?action=ql&query=dkoff';
       </script>";
    }
}else{
    return 0;
}
?>