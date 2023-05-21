<?php
    include '../../controllers/cTK.php'; 
    if(isset($_GET['idTK'])){
        $MaTK = $_GET['idTK'];
        $p = new controllerTK();
        $tk = $p->getOneTK($MaTK);
        $row = mysqli_fetch_assoc($tk);
    }else{
        return false;
    }
?>
<h4 style="text-align: center;">Thông tin tài khoản mã: <?php echo $MaTK;?></h4>
<form method="POST" class="form-control">
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Tên người dùng:</label>
       <input type="text" class="form-control" value="<?php echo $row['user']; ?>" name="user">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">User name:</label>
       <input type="text" class="form-control" value="<?php echo $row['username']; ?>" name="username">
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4">Pass word:</label>
       <input type="password" class="form-control" value="<?php echo $row['password']; ?>" name="password">
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4">Phân quyền:</label>
       <input type="text" class="form-control" name="role" value="<?php echo $row['role']; ?>">
    </div>
    <br>
  <button type="submit" name="updateTK" class="btn btn-primary" style="margin-left: 900px;">Cập nhật</button>
  <a href="?action=QLTK&query=add">
    <button type="button" class="btn btn-danger" style="margin-left: 900px;">Đóng</button>
  </a>
</form>
<?php
   if(isset($_POST['updateTK'])){
    $user     = $_POST['user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role     = $_POST['role'];
    if(!$user || !$username || !$password || !$role){
        echo '<script> 
        window.location.href="admin.php?tk=sua&idTK='.$MaTK.'";
        alert("Thông tin không được để trống!"); </script>';
    }else{
        $kq = $p->upOneTK($MaTK,$user,$username,$password,$role);
        if($kq){
            echo '<script> 
             window.location.href="admin.php?tk=sua&idTK='.$MaTK.'";
            alert("Cập nhật thông tin tài khoản thành công!"); </script>';
        }else{
            echo '<script> 
             window.location.href="admin.php?tk=sua&idTK='.$MaTK.'";
            alert("Cập nhật thông tin tài khoản thất bại!"); </script>';
        }
    }
   }
?>
