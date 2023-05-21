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
                            include_once('NVQuanLy.php');
                        }
                        elseif($action == 'ql'&& $query == 'xnv'){
                            include('vXemNV.php');
                        }elseif($action == 'show' && $query == 'profile'){
                            include 'vProfile.php';
                        }elseif($action == 'ql'&& $query == 'tb'){
                            include('vXemTB.php');
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
                        }
                        //chi tiết Nhân viên
                         if(isset($_GET['xnv'])){
                            $xnv = $_GET['xnv'];
                        }else{
                            $xnv = '';
                        }
                        if($xnv == 'read'){
                            include_once('ReadNV.php');
                        }
                        elseif($xnv == 'readyta'){
                            include_once('ReadYTA.php');
                        }
                        elseif($xnv == 'readnvtn'){
                            include_once('ReadNVTN.php');
                        }
                        elseif($xnv == 'readnvxn'){
                            include_once('ReadNVXN.php');
                        }
                        elseif($xnv == 'readnvql'){
                            include_once('ReadNVQL.php');
                        } 
                        elseif($xnv == 'readbn'){
                            include_once('ReadBN.php');
                        }   
                        elseif($xnv == 'readgd'){
                            include_once('ReadGD.php');
                        }
                        elseif($xnv == 'readnvqt'){
                            include_once('ReadNVQT.php');
                        }
                        //chi tiết thiết bị
                         if(isset($_GET['tb'])){
                            $tb = $_GET['tb'];
                        }else{
                            $tb = '';
                        }
                        if($tb == 'read'){
                            include_once('ReadTB.php');
                        }
                        elseif($tb == 'delete'){
                            include_once ('DeleteTB.php');
                        }
                      ?>
</div>