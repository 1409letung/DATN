<?php
include '../../controllers/cTK.php';
$p = new controllerDDKKB();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$id = $_GET['id'];
$a = $p->getOneDDKKB($id);
$b = mysqli_fetch_assoc($a);
$getngay = $b['ngaydat'];
$today = date("Y/m/d");
$hh = strtotime("$getngay");
$hr = strtotime("$getngay+1 day");
$hd = strtotime("$today");
if(isset($_GET['id']))
{
    if($hd <= $hr)
    { 
        $ex = $p->deleteOneDDKKB($id);
        if($ex)
        {
             echo "
           <script>
              alert('Đã huỷ đơn đăng ký khám bệnh!!');
              document.location.href = '?action=show&query=dkkb';
           </script>";
        }
        else
        {
            return 0;
        }
    }else{
        echo "
           <script>
              alert('Bạn không thể huỷ đơn đăng ký này vì đã quá hạn huỷ 24h!!');
              document.location.href = '?action=show&query=dkkb';
           </script>";
    }
}


?>