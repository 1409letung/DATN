<?php
    include '../../controllers/cTK.php';
      $maTK = $_SESSION['MaTK'];
      $p = new controllerNVQT();
	  $info = $p->getInfo($maTK);
	  $row = mysqli_fetch_assoc($info);
      //$nth = $row['hoten'];
      
?>

<!-- Start Đơn đăng ký -->
<div class="" style="margin-right: 10px;">
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
        <i class="bi bi-file-text-fill"> Thêm Thuốc Mới</i>
    </button>
</div>

<div class="input-group mb-3" style="padding-top: 10px;">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Tìm Kiếm</span>
  </div>
  <input type="text" class="form-control" placeholder="Nhập tên thuốc để tìm kiếm..." name="search_text" id="search_text">
</div>
   <br />
   <div id="result"></div> 
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: cyan;">
                <h4 class="modal-title" style="margin-left: 80px; color:MediumBlue;"> <b>Thông Tin Thuốc Mới</b>
                </h4>
                <button type="button" class="close" data-dismiss="modal"
                    style="border-radius: 5px;border-color: white;">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" class="">
                    <div class="form-group">
                        <label for="hoten">Tên Thuốc:</label>
                        <input type="text" class="form-control" name="tenthuoc"></input>
                    </div>
                    <div class="form-group ">
                        <label for="lxn">Loại Thuốc:</label>
                        <select class="form-control" name="loaithuoc" id="lxn">
                            <?php
                            $lt = $p->loadLoaiThuoc();
                            foreach($lt as $row)
                            {
                                echo '<option value="'.$row['maLoaiThuoc'].'">'.$row['tenloaithuoc'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="mxn">Tồn kho:</label>
                        <input type="number" class="form-control" name="soluong" value=""></input>
                    </div>
                    <div class="form-group">
                        <label for="kq">Giá(VNĐ):</label>
                        <input type="number" class="form-control" name="gia" value=""></input>
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
         echo '<script>alert("Thêm Thất Bại. Số lượng không được dưới 0, vui lòng kiểm tra lại!");</script>';
      }
      elseif($gia < 500){
        echo '<script>alert("Thêm Thất Bại. Giá Tiền ít nhất phải trên 500 VNĐ, vui lòng kiểm tra lại!");</script>';
      }
      else{
         $in = $q->insertThuoc($loaithuoc,$tenthuoc,$soluong,$gia);
            if($in){
                echo '<script> alert("Thêm thuốc mới thành công!"); </script>';
            }else{
                echo '<script> alert("Thêm thất bại!"); </script>';
            }
      }
    }
  }
?>
<!-- End Đơn đăng ký -->
<!-- Start Table đơn đăng ký -->
<br>
<br>
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
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"search.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<script src="../js/jquery-3.6.1.js" type="text/javascript"></script>