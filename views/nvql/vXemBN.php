
<!-- Start Đơn đăng ký -->
<!-- End Đơn đăng ký -->
<!-- Start Table đơn đăng ký -->
<br>
<br>
<hr>
    <button type="button" class="btn btn-dark btn-sm" style="text-align:right; width:auto; height:40px;"
    data-toggle="modal" data-target="#myModal2">

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus"
        viewBox="0 0 16 16">
        <path
            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
        <path
            d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z" />
    </svg>
    Thêm Mới Thông Tin Bệnh Nhân
</button>
<div class="modal" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: bisque;">
                <h4 class="modal-title" style="text-align:center; color:#0033FF;"> <b>Thông Tin Bệnh Nhân Mới</b></h4>
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
                        <label for="">Nghề Nghiệp:</label>
                        <input type="text" class="form-control" name="vtcv"></input>
                    </div>
                    <div class="form-group ">
                        <label for="">Bảo Hiểm Y Tế:</label>
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
  $q = new ControllerNVQL();
  if(isset($_POST['submit'])){
    $hoten      = $_POST['hoten'];
    $ngaysinh   = $_POST['ngaysinh'];
    $gioitinh   = $_POST['gioitinh'];
    $diachi     = $_POST['diachi'];
    $sdt        = $_POST['sdt'];
    $email      = $_POST['mail'];
    $vtcv       = $_POST['vtcv'];
    $bhyt       = $_POST['bhyt'];
    if(!$hoten || !$ngaysinh || !$gioitinh || !$diachi || !$sdt || !$email || !$vtcv){
      echo "
        <script>
         alert('Vui lòng nhập đầy đủ thông tin!');
        </script>";
    }else{
      if(!preg_match("/^[A-ZĐÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĨŨƠỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỬỮỰỲỴÝỶỸ]{1}[a-zàáâãèéêìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,}(\s[A-ZĐÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĨŨƠỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỬỮỰỲỴÝỶỸ]{1}[a-zàáâãèéêìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,}){1,}$/",$hoten)){
         echo '<script>alert("Đăng ký thất bại. Họ tên bệnh nhân không phù hợp, vui lòng kiểm tra lại!");</script>';
      }else{
         $in = $q->insertBN($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv,$bhyt);
            if($in){
                echo '<script> alert("Thêm thông tin bệnh nhân thành công!"); </script>';
            }else{
                echo '<script> alert("Thêm thất bại!"); </script>';
            }
      }
    }
  }
?>
<h4 style="text-align: center; color:forestgreen;">Danh Sách Bệnh Nhân</h4>
<table class="table bg-white rounded shadow-sm  table-hover col-4">
    <thead>
        <tr style="text-align: center;">
            <th scope="col" width="100">STT</th>
            <th scope="col">Họ Tên</th>
            <th scope="col">Ngày Sinh</th>
            <th scope="col">SĐT</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <?php
  $row =  $p->loadBN();
  $i = 0;
  foreach($row as $row){
   $i++;
  ?>
    <tbody>
        <tr style="text-align: center;">
            <th><?php echo $i ?></th>
            <td><?php echo $row['hoten']; ?></td>
            <td><?php echo $row['ngaysinh']; ?></td>
            <td><?php echo $row['sdt']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
                <a href="?xnv=readbn&id=<?php echo $row['maBN'];?>" style="text-decoration: none;">
                    <button type="button" value="submit" class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="xemchitiet">
                        <i class="bi bi-eye-fill"> Xem</i>
                    </button>
                </a>
            </td>
        </tr>
    </tbody>
    <?php
  }
?>

</table>
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