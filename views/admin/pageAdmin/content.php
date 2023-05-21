<div class="row my-5">
                    <!-- <h3 class="fs-4 mb-3" style="text-align: center;">
                    Chào mừng quản trị viên
                        <?php 
                            // if(isset($_SESSION['login'])){
                            //     echo $_SESSION['login'];
                            // }
                        ?>
                    </h3> -->
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
                            include_once('admin.php');
                        }
                        elseif($action == 'show' && $query == 'profile'){
                            include_once 'vProfileAd.php';
                        }
                        elseif($action == 'QLTK'&& $query == 'add'){
                            include_once 'vQLTK.php';
                        }
                        //start tài khoản
                        if(isset($_GET['tk'])){
                            $tk = $_GET['tk'];
                        }else{
                            $tk = '';
                        }
                        if($tk == 'xem'){
                            include_once 'vChiTietTK.php';
                        }elseif($tk == 'sua'){
                            include_once 'vUpdateTK.php';
                        }elseif($tk == 'xoa'){
                            include_once 'vDeleteTK.php';
                        }elseif($tk == 'mtk'){
                            include_once 'vUpMTK.php';
                        }
                        // end tài khoản
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
                       if($c == 'baiviet'  && $qr == '' && $ac == ''){
                          include_once 'vBaiDang.php';
                       }elseif($c == 'baiviet'  && $qr == 'danhmuc' && $ac == ''){
                          include_once 'danhMuc/vDanhMuc.php';
                       }elseif($c == 'baiviet'  && $qr == 'gioithieu' && $ac == ''){
                          include_once 'danhMuc/gioiThieu/vGioiThieu.php';
                       }elseif($c == 'baiviet'  && $qr == 'dichvu' && $ac == ''){
                          include_once 'danhMuc/dichVu/vDichVu.php';
                       }elseif($c == 'baiviet'  && $qr == 'chuyenkhoa' && $ac == ''){
                          include_once 'danhMuc/chuyenKhoa/vChuyenKhoa.php';
                       }elseif($c == 'baiviet'  && $qr == 'danhmuc' && $ac == 'sua'){
                          include_once 'danhMuc/vUpdateDM.php';
                       }elseif($c == 'baiviet'  && $qr == 'danhmuc' && $ac == 'xoa'){
                          include_once 'danhMuc/vDeleteDM.php';
                       }

                       //bài viết giới thiệu
                       if(isset($_GET['bd'])){
                        $bd = $_GET['bd'];
                       }else{
                        $bd = '';
                       }

                       if($bd == 'xem'){
                        include_once 'danhMuc/gioiThieu/vXem.php';
                       }elseif($bd == 'sua'){
                        include_once 'danhMuc/gioiThieu/vUpdate.php';
                       }elseif($bd == 'xoa'){
                        include_once 'danhMuc/gioiThieu/vDelete.php';
                       }

                       //bài viết dịch vụ
                       if(isset($_GET['dv'])){
                        $dv = $_GET['dv'];
                       }else{
                        $dv = '';
                       }

                       if($dv == 'xem'){
                        include_once 'danhMuc/dichVu/vXem.php';
                       }elseif($dv == 'sua'){
                        include_once 'danhMuc/dichVu/vUpdate.php';
                       }elseif($dv == 'xoa'){
                        include_once 'danhMuc/dichVu/vDelete.php';
                       }

                       //bài viết chuyên khoa
                        if(isset($_GET['ck'])){
                        $ck = $_GET['ck'];
                       }else{
                        $ck = '';
                       }

                       if($ck == 'xem'){
                        include_once 'danhMuc/chuyenKhoa/vXem.php';
                       }elseif($ck == 'sua'){
                        include_once 'danhMuc/chuyenKhoa/vUpdate.php';
                       }elseif($ck == 'xoa'){
                        include_once 'danhMuc/chuyenKhoa/vDelete.php';
                       }
                      ?>
                     </div> 
</div>