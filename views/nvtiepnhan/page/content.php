<div class="row my-5">
                    <?php  
                         if(isset($_GET['action']) && isset($_GET['query'])){
                            $action = $_GET['action'];
                            $query = $_GET['query'];
                        }else{
                            $action = '';
                            $query = '';
                        }
                        if($action == '' && $query == ''){
                            include_once('NVTiepNhan.php');
                        }
                        elseif($action == 'ql'&& $query == 'dkkb'){
                            include('vQL_DonDKKB.php');
                        }elseif($action == 'show' && $query == 'profile'){
                            include 'vProfile.php';
                        }elseif($action == 'ql' && $query == 'dkoff'){
                            include 'vDKKBOffline.php';
                        }elseif($action == 'ql' && $query == 'lh'){
                            include 'vLienHe.php';
                        }elseif($action == 'ql' && $query == 'dktc'){
                            include 'vQLTC.php';
                        }
                        elseif($action == 'ql' && $query == 'xllv'){
                            include 'vLichLamViec.php';
                        }
                        //Thanh toan DKKB Offline
                        if(isset($_GET['tt'])){
                            $tt = $_GET['tt'];
                        }else{
                            $tt = '';
                        }
                        if($tt =='update'){
                            include_once 'UpdateTTOffline.php';
                        }
                        //Page đơn đăng ký khám bệnh
                        if(isset($_GET['ddkkb'])){
                            $ddkkb = $_GET['ddkkb'];
                        }else{
                            $ddkkb = '';
                        }
                        if($ddkkb ==''){
                            include_once 'NVTiepNhan.php';
                        }elseif($ddkkb == 'xem'){
                             include 'vChiTietDDKKB.php';
                        }
                        elseif($ddkkb == 'xoa'){
                             include 'vDeleteDKKB.php';
                        }
                        elseif($ddkkb == 'duyet'){
                             include 'vDuyetDDKKB.php';
                        }   
                        //end page DDKKB
                        // start page QR DDKB
                        if(isset($_GET['qr'])){
                            $qr = $_GET['qr'];
                        }else{
                            $qr = '';
                        }
                        if($qr == ''){
                            include_once 'NVTiepNhan.php';
                        }elseif($qr == 'xem'){
                            include_once 'vChiTietQRDK.php';
                        }
                        elseif($qr == 'xoa'){
                            include_once 'vDeleteQRDK.php';
                        }
                        elseif($qr == 'duyet'){
                            include_once 'vDuyetQRDKKB.php';
                        }
                        // end page QR DDKB
                        //lien he
                        if(isset($_GET['lh'])){
                            $lh = $_GET['lh'];
                        }else{
                            $lh = '';
                        }
                        if($lh == 'rep'){
                            include_once 'vRepLH.php';
                        }elseif($lh == 'del'){
                            include_once 'vXoaLH.php';
                        }elseif($lh == 'xem'){
                            include_once 'vXemLH.php';
                        }
                        //tiêm chủng
                        if(isset($_GET['tc'])){
                            $tc = $_GET['tc'];
                        }else{
                            $tc = '';
                        }
                        if($tc == 'rep'){
                            include_once 'vRepTC.php';
                        }elseif($tc == 'success'){
                            include_once 'vHoanThanhTC.php';
                        }
                        //tìm kiếm
                        if(isset($_GET['search'])){
                            $s = $_GET['search'];
                        }else{
                            $s = '';
                        }
                        if($s == 'key'){
                            include_once 'Search.php';
                        }
                      ?>
</div>