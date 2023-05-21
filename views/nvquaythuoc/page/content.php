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
                            include_once('NVQT.php');
                        }
                        elseif($action == 'ql'&& $query == 'qlt'){
                            include('vQL_Thuoc.php');
                        }
                        elseif($action == 'ql'&& $query == 'xdt'){
                            include('vXemdt.php');
                        }
                        elseif($action == 'ql'&& $query == 'xtk'){
                            include('vXemtk.php');
                        }
                        elseif($action == 'show' && $query == 'profile'){
                            include 'vProfile.php';
                        }

                        //chi tiết thuốc
                         if(isset($_GET['qlt'])){
                            $qlt = $_GET['qlt'];
                        }else{
                            $qlt = '';
                        }
                        if($qlt == 'read'){
                            include_once('ReadThuoc.php');
                        }
                        elseif($qlt == 'delete'){
                            include_once ('DeleteThuoc.php');
                        }

                        if(isset($_GET['dt'])){
                            $dt = $_GET['dt'];
                        }else{
                            $dt = '';
                        }
                        if($dt == 'xem'){
                            include_once 'vXemCTDT.php';
                        }
                        
                      ?>
</div>