<?php
  include '../../controllers/cTK.php'; 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $p = new controllerTKBS();
        $row = $p->get1PKB($id);
        $rs = mysqli_fetch_assoc($row);
    }else{
        return false;
    }
?>
<div class="container">
    <div class="row">
        <div class="mx-auto col-10 col-md-8 col-lg-8">
            <h4 style="text-align: center;color:#0000FF;">Thông tin PKB mã số:<?php echo $id;?></h4>
            <form method="POST" class="form-control">
                <div class="form-row">
                    <div class="form-group">
                        <label for="inputEmail4">Bác sĩ thực hiện</label>
                        <input type="text" class="form-control" name="bacsi" value="<?php echo $rs['bacsi']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Bệnh nhân</label>
                        <input type="text" class="form-control" name="benhnhan" value="<?php echo $rs['benhnhan']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Phòng</label>
                        <input type="text" class="form-control" name="phong" value="<?php echo $rs['phong']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Chuẩn đoán</label>
                        <textarea name="chuandoan" class="form-control" rows="5"
                            style="background-color: white;"><?php echo $rs['chuandoan']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Kết luận</label>
                        <textarea name="ketluan" class="form-control" rows="5"
                            style="background-color: white;"><?php echo $rs['ketluan']; ?></textarea>
                    </div>
                    <br>
                    <div class="mx-auto" style="text-align: center;">
                        <button type="submit" name="up" class="btn btn-primary">Cập nhật</button>
                        <a href="?c=qlkb&qr=pkb&action" class="btn btn-info">Đóng</a>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- <h4 style="text-align: center;color:#0000FF;">Thông tin PKB mã số:<?php echo $id;?></h4>
<form method="POST">
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Bác sĩ thực hiện</label>
       <input type="text" class="form-control" name="bacsi" value="<?php echo $rs['bacsi']; ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Bệnh nhân</label>
       <input type="text" class="form-control" name="benhnhan" value="<?php echo $rs['benhnhan']; ?>">
    </div>
    <div class="form-group col-md-5">
      <label for="inputEmail4">Phòng</label>
       <input type="text" class="form-control" name="phong" value="<?php echo $rs['phong']; ?>">
    </div>
    <div class="form-group col-md-5">
      <label for="inputEmail4">Chuẩn đoán</label>
       <textarea name="chuandoan" class="form-control" rows="5" style="background-color: white;"><?php echo $rs['chuandoan']; ?></textarea>
    </div>
    <div class="form-group col-md-5">
      <label for="inputEmail4">Kết luận</label>
       <textarea name="ketluan" class="form-control" rows="5"  style="background-color: white;"><?php echo $rs['ketluan']; ?></textarea>
    </div>
    <br>
  <button type="submit" name="up" class="btn btn-primary" style="margin-left: 900px;">Cập nhật</button>
</form> -->

<?php
  if(isset($_POST['up'])){
    $bacsi     = $_POST['bacsi'];
    $benhnhan  = $_POST['benhnhan'];
    $phong     = $_POST['phong'];
    $chuandoan = $_POST['chuandoan'];
    $ketluan   = $_POST['ketluan'];
    if(!$bacsi || !$benhnhan || !$phong || !$chuandoan || !$ketluan){
        echo " <script>
        alert('Không được để trống thông tin!');
      </script>";
    }else{
        $insert = $p->up1PKB($id,$bacsi,$benhnhan,$phong,$chuandoan,$ketluan);
        if($insert){
            echo " <script>
                      alert('Cập nhật thành công!');
                   </script>";
            unset($_POST['up']);
            header("refresh:0;url='bacsi.php?c=qlkb&qr=pkb&action'");
        }else{
            echo " <script>
                      alert('Cập nhật thất bại!');
                   </script>";
            header("refresh:0;url='bacsi.php?c=qlkb&qr=pkb&action'");
        }
    }
  }
?>