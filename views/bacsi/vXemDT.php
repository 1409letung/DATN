<?php
  include '../../controllers/cTK.php'; 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $p = new controllerTKBS();
        $row = $p->get1DT($id);
        $rs = mysqli_fetch_assoc($row);
    }else{
        return false;
    }
?>
<a href="?c=qlkb&qr=pkb&action" style="text-decoration: none">
    <button type="button" value="submit" class="btn btn-primary btn-sm">
        <i class="bi bi-list"> Phiếu Khám Bệnh</i>
    </button>
</a>

<a href="?c=qlkb&qr=kqxn&action" style="text-decoration: none">
    <button type="button" value="submit" class="btn btn-warning btn-sm">
        <i class="bi bi-grid-1x2-fill"> Kết Quả Xét Nghiệm</i>
    </button>
</a>
<a href="?c=qlkb&qr=dt&action" style="text-decoration: none">
    <button type="button" value="submit" class="btn btn-success btn-sm">
        <i class="bi bi-chat-left-heart-fill"> Đơn Thuốc</i>
    </button>
</a>

<hr>
<h4 style="text-align: center;color:#0000FF;">Thông tin đơn thuốc mã số:<?php echo $id;?></h4>
<form method="POST" class="form-control">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputEmail4">Bệnh nhân</label>
            <input type="text" class="form-control" name="bn" value="<?php echo $rs['benhnhan']; ?>" readonly>
        </div>
        <div class="form-group col-md-4">
            <label for="inputEmail4">Bác sĩ</label>
            <input type="text" class="form-control" name="bs" value="<?php echo $rs['bacsi']; ?>" readonly>
        </div>
        <div class="form-group col-md-5">
            <label for="inputEmail4">Ngày cấp</label>
            <input type="text" class="form-control" name="nc" value="<?php echo $rs['ngaycap']; ?>" readonly>
        </div>
        <div class="form-group col-md-5">
            <label for="inputEmail4">Hình thức</label>
            <?php
              if($rs['BHYT'] == 1)
              {
                echo '<input type="text" class="form-control" name="ht" style="color: #0000FF;" value="Bảo Hiểm Y Tế" readonly>';
              }else
              {
                echo '<input type="text" class="form-control" name="ht" style="color: green;" value="Dịch Vụ" readonly>';
              }
            ?>
        </div>
        <br>
        <table class="table table-bordered" id="table_field" width="800px;" style="text-align: center;">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th width="25%">Tên thuốc</th>
                <th width="10%">Số lượng</th>
                <th width="20%">Liều dùng</th>
                <th width="20%">Cách dùng</th>
            </tr>
        </thead>
        <tbody id="tbody">
            <?php
            $i = 0;
               foreach($row as $row)
               {
                $i++;
                echo '
                <tr>
                <td width="5%">
                <input type="text" class="form-control stt" name="stt[]" id="stt" value="'.$i.'" readonly>
                  </td>
          <td width="25%">
             <input type="text" class="form-control" value="'.$row['tenthuoc'].'" readonly>
          </td>
          <td width="10%">
            <input class="form-control" type="number" value="'.$row['soluong'].'" readonly>
          </td>
          <td width="20%">
          <input class="form-control" type="text" value="'.$row['lieudung'].'" readonly>
          </td>
          <td width="20%">
          <input class="form-control" type="text" value="'.$row['cachdung'].'" readonly>
          </td>
                </tr>';

               }
            ?>
        
        </tbody>

    </table>
        <!-- <div class="form-group col-md-5">
            <label for="inputEmail4">Tổng tiền</label>
            <input type="text" class="form-control" name="ttien" value="<?php //echo $rs['tongtien']; ?>">
        </div> -->
        <br>
        <!-- <button type="submit" name="QR" class="btn btn-info" style="margin-left: 500px">
            <i class="bi bi-qr-code"> Xem QR</i>
        </button> -->
        <a href="?c=qlkb&qr=dt&action">
            <button type="button" class="btn btn-primary" style="margin-left: 900px;">Đóng</button>
        </a>
</form>
<?php
 include '../../library/qrcode/phpqrcode/qrlib.php';
  $path = '../image/imgQR/';
   if(!file_exists($path))
      mkdir($path);
   if(isset($_POST['QR'])){
    //Khung QR
    $s0 = 'Thông tin đơn thuốc';
    $s1 = 'Bệnh nhân:';
    $s2 = 'Bác sĩ';
    $s3 = 'Tên thuốc:';
    $s4  = 'Số lượng: ';
    $s5  = 'Liều dùng: ';
    $s6  = 'Cách dùng: ';
    $s7  = 'Ngày cấp: ';
    $s8 = 'Hình thức: ';
    $s9 = 'Tổng tiền: ';
    
    //echo $_POST['hoten'];
    //Tạo string
    $codeString = $s0."\n";
    $codeString .= $s1.$_POST["bn"]."\n";
    $codeString .= $s2.$_POST["bs"]."\n";
    $codeString .= $s3.$_POST["tthuoc"]."\n";
    $codeString .= $s4.$_POST["sl"]."\n";
    $codeString .= $s5.$_POST["ld"]."\n";
    $codeString .= $s6.$_POST["cd"]."\n";
    $codeString .= $s7.$_POST["nc"]."\n";
    $codeString .= $s8.$_POST["ht"]."\n";
    $codeString .= $s9.$_POST["ttien"]."\n";
    $qrImg = $path.date('d-m-Y').md5($codeString).'.png';
    QRcode::png($codeString, $qrImg);
   
    echo '<br>';
    echo '<br>';
    echo '<h5 style="color:#FF0000;margin-left: 300px">Đây là mã QR Code thông tin đơn thuốc. Hãy lưu lại khi cần thiết!</h5>';
    echo '<br>';
    echo '<img style="margin-left: 430px;" src="'.$path.basename($qrImg).'" />';
  }
  
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">