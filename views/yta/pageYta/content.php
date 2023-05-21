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
                            include_once('yta.php');
                        }
                        elseif($action == 'ql'&& $query == 'benhan'){
                            include('vQLBenhAn.php');
                        }
                        elseif($action == 'ql'&& $query == 'dkkb'){
                            include('vQL_DonDKKB.php');
                        }
                        elseif($action == 'ql' && $query == 'ttbn'){
                            include 'vQL_TTBN.php';
                        }elseif($action == 'show' && $query == 'profile'){
                            include 'vProfileYta.php';
                        }
                        //Page bệnh án
                        if(isset($_GET['page'])){
                            $page = $_GET['page'];
                        }else{
                            $page ='';
                        }
                        if($page ==''){
                            include_once 'yta.php';
                        }elseif($page == 'chitiet'){
                            include_once 'vChiTietBA.php';
                        }
                        elseif($page == 'sua'){
                            include_once 'vUpdateBA.php';
                        }
                        elseif($page == 'delete'){
                            include_once 'vDeleteBA.php';
                        }
                        //end bệnh án
                        
                        // page thông tin bệnh nhân
                        if(isset($_GET['bn'])){
                            $bn = $_GET['bn'];
                        }else{
                            $bn = '';
                        }
                        if($bn == ''){
                            include_once 'yta.php';
                        }elseif($bn == 'xem'){
                            include_once 'vCTBN.php';
                        }
                        elseif($bn == 'sua'){
                            include_once 'vUpdateBN.php';
                        }
                        elseif($bn == 'xoa'){
                            include_once 'vDeleteBN.php';
                        }
                        // end page thông tin bệnh nhân
                      ?>
</div>