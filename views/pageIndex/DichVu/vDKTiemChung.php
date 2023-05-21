

</script>
<div class="col-lg-8 col-md-7 order-md-1 order-1" style="margin-top: 20px; ">
    <div>
        <h1 style="text-align: center;color: green;">ĐĂNG KÝ TIÊM CHỦNG VACCIN</h1>
        <p></p>     
        <form action="" class="formdk" method="POST">
                  <div class="form-group">
                    <label for="hoten">Họ tên:</label>
                       <input type="text" class="form-control" name="hoten" value=""></input>
                  </div>
                  <div class="form-group">
                    <label for="hoten">Giới tính:</label>
                       <input type="text" class="form-control" name="gioitinh" value=""></input>
                  </div>
                  <div class="form-group">
                    <label for="hoten">Ngày sinh:</label>
                       <input type="date" class="form-control" name="ngaysinh" value=""></input>
                  </div>
                  <div class="form-group ">
                    <label for="sdt">SĐT:</label>
                       <input type="text" class="form-control" name="sdt" value=""></input>
                  </div>
                  <div class="form-group ">
                    <label for="email">Email:</label>
                       <input type="email" class="form-control" name="email" value=""></input>
                  </div>   
                  <div class="form-group">
                    <label for="hoten">Địa chỉ:</label>
                       <input type="text" class="form-control" name="diachi" value=""></input>
                  </div>
                  <div class="form-group ">
                    <label for="phongbenh">Phòng bệnh:</label>
                       <select name="phongbenh"  id="" class="phongbenh">
                        <option value="">-->Hãy chọn bệnh cần tiêm phòng<--</option>
                        <?php
                               $row = $p->getBenh();
                               foreach($row as $row){                                
                            ?> 
                              <option value='<?php echo $row['tenbenh'] ?>'><?php echo $row['tenbenh'] ?></option>
                            <?php
                               }
                            ?>
                       </select>
                  </div>
				  <div class="form-group">
                    <label for="pwd">Vaccin:</label>
                       <select name="vaccin"  id="" class="vaccin">
                        <option value="">-->Hãy chọn vaccin muốn tiêm<--</option>
                       </select>
               </div>
               <div class="form-group">
                    <label for="pwd">Xuất xứ:</label>
                    <div class="sanxuat"> </div>
               </div>
               <div class="form-group">
                    <label for="pwd">Giá(VNĐ):</label>
                       <div class="gia"></div> 
               </div>
           <div class="form-group ">
                    <label for="">Ngày tiêm chủng:</label>
                       <input type="date" class="form-control" name="ngaydk"></input>
                        <p style="color: red;">Lưu ý: Chỉ được đặt trước tối đa 3 ngày!!!</p>
                  </div>
            <div class="form-group ">
                    <label for="">Phương thức thanh toán:</label>
                       <select name="pttt" id="" class="form-control">
                        <option value="0">Thanh toán bằng tiền mặt</option>
                        <option value="1">Thanh toán online</option>
                       </select>
                  </div>
				<div class="modal-footer">
					<button type="submit" name="dangky" class="btn btn-light btn-footer" style="text-align: center;">Đăng ký</button>
            </div>
</form>
    </div>                    
</div>
<!-- Đăng ký tiêm chủng -->
  <?php
   $A = $p->getidDKTC();
  
   if(isset($_POST['dangky'])){
     $maDKTC = rand();
     $hoten     = $_POST['hoten'];
     $gioitinh  = $_POST['gioitinh'];
     $ngaysinh  = $_POST['ngaysinh'];
     $sdt  = $_POST['sdt'];
     $email = $_POST['email'];
     $diachi = $_POST['diachi'];
     $benh = $_POST['phongbenh'];
     $vaccin = $_POST['vaccin'];
     $sanxuat = $_POST['xuatxu'];
     $gia = $_POST['gia'];
     $ngaydk = $_POST['ngaydk'];
     $ht =strtotime("$ngaydk");
     $trangthai = 'Chưa thanh toán';
     $today = date("Y/m/d");
     $hh = strtotime("$today");
     $hr = strtotime("+3 day");
     $pttt = $_POST['pttt'];
     if(!$hoten || !$gioitinh || !$ngaysinh || !$sdt || !$email || !$diachi || !$benh || !$vaccin || !$sanxuat || !$gia || !$ngaydk){
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
      }else{
         if(in_array($maDKTC, $A)){
            unset($maDKTC);
            echo '<meta http-equiv="refresh" content=0;>';
         }else{
            $_SESSION['kttt'] = 1;
            $_SESSION['order_id'] = $maDKTC;
            $_SESSION['tongtien'] = $_POST['gia'];
            $_SESSION['ten'] = $_POST['hoten'];
            $_SESSION['dt'] = $_POST['sdt'];
            $_SESSION['email'] =$_POST['email'];
            $query = $p->inDKTC($maDKTC,$hoten,$gioitinh,$ngaysinh,$sdt,$email,$diachi,$benh,$vaccin,$sanxuat,$gia,$ngaydk,$trangthai,$pttt);
            if($pttt == 0)
            {
               echo '
                <script>
                 window.location.href="index.php?page=dichvu&tc";
                  alert("Đăng ký thành công, vui lòng chờ thông báo từ phòng khám. Cảm ơn bạn đã tin tưởng và lựa chọn dịch vụ của chúng tôi!");
                </script>';
            }
            else
            {
               echo '<meta http-equiv="refresh" content=0;"vendor/API/vnpay_php/thanhtoan.php">';
            }
           
         }
      }
     }
   }
  ?>
  
<!-- end -->
<style>
   form{
      border: 1px solid green;
      border-radius: 10px;
      padding-left: 10px;
      padding-top: 15px;
      padding-right: 10px;
      font-size: 20px;
   }
.formdk input{
   font-size: 18px;
   height: 35px;

}
.formdk select{
   height: 35px;
   width: 700px;
   font-size: 18px;
}
.formdk option{
   height: 35px;
}
</style>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<script src="views/js/jquery-3.6.1.js" type="text/javascript"></script>
<script src="views/js/ajaxDKTCVC.js" type="text/javascript"></script>

<!-- //     $query = $p->inDKTC($hoten,$gioitinh,$ngaysinh,$sdt,$email,$diachi,$benh,$vaccin,$sanxuat,$gia,$ngaydk,$trangthai);
      //     if($query){
      //       unset($_POST['dangky']);
      //     echo "
      //          <script>
      //          alert('Đăng ký thành công. Chúng tôi đã tạo mã QR cho bạn, hãy kiểm tra lại chi tiết đơn đăng ký nhé!');
      //        </script>";
      //   }else{
      //     echo "<script>alert('Đăng ký thất bại!');</script>";
      //  } -->