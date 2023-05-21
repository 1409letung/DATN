<?php
include '../../controllers/cTK.php';
$p = new controllerNVQT();

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $ex = $p->Delete($id);
    if($ex)
    {
         echo "
       <script>
          alert('Đã xóa thuốc này!!');
          document.location.href = 'NVQT.php?action=ql&query=qlt';
       </script>";
    }
}else{
    return 0;
}
?>