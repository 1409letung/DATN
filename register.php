<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="views/css/lienhe.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
	  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Đăng ký tài khoản</title>

</head>
<body>
<section class="contact-us" id="contact-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="views/image/www.phongkhamtungthinh.com.png" width="450px" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="views/image/www.phongkhamtungthinh.com2.png" width="450px" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="views/image/www.phongkhamtungthinh.com1.png" width="450px" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
            <!-- You just need to go to Google Maps for your own map point, and copy the embed code from Share -> Embed a map section -->
            <!-- <div class="row">
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
            </div> -->
        </div>
        <div class="col-lg-5">
          <form id="contact" action="controllers/cRegister.php" method="post">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h4>Đăng ký tài khoản để có thể có thể sử dụng các dịch vụ của chúng tôi!!</h4>
                  <h2>Đăng ký <em>Ngay</em></h2>
                  <p>Bạn đã có tài khoản ? <a href="login.php">Đăng nhập ngay</a></p>

                </div>
              </div>
              
              <div class="col-lg-12">
                  <fieldset>
                  <label for="user"><b>Họ và tên</b></label>
                 <input type="text" placeholder="Nhập họ tên của bạn" name="user"  required>
                  </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                <label for="username"><b>Tài khoản</b></label>
               <input type="text" placeholder="Nhập tên tài khoản" name="username"  required>                
              </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                <label for="password"><b>Mật khẩu</b></label>
              <input type="password" placeholder="Nhập mật khẩu" name="password"  required>
                  </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                <label for="psw-repeat"><b>Nhập lại mật khẩu</b></label>
                <input type="password" placeholder="Nhập lại mật khẩu" name="psw-repeat"  required>
                  </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Nhập Email" name="email"  required>
               <hr>
                </fieldset>
              </div>
              <div class="col-lg-12" style="margin-left: -150px;">
                <fieldset>
                <button type="submit" class="" name="register">Đăng ký</button>
                  </fieldset>
              </div>
                </form>

          </div>
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </section> 
    <!-- <form action="controllers/cRegister.php" method="POST">
  <div class="container">
    <h1 style="text-align: center;">Đăng ký tài khoản</h1>
    <p>Hãy điền thông tin của bạn vào form để chúng tôi tạo tài khoản cho bạn!</p>
    <hr>
    <label for="user"><b>Họ và tên</b></label>
    <input type="text" placeholder="Nhập họ tên của bạn" name="user"  required>

    <label for="username"><b>Tài khoản</b></label>
    <input type="text" placeholder="Nhập tên tài khoản" name="username"  required>
     
    <label for="password"><b>Mật khẩu</b></label>
    <input type="password" placeholder="Nhập mật khẩu" name="password"  required>

    <label for="psw-repeat"><b>Nhập lại mật khẩu</b></label>
    <input type="password" placeholder="Nhập lại mật khẩu" name="psw-repeat"  required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email"  required>
    <hr> -->

    <!-- <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> -->
    <!-- <button type="submit" class="registerbtn" name="register">Đăng ký</button>
  </div>
    </form>
  <div class="container signin">
    <p>Bạn đã có tài khoản ? <a href="login.php">Đăng nhập ngay</a></p>
  </div> -->

</body>
</html>

<?php 
  //  include 'controllers/cRegister.php';
  //  $r = new cRegister();
  //  $user = $_POST['user'];
  //  $username = $_POST['username'];
  //  $password = $_POST['password'];
  //  $repeatPw = $_POST['psw-repeat'];
  //  $email = $_POST['email'];
  //  if(isset($_POST['register'])){
  //     $r->registerAcc($user,$username,$password,$repeatPw,$email);
  //  }else{
  //   return false;
  //  }
?>