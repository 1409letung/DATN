<?php
    include '../../controllers/cTK.php';
      $maTK = $_SESSION['MaTK'];
	  $p = new controllerTK();
	  $infoBN = $p->getInfoBN($maTK);
	  $infoTK = $p->getInfoTK($maTK);
	  $rowBN = mysqli_fetch_assoc($infoBN);
      $ten = $rowBN['hoten'];
	  $rowTK = mysqli_fetch_assoc($infoTK);
?>

<h4 style="text-align: center; color:forestgreen;">Danh sách bệnh án</h4>
<table class="table bg-white rounded shadow-sm  table-hover col-4">
    <thead>
        <tr style="text-align: center;">
            <th scope="col" width="100">STT</th>
            <th scope="col">Mã BA</th>
            <th scope="col">Họ tên</th>
            <th scope="col">Ngày</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <?php
 $b = new controllerBenhAn();
 $get = $b->showBABN($ten);
 $i = 0;
 foreach($get as $row){
    $i++;
?>
    <tbody>
        <tr style="text-align: center;">
            <th><?php echo $i;?></th>
            <td><?php echo $row['maBA'];?></td>
            <td><?php echo $row['hoten'];?></td>
            <td><?php echo $row['ngaytao'];?></td>
            <td>
                <a href="?BA=xem&idBA=<?php echo $row['maBA']; ?>">
                    <button type="button" value="submit" class="btn btn-info btn-sm" data-toggle="modal"
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