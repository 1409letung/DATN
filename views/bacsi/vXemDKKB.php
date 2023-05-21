<?php
  include '../../controllers/cTK.php'; 
    if(isset($_GET['iddkb'])){
        $id = $_GET['iddkb'];
        //echo $id;
        $p = new controllerDDKKB();
        $row = $p->getOneDDKKB($id);
        $rs = mysqli_fetch_assoc($row);
    }else{
        return false;
    }
?>
<h4 style="text-align: center;color:#0000FF;">Thông tin đơn đăng ký khám bệnh thành viên mã số:<?php echo $id;?></h4>
<form class="form-control">
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Họ và tên</label>
       <span type="text" class="form-control" id="fullName"><?php echo $rs['hoten']; ?></span>
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Số điện thoại</label>
       <span type="text" class="form-control" id="fullName"><?php echo $rs['sdt']; ?></span>
    </div>
    <div class="form-group col-md-5">
      <label for="inputEmail4">Email</label>
       <span type="text" class="form-control" id="fullName"><?php echo $rs['email']; ?></span>
    </div>
    <div class="form-group col-md-5">
      <label for="inputEmail4">Triệu chứng</label>
       <textarea class="form-control" rows="5" readonly style="background-color: white;"><?php echo $rs['trieuchung']; ?></textarea>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Đăng ký bác sĩ</label>
       <span type="text" class="form-control" id="fullName"><?php echo $rs['bacsi']; ?></span>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Ngày hẹn khám</label>
      <span type="text" class="form-control" id="fullName"><?php echo $rs['ngaykham']; ?></span>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Ngày đặt</label>
      <span type="text" class="form-control" id="fullName"><?php echo $rs['ngaydat']; ?></span>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Trạng thái</label>
       <span type="text" class="form-control" id="fullName" style="color:#FF3333;"> <b><?php echo $rs['trangthai']; ?></b> </span>
    </div>
    <br>
  <button type="submit" class="btn btn-primary" style="margin-left: 900px;">Đóng</button>
</form>