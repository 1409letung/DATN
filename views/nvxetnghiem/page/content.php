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
                            include_once('NVXetNghiem.php');
                        }
                        elseif($action == 'ql'&& $query == 'pxn'){
                            include('vQL_PXN.php');
                        }elseif($action == 'show' && $query == 'profile'){
                            include 'vProfile.php';
                        }

                        //chi tiết PKB
                         if(isset($_GET['pxn'])){
                            $pxn = $_GET['pxn'];
                        }else{
                            $pxn = '';
                        }
                        if($pxn == 'read'){
                            include_once('ReadPXN.php');
                        }
                        elseif($pxn == 'update'){
                            include_once('UpdatePXN.php');
                        }elseif($pxn == 'delete'){
                            include_once ('DeletePXN.php');
                        }elseif($pxn == 'chuky'){
                            include_once ('vChuKy.php');
                        }
                        
                      ?>
</div>