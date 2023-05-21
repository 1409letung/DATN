<section class="book" id="book" style="padding-top: 130px;">
<?php
   include '././controllers/cQR.php';
   include '././library/qrcode/phpqrcode/qrlib.php'; 
   date_default_timezone_set('Asia/Ho_Chi_Minh');
   $p = new tb_QR_DKKB();
   $path = 'views/image/imgQR/';
   if(!file_exists($path))
      mkdir($path);

   if(isset($_POST['submitQR'])){
    $hoten = 'Họ tên:';
    $sdt   = 'Số điện thoại: ';
    $mail  = 'Email: ';
    $mota  = 'Triệu chứng bệnh: ';
    $ngayhen = 'Ngày hẹn khám: '; 
    //
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $content = $_POST['content'];
    $date = $_POST['date'];
    $trangthai = 'Chờ duyệt';
    //
    $today = date("Y/m/d");
    $hh = strtotime("$today");
    $hr = strtotime("+3 day");
    $ht =strtotime("$date");
    //
    $codeString = $hoten.$_POST["name"]."\n";
    $codeString .= $sdt.$_POST["phone"]."\n";
    $codeString .= $mail.$_POST["email"]."\n";
    $codeString .= $mota.$_POST["content"]."\n";
    $codeString .= $ngayhen.$_POST['date'];
    $qrImg = $path.date('d-m-Y').time().md5($codeString).'.png';
    QRcode::png($codeString, $qrImg);
    if(!$name || !$phone || !$email || !$content || !$date){
        echo '<script> alert("Hãy điền đầy đủ thông tin vào form!"); </script>';
    }else{
        if(!preg_match("/^[A-ZĐÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĨŨƠỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỬỮỰỲỴÝỶỸ]{1}[a-zàáâãèéêìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,}(\s[A-ZĐÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĨŨƠỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỬỮỰỲỴÝỶỸ]{1}[a-zàáâãèéêìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,}){1,}$/",$name)){
           echo '<script>alert("Đăng ký thất bại. Họ tên không phù hợp, vui lòng kiểm tra lại!");</script>';
        }
        elseif(!preg_match("/^[0]{1}+[0-9]{9}$/",$phone)){
           echo '<script>alert("Đăng ký thất bại. Số điện thoại không đúng, vui lòng kiểm tra lại!");</script>';
        }elseif(!preg_match("/^[a-zA-Z0-9]+[@]+[a-z]{5}+[.]+[a-z]{3}$/", $email)){
           echo '<script>alert("Đăng ký thất bại. Email không đúng, vui lòng kiểm tra lại!");</script>';
        }
        elseif($hh > $ht || $ht > $hr)
        {
           echo '<script>alert("Đăng ký thất bại. Ngày khám không hợp lệ, vui lòng kiểm tra lại!");</script>';
        }else{
            $kqQR = $p->insertQR($name,$phone,$email,$content,$date,$qrImg,$trangthai);
            unset($_POST['submitQR']);
            if($kqQR){
               echo  '<meta http-equiv="refresh" content="url=index.php?page=lichkham">';
                //header("refresh:0;url='index.php?page=lichkham'");
               echo '<script> alert("Đặt lịch khám thành công!"); </script>';
               echo '
            <hr>
           <h1 style="color:#FF0000;text-align: center;";>Phòng khám xin thông báo đến quý khách! </h1>
           <h2 style="text-align: center;"> Quý khách đã đặt lịch hẹn thành công. Vui lòng chờ nhân viên của chúng tôi liên hệ đến quý khách để xác nhận trong thời gian sớm nhất</h2>
         
           <img src="'.$path.basename($qrImg).'" alt="Hình ảnh QR Code" id="qrCode" style="margin-left: 600px;" width="250px">;
           <h2 style="text-align: center;">Đây là mã QR Code đặt lịch của quý khách. Quý khách hãy chụp lại mã QR này để khi đến phòng khám cần dùng đến.</h2>
           <h2 style="text-align: center;">Trân trọng cảm ơn quý khách!</h2>
           <form action="" method="POST" style="text-align: center;">
              <input class="btn btn-primary" type="submit" name="savedQR" value="Đã lưu QR">
           </form>
          ';
           }else{
             echo '<script> alert("Đặt lịch thất bại!"); </script>';
             echo  '<meta http-equiv="refresh" content="0;url=index.php?page=lichkham">';
           }
        }
    }
   
    //gỡ QR
    if(isset($_POST['savedQR'])){
       unset($_POST['submitQR']);
       header("refresh:0;url='index.php?page=lichkham'");
    }
    // end gỡ QR
   }
?>
    <h1 class="heading"> <span>đặt lịch khám</span> ngay! </h1>    

    <div class="row">

        <div class="image">
            <img src="views/image/book-img.svg" alt="">
        </div>

        <form action="" method="POST">
            <h3 style="color: #16a085;">ĐẶT LỊCH HẸN</h3>
            <input type="text" placeholder="Tên của bạn" class="box" name="name">
            <input type="text" placeholder="Số điện thoại" class="box" name="phone">
            <input type="email" placeholder="Email liên hệ" class="box" name="email">
            <!-- <input type="text" placeholder="Mô tả triệu chứng" class="box" name="content"> -->
            <textarea cols="30" rows="6" placeholder="Mô tả triệu chứng" class="box" name="content"></textarea>
            <input type="date" class="box" name="date">
            <h4> <p style="color: red;">Vui lòng đặt trước tối đa 3 ngày!!!</p></h4>
            <button type="submit"  class="btn" name="submitQR">Đặt ngay</button> 
            <hr>
        </form>
        <!-- <div class="col-md-6">
			<div class="showQRCode"></div>
		</div> -->
        

    </div>
</section>


