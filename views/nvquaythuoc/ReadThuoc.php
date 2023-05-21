<?php
include '../../controllers/cTK.php';
$p = new controllerNVQT();

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query = $p->get1thuoc($id);
    $row = mysqli_fetch_assoc($query);
}else{
    return 0;
}
?>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: cyan;">
                <h4 class="modal-title" style="margin-left: 80px; color:MediumBlue;"> <b>Cập Nhật Thông Tin Thuốc</b>
                </h4>
                <button type="button" class="close" data-dismiss="modal"
                    style="border-radius: 5px;border-color: white;">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" class="">
                    <div class="form-group">
                        <label for="hoten">Tên Thuốc:</label>
                        <input type="text" class="form-control" name="tenthuoc" value="<?php echo $row['tenthuoc']; ?>"></input>
                    </div>
                    <div class="form-group ">
                        <label for="lxn">Loại Thuốc:</label>
                        <select class="form-control" name="loaithuoc" id="lxn">
                            <?php
                            $lt = $p->loadLoaiThuoc();
                            foreach($lt as $row1)
                            {
                                echo '<option value="'.$row1['maLoaiThuoc'].'">'.$row1['tenloaithuoc'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="mxn">Số Lượng:</label>
                        <input type="number" class="form-control" name="soluong" value="<?php echo $row['soluong']; ?>"></input>
                    </div>
                    <div class="form-group">
                        <label for="kq">Giá:</label>
                        <input type="number" class="form-control" name="gia" value="<?php echo $row['gia']; ?>"></input>
                    </div>
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
  $q = new controllerNVQT();
  if(isset($_POST['submit'])){
    $tenthuoc      = $_POST['tenthuoc'];
    $loaithuoc   = $_POST['loaithuoc'];
    $soluong   = $_POST['soluong'];
    $gia     = $_POST['gia'];
    if(!$tenthuoc || !$loaithuoc || !$soluong || !$gia){
      echo "
        <script>
         alert('Vui lòng nhập đầy đủ thông tin!');
        </script>";
    }else{
      if($soluong < 0){
         echo '<script>alert("Cập Nhật Thất Bại. Số lượng không được dưới 0, vui lòng kiểm tra lại!");</script>';
      }
      elseif($gia < 500){
        echo '<script>alert("Cập Nhật Thất Bại. Giá Tiền ít nhất phải trên 500 VNĐ, vui lòng kiểm tra lại!");</script>';
      }
      else{
         $in = $q->updateThuoc($id,$loaithuoc,$tenthuoc,$soluong,$gia);
            if($in){
                echo '<script> alert("Cập Nhật thành công!"); </script>';
                echo '  <meta http-equiv="refresh" content="0">';
            }else{
                echo '<script> alert("Cập Nhật thất bại!"); </script>';
            }
      }
    }
  }
?>
<form class="form-control" action="" method="POST" style="width: 80%; margin-left: 100px;">
    <h4><i class="bi bi-journal-bookmark-fill"></i> THÔNG TIN THUỐC </h4>

    <div class="form-group">
        <label for="exampleInputEmail1"> <b>Mã Thuốc:</b></label>
        <input type="text" name="id" class="form-control" value="<?php echo $id; ?>">
    </div>
    <div class="form-group">
        <label for="hoten">Tên Thuốc:</label>
        <input type="text" class="form-control" name="hoten" value="<?php echo $row['tenthuoc']; ?>"></input>
    </div>
    <div class="form-group ">
        <label for="lxn">Loại Thuốc:</label>
        <input type="text" class="form-control" value="<?php echo $row['tenloaithuoc']; ?>">

    </div>
    <div class="form-group ">
        <label for="mxn">Số Lượng:</label>
        <input type="text" class="form-control" name="mxn" value="<?php echo $row['soluong']; ?>"></input>
    </div>
    <div class="form-group">
        <label for="kq">Giá(VNĐ):</label>
        <input type="text" class="form-control" name="mxn" value="<?php echo $row['gia']; ?>"></input>
    </div>
    </div>
    <div class="form-group" style="text-align: center;">
        <a href="NVQT.php?action=ql&query=qlt" style="text-decoration: none;">
            <button type="button" class="btn btn-danger">
                <i class="bi bi-arrow-return-left"> Đóng</i>
            </button>
        </a>
        <a href="#" style="text-decoration: none;">
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
        <i class="bi bi-file-text-fill"> Cập Nhật Thông Tin Thuốc</i>
    </button>
        </a>
        
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