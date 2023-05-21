
<?php
    include '../../controllers/cTK.php'; 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        //echo $id;
        $p = new controlerDangKy();
        $row = $p->getDDKKB($id);
        $rs = mysqli_fetch_assoc($row); 
    }
?>
<div class="container">
<div class="row">
  <div class="mx-auto col-10 col-md-8 col-lg-8">
     <form class="form-control" method="post">
      <!-- <div class="row">
        <div class="col-lg-4">
        <img src="../../views/admin/uploads/Screenshot 2023-03-05 114106.png" alt="Error_img!!">
        </div>
        <div class="col-lg-8">
          <p>Phòng Khám Đa Khoa Tùng Thịnh</p>
        </div>
      </div> -->
     <h4 style="text-align: center;">Thông tin đơn đăng ký khám bệnh số:<?php echo $id;?></h4>
    <div class="form-group">
      <div class="row">
      <div class="col-lg-2">
      <h6>Khách Hàng: </h6>
      </div>
      <div class="col-lg-10">
      <p><?php echo $rs['hoten']; ?></p>
      </div>
      </div>
    </div>
     <div class="form-group">
      <div class="row">
        <div class="col-lg-2">
        <h6>Số Điện Thoại: </h6>
        </div>
        <div class="col-lg-2">
          <p><?php echo $rs['sdt']; ?></p>
        </div>
        <div class="col-lg-1">
        <h6>Email: </h6>
        </div>
        <div class="col-lg-2">
          <p><?php echo $rs['email']; ?></p>
        </div>
      </div>
     </div>
     <div class="form-group">
      <div class="row">
        <div class="col-lg-2">
        <h6>Triệu Chứng: </h6>
        </div>
        <div class="col-lg-10">
          <textarea class="form-control" rows="5"><?php echo $rs['trieuchung']; ?></textarea>
          <p></p>
        </div>
      </div>

     </div>
     <div class="form-group">
     <div class="row">
        <div class="col-lg-2">
        <h6>Bác Sĩ Phụ Trách: </h6>
        </div>
        <div class="col-lg-2">
          <p><?php echo $rs['bacsi']; ?></p>
        </div>
        <div class="col-lg-2">
        <h6>Chuyên Khoa: </h6>
        </div>
        <div class="col-lg-2">
          <p><?php echo $rs['chuyenkhoa']; ?></p>
        </div>
      </div>
     </div>
     <div class="form-group">
      <div class="row">
        <div class="col-lg-2">
        <h6>Ngày Khám: </h6>
        </div>
        <div class="col-lg-10">
           <p> <?php echo $rs['ngaykham']; ?></p>
        </div>
      </div>
     </div>
     <div class="form-group">
     <div class="row">
        <div class="col-lg-2">
        <h6>Phí Dịch Vụ: </h6>
        </div>
        <div class="col-lg-2">
        <p><?php echo $rs['phidichvu']; ?> VNĐ </p>
        </div>
        <div class="col-lg-4">
        <h6 style="color:red"><?php echo $rs['trangthaithanhtoan']; ?></h6>
        </div>
      </div>
     </div>
     <div class="fom-group">
      <div class="row">
        <div class="mx-auto" style="text-align: center;color:#0000FF;">
        <?php
      if($rs['trangthaithanhtoan'] == 'Chưa Thanh Toán')
      {
        echo '<input type="submit" name="nut1" value="Thanh Toán" class="btn btn-success">';
      }
      else
      {
      //   echo '<div class="form-group col-md-2">
      //    <p>Đơn hàng đã được thanh toán</p>
      // </div>';
      }
      ?>
    <a href="?action=show&query=dkkb" class="btn btn-primary">Đóng</a>
        </div>
      </div>
      
     </div>
     </form>
  </div>
</div>
</div>



    <?php
    
    if(isset($_POST['nut1']))
    {
        switch($_POST['nut1'])
               {
                     case 'Thanh Toán':
                       {
                           $_SESSION['kttt'] = 0;
                           $_SESSION['order_id'] = $id;
                           $_SESSION['tongtien'] = $rs['phidichvu'];
                           $_SESSION['ten'] = $rs['hoten'];
                           $_SESSION['dt'] = $rs['sdt'];
                           $_SESSION['email'] =$rs['email'];
                           echo '<meta http-equiv="refresh" content="0;url=../../vendor/API/vnpay_php/thanhtoan.php">';
                       }
               }
    }
    ?>
  
  
<!-- </form> -->


