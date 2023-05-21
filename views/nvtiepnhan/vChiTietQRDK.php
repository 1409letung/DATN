<?php
  include '../../controllers/cTK.php'; 
if(isset($_GET['idQr'])){
        $idQr = $_GET['idQr'];
        $p = new controllerDDKKB();
        $row = $p->getOneQRDDKKB($idQr);
        $rs = mysqli_fetch_assoc($row);
    }else{
        return false;
    }
?>
<div class="container">
<div class="row">
<div class="mx-auto col-10 col-md-8 col-lg-8">
<h4 style="text-align: center;color:#0000FF;">Thông tin đơn đăng ký khám bệnh thành viên mã số:<?php echo $idQr;?></h4>
<form class="form-control">
  <div class="form-row">
  <div class="form-group">
      <label for="inputEmail4">Họ và tên</label>
       <span type="text" class="form-control" id="fullName"><?php echo $rs['hoten']; ?></span>
    </div>
    <div class="form-group">
      <label for="inputEmail4">Số điện thoại</label>
       <span type="text" class="form-control" id="fullName"><?php echo $rs['sdt']; ?></span>
    </div>
    <div class="form-group">
      <label for="inputEmail4">Email</label>
       <span type="text" class="form-control" id="fullName"><?php echo $rs['email']; ?></span>
    </div>
    <div class="form-group">
      <label for="inputEmail4">Triệu chứng</label>
       <textarea class="form-control" rows="5" readonly style="background-color: white;"><?php echo $rs['content'];  ?></textarea>
    </div>
    <div class="form-group">
      <label for="inputEmail4">Ngày hẹn khám</label>
      <span type="text" class="form-control" id="fullName"><?php echo $rs['date']; ?></span>
    </div>
    <div class="form-group">
      <label for="inputEmail4">Trạng thái</label>
       <span type="text" class="form-control" id="fullName" style="color:#FF3333;"> <b><?php echo $rs['trangthai']; ?></b> </span>
    </div>
    <br>
    <div class="mx-auto" style="text-align: center;">
    <a href="?action=ql&query=dkkb">
       <button type="button" class="btn btn-primary">Đóng</button>
    </a>
    </div>
    
  
</form>
  </div>
  </div>
  </div>
