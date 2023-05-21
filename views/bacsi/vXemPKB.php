<?php
  include '../../controllers/cTK.php'; 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $p = new controllerTKBS();
        $row = $p->get1PKB($id);
        $rs = mysqli_fetch_assoc($row);
    }else{
        return false;
    }
?>
<div class="container">
    <div class="row">
        <div class="col mx-auto col-10 col-md-8 col-lg-8 order-first">
            <h4 style="text-align: center;color:#0000FF;">Thông tin PKB mã số:<?php echo $id;?></h4>
            <form method="POST" class="form-control">
                <div class="form-group">
                    <label for="inputEmail4">Bác sĩ thực hiện</label>
                    <input type="text" class="form-control" name="bs" value="<?php echo $rs['bacsi']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Bệnh nhân</label>
                    <input type="text" class="form-control" name="bn" value="<?php echo $rs['benhnhan']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Phòng</label>

                    <input type="text" class="form-control" name="p" value="<?php echo $rs['phong']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Chuẩn đoán</label>
                    <textarea class="form-control" rows="5" name="cd"
                        style="background-color: white;"><?php echo $rs['chuandoan']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Kết luận</label>
                    <textarea class="form-control" rows="5" name="kl"
                        style="background-color: white;"><?php echo $rs['ketluan']; ?></textarea>
                </div>
                <br>
                <div class="mx-auto" style="text-align: center;">
                    <button type="submit" name="QR" class="btn btn-info">
                        <i class="bi bi-qr-code"> Xem QR</i>
                    </button> <a href="?c=qlkb&qr=pkb&action" class="btn btn-secondary">Đóng</a>
                </div>
            </form>
        </div>

        <!-- <h4 style="text-align: center;color:#0000FF;">Thông tin PKB mã số:<?php echo $id;?></h4>
<form method="POST">
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Bác sĩ thực hiện</label>
       <input type="text" class="form-control" name="bs" value="<?php echo $rs['bacsi']; ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Bệnh nhân</label>
       <input type="text" class="form-control" name="bn" value="<?php echo $rs['benhnhan']; ?>">
    </div>
    <div class="form-group col-md-5">
      <label for="inputEmail4">Phòng</label>
      
       <input type="text" class="form-control" name="p" value="<?php echo $rs['phong']; ?>">
    </div>
    <div class="form-group col-md-5">
      <label for="inputEmail4">Chuẩn đoán</label>
       <textarea class="form-control" rows="5" name="cd" style="background-color: white;"><?php echo $rs['chuandoan']; ?></textarea>
    </div>
    <div class="form-group col-md-5">
      <label for="inputEmail4">Kết luận</label>
       <textarea class="form-control" rows="5" name="kl" style="background-color: white;"><?php echo $rs['ketluan']; ?></textarea>
    </div>
    <br>
  <button type="submit"  name="QR" class="btn btn-info" style="margin-left: 500px">
           <i class="bi bi-qr-code"> Xem QR</i>
  </button>
  <a href="?action=ql&query=pkb">
    <button type="button" class="btn btn-primary" style="margin-left: 900px;">Đóng</button>
  </a>
</form> -->
        <?php
 include '../../library/qrcode/phpqrcode/qrlib.php';
  $path = '../image/imgQR/';
   if(!file_exists($path))
      mkdir($path);
   if(isset($_POST['QR'])){
    //Khung QR
    $s0 = 'Thông tin phiếu khám bệnh';
    $s1 = 'Bác sĩ thực hiện:';
    $s2 = 'Bệnh nhân:';
    $s3  = 'Phòng khám: ';
    $s4  = 'Chuẩn đoán: ';
    $s5  = 'Kết luận: ';
    
    //echo $_POST['hoten'];
    //Tạo string
    $codeString = $s0."\n";
    $codeString .= $s1.$_POST["bs"]."\n";
    $codeString .= $s2.$_POST["bn"]."\n";
    $codeString .= $s3.$_POST["p"]."\n";
    $codeString .= $s4.$_POST["cd"]."\n";
    $codeString .= $s5.$_POST["kl"]."\n";
   
    $qrImg = $path.date('d-m-Y').md5($codeString).'.png';
    QRcode::png($codeString, $qrImg);
   
    // echo '<br>';
    // echo '<br>';
    echo '<div class="col order-last" style="background-color: CornflowerBlue; border-radius: 5px 5px 5px 5px;"><h5 style="color:#FF0000;">Đây là mã QR Code thông tin PKB. Hãy lưu lại khi cần thiết!</h5>';
    echo '<img style="  display: block;
    margin-left: auto;
    margin-right: auto; width: 250px;" src="'.$path.basename($qrImg).'" /></div>';
  }
  
?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">