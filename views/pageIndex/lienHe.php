<section class="contact-us" id="contact-section" style="padding-top: 130px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div id="map">
          
            <!-- You just need to go to Google Maps for your own map point, and copy the embed code from Share -> Embed a map section -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2731.320700876464!2d106.68622614530796!3d10.822439834275206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174deb3ef536f31%3A0x8b7bb8b7c956157b!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2hp4buHcCBUUC5IQ00!5e0!3m2!1svi!2s!4v1652072662122!5m2!1svi!2s" width="100%" height="420px" frameborder="0" style="border:0; border-radius: 15px; position: relative; z-index: 2;" allowfullscreen=""></iframe>
          
            <div class="row">
              <div class="col-lg-4 offset-lg-1">
                <div class="contact-info">
                  <div class="icon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <h4>Điện Thoại</h4>
                  <span>(+84)123-789-456</span>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="contact-info">
                  <div class="icon">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <h4>Gmail</h4>
                  <span>reasonbeat@gmail.com</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h4>Liên Hệ Chúng Tôi Để Được Tư Vấn</h4>
                  <h2>Liên Hệ <em>Ngay</em></h2>
                  <p>Liên hệ ngay với chúng tôi để được tư vấn từ các bác sĩ.</p>
                </div>
              </div>
              
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
              <div class="col-lg-12">
                  <fieldset>
                    <input name="ten" type="text" id="txtma" value="<?php if(isset($_POST['lienhe'])){echo $_POST['ten'];} ?>" placeholder="Nhập Tên Của Bạn Tại Đây">
                  </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                   <input name="sdt" type="text"  value="<?php if(isset($_POST['lienhe'])){echo $_POST['sdt'];} ?>" placeholder="Nhập Số Điện Thoại Của Bạn Tại Đây">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input name="email" type="text"  value="<?php if(isset($_POST['lienhe'])){echo $_POST['email'];} ?>" placeholder="Nhập Email Của Bạn Tại Đây"></td>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                <label for="txtcauhoi"></label>
               <textarea name="noidung" id="txtcauhoi" placeholder="Điền câu hỏi của bạn tại đây!!" ><?php if(isset($_POST['lienhe'])){echo $_POST['noidung'];} ?></textarea>
                </fieldset>
              </div>
              <div class="col-lg-12" style="margin-left: -100px;">
                <fieldset>
                 <button type="submit" class="btn btn-success" name="lienhe" id="nut">Gửi Câu Hỏi</button>
                </fieldset>
                </form>
           <div class="main-button-gradient">
            </div>
          </div>
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </section>
  <?php
  //include '../../models/mDanhMucBaiDang.php';
  //$p = new modelBaiDang();
  if(isset($_POST['lienhe']))
  {
    $ten      = $_POST['ten'];
    $sdt      = $_POST['sdt'];
    $email    = $_POST['email'];
    $noidung  = $_POST['noidung'];
    $ngaynhan = date("Y/m/d");
    $trangthai = "Chưa trả lời";
    if(!$ten || !$sdt || !$email || !$noidung){
      echo "<script>alert('Vui lòng nhập đầy đủ thông tin!');</script>";
      echo  '<meta http-equiv="refresh:0" content="0;url=index.php?page=lienhe">';
    }else{
      if(!preg_match("/^[A-ZĐÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĨŨƠỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỬỮỰỲỴÝỶỸ]{1}[a-zàáâãèéêìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,}(\s[A-ZĐÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĨŨƠỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỬỮỰỲỴÝỶỸ]{1}[a-zàáâãèéêìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,}){1,}$/",$ten)){
         echo '<script>alert("Đăng ký thất bại. Họ tên không phù hợp, vui lòng kiểm tra lại!");</script>';
         echo  '<meta http-equiv="refresh:0" content="0;url=index.php?page=lienhe">';
      }
      elseif(!preg_match("/^[0]{1}+[0-9]{9}$/",$sdt)){
         echo '<script>alert("Đăng ký thất bại. Số điện thoại không đúng, vui lòng kiểm tra lại!");</script>';
         echo  '<meta http-equiv="refresh:0" content="0;url=index.php?page=lienhe">';
      }elseif(!preg_match("/^[a-zA-Z0-9]+[@]+[a-z]{5}+[.]+[a-z]{3}$/", $email)){
         echo '<script>alert("Đăng ký thất bại. Email không đúng, vui lòng kiểm tra lại!");</script>';
         echo  '<meta http-equiv="refresh:0" content="0;url=index.php?page=lienhe">';
      }else{
         $ex = $p->SendLH($ten, $sdt, $email, $noidung, $ngaynhan, $trangthai);
         if($ex){
          unset($_POST['lienhe']);
          echo '<script> alert("Phòng khám đã nhận được thông tin. Quý khách vui lòng chờ phản hồi qua email trong vài ngày!"); </script>';
          echo  '<meta http-equiv="refresh" content="0;url=index.php?page=lienhe">';
         }else{
          unset($_POST['lienhe']);
          echo '<script> alert("Dịch vụ đang tạm đóng. Xin quý khách thông cảm!"); </script>';
          echo  '<meta http-equiv="refresh" content="0;url=index.php?page=lienhe">';
         }
      }
    }
  }

  