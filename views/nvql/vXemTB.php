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
    <button type="button" class="btn btn-primary btn-sm" style="text-align:right; width:auto; height:40px;"
    data-toggle="modal" data-target="#myModal">

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus"
        viewBox="0 0 16 16">
        <path
            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
        <path
            d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z" />
    </svg>
    Thêm Mới Thiết Bị
</button>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: bisque;">
                <h4 class="modal-title" style="text-align:center; color:#0033FF;"> <b>Thông Tin Thiết Bị Mới</b></h4>
                <button type="button" class="close" data-dismiss="modal"
                    style="border-radius: 5px;border-color: white;">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" class="">
                    <div class="form-group">
                        <label for="">Tên thiết bị:</label>
                        <input type="text" class="form-control" name="tenthietbi"></input>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Ngày nhập:</label>
                        <input type="date" class="form-control" name="ngaysinh"></input>
                    </div>
                    <div class="form-group ">
                        <label for="">Số lượng:</label>
                        <input type="number" class="form-control" name="soluong"></input>
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
    $hoten      = $_POST['tenthietbi'];
    $ngaysinh   = $_POST['ngaysinh'];
    $gioitinh   = $_POST['gioitinh'];
    $diachi     = $_POST['soluong'];
    if(!$hoten || !$ngaysinh || !$gioitinh || !$diachi){
      echo "
        <script>
         alert('Vui lòng nhập đầy đủ thông tin!');
        </script>";
    }else{
      if($diachi <=0)
      {
        echo '<script>alert("Đăng ký thất bại. Số lượng không phù hợp, vui lòng kiểm tra lại!");</script>';
      }
      else{
         $in = $q->insertTB($hoten,$ngaysinh,$diachi,$gioitinh);
            if($in){
                echo '<script> alert("Thêm thông tin thiết bị thành công!"); </script>';
            }else{
                echo '<script> alert("Thêm thất bại!"); </script>';
            }
      }
    }
  }
?>
<h4 style="text-align: center; color:forestgreen;">Danh Sách Thiết Bị</h4>
<table class="table bg-white rounded shadow-sm  table-hover col-4">
    <thead>
        <tr style="text-align: center;">
            <th scope="col" width="100">STT</th>
            <th scope="col">Tên Thiết Bị</th>
            <th scope="col">Ngày Nhập</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Tình Trạng</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <?php
  $row =  $p->loadTB();
  $i = 0;
  foreach($row as $row){
   $i++;
  ?>
    <tbody>
        <tr style="text-align: center;">
            <th><?php echo $i ?></th>
            <td><?php echo $row['tenthietbi']; ?></td>
            <td><?php echo $row['ngaynhap']; ?></td>
            <td><?php echo $row['soluong']; ?></td>
            <td><?php echo $row['tinhtrang']; ?></td>
            <td>
                <a href="?tb=read&id=<?php echo $row['maTB'];?>" style="text-decoration: none;">
                    <button type="button" value="submit" class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="xemchitiet">
                        <i class="bi bi-eye-fill"> Xem</i>
                    </button>
                </a>
                <a href="?tb=delete&id=<?php echo $row['maTB'];?>" style="text-decoration: none;">
                    <button type="button" value="submit" class="btn btn-warning btn-sm" data-toggle="modal"
                        data-target="xemchitiet">
                        <i class="bi bi-trash"> Xóa</i>
                    </button>
                </a>
            </td>
        </tr>
    </tbody>
    <?php
  }
?>
</table>