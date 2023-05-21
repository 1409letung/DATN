<?php
include '../../controllers/cTK.php';
$p = new ControllerNVXN();

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query = $p->get1PXN($id);
    $row = mysqli_fetch_assoc($query);
}else{
    return 0;
}
?>

<form class="form-control" action="" method="POST" style="width: 80%; margin-left: 100px;">
    <h4><i class="bi bi-journal-bookmark-fill"></i> CẬP NHẬT THÔNG TIN PHIẾU XÉT NGHIỆM </h4>

    <div class="form-group">
        <label for="exampleInputEmail1"> <b>Mã Số:</b></label>
        <input type="text" name="id" class="form-control" readonly value="<?php echo $id; ?>">
    </div>
    <div class="form-group">
        <label for="hoten">Họ tên:</label>
        <input type="text" class="form-control" readonly name="hoten" value="<?php echo $row['benhnhan']; ?>"></input>
    </div>
    <div class="form-group ">
        <label for="lxn">Loại xét nghiệm:</label>
        <input type="text" class="form-control" name="lxn" readonly value="<?php echo $row['loaiXN']; ?>">

    </div>
    <div class="form-group ">
        <label for="mxn">Mẫu Xét Nghiệm:</label>
        <input type="text" class="form-control" name="mxn" value="<?php echo $row['mauXN']; ?>"></input>
    </div>
    <div class="form-group">
        <label for="kq">Kết Quả:</label>
        <input type="text" class="form-control" name="kq" value="<?php echo $row['ketqua']; ?>"></input>
    </div>
    <div class="form-group">
        <label for="pwd">Ghi Chú:</label>
        <textarea name="gc" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $row['ghichu']; ?>
        </textarea>
    </div>
    <div class="form-group">
        <label for="kq">Ngày xét nghiệm:</label>
        <input type="text" class="form-control" name="day" readonly value="<?php echo $row['ngaythuchien']; ?>"></input>
    </div>
    <div class="form-group">
        <label for="kq">Người thực hiện:</label>
        <input type="text" class="form-control" name="employee" readonly
            value="<?php echo $row['nguoithuchien']; ?>"></input>
    </div>
    <br>
    <div class="form-group">
        <div class="active" style="margin-left: 300px;">
            <button type="submit" name="update" class="btn btn-success" style="float: left;">
                <i class="bi bi-pencil-fill"> Cập nhật</i>
            </button>
            <a href="NVXetNghiem.php?action=ql&query=pxn" style="text-decoration: none;float: left;">
                <button type="button" class="btn btn-danger">
                    <i class="bi bi-arrow-return-left"> Đóng</i>
                </button>
            </a>
        </div>
    </div>
    </div>
</form>
<?php
   include '../../library/qrcode/phpqrcode/qrlib.php';
   $path = '../image/imgQR/';
   if(!file_exists($path))
      mkdir($path);
   //
   
   if(isset($_POST['update'])){
    //Khung QR
   $s0 = 'KẾT QUẢ XÉT NGHIỆM';
   $s1 = 'Bệnh nhân: ';
   $s2 = 'Loại xét nghiệm: ';
   $s3 = 'Mẫu xét nghiệm: ';
   $s4 = 'Kết quả: ';
   $s5 = 'Ghi chú: ';
   $s6 = 'Ngày thực hiện: ';
   $s7 = 'Người thực hiện: ';
   $s8 = 'Ngày cập nhật: ';

   //form data
   $ht = $_POST['hoten'];
   $lxn = $_POST['lxn'];
   $mxn = $_POST['mxn'];
   $kq = $_POST['kq'];
   $gc = $_POST['gc'];
   $ngaythuchien = $_POST['day'];
   $nguoithuchien = $_POST['employee'];
   $ngaycapnhat = date("d-m-Y");

    //tạo string QR
    $codeString = $s0."\n";
    $codeString .= $s1.$_POST["hoten"]."\n";
    $codeString .= $s2.$_POST["lxn"]."\n";
    $codeString .= $s3.$_POST["mxn"]."\n";
    $codeString .= $s4.$_POST["kq"]."\n";
    $codeString .= $s5.$_POST["gc"]."\n";
    $codeString .= $s6.$ngaythuchien."\n";
    $codeString .= $s7.$nguoithuchien."\n";
    $codeString .= $s8.$ngaycapnhat."\n";
    $QRCode = $path.date('d-m-Y').time().md5($codeString).'.png';
    QRcode::png($codeString, $QRCode);
    if(!$mxn || !$kq || !$gc){
      echo "
        <script>
         alert('Vui lòng nhập đầy đủ thông tin!');
        </script>";
    }else{
      $result = $p->Update($id,$mxn,$kq,$gc,$QRCode);
        unset($_POST['submit']);
       if($result){
       echo "
       <script>
          alert('Cập nhật thành công!!');
          document.location.href = 'NVXetNghiem.php?action=ql&query=pxn';
       </script>";
        
        }else{
          echo "
       <script>
          alert('Lỗi khi cập nhật thông tin!!');
          document.location.href = 'NVXetNghiem.php?action=ql&query=pxn';
       </script>";
       }
    }
   }
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

<style>
/* form{
        width: 50%;
        margin-left: 0px;
    } */
h4 {
    text-align: center;
    color: blue;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

label {
    font-weight: 200px;
    color: blueviolet;
}
</style>