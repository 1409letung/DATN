<?php
    include '../../controllers/cTK.php'; 
    if(isset($_GET['idbenhan'])){
        $id = $_GET['idbenhan'];
        $p = new controllerBenhAn();
        $row = $p->loadOneBA($id);
        $rs = mysqli_fetch_assoc($row);
    }else{
        return false;
    }
?>
<div class="container">
    <div class="row">
        <div class="mx-auto col-10 col-md-8 col-lg-8">
            <h4 style="text-align: center;color:#0000FF;">Thông tin bệnh án mã số: <?php echo $id;?></h4>
            <form class="form-control" method="post">
                <div class="form-row">
                    <div class="form-group">
                        <label for="inputEmail4">Bệnh nhân</label>
                        <input type="text" class="form-control" name="ht" value="<?php echo $rs['hoten']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Ngày sinh</label>
                        <input type="text" class="form-control" name="ns" value="<?php echo $rs['ngaysinh']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Giới tính</label>
                        <?php
                            if($rs['gioitinh'] == 1)
                            {
                               echo ' <input type="text" class="form-control" name="gt" value="Nam">';
                            }
                            else
                            {
                              echo ' <input type="text" class="form-control" name="gt" value="Nữ">';
                            }
                        ?>

                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Dân tộc</label>
                        <input type="text" class="form-control" name="dt" value="<?php echo $rs['dantoc']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Số BHYT</label>
                        <input type="text" class="form-control" name="bhyt" value="<?php echo $rs['BHYT']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Nghề nghiệp</label>
                        <input type="text" class="form-control" name="nn" value="<?php echo $rs['nghenghiep']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Đơn vị công tác</label>
                        <input type="text" class="form-control" name="dvct" value="<?php echo $rs['donvicongtac']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Địa chỉ</label>
                        <input type="text" class="form-control" name="dc" value="<?php echo $rs['diachi']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Ngày khám</label>
                        <input type="text" class="form-control" name="nk" value="<?php echo $rs['thoigiankham']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Bác sĩ khám</label>
                        <input type="text" class="form-control" name="bs" value="<?php echo $rs['bacsi']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="inputEmail4">Chuẩn đoán</label>
                        <textarea class="form-control" rows="5" name="cd"
                            style="background-color: white;"><?php echo $rs['chuandoan']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Phương pháp điều trị</label>
                        <textarea class="form-control" rows="5" name="ppdt"
                            style="background-color: white;"><?php echo $rs['phuongphapdieutri']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Kết luận</label>
                        <textarea class="form-control" rows="5" name="kl"
                            style="background-color: white;"><?php echo $rs['ketluan']; ?></textarea>
                    </div>
                    <div class="form-group  ">
                        <label for="inputEmail4">Y tá phụ trách</label>
                        <input type="text" class="form-control" name="yt" value="<?php echo $rs['nguoitao']; ?>">
                    </div>
                    <div class="form-group  ">
                        <label for="inputEmail4">Ghi chú</label>
                        <input type="text" class="form-control" name="gc" value="<?php echo $rs['ghichu']; ?>">
                    </div>
                    <div class="form-group  ">
                        <label for="inputEmail4">Loại khách hàng</label>
                        <?php
                            if($rs['loaikhachhang'] == 1)
                            {
                               echo ' <input type="text" class="form-control" name="lkh" value="Thành viên">';
                            }
                            else
                            {
                              echo ' <input type="text" class="form-control" name="lkh" value="Vãng lai">';
                            }
                        ?>
                    </div>
                    <br>
                    <div class="mx-auto" style="text-align: center;">
                        <button type="submit" name="QR" class="btn btn-info">
                            <i class="bi bi-qr-code"> Xem QR</i>
                        </button> <a href="?action=ql&query=benhan">
                            <button type="button" class="btn btn-primary">Đóng</button>
                        </a>

                    </div>
                </div>
            </form>
        </div>

        <?php
 include '../../library/qrcode/phpqrcode/qrlib.php';
  $path = '../image/imgQR/';
   if(!file_exists($path))
      mkdir($path);
   if(isset($_POST['QR'])){
    //Khung QR
    $s0 = 'Thông tin bệnh án';
    $s1 = 'Bệnh nhân:';
    $s2 = 'Ngày sinh:';
    $s3  = 'Giới tính: ';
    $s4  = 'Dân tộc: ';
    $s5  = 'BHYT: ';
    $s6  = 'Nghề nghiệp: ';
    $s7  = 'Đơn vị công tác: ';
    $s8  = 'Địa chỉ: ';
    $s9 = 'Ngày khám';
    $s10 = 'Bác sĩ khám:';
    $s11 = 'Chuẩn đoán:';
    $s12 = 'Phương pháp điều trị:';
    $s13 = 'Kết luận:';
    $s14 = 'Y tá phụ trách:';
    $s15 = 'Ghi chú:';
    $s16 = 'Khách hàng:';
   
    
    //echo $_POST['hoten'];
    //Tạo string
    $codeString = $s0."\n";
    $codeString .= $s1.$_POST["ht"]."\n";
    $codeString .= $s2.$_POST["ns"]."\n";
    $codeString .= $s3.$_POST["gt"]."\n";
    $codeString .= $s4.$_POST["dt"]."\n";
    $codeString .= $s5.$_POST["bhyt"]."\n";
    $codeString .= $s6.$_POST["nn"]."\n";
    $codeString .= $s7.$_POST["dvct"]."\n";
    $codeString .= $s8.$_POST["dc"]."\n";
    $codeString .= $s9.$_POST["nk"]."\n";
    $codeString .= $s10.$_POST["bs"]."\n";
    $codeString .= $s11.$_POST["cd"]."\n";
    $codeString .= $s12.$_POST["ppdt"]."\n";
    $codeString .= $s13.$_POST["kl"]."\n";
    $codeString .= $s14.$_POST["yt"]."\n";
    $codeString .= $s15.$_POST["gc"]."\n";
    $codeString .= $s16.$_POST["lkh"]."\n";
    $qrImg = $path.date('d-m-Y').md5($codeString).'.png';
    QRcode::png($codeString, $qrImg);
   
    // echo '<br>';
    // echo '<br>';
    echo '<div class="col order-last" style="background-color: CornflowerBlue; border-radius: 5px 5px 5px 5px;"><h5 style="color:#FF0000;">Đây là mã QR Code thông tin bệnh án. Hãy lưu lại khi cần thiết!</h5>';
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