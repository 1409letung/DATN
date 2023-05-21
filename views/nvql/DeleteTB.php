<?php
include '../../controllers/cTK.php';
$p = new ControllerNVQL();

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $ex = $p->Delete($id);
    if($ex)
    {
         echo "
       <script>
          alert('Đã xóa thiết bị này này!!');
          document.location.href = 'NVQuanLy.php?action=ql&query=tb';
       </script>";
    }
}else{
    return 0;
}
?>