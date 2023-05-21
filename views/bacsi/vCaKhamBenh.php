
<?php
    include '../../controllers/cTK.php';
      $maTK = $_SESSION['MaTK'];
      //echo $maTK;
      $p = new controllerTKBS();
	    $infoBS = $p->getInfoBS($maTK);
	    $infoTK = $p->getInfoTK($maTK);
	    $rowBS = mysqli_fetch_assoc($infoBS);
      $idBs = $rowBS['maBS'];
      //echo $idBs;
	    $rowTK = mysqli_fetch_assoc($infoTK);
?>
<!-- Start Đơn đăng ký -->
<button type="button" class="btn btn-warning btn-sm" style="margin-left: 20px;" data-toggle="modal" data-target="#myModal">
    Đăng kí lịch mới
</button>
<div class="modal" id="myModal">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header" style="background-color: bisque;">
                  <h4 class="modal-title" style="margin-left: 80px; color:lime;"> <b>Đăng kí đặt lịch làm việc</b></h4>
                  <button type="button" class="close" data-dismiss="modal" style="border-radius: 5px;border-color: white;">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
                  <form action="" method="POST" class="">
                  <div class="form-group ">
                    <label for="">Họ tên:</label>
                       <input type="text" class="form-control" name="bacsi" value="<?php echo $rowBS['hoten']; ?>">
                  </div>
				  <div class="form-group">
                    <label for="pwd">Đăng ký ca:</label>
                       <input type="text" class="form-control"  name="cakham" placeholder="Ca 1: Sáng từ 7h-9h" >
                  </div>
				  <div class="modal-footer">
					<button type="submit" name="dangky" class="btn btn-primary btn-footer" style="text-align: center;">Đăng ký</button>
                  </div>
                 </form>
               </div>
            </div>
         </div>
      </div>
     
<?php
   if(isset($_POST['dangky'])){
    $bacsi = $_POST['bacsi'];
    $cakham = $_POST['cakham'];
    $stt = 'Làm việc';
    if(!$cakham){
      echo " <script>
        alert('Vui lòng nhập thông tin ca khám bệnh!');
      </script>";
    }else{
      $result = $p->insLLV($idBs,$bacsi,$cakham,$stt);
      if($result){
        echo " <script>
           alert('Đăng ký thành công!');
           </script>";
      }else{
        echo " <script>
           alert('Đăng ký thất bại!');
           </script>";
      }
    }
   }
?>
<!-- End Đơn đăng ký -->
<!-- Start Table đơn đăng ký -->
<br>
<br>
<h4 style="text-align: center; color:forestgreen;">Lịch làm việc</h4>
<table class="table bg-white rounded shadow-sm  table-hover col-4">
    <thead>
        <tr style="text-align: center;">
            <th scope="col" width="100">STT</th>
            <th scope="col">Bác sĩ</th>
            <th scope="col">Giờ làm việc</th>
            <th scope="col">Thao tác</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Quản lý</th>
        </tr>
    </thead>
<?php
   $row = $p->loadLLV($idBs);
   $i = 0;
   foreach($row as $rs){
    $i++;
?>
    <tbody>
        <tr style="text-align: center;">
            <th><?php echo $i; ?> </th>
            <td><?php echo $rs['bacsi'] ?> </td>
            <td><?php echo $rs['cakham'] ?></td>
            <td>
              <a href="?ca=sua&idca=<?php echo $rs['maCa']; ?>">
                  <button type="button" value="submit" class="btn btn-primary btn-sm">
                    <i class="bi bi-pencil-square"> Chỉnh sửa</i>
                  </button>
              </a>
            </td>
             <td><?php echo $rs['trangthai'] ?></td>
            <td>
              <a href="?ca=on&idca=<?php echo $rs['maCa']; ?>">
                  <button type="button" value="submit" class="btn btn-success btn-sm">
                    <i class="bi bi-bell">Bật</i>
                  </button>
              </a>
              <a href="?ca=onoff&idca=<?php echo $rs['maCa']; ?>">
                  <button type="button" value="submit" class="btn btn-danger btn-sm">
                    <i class="bi bi-bell-slash">Tắt</i>
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
  background-color: none; /* Green */
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
