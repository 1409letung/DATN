<?php
  include '../../controllers/cTK.php'; 
  if(isset($_GET['id'])){
        $id = $_GET['id'];
        $p = new controllerTTBN();
        $row = $p->getBN($id);
        $rs = mysqli_fetch_assoc($row);
    }else{
        return false;
    }
?>
<div class="container">
    <div class="row">
        <div class="col mx-auto col-10 col-md-8 col-lg-8 order-first">
            <h4 style="text-align: center;color:#0000FF;">Thông tin bệnh nhân mã số: <?php echo $id;?></h4>
            <form method="POST" class="form-control">
                <!-- <div class="form-group">
                    <label for="inputEmail4">Mã TK</label>
                    <span type="text" class="form-control" id="fullName"><?php //echo $rs['MaTK']; ?></span>
                </div> -->
                <div class="form-group">
                    <label for="inputEmail4">Họ và tên</label>

                    <input type="text" class="form-control" name="ht" value="<?php echo $rs['hoten']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Ngày sinh</label>
                    <input type="text" class="form-control" name="ns" value="<?php echo $rs['ngaysinh']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Giới tính</label>

                    <input type="text" class="form-control" name="gt" value="<?php echo $rs['gioitinh']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Địa chỉ</label>

                    <input type="text" class="form-control" name="dc" value="<?php echo $rs['diachi']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Số điện thoại</label>
                    <input type="text" class="form-control" name="sdt" value="<?php echo $rs['sdt']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Email</label>

                    <input type="text" class="form-control" name="email" value="<?php echo $rs['email']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Nghề nghiệp</label>
                    <input type="text" class="form-control" name="nn" value="<?php echo $rs['nghenghiep']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">BHYT</label>
                    <input type="text" class="form-control" name="nn" value="<?php echo $rs['BHYT']; ?>">
                </div>
                <br>
                <div class="mx-auto" style="text-align: center;">
                    <button type="submit" name="QR" class="btn btn-info">
                        <i class="bi bi-qr-code"> Xem QR</i>
                    </button>
                    <a href="?action=ql&query=ttbn">
                        <button type="button" class="btn btn-primary">Đóng</button>
                    </a>
                </div>
            </form>
        </div>
        <!-- <h4 style="text-align: center;color:#0000FF;">Thông tin bệnh nhân mã số: <?php echo $id;?></h4>
<form method="POST">
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Mã TK</label>
       <span type="text" class="form-control" id="fullName"><?php echo $rs['MaTK']; ?></span>
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Họ và tên</label>
      
       <input type="text" class="form-control" name="ht" value="<?php echo $rs['hoten']; ?>">
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4">Ngày sinh</label>
       <input type="text" class="form-control" name="ns" value="<?php echo $rs['ngaysinh']; ?>">
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4">Giới tính</label>
      
       <input type="text" class="form-control" name="gt" value="<?php echo $rs['gioitinh']; ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Địa chỉ</label>
      
       <input type="text" class="form-control" name="dc" value="<?php echo $rs['diachi']; ?>">
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4">Số điện thoại</label>
      <input type="text" class="form-control" name="sdt" value="<?php echo $rs['sdt']; ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Email</label>
     
       <input type="text" class="form-control" name="email" value="<?php echo $rs['email']; ?>">
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4">Nghề nghiệp</label>
       
       <input type="text" class="form-control" name="nn" value="<?php echo $rs['nghenghiep']; ?>">
    </div>
    <br>
  <button type="submit"  name="QR" class="btn btn-info" style="margin-left: 500px">
           <i class="bi bi-qr-code"> Xem QR</i>
  </button>
  <a href="?action=ql&query=ttbn">
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
    $s0 = 'Thông tin bệnh nhân';
    $s1 = 'Họ tên bệnh nhân:';
    $s2 = 'Ngày sinh:';
    $s3  = 'Giới tính: ';
    $s4  = 'Địa chỉ: ';
    $s5  = 'SĐT: ';
    $s6  = 'Email: ';
    $s7  = 'Nghề nghiệp: ';
    
    //echo $_POST['hoten'];
    //Tạo string
    $codeString = $s0."\n";
    $codeString .= $s1.$_POST["ht"]."\n";
    $codeString .= $s2.$_POST["ns"]."\n";
    $codeString .= $s3.$_POST["gt"]."\n";
    $codeString .= $s4.$_POST["dc"]."\n";
    $codeString .= $s5.$_POST["sdt"]."\n";
    $codeString .= $s6.$_POST["email"]."\n";
    $codeString .= $s7.$_POST["nn"]."\n";
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