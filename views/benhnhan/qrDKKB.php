<?php
    include '../../controllers/cTK.php'; 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        //echo $id;
        $p = new controlerDangKy();
        $row = $p->getQR($id);
        $rs = mysqli_fetch_assoc($row);
        $qrimg = $rs['qrImg'];
        $getQR = basename($qrimg);
        //echo $getQR;
    }else{
        return false;
    }
?>
<div class="container">
    <div class="row">
       <div class="mx-auto col-10 col-md-8 col-lg-8" style="background-color: CornflowerBlue; border-radius: 10px 10px 10px 10px;">
       <h4 style="text-align: center; color: red;">Mã QR của ĐĐKKB mã số:<?php echo $id;?></h4>
<div style="text-align: center;">
     <img width="350px" src="../image/imgQR/<?php echo $getQR ?>" alt="Đơn đăng ký này chưa có mã QR!">

</div>
<div style="text-align: center; margin-top:15px; margin-bottom:15px;">
<a href="?action=show&query=dkkb">
        <button type="button" value="submit" class="btn btn-danger btn-lg" data-toggle="modal" data-target="xemchitiet">
            <i class="bi bi-qr-code"> Đóng </i>
        </button>
    </a>
</div>
       </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
