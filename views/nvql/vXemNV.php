<?php
    include '../../controllers/cTK.php';
      $maTK = $_SESSION['MaTK'];
      $p = new ControllerNVQL();
	  $info = $p->getInfo($maTK);
	  $row = mysqli_fetch_assoc($info);
    //   echo $row['hoten'];95
      
?>
<!-- Start Đơn đăng ký -->
<!-- End Đơn đăng ký -->
<!-- Start Table đơn đăng ký -->
<br>
<br>
<div class="row">
    <div class="form-group">
    <a href="?action=ql&query=xnv" class="btn btn-primary">Bác Sĩ</a>
    <a href="?action=ql&query=xnv&nv=1" class="btn btn-warning">Y Tá</a>
    <a href="?action=ql&query=xnv&nv=2" class="btn btn-danger">Nhân Viên Tiếp Nhận</a>
    <a href="?action=ql&query=xnv&nv=3" class="btn btn-success">Nhân Viên Xét Nghiệm</a>
    <a href="?action=ql&query=xnv&nv=4" class="btn btn-info">Nhân Viên Quản Lý</a>
    <a href="?action=ql&query=xnv&nv=6" class="btn btn-secondary">Giám Đốc</a>
    <a href="?action=ql&query=xnv&nv=7" class="btn btn-primary">Nhân Viên Quầy Thuốc</a>
    <a href="?action=ql&query=xnv&nv=5" class="btn btn-light">Khách Hàng</a>
    </div>
</div>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: bisque;">
                <h4 class="modal-title" style="text-align:center; color:#0033FF;"> <b>Thông Tin Nhân Viên Mới</b></h4>
                <button type="button" class="close" data-dismiss="modal"
                    style="border-radius: 5px;border-color: white;">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" class="">
                    <div class="form-group">
                        <label for="">Họ tên nhân viên:</label>
                        <input type="text" class="form-control" name="hoten"></input>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Ngày sinh:</label>
                        <input type="date" class="form-control" name="ngaysinh"></input>
                    </div>

                    <div class="form-group ">
                        <label for="sdt">Giới tính:</label>
                        <select name="gioitinh" id="" class="form-control">
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="">Địa chỉ:</label>
                        <input type="text" class="form-control" name="diachi"></input>
                    </div>
                    <div class="form-group ">
                        <label for="">Số Điện Thoại:</label>
                        <input type="text" class="form-control" name="sdt"></input>
                    </div>
                    <div class="form-group ">
                        <label for="">Email:</label>
                        <input type="text" class="form-control" name="mail"></input>
                    </div>
                    <div class="form-group ">
                        <label for="">Vị Trí Công Việc:</label>
                        <input type="text" class="form-control" name="vtcv"></input>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary btn-footer"
                            style="text-align: center;">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
if(isset($_GET['nv']))
{
  $nv = $_GET['nv'];
  if($nv == 1)
  {
    include_once 'vXemDSYTA.php';
  }
  else if($nv == 2)
  {
    include_once 'vXemDSNVTN.php';
  }
  else if($nv == 3)
  {
    include_once 'vXemDSNVXN.php';
  }
  else if($nv == 4)
  {
    include_once 'vXemDSNVQL.php';
  }
  else if($nv == 5)
  {
    include_once 'vXemBN.php';
  }
  else if($nv == 6)
  {
    include_once 'vXemGD.php';
  }
  else if($nv == 7)
  {
    include_once 'vXemDSNVQT.php';
  }
}
else
{
    include_once 'vXemBS.php';

}
?>

<!-- chi tiết -->

<!-- end chi tiết -->

<style>
.button {
    background-color: green;
    /* Green */
    border: none;
    color: white;
    /* padding: 16px 32px; */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    border-color: blue;
}

.button1 {
    background-color: white;
    color: black;
    /* border: 2px solid #4CAF50; */
    border-radius: 10px
}

.button1:hover {
    background-color: blueviolet;
    color: white;
}

.button2 {
    background-color: white;
    color: black;
    /* border: 2px solid #008CBA; */
    border-color: blue;
}

.button2:hover {
    background-color: blueviolet;
    color: blue;
}
</style>
<!-- End Table đơn đăng ký -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<script src="../js/jquery-3.6.1.js" type="text/javascript"></script>