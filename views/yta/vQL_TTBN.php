<?php
    include '../../controllers/cTK.php';
    $maTK = $_SESSION['MaTK'];
    $p = new controllerTK();
    $infoYta = $p->getInfoYta($maTK);
	$infoTK = $p->getInfoTK($maTK);
	$rowYta = mysqli_fetch_assoc($infoYta);
	$rowTK = mysqli_fetch_assoc($infoTK);
    // $nguoitao = $rowYta['hoten'];
?>

</script>
<!-- Start Đơn đăng ký -->
<button type="button" class="btn btn-primary btn-sm" style="margin-left: 20px; width:200px; height:40px;"
    data-toggle="modal" data-target="#myModal">

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus"
        viewBox="0 0 16 16">
        <path
            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
        <path
            d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z" />
    </svg>
    Thêm bệnh nhân mới
</button>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: bisque;">
                <h4 class="modal-title" style="margin-left: 50px; color:#FF3333;"> <b>Form thêm thông tin bệnh nhân</b>
                </h4>
                <button type="button" class="close" data-dismiss="modal"
                    style="border-radius: 5px;border-color: white;">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" class="">
                    <div class="form-group">
                        <label for="">Họ tên bệnh nhân:</label>
                        <input type="text" class="form-control" name="hoten" placeholder="Vd:Quang Vũ"></input>
                    </div>
                    <div class="form-group ">
                        <label for="sdt">Ngày sinh:</label>
                        <input type="date" class="form-control" name="ngaysinh"></input>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Giới tính:</label>
                        <select name="gioitinh" class="form-control" id="exampleFormControlSelect1">
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="thoigian">Địa chỉ:</label>
                        <input type="text" class="form-control" name="diachi"></input>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Số điện thoại:</label>
                        <input type="text" class="form-control" name="sdt" placeholder="Bắt buộc 10 chữ số"></input>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Vd: vidu@gmail.com"></input>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Nghề nghiệp:</label>
                        <input type="text" class="form-control" name="nghenghiep"></input>
                    </div>
                    <div class="form-group">
                        <label for="pwd">BHYT:</label>
                        <input type="text" class="form-control" name="bhyt"></input>
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
  $q = new controllerTTBN();
  if(isset($_POST['submit'])){
    $hoten    = $_POST['hoten'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = $_POST['gioitinh'];
    $diachi   = $_POST['diachi'];
    $sdt      = $_POST['sdt'];
    $email    = $_POST['email'];
    $nghenghiep = $_POST['nghenghiep'];
    $bhyt = $_POST['bhyt'];
    if(!$hoten || !$ngaysinh || !$gioitinh || !$diachi || !$sdt || !$email || !$nghenghiep){
      echo '<script> alert("Vui lòng điền đẩy đủ thông tin bệnh nhân!"); </script>';
      header("refresh:0;url='./yta.php?action=ql&query=ttbn'");
    }else{
      if(!preg_match("/^[A-ZĐÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĨŨƠỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỬỮỰỲỴÝỶỸ]{1}[a-zàáâãèéêìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,}(\s[A-ZĐÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĨŨƠỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỬỮỰỲỴÝỶỸ]{1}[a-zàáâãèéêìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,}){1,}$/",$hoten)){
         echo '<script>alert("Đăng ký thất bại. Họ tên không phù hợp, vui lòng kiểm tra lại!");</script>';
      }
      elseif(!preg_match("/^[0]{1}+[0-9]{9}$/",$sdt)){
        echo '<script>alert("Đăng ký thất bại. Số điện thoại không đúng, vui lòng kiểm tra lại!");</script>';
      }elseif(!preg_match("/^[a-zA-Z0-9]+[@]+[a-z]{5}+[.]+[a-z]{3}$/", $email)){
        echo '<script>alert("Đăng ký thất bại. Email không đúng, vui lòng kiểm tra lại!");</script>';
      }else{
        $in = $q->insertBN($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$nghenghiep,$bhyt);
        if($in){
            echo '<script> alert("Thêm bệnh nhân mới thành công!"); </script>';
            header("refresh:0;url='./yta.php?action=ql&query=ttbn'");
        }else{
            echo '<script> alert("Thêm bệnh nhân mới thất bại!"); </script>';
            header("refresh:0;url='./yta.php?action=ql&query=ttbn'");
        }
      }
    }
  }
?>

<br>
<br>
<h4 style="text-align: center; color:forestgreen;">Danh sách bệnh nhân</h4>
<table class="table bg-white rounded shadow-sm  table-hover col-4 ">
    <thead>
        <tr style="text-align: center;" class="table-warning">
            <th scope="col">STT</th>
            <th scope="col">Mã BN</th>
            <th scope="col">Họ tên</th>
            <th scope="col">Giới tính</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <?php
  $p = new controllerTTBN();
  $row = $p->loadBN();
  $i =0;
  foreach($row as $rw){
  $i++;
?>
    <tbody>
        <tr style="text-align: center;">
            <th><?php echo $i;?></th>
            <td><?php echo $rw['maBN']; ?></td>
            <td><?php echo $rw['hoten']; ?></td>
            <td><?php echo $rw['gioitinh']; ?></td>
            <td>
                <a href="?bn=xem&id=<?php echo $rw['maBN']; ?>" style="text-decoration: none;">
                    <button type="button" value="submit" class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="xemchitiet">
                        <i class="bi bi-eye-fill"></i>
                    </button>
                </a>
                <a href="?bn=sua&id=<?php echo $rw['maBN']; ?>"  style="text-decoration: none;">
                    <button type="button" value="submit" class="btn btn-primary btn-sm">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                </a>
                <a href="?bn=xoa&id=<?php echo $rw['maBN']; ?>"  style="text-decoration: none;">
                    <button type="button" value="submit" class="btn btn-warning btn-sm">
                        <i class="bi bi-person-x"></i>
                    </button>
                </a>
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