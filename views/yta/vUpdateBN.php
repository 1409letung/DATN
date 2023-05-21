<?php
  include '../../controllers/cTK.php'; 
  if(isset($_GET['id'])){
        $id = $_GET['id'];
        $p = new controllerTTBN();
        $row = $p->getBN($id);
        $rs = mysqli_fetch_assoc($row);
    }else{
        return false;
    }
?>
<div class="container">
<h4 style="text-align: center;color:#0000FF;">Cập nhật thông tin bệnh nhân mã số:<?php echo $id;?></h4>
<form method="POST" class="form-control">
                <!-- <div class="form-group">
                    <label for="inputEmail4">Mã TK</label>
                    <span type="text" class="form-control" id="fullName"><?php //echo $rs['MaTK']; ?></span>
                </div> -->
                <div class="form-group">
                    <label for="inputEmail4">Họ và tên</label>

                    <input type="text" class="form-control" name="hoten" value="<?php echo $rs['hoten']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Ngày sinh</label>
                    <input type="date" class="form-control" name="ngaysinh" value="<?php echo $rs['ngaysinh']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Giới tính</label>

                    <input type="text" class="form-control" name="gioitinh" value="<?php echo $rs['gioitinh']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Địa chỉ</label>

                    <input type="text" class="form-control" name="diachi" value="<?php echo $rs['diachi']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Số điện thoại</label>
                    <input type="text" class="form-control" name="sdt" value="<?php echo $rs['sdt']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Email</label>

                    <input type="email" class="form-control" name="email" value="<?php echo $rs['email']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Nghề nghiệp</label>
                    <input type="text" class="form-control" name="nghenghiep" value="<?php echo $rs['nghenghiep']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">BHYT</label>
                    <input type="text" class="form-control" name="bhyt" value="<?php echo $rs['BHYT']; ?>">
                </div>
                <br>
                <div class="mx-auto" style="text-align: center;">
                <button type="submit" name="update" class="btn btn-warning" style="text-align:center;">Cập nhật</button>

                    <a href="?action=ql&query=ttbn">
                        <button type="button" class="btn btn-primary">Đóng</button>
                    </a>
                </div>
            </form>
            </div>

<?php
  if(isset($_POST['update'])){
    $hoten      = $_POST['hoten'];
    $ngaysinh   = $_POST['ngaysinh'];
    $gioitinh   = $_POST['gioitinh'];
    $diachi     = $_POST['diachi'];
    $sdt        = $_POST['sdt'];
    $email      = $_POST['email'];
    $nghenghiep = $_POST['nghenghiep'];
    $bhyt = $_POST['bhyt'];
    $kq = $p->updateBN($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$nghenghiep,$bhyt);
    if($kq){
            echo '<script> alert("Cập nhật thông tin bệnh nhân thành công!"); </script>';
            header("refresh:0;url='./yta.php?action=ql&query=ttbn'");
    }else{
            echo '<script> alert("Cập nhật thông tin bệnh nhân không thành công!"); </script>';
            header("refresh:0;url='./yta.php?action=ql&query=ttbn'");
     }
}
?>