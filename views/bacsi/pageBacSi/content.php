<div class="row my-5">
    <div class="col">
        <?php 
                       ob_start(); 
                         if(isset($_GET['action']) && isset($_GET['query'])){
                            $action = $_GET['action'];
                            $query = $_GET['query'];
                        }else{
                            $action = '';
                            $query = '';
                        }
                        if($action == '' && $query == ''){
                            include_once('bacsi.php');
                        }
                        elseif($action == 'show'&& $query == 'listbenhnhan'){
                            include('vBenhNhan.php');
                        }
                        // elseif($action == 'ql'&& $query == 'pkb'){
                        //     include('vPhieuKhamBenh.php');
                        // }
                        // elseif($action == 'ql'&& $query == 'pxn'){
                        //     include('vPhieuXetNghiem.php');
                        // }
                        // elseif($action == 'ql'&& $query == 'dthuoc'){
                        //     include('vDonThuoc.php');
                        // }
                        elseif($action == 'ql'&& $query == 'ca'){
                            include('vCaKhamBenh.php');
                        }
                        elseif($action == 'show'&& $query == 'profile'){
                            include('vProfileBs.php');
                        }
                        // lịch làm việc
                        if(isset($_GET['ca'])){
                            $ca = $_GET['ca'];
                        }else{
                            $ca = '';
                        }
                        if($ca == 'sua'){
                            include_once 'vUpdateLLV.php';
                        }elseif($ca == 'onoff'){
                            include_once 'vStatusLLV.php';
                        }elseif($ca == 'on'){
                            include_once 'vOnLLV.php';
                        }
                      
                        // đơn khám bệnh
                        if(isset($_GET['dkb'])){
                            $dkb = $_GET['dkb'];
                        }else{
                            $dkb = '';
                        }
                        if($dkb == 'xem'){
                            include_once 'vXemDKKB.php';
                        }elseif($dkb == 'xuly'){
                            include_once 'vXuLyDKKB.php';
                        }
                        //phiếu khám bệnh
                        if(isset($_GET['pkb'])){
                            $pkb = $_GET['pkb'];
                        }else{
                            $pkb = '';
                        }
                        if($pkb == 'xem'){
                            include_once 'vXemPKB.php';
                        }elseif($pkb == 'sua'){
                            include_once 'vSuaPKB.php';
                        }elseif($pkb == 'xoa'){
                            include_once 'vXoaPKB.php';
                        }
                        //phieu xet nghiem
                         if(isset($_GET['pxn'])){
                            $pxn = $_GET['pxn'];
                        }else{
                            $pxn = '';
                        }
                        if($pxn == 'read'){
                            include_once('ReadPXN.php');
                        }
                        //đơn thuốc
                        if(isset($_GET['dt'])){
                            $dt = $_GET['dt'];
                        }else{
                            $dt = '';
                        }
                        if($dt == 'xem'){
                            include_once 'vXemDT.php';
                        }elseif($dt == 'sua'){
                            include_once 'vUpDT.php';
                        }
                        //QLKB
                           //Danh mục - bài viết
                       if(isset($_GET['c']) && isset($_GET['qr']) && isset($_GET['action'])){
                          $c = $_GET['c'];
                          $qr = $_GET['qr'];
                          $ac = $_GET['action'];
                       }else{
                          $c = '';
                          $qr = '';
                          $ac = '';
                       }
                       if($c == 'qlkb'  && $qr == '' && $ac == ''){
                          include_once 'vQLKB.php';
                       }elseif($c == 'qlkb'  && $qr == 'pkb' && $ac == ''){
                          include_once 'vPhieuKhamBenh.php';
                       }elseif($c == 'qlkb'  && $qr == 'kqxn' && $ac == ''){
                          include_once 'vPhieuXetNghiem.php';
                       }elseif($c == 'qlkb'  && $qr == 'dt' && $ac == ''){
                          include_once 'vDonThuoc.php';
                       }elseif($c == 'qlkb'  && $qr == 'dt' && $ac == 'add'){
                          include_once 'vAddDonThuoc.php';
                       }
                      ?>
    </div>
</div>