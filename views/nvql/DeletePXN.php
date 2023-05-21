<?php
include '../../controllers/cTK.php';
$p = new ControllerNVXN();

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $ex = $p->Delete($id);
    if($ex)
    {
         echo "
       <script>
          alert('Đã xóa phiếu xét nghiệm này!!');
          document.location.href = 'NVXetNghiem.php?action=ql&query=pxn';
       </script>";
    }
}else{
    return 0;
}
?>