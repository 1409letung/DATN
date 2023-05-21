<?php
    include '../../controllers/cTK.php';
      $maTK = $_SESSION['MaTK'];
      $p = new ControllerGiamDoc();
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
    <a href="Giamdoc.php?action=ql&query=xnv" class="btn btn-primary">Bác Sĩ</a>
    <a href="Giamdoc.php?action=ql&query=xnv&nv=1" class="btn btn-warning">Y Tá</a>
    <a href="Giamdoc.php?action=ql&query=xnv&nv=2" class="btn btn-danger">Nhân Viên Tiếp Nhận</a>
    <a href="Giamdoc.php?action=ql&query=xnv&nv=3" class="btn btn-success">Nhân Viên Xét Nghiệm</a>
    <a href="Giamdoc.php?action=ql&query=xnv&nv=4" class="btn btn-info">Nhân Viên Quản Lý</a>
    <a href="Giamdoc.php?action=ql&query=xnv&nv=5" class="btn btn-light">Nhân Viên Quầy Thuốc</a>
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
    include_once 'vXemDSNVQT.php';
  }
}
else
{
    echo '
    <h4 style="text-align: center; color:forestgreen;">Danh Sách Bác Sĩ</h4>
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
    </thead>';
  $row =  $p->loadBS();
  $i = 0;
  foreach($row as $row){
   $i++;
    echo '<tbody>
        <tr style="text-align: center;">
            <th>'.$i.'</th>
            <td>'.$row['hoten'].'</td>
            <td>'.$row['ngaysinh'].'</td>
            <td> '.$row['sdt'].'</td>
            <td>'.$row['email'].'</td>
            <td>
                <a href="?xnv=read&id='.$row['maBS'].'" style="text-decoration: none;">
                    <button type="button" value="submit" class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="xemchitiet">
                        <i class="bi bi-eye-fill"> Xem</i>
                    </button>
                </a>
            </td>
        </tr>
    </tbody>';
  }
  echo'
</table>';
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