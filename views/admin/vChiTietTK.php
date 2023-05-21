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
<form class="form-control">
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Tên người dùng:</label>
       <span type="text" class="form-control" id="fullName"><?php echo $row['user']; ?></span>
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">User name:</label>
       <span type="text" class="form-control" id="fullName"><?php echo $row['username']; ?></span>
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4">Pass word:</label>
       <input type="password" class="form-control" value="<?php echo $row['password']; ?>" readonly>
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4">Phân quyền:</label>
       <span type="text" class="form-control" id="fullName"><?php echo $row['role']; ?></span>
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4">Ngày tạo:</label>
       <span type="text" class="form-control" id="fullName"><?php echo $row['ngaytao']; ?></span>
    </div>
    <br>
    <a href="?action=QLTK&query=add">
      <button type="button" name="close" class="btn btn-primary" style="margin-left: 900px;">Đóng</button>
    </a>
  
</form>
