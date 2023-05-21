<?php
    include '../../controllers/cTK.php';
      $maTK = $_SESSION['MaTK'];
      $p = new controllerTKBS();
	    $infoBS = $p->getInfoBS($maTK);
	    $infoTK = $p->getInfoTK($maTK);
	    $rowBS = mysqli_fetch_assoc($infoBS);
      $bacsi = $rowBS['hoten'];
	 $rowTK = mysqli_fetch_assoc($infoTK);
?>
<a href="?c=qlkb&qr=pkb&action" style="text-decoration: none">
    <button type="button" value="submit" class="btn btn-primary btn-sm">
        <i class="bi bi-list"> Phiếu Khám Bệnh</i>
    </button>
</a>

<a href="?c=qlkb&qr=kqxn&action" style="text-decoration: none">
    <button type="button" value="submit" class="btn btn-warning btn-sm">
        <i class="bi bi-grid-1x2-fill"> Kết Quả Xét Nghiệm</i>
    </button>
</a>
<a href="?c=qlkb&qr=dt&action" style="text-decoration: none">
    <button type="button" value="submit" class="btn btn-success btn-sm">
        <i class="bi bi-chat-left-heart-fill"> Đơn Thuốc</i>
    </button>
</a>

<hr>
<h4 style="text-align: center; color:forestgreen;">Danh Sách Phiếu Xét Nghiệm</h4>
<table class="table bg-white rounded shadow-sm  table-hover col-4">
    <thead>
        <tr style="text-align: center;">
            <th scope="col" width="100">STT</th>
            <th scope="col">Họ Tên</th>
            <th scope="col">Xét Nghiệm</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <?php
  $row =  $p->getPXN($bacsi);
  $i = 0;
  foreach($row as $row){
   $i++;
  ?>
    <tbody>
        <tr style="text-align: center;">
            <th><?php echo $i ?></th>
            <th><?php echo $row['benhnhan']; ?></th>
            <td><?php echo $row['loaiXN']; ?></td>
            <td>
                <a href="?pxn=read&lxn=<?php echo $row['loaiXN'];?>&id=<?php echo $row['maPXN'];?>" style="text-decoration: none;">
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<script src="../js/jquery-3.6.1.js" type="text/javascript"></script>