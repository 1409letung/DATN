<?php
include '../../controllers/cTK.php';
$p = new ControllerNVQL();

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query = $p->get1tb($id);
    $row = mysqli_fetch_assoc($query);
}else{
    return 0;
}
?>
<div class="modal" id="myModal3">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: bisque;">
                <h4 class="modal-title" style="text-align:center; color:#0033FF;"> <b>Cập Nhật Thông Tin Thiết Bị</b></h4>
                <button type="button" class="close" data-dismiss="modal"
                    style="border-radius: 5px;border-color: white;">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" class="">
                    <div class="form-group">
                        <label for="">Tên thiết bị:</label>
                        <input type="text" class="form-control" name="tenthietbi" value="<?php echo $row['tenthietbi']; ?>"></input>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Ngày nhập:</label>
                        <input type="date" class="form-control" name="ngaysinh" value="<?php echo $row['ngaynhap']; ?>"></input>
                    </div>
                    <div class="form-group ">
                        <label for="">Số lượng:</label>
                        <input type="number" class="form-control" name="soluong" value="<?php echo $row['soluong']; ?>"></input>
                    </div>
                    <div class="form-group ">
                        <label for="sdt">Tình Trạng:</label>
                        <select name="gioitinh" id="" class="form-control">
                            <option value="Tốt">Tốt</option>
                            <option value="Hư Hỏng Nhẹ">Hư Hỏng Nhẹ</option>
                            <option value="Hư Hỏng Nặng">Hư Hỏng Nặng</option>
                        </select>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary btn-footer"
                            style="text-align: center;">Cập Nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
  $q = new ControllerNVQL();
  if(isset($_POST['submit'])){
    $hoten      = $_POST['tenthietbi'];
    $ngaysinh   = $_POST['ngaysinh'];
    $diachi     = $_POST['soluong'];
    $gioitinh   = $_POST['gioitinh'];
    if(!$hoten || !$ngaysinh || !$gioitinh || !$diachi){
      echo "
        <script>
         alert('Vui lòng nhập đầy đủ thông tin!');
        </script>";
    }else{
      if($diachi <=0)
      {
        echo '<script>alert("Cập nhật thất bại. Số lượng không phù hợp, vui lòng kiểm tra lại!");</script>';
      }
      else{
         $in = $q->updateTB($id,$hoten,$ngaysinh,$diachi,$gioitinh);
            if($in){
                echo '<script> alert("Cập nhật thông tin thiết bị thành công!"); </script>';
                echo '  <meta http-equiv="refresh" content="0">';
            }else{
                echo '<script> alert("Cập nhật thất bại!"); </script>';
            }
      }
    }
  }
?>
<form class="form-control" action="" method="POST" style="width: 80%; margin-left: 100px;">
    <h4><i class="bi bi-journal-bookmark-fill"></i> THÔNG TIN THIẾT BỊ </h4>

    <div class="form-group">
        <label for="exampleInputEmail1"> <b>Mã Thiết Bị:</b></label>
        <input type="text" name="id" class="form-control" value="<?php echo $id; ?>">
    </div>
    <div class="form-group">
        <label for="hoten">Tên Thiết Bị:</label>
        <input type="text" class="form-control" name="hoten" value="<?php echo $row['tenthietbi']; ?>"></input>
    </div>
    <div class="form-group ">
        <label for="lxn">Ngày Nhập:</label>
        <input type="text" class="form-control" value="<?php echo $row['ngaynhap']; ?>">

    </div>
    <div class="form-group">
        <label for="kq">Số Lượng:</label>
        <input type="text" class="form-control" name="mxn" value="<?php echo $row['soluong']; ?>"></input>
    </div>
    <div class="form-group">
        <label for="pwd">Tình Trạng:</label>
        <input type="text" class="form-control" name="mxn" value="<?php echo $row['tinhtrang']; ?>"></input>
    </div>
    <div class="form-group">
        <label></label>
    </div>
    <div class="form-group" style="text-align: center;">
        <a href="?action=ql&query=tb" style="text-decoration: none;">
            <button type="button" class="btn btn-danger">
                <i class="bi bi-arrow-return-left"> Đóng</i>
            </button>
        </a>
        <button type="button" class="btn btn-warning btn-sm" style="text-align:right; width:auto; height:40px;"
    data-toggle="modal" data-target="#myModal3">

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise"
        viewBox="0 0 16 16">
        <path
            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
        <path
            d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z" />
    </svg>
    Cập Nhật Thông Tin Thiết Bị
</button>
    </div>

</form>

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
    color: green;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

label {
    font-weight: 200px;
    color: blueviolet;
}


.QR {
    width: 200px;
    height: 200px;
}
</style>