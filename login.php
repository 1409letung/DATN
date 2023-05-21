<?php
      session_start();
      $_SESSION['role']=0;
      include 'controllers/cInfo.php';
      $p = new controllerInfoTK();
      if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password  = md5($_POST['password']);
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $row = $p->showTaiKhoan($username, $password);
        $tb_taikhoan = $p->getMaTK($username);
        $colMaTK = mysqli_fetch_assoc($tb_taikhoan);
        $_SESSION['MaTK'] = $colMaTK['MaTK'];
        if(!$username || !$password){
          echo '<script> alert("Hãy nhập thông tin tài khoản!") </script>';
          echo header("refresh:0;url='login.php'");
        }elseif($username != $row['username'] ||  $password != $row['password']){
          echo '<script> alert("Sai thông tin tài khoản hoặc mật khẩu!") </script>';
          echo header("refresh:0;url='login.php'");
        }else{
          if($row>0){
          $_SESSION['login'] = $row['user'];
          
          if($row['role'] == 'Admin')
          {
            $_SESSION['admin'] = $row['role'];
            $_SESSION['role'] = 1;
            header('Location:views/admin/admin.php');
          }
          elseif($row['role'] == 'Bác sĩ')
          {
            $_SESSION['role'] = 2;
            $_SESSION['bacsi'] = $row['role'];
            
            header('Location:views/bacsi/bacsi.php');
          }
          elseif($row['role'] == 'Nhân viên y tá')
          {
            $_SESSION['role'] = 3;
            $_SESSION['yta'] = $row['role'];
            
            header('Location:views/yta/yta.php');
          }
          elseif($row['role'] == 'Bệnh nhân')
          {
            $_SESSION['benhnhan'] = $row['role'];
            $_SESSION['role'] = 4;
            header('Location:views/benhnhan/benhnhan.php');
          }
          elseif($row['role'] == 'Tiếp nhận')
          {
            $_SESSION['nvtiepnhan'] = $row['role'];
            $_SESSION['role'] = 5;
            header('Location:views/nvtiepnhan/NVTiepNhan.php');
          }
          elseif($row['role'] == 'Nhân viên xét nghiệm')
          {
            $_SESSION['nvxetnghiem'] = $row['role'];
            $_SESSION['role'] = 6;
            header('Location:views/nvxetnghiem/NVXetNghiem.php');
          }
          elseif($row['role'] == 'Nhân viên quản lý')
          {
            $_SESSION['nvql'] = $row['role'];
            $_SESSION['role'] = 8;
            header('Location:views/nvql/NVQuanLy.php');
          }
          elseif($row['role'] == 'Giám Đốc')
          {
            $_SESSION['giamdoc'] = $row['role'];
            $_SESSION['role'] = 7;
            header('Location:views/giamdoc/Giamdoc.php');
          }
          elseif($row['role'] == 'Nhân viên quầy thuốc')
          {
            $_SESSION['nvqt'] = $row['role'];
            $_SESSION['role'] = 9;
            header('Location:views/nvquaythuoc/NVQT.php');
          }
          else{
            echo '<script>alert("Sai thông tin đăng nhập")</script>';
          }
        }
        }
      }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Đăng nhập</title>
</head>

<body>
    <div class="login">
        <div class="form">
            <h2>Welcome!</h2>
            <form action="" autocomplete="off" method="POST">
                <input type="text" placeholder="Tài khoản" name="username">
                <input type="password" placeholder="Mật khẩu" name="password">
                <input type="submit" value="Đăng nhập" class="submit" name="login">
            </form>
            <br>
            <div class="" style="text-align: center; color: aliceblue;">
                <a href="index.php" style="color: white;">Quay lại trang chủ</a>
            </div>

        </div>
    </div>
</body>

</html>