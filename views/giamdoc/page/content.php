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
                            include_once('Giamdoc.php');
                        }
                        elseif($action == 'ql'&& $query == 'xbn'){
                            include('vXemBN.php');
                        }elseif($action == 'ql'&& $query == 'xnv'){
                            include('vXemNV.php');
                        }elseif($action == 'ql'&& $query == 'xbc'){
                            include('vXemBaoCao.php');
                        }
                        elseif($action == 'ql'&& $query == 'xbc1'){
                            include('vXemBaoCaoDT.php');
                        }
                        elseif($action == 'ql'&& $query == 'xbc2'){
                            include('vXemBaoCaoNV.php');
                        }
                        elseif($action == 'show' && $query == 'profile'){
                            include 'vProfile.php';
                        }

                        //chi tiết Bệnh Nhân
                         if(isset($_GET['xbn'])){
                            $pxn = $_GET['xbn'];
                        }else{
                            $pxn = '';
                        }
                        if($pxn == 'read'){
                            include_once('ReadBN.php');
                        }
                        elseif($pxn == 'xemLS'){
                            include_once('vXemLSBA.php');
                        }
                        elseif($pxn == 'readls'){
                            include_once('ReadLSKB.php');
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
                        elseif($xnv == 'readnvqt'){
                            include_once('ReadNVQT.php');
                        }

                      ?>
</div>