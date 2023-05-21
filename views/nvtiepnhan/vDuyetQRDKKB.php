<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="../js/jquery-3.6.1.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

<?php
// Start duyệt
//   include '../../controllers/cTK.php'; 
//     if(isset($_GET['idQr'])){
//         $idQr = $_GET['idQr'];
//         $p = new controllerDDKKB();
//         $p->duyetOneQRDDKKB($idQr);
//         if($p->duyetOneQRDDKKB($idQr)){
//             echo '<script> alert("Duyệt thành công. Đơn đăng ký đã được chuyển tới bác sĩ!"); </script>';
//             header("refresh:0;url='./yta.php?action=ql&query=dkkb'");
//         }else{
//             echo '<script> alert("Duyệt thất bại!"); </script>';
//             header("refresh:0;url='./yta.php?action=ql&query=dkkb'");
//         }
//     }else{
//         return false;
//     }
//End duyệt
?>
<?php
  include '../../controllers/cTK.php'; 
if(isset($_GET['idQr'])){
        $idQr = $_GET['idQr'];
        $p = new controllerDDKKB();
        $row = $p->getOneQRDDKKB($idQr);
        $rs = mysqli_fetch_assoc($row);
    }else{
        return false;
    }
?>
<h4 style="text-align: center;color:#0000FF;">Duyệt đơn đăng ký khám bệnh khách vãng lai mã số:<?php echo $idQr;?></h4>
<form>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Họ và tên</label>
       <span type="text" class="form-control" id="fullName"><?php echo $rs['hoten']; ?></span>
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Số điện thoại</label>
       <span type="text" class="form-control" id="fullName"><?php echo $rs['sdt']; ?></span>
    </div>
    <div class="form-group col-md-5">
      <label for="inputEmail4">Email</label>
       <span type="text" class="form-control" id="fullName"><?php echo $rs['email']; ?></span>
    </div>
    <div class="form-group col-md-5">
      <label for="inputEmail4">Triệu chứng</label>
       <textarea class="form-control" rows="5" readonly style="background-color: white;"><?php echo $rs['content'];  ?></textarea>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Ngày hẹn khám</label>
      <span type="text" class="form-control" id="fullName"><?php echo $rs['date']; ?></span>
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4">Trạng thái</label>
       <span type="text" class="form-control" id="fullName" style="color:#FF3333;"> <b><?php echo $rs['trangthai']; ?></b> </span>
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4">Chọn bác sĩ</label>
      <select name="" id="" class="form-control">
        <option value=""></option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4">Chọn ca khám</label>
      <select name="" id="" class="form-control">
        <option value=""></option>
      </select>
    </div>
    <br>
  <button type="submit" class="btn btn-success" style="margin-left: 900px;">Duyệt</button>
</form>
<?php

?>
<script>
   
</script>
