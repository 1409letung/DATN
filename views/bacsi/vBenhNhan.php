<?php
    include '../../controllers/cTK.php';
    $maTK = $_SESSION['MaTK'];
    //echo $maTK;
    $p = new controllerTK();
    $getinfoTK = $p->getInfoTK($maTK);
	$getNameBs = mysqli_fetch_assoc($getinfoTK);
    $nameBs = $getNameBs['user'];
	$q = new controllerDDKKB();
    $today = date("Y/m/d");
    $list = $q->getListDDKKB($nameBs,$today);
?>
<h4 style="text-align: center; color:forestgreen;">Danh sách bệnh nhân chờ khám</h4>
<table class="table bg-white rounded shadow-sm  table-hover col-4 ">
    <thead>
        <tr style="text-align: center;" class="table-warning">
            <th scope="col">STT</th>
            <th scope="col">Mã ĐĐKKB</th>
            <th scope="col">Họ tên</th>
            <th scope="col">Ngày khám</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
<?php
  $i = 0;
  foreach($list as $row){
  $i++;
?>
    <tbody>
                <tr style="text-align: center;">
                <th><?php echo $i; ?></th>
                <td><?php echo $row['maDDKKB'] ?></td>
                <td><?php echo $row['hoten'] ?></td>
                <td><?php echo $row['ngaykham'] ?></td>
                <td>
                   <a href="?dkb=xem&iddkb=<?php echo $row['maDDKKB'] ?>">
                       <button type="button" value="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="xemchitiet">
                          <i class="bi bi-eye-fill"></i>
                       </button>
                    </a>
                    <a href="?dkb=xuly&iddkb=<?php echo $row['maDDKKB'] ?>">
                       <button type="button"  value="submit" class="btn btn-danger btn-sm">
                         <i class="bi bi-clipboard-check-fill"> <?php echo $row['trangthai'] ?></i>
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