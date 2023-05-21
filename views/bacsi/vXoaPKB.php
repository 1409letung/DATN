<?php
  include '../../controllers/cTK.php'; 
  $p = new controllerTKBS();
    if(isset($_GET['id'])){
        $maPKB = $_GET['id'];
        $result = $p->deletePKB($maPKB);
        if($result)
        {
            echo " <script>
                      alert('Đã xóa phiếu khám bệnh này!');
                   </script>";
            header("refresh:0;url='bacsi.php?c=qlkb&qr=pkb&action'");
        }else{
            return false;
        }
    }else{
        return false;
    }
?>