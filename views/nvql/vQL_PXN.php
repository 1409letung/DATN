<?php
    include '../../controllers/cTK.php';
      $maTK = $_SESSION['MaTK'];
      $p = new ControllerNVXN();
	  $info = $p->getInfo($maTK);
	  $row = mysqli_fetch_assoc($info);
      //echo $row['hoten'];
      
?>

<!-- Start Đơn đăng ký -->
<div class="" style="margin-right: 10px;">
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
        <i class="bi bi-file-text-fill"> Thêm Phiếu Xét Nghiệm Mới</i>
    </button>
</div>


<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: cyan;">
                <h4 class="modal-title" style="margin-left: 80px; color:MediumBlue;"> <b>Kết Quả Xét Nghiệm</b>
                </h4>
                <button type="button" class="close" data-dismiss="modal"
                    style="border-radius: 5px;border-color: white;">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" class="">
                    <div class="form-group">
                        <label for="hoten">Họ tên:</label>
                        <input type="text" class="form-control" name="hoten"></input>
                    </div>
                    <div class="form-group ">
                        <label for="lxn">Loại xét nghiệm:</label>
                        <select name="lxn" id="lxn">
                            <option value="Máu">Xét Nghiệm Máu</option>
                            <option value="Nước tiểu">Xét Nghiệm Nước Tiểu</option>
                            <option value="Ung thư gan">Xét Nghiệm Ung Thư Gan</option>
                            <option value="Ung thư buồng trứng">Xét Nghiệm Ung Thư Buồng Trứng</option>
                            <option value="Vi sinh, ký sinh trùng">Xét Nghiệm Vi Sinh</option>
                            <option value="Di truyền">Xét Nghiệm Di Truyền</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="mxn">Mẫu Xét Nghiệm:</label>
                        <input type="text" class="form-control" name="mxn" value=""></input>
                    </div>
                    <div class="form-group">
                        <label for="kq">Kết Quả:</label>
                        <select name="kq" id="kq">
                            <option value="Âm tính">Âm Tính</option>
                            <option value="Dương tính">Dương Tính</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Ghi Chú:</label>
                        <textarea name="gc" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary btn-footer"
                            style="text-align: center;">Xác Nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
   include '../../library/qrcode/phpqrcode/qrlib.php';
   $path = '../image/imgQR/';
   if(!file_exists($path))
      mkdir($path);
   //
   
   if(isset($_POST['submit'])){
    //Khung QR
   $s0 = 'KẾT QUẢ XÉT NGHIỆM';
   $s1 = 'Bệnh nhân: ';
   $s2 = 'Loại xét nghiệm: ';
   $s3 = 'Mẫu xét nghiệm: ';
   $s4 = 'Kết quả: ';
   $s5 = 'Ghi chú: ';
   $s6 = 'Ngày thực hiện: ';
   $s7 = 'Người thực hiện: ';

   //form data
   $ht = $_POST['hoten'];
   $lxn = $_POST['lxn'];
   $mxn = $_POST['mxn'];
   $kq = $_POST['kq'];
   $gc = $_POST['gc'];
   $ngaythuchien = date("Y/m/d");
   $nguoithuchien = $row['hoten'];

    //tạo string QR
    $codeString = $s0."\n";
    $codeString .= $s1.$_POST["hoten"]."\n";
    $codeString .= $s2.$_POST["lxn"]."\n";
    $codeString .= $s3.$_POST["mxn"]."\n";
    $codeString .= $s4.$_POST["kq"]."\n";
    $codeString .= $s5.$_POST["gc"]."\n";
    $codeString .= $s6.$ngaythuchien."\n";
    $codeString .= $s7.$nguoithuchien."\n";
    $QRCode = $path.date('d-m-Y').time().md5($codeString).'.png';
    QRcode::png($codeString, $QRCode);
    if(!$ht || !$kq){
      echo "
        <script>
         alert('Vui lòng nhập đầy đủ thông tin!');
        </script>";
    }else{
      if(!preg_match("/^[A-ZĐÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĨŨƠỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỬỮỰỲỴÝỶỸ]{1}[a-zàáâãèéêìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,}(\s[A-ZĐÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĨŨƠỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỬỮỰỲỴÝỶỸ]{1}[a-zàáâãèéêìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,}){1,}$/",$ht)){
         echo '<script>alert("Họ tên không phù hợp, vui lòng kiểm tra lại!");</script>';
      }
      else{
        $result = $p->AddPXN($ht,$lxn,$mxn,$kq,$gc,$ngaythuchien,$nguoithuchien,$QRCode);
        unset($_POST['submit']);
       if($result){
       echo "
       <script>
          alert('Tạo thành công. Phiếu xét nghiệm đã cập nhật lên hệ thống!!');
          document.location.href = 'NVXetNghiem.php?action=ql&query=pxn';
       </script>";
        
        }else{
          echo "
       <script>
          alert('Lỗi khi tạo phiếu xét nghiệm!!');
          document.location.href = 'NVXetNghiem.php?action=ql&query=pxn';
       </script>";
       }
      }
    }
   }
?>
<!-- End Đơn đăng ký -->
<!-- Start Table đơn đăng ký -->
<br>
<br>
<h4 style="text-align: center; color:forestgreen;">Danh Sách Phiếu Xét Nghiệm</h4>
<table class="table bg-white rounded shadow-sm  table-hover col-4">
    <thead>
        <tr style="text-align: center;">
            <th scope="col" width="100">STT</th>
            <th scope="col">Họ Tên</th>
            <th scope="col">Xét Nghiệm</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <?php
  $row =  $p->getPXN();
  $i = 0;
  foreach($row as $row){
   $i++;
  ?>
    <tbody>
        <tr style="text-align: center;">
            <th><?php echo $i ?></th>
            <th><?php echo $row['benhnhan']; ?></th>
            <td><?php echo $row['loaiXN']; ?></td>
            <td>
                <a href="?pxn=read&id=<?php echo $row['maPXN'];?>" style="text-decoration: none;">
                    <button type="button" value="submit" class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="xemchitiet">
                        <i class="bi bi-eye-fill"> Xem</i>
                    </button>
                </a>

                <a href="?pxn=update&id=<?php echo $row['maPXN'];?>" style="text-decoration: none;">
                    <button type="button" value="submit" class="btn btn-primary btn-sm" data-toggle="modal"
                        data-target="xemchitiet">
                        <i class="bi bi-pencil-square"> Cập nhật</i>
                    </button>
                </a>

                <a href="?pxn=delete&id=<?php echo $row['maPXN'];?>" style="text-decoration: none;">
                    <button type="button" value="submit" class="btn btn-warning btn-sm" data-toggle="modal"
                        data-target="xemchitiet">
                        <i class="bi bi-calendar-x"> Xóa</i>
                    </button>
                </a>

                <a target="_blank" href="PrintPXN.php?id=<?php echo $row['maPXN'];?>" style="text-decoration: none;">
                    <button type="button" value="submit" class="btn btn-danger btn-sm" data-toggle="modal"
                        data-target="xemchitiet">
                        <i class="bi bi-file-earmark-pdf-fill"> in</i>
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