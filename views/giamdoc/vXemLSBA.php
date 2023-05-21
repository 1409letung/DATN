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
<?php $tenbn = $_GET['tenbn'];
?>
<h4 style="text-align: center; color:forestgreen;">Lịch Sử Khám Bệnh Của Bệnh Nhân <p><?php echo $tenbn; ?></p></h4>
<table class="table bg-white rounded shadow-sm  table-hover col-4">
    <thead>
        <tr style="text-align: center;">
            <th scope="col" width="100">STT</th>
            <th scope="col">Bệnh Nhân</th>
            <th scope="col">Ngày Khám</th>
            <th scope="col">Bác Sĩ</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <?php
  $row1 =  $p->loadLichSu($tenbn);
  $i = 0;
  foreach($row1 as $rowls){
   $i++;
  ?>
    <tbody>
        <tr style="text-align: center;">
            <th><?php echo $i ?></th>
            <td><?php echo $rowls['hoten']; ?></td>
            <td><?php echo $rowls['thoigiankham']; ?></td>
            <td><?php echo $rowls['bacsi']; ?></td>
            <td>
                <a href="?xbn=readls&id=<?php echo $rowls['maBA'];?>" style="text-decoration: none;">
                    <button type="button" value="submit" class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="xemchitiet">
                        <i class="bi bi-eye-fill"> Xem</i>
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