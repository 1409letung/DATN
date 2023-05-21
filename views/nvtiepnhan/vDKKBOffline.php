<?php
    include '../../controllers/cTK.php';
      $maTK = $_SESSION['MaTK'];
	   $p = new controllerTK();
      date_default_timezone_set('Asia/Ho_Chi_Minh');
?>

<!-- Start Đơn đăng ký -->
<div class="" style="margin-right: 10px;">
   <button type="button" class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#myModal">
       <i class="bi bi-newspaper">  Đăng kí mới</i>
   </button>
</div>


<div class="modal" id="myModal">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header" style="background-color: cyan;"  >
                  <h4 class="modal-title" style="margin-left: 80px; color:MediumBlue;"> <b>Đăng kí đặt lịch khám bệnh</b></h4>
                  <button type="button" class="close" data-dismiss="modal" style="border-radius: 5px;border-color: white;">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
                  <form action="" method="POST" class="">
                  <div class="form-group">
                    <label for="hoten">Họ tên:</label>
                       <input type="text" class="form-control" name="hoten"></input>
                  </div>
                  <div class="form-group ">
                    <label for="sdt">Số điện thoại:</label>
                       <!-- <span type="text" class="form-control" name="sdt"><?php //echo $rowBN['sdt']; ?></span> -->
                       <input type="text" class="form-control" name="sdt" value=""></input>
                  </div>
                  <div class="form-group ">
                    <label for="email">Email:</label>
                       <!-- <span type="text" class="form-control" name="email"><?php //echo $rowBN['email']; ?></span> -->
                       <input type="email" class="form-control" name="email" value=""></input>
                  </div>
				  <div class="form-group">
                    <label for="pwd">Mô tả triệu chứng:</label>
                       <textarea name="trieuchung" class="form-control" id="exampleFormControlTextarea1" rows="3" name="trieuchung" ></textarea>
                  </div>
                  
                  <div class="form-group ">
                    <label for="">Chọn ngày khám:</label>
                       <input type="date" class="form-control" name="ngaykham"></input>
                        <p style="color: red;">Lưu ý: Chỉ được đặt trước tối đa 3 ngày!!!</p>
                  </div>
                  <div class="form-group ">
                    <label for="chuyenkhoa">Chuyên Khoa:</label>
                       <select name="chuyenkhoa" class="form-control chuyenkhoa" id="">
                        <option value="">-->Hãy chọn chuyên khoa<--</option>
                           <?php
                               $t = new controlerDangKy();
                               $row = $t->loadCk();
                               foreach($row as $row){                                
                            ?> 
                              <option value='<?php echo $row['maCk'] ?>'><?php echo $row['chuyenkhoa'] ?></option>
                            <?php
                               }
                            ?>
                       </select>
                  </div>
				  <div class="form-group">
                    <label for="pwd">Bác sĩ:</label>
                       <select name="bacsi" class="form-control bacsi" id="">
                        <option value="">-->Hãy chọn bác sĩ<--</option>
                       </select>
          </div>
          <div class="form-group ">
                    <label for="">Chọn ca khám:</label>
                    <select name="cakham" class="form-control cakham" id="">
                     <option value=""></option>
                    </select>
          </div>
          <div class="form-group col-md-6">
                    <!-- <label for="phidichvu"></label> -->
                    <b><p style="color:green">Phí dịch vụ: 100,000 VNĐ</p></b>
          </div>
				  <div class="modal-footer">
					<button type="submit" name="dangky" class="btn btn-primary btn-footer" style="text-align: center;">Đăng ký</button>
                  </div>
                 </form>
               </div>
            </div>
         </div>
      </div>
<?php
   include '../../library/qrcode/phpqrcode/qrlib.php';
   $path = '../image/imgQR/';
   if(!file_exists($path))
      mkdir($path);
   //
   $t = new controlerDangKy();
   if(isset($_POST['dangky'])){
    //Khung QR
    $s0 = 'Thông tin đơn đăng ký khám bệnh';
    $s1 = 'Họ tên:';
    $s2 = 'Số điện thoại: ';
    $s3 = 'Email: ';
    $s4 = 'Triệu chứng bệnh: ';
    $s5 = 'Ngày khám:';
    $s6 = 'Chuyên khoa:';
    $s7 =  'Đăng ký bác sĩ:'; 
    $s8 =  'Ca khám đăng ký:';
    $s9 = 'Phí dịch vụ:';

    $today = date("Y/m/d");
    $hh = strtotime("$today");
    $hr = strtotime("+3 day");
    //lấy dữ liệu từ form đăng ký
    $hoten = $_POST['hoten'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $trieuchung = $_POST['trieuchung'];
    $chuyenkhoa = $_POST['chuyenkhoa'];
    $bacsi = $_POST['bacsi'];
    $cakham = $_POST['cakham'];
    $ngaykham = $_POST['ngaykham'];
    $phidichvu = 100000;
    $trangthaitt = "Chưa Thanh Toán";
    $ngaydat = date("Y/m/d");
    $ht =strtotime("$ngaykham");
    $trangthai = 'Chờ duyệt';
    $hinhthuc = 'Offline';
    //tạo string QR
    $codeString = $s0."\n";
    $codeString .= $s1.$_POST["hoten"]."\n";
    $codeString .= $s2.$_POST["sdt"]."\n";
    $codeString .= $s3.$_POST["email"]."\n";
    $codeString .= $s4.$_POST["trieuchung"]."\n";
    $codeString .= $s5.$_POST["ngaykham"]."\n";
    $codeString .= $s6.$_POST["chuyenkhoa"]."\n";
    $codeString .= $s7.$_POST["bacsi"]."\n";
    $codeString .= $s8.$_POST["cakham"]."\n";
    $codeString .= $s9.$phidichvu."\n";
    $qrImg = $path.date('d-m-Y').time().md5($codeString).'.png';
    QRcode::png($codeString, $qrImg);
    if(!$hoten || !$sdt || !$email || !$trieuchung || !$bacsi || !$bacsi || !$cakham || !$ngaykham || !$chuyenkhoa || !$phidichvu){
      echo "
        <script>
         alert('Vui lòng nhập đầy đủ thông tin!');
        </script>";
    }else{
      if(!preg_match("/^[A-ZĐÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĨŨƠỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỬỮỰỲỴÝỶỸ]{1}[a-zàáâãèéêìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,}(\s[A-ZĐÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĨŨƠỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỬỮỰỲỴÝỶỸ]{1}[a-zàáâãèéêìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,}){1,}$/",$hoten)){
         echo '<script>alert("Đăng ký thất bại. Họ tên không phù hợp, vui lòng kiểm tra lại!");</script>';
      }
      elseif(!preg_match("/^[0]{1}+[0-9]{9}$/",$sdt)){
         echo '<script>alert("Đăng ký thất bại. Số điện thoại không đúng, vui lòng kiểm tra lại!");</script>';
      }elseif(!preg_match("/^[a-zA-Z0-9]+[@]+[a-z]{5}+[.]+[a-z]{3}$/", $email)){
         echo '<script>alert("Đăng ký thất bại. Email không đúng, vui lòng kiểm tra lại!");</script>';
      }
      elseif($hh > $ht || $ht > $hr)
      {
         echo '<script>alert("Đăng ký thất bại. Ngày khám không hợp lệ, vui lòng kiểm tra lại!");</script>';
      }
      else{
        $kq = $t->insertDDKKB($hoten,$sdt,$email,$trieuchung,$chuyenkhoa,$bacsi,$cakham,$phidichvu,$trangthaitt,$ngaykham,$ngaydat,$qrImg,$trangthai,$hinhthuc);
       if($kq){
       echo "
        <script>
         alert('Đăng ký thành công. Chúng tôi đã tạo mã QR cho bạn, hãy kiểm tra lại chi tiết đơn đăng ký nhé!');
        </script>";
        }else{
          echo "<script>alert('Đăng ký thất bại!');</script>";
       }
      }
    }
   }
?>
<!-- End Đơn đăng ký -->
<!-- Start Table đơn đăng ký -->
<br>
<br>
<h4 style="text-align: center; color:forestgreen;">Danh sách đặt lịch</h4>
<table class="table bg-white rounded shadow-sm  table-hover col-4">
    <thead>
        <tr style="text-align: center;" >
            <th scope="col" width="100">STT</th>
            <th scope="col">Họ tên</th>
            <th scope="col">Chuyên Khoa</th>
            <th scope="col">Bác sĩ</th>
            <th scope="col">Ngày khám</th>
            <th scope="col">Ca khám</th>
            <th scope="col">Phí dịch vụ</th>
            <th scope="col">Trạng thái</th>           
            <!-- <th scope="col">PDF</th> -->
        </tr>
    </thead>
<?php
  $kb = new controlNVTN();
  $row =  $kb->getKBOff();
  $i = 0;
  foreach($row as $row){
   $i++;
  ?>
    <tbody>
                <tr style="text-align: center;">
                <th><?php echo $i ?></th>
                <th><?php echo $row['hoten']; ?></th>
                <td><?php echo $row['chuyenkhoa']; ?></td>
                <td><?php echo $row['bacsi']; ?></td>
                <td><?php echo $row['ngaykham']; ?></td>
                <td><?php echo $row['cakham']; ?></td>
                <td><?php echo $row['phidichvu']; ?> VNĐ</td>
                <td>
                  <a href="?tt=update&id=<?php echo $row['maDDKKB'];?>">
                       <button type="button" value="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="xemchitiet">
                          <i class="bi bi-paypal"> <?php echo $row['trangthaithanhtoan'];?></i>
                       </button>
                    </a>
                </td>
                <!-- <td>
                  <a target="_blank" href="PrintDKKB.php?id=<?php echo $row['maDDKKB'];?>">
                       <button type="button" value="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="xemchitiet">
                          <i class="bi bi-filetype-pdf">Xuất file</i>
                       </button>
                    </a>
                </td> -->
             </tr>
    </tbody>
<?php
  }
?>
</table> 
<!-- chi tiết -->

<!-- end chi tiết -->

<style>
.button {
  background-color: green; /* Green */
  border: none;
  color: white;
  /* padding: 16px 32px; */
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  border-color: blue;
}

.button1 {
  background-color: white; 
  color: black; 
  /* border: 2px solid #4CAF50; */
  border-radius: 10px
}

.button1:hover {
  background-color: blueviolet;
  color: white;
}

.button2 {
  background-color: white; 
  color: black; 
  /* border: 2px solid #008CBA; */
  border-color: blue;
}

.button2:hover {
  background-color: blueviolet;
  color: blue;
}

 </style>
<!-- End Table đơn đăng ký -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<script src="../js/jquery-3.6.1.js" type="text/javascript"></script>
<script src="../js/getBacSi.js" type="text/javascript"></script>