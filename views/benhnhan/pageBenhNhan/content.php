<div class="row my-6">

    <div class="col">

        <?php  
                         if(isset($_GET['action']) && isset($_GET['query'])){
                            $action = $_GET['action'];
                            $query = $_GET['query'];                           
                        }else{
                            $action = '';
                            $query = '';
                        }
                        if($action == '' && $query == ''){
                            include_once('benhnhan.php');
                        }
                        elseif($action == 'show'&& $query == 'dkkb'){
                            include('vKhamBenh.php');
                        }
                        elseif($action == 'see'&& $query == 'benhan'){
                            include('vBenhAn.php');
                        } elseif($action == 'show'&& $query == 'profile'){
                            include('vProfileAccount.php');
                        }
                        // content chi tiết bệnh án của bệnh nhân
                        if(isset($_GET['BA'])){
                            $BA = $_GET['BA'];
                        }else{
                            $BA = '';
                        }
                        if($BA == 'xem'){
                            include_once 'vChiTietBABN.php';
                        }
                        //Thanh toán
                        if(isset($_GET['tt'])){
                            include_once 'vthanhToan.php';
                        }
                        if(isset($_GET['xoa'])){
                            include_once 'DeleteDKKB.php';
                        }
                        //QR đăng ký khám bệnh
                        if(isset($_GET['qr'])){
                            $qr = $_GET['qr'];
                        }else{
                            $qr = '';
                        }
                        if($qr == 'xem'){
                            include_once 'qrDKKB.php';
                        }
                      ?>
    </div>
</div>