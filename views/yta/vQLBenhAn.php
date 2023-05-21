<?php
    include '../../controllers/cTK.php';
    $maTK = $_SESSION['MaTK'];
    $p = new controllerTK();
    $infoYta = $p->getInfoYta($maTK);
	  $infoTK = $p->getInfoTK($maTK);
	  $rowYta = mysqli_fetch_assoc($infoYta);
	  $rowTK = mysqli_fetch_assoc($infoTK);
?>

</script>
<!-- Start Đơn đăng ký -->
<button type="button" class="btn btn-primary btn-sm" style="margin-left: 20px; width:120px; height:40px;"
    data-toggle="modal" data-target="#myModal">

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus"
        viewBox="0 0 16 16">
        <path
            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
        <path
            d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z" />
    </svg>
    Bệnh án mới
</button>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: bisque;">
                <h4 class="modal-title" style="margin-left: 150px; color:#0033FF;"> <b>Bệnh án mới</b></h4>
                <button type="button" class="close" data-dismiss="modal"
                    style="border-radius: 5px;border-color: white;">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" class="">
                    <div class="form-group">
                        <label for="">Họ tên bệnh nhân:</label>
                        <input type="text" class="form-control" name="hoten"></input>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Ngày sinh:</label>
                        <input type="date" class="form-control" name="ngaysinh"></input>
                    </div>

                    <div class="form-group ">
                        <label for="sdt">Giới tính:</label>
                        <select name="gioitinh" id="" class="form-control">
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="">Dân tộc:</label>
                        <input type="text" class="form-control" name="dantoc"></input>
                    </div>
                    <div class="form-group ">
                        <label for="">Số BHYT:</label>
                        <input type="text" class="form-control" name="bhyt"></input>
                    </div>
                    <div class="form-group ">
                        <label for="">Nghề nghiệp:</label>
                        <input type="text" class="form-control" name="nn"></input>
                    </div>
                    <div class="form-group ">
                        <label for="">Đơn vị công tác:</label>
                        <input type="text" class="form-control" name="dvct"></input>
                    </div>
                    <div class="form-group ">
                        <label for="">Địa chỉ:</label>
                        <input type="text" class="form-control" name="diachi"></input>
                    </div>
                    <div class="form-group ">
                        <label for="">Thời gian khám:</label>
                        <input type="date" class="form-control" name="thoigiankham"></input>
                    </div>
                    <div class="form-group ">
                        <label for="">Bác sĩ:</label>
                        <input type="text" class="form-control" name="bacsi"></input>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Chuẩn đoán:</label>
                        <textarea name="chuandoan" class="form-control" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Phương pháp điều trị:</label>
                        <textarea name="ppdt" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Kết luận:</label>
                        <textarea name="kl" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Ghi chú:</label>
                        <textarea name="ghichu" class="form-control" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="">Loại khách hàng:</label>
                        <select name="lkh" id="" class="form-control">
                            <option value="1">Thành viên</option>
                            <option value="0">Vãng lai</option>
                        </select>
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
  $q = new controllerBenhAn();
  if(isset($_POST['submit'])){
    $hoten      = $_POST['hoten'];
    $ngaysinh   = $_POST['ngaysinh'];
    $gioitinh   = $_POST['gioitinh'];
    $dantoc     = $_POST['dantoc'];
    $bhyt       = $_POST['bhyt'];
    $nn         = $_POST['nn'];
    $dvct       = $_POST['dvct'];
    $diachi     = $_POST['diachi'];
    $thoigiankham = $_POST['thoigiankham'];
    $bacsi   = $_POST['bacsi'];
    $chuandoan   = $_POST['chuandoan'];
    $ppdt       = $_POST['ppdt'];
    $kl         = $_POST['kl'];
    $nguoitao   = $rowYta['hoten'];
    $ghichu     = $_POST['ghichu'];
    $loaikhachhang = $_POST['lkh'];
    $ngaytao = date('Y/m/d');
    
    if(!$hoten || !$ngaysinh || !$gioitinh || !$dantoc || !$bhyt || !$nn || !$dvct || !$diachi || !$thoigiankham || !$bacsi || !$chuandoan || !$ppdt || !$kl || !$nguoitao || !$loaikhachhang){
      echo "
        <script>
         alert('Vui lòng nhập đầy đủ thông tin!');
        </script>";
    }else{
      if(!preg_match("/^[A-ZĐÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĨŨƠỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỬỮỰỲỴÝỶỸ]{1}[a-zàáâãèéêìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,}(\s[A-ZĐÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĨŨƠỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỬỮỰỲỴÝỶỸ]{1}[a-zàáâãèéêìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,}){1,}$/",$hoten)){
         echo '<script>alert("Đăng ký thất bại. Họ tên bệnh nhân không phù hợp, vui lòng kiểm tra lại!");</script>';
      }else{
         $in = $q->insertBA($hoten,$ngaysinh,$gioitinh,$dantoc,$bhyt,$nn,$dvct,$diachi,$thoigiankham,$bacsi,$chuandoan,$ppdt,$kl,$nguoitao,$ghichu,$loaikhachhang,$ngaytao);
            if($in){
                echo '<script> alert("Thêm bệnh án mới thành công!"); </script>';
            }else{
                echo '<script> alert("Thêm bệnh án mới thất bại!"); </script>';
            }
      }
    }
  }
?>

<br>
<br>
<h4 style="text-align: center; color:forestgreen;">Danh sách bệnh án</h4>
<table class="table bg-white rounded shadow-sm  table-hover col-4">
    <thead>
        <tr style="text-align: center;">
            <th scope="col">Mã BA</th>
            <th scope="col">Bệnh nhân</th>
            <th scope="col">Người tạo</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <?php
  $p = new controllerBenhAn();
  $row = $p->loaddsBA();
  foreach($row as $rw){
?>
    <tbody>
        <tr style="text-align: center;">
            <th><?php echo $rw['maBA'];?></th>
            <td><?php echo $rw['hoten'];?></td>
            <td><?php echo $rw['nguoitao'];?></td>
            <td>
                <button type="button" value="submit" class="btn btn-light btn-sm" data-toggle="modal"
                    data-target="xemchitiet">
                    <a href="?page=chitiet&idbenhan=<?php echo $rw['maBA'] ?>"><i class="bi bi-eye-fill"></i></a>
                </button>
                <button type="button" value="submit" class="btn btn-light btn-sm">
                    <a href="?page=sua&idbenhan=<?php echo $rw['maBA'] ?>"><i class="bi bi-pencil-square"></i></a>
                </button>
                <button type="button" value="submit" class="btn btn-light btn-sm">
                    <a href="?page=delete&idbenhan=<?php echo $rw['maBA'] ?>"><i
                            class="bi bi-backspace-reverse-fill"></i></a>
                </button>
            </td>
        </tr>
    </tbody>
    <?php
  }
?>
</table>

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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">