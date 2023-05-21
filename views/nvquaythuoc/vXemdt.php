<?php
    include '../../controllers/cTK.php';
      $maTK = $_SESSION['MaTK'];
      //echo $maTK;
      $p = new controllerTKBS();
	    $infoBS = $p->getInfoBS($maTK);
	    $infoTK = $p->getInfoTK($maTK);
	    $rowBS = mysqli_fetch_assoc($infoBS);
	  $rowTK = mysqli_fetch_assoc($infoTK);
?>

<br>
<h4 style="text-align: center; color:forestgreen;">Danh sách đơn thuốc</h4>
<table class="table bg-white rounded shadow-sm  table-hover col-4">
    <thead>
        <tr style="text-align: center;">
            <th scope="col" width="100">STT</th>
            <th scope="col" width="100">Mã ĐT</th>
            <th scope="col">Tên bệnh nhân</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <?php
   $row = $p->loadDT();
   $i = 0;
   while($rs = mysqli_fetch_array($row)){
   $i++;
?>
    <tbody>
        <tr style="text-align: center;">
            <th><?php echo $i; ?> </th>
            <td><?php echo $rs['maPKB'] ?> </td>
            <td><?php echo $rs['benhnhan'] ?> </td>
            <td>
                <a href="?dt=xem&id=<?php echo $rs['maPKB']; ?>" style="text-decoration: none;">
                    <button type="button" value="submit" class="btn btn-primary btn-sm">
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
<style>
.button {
    background-color: none;
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
<script src="../js/ajaxThuoc.js" type="text/javascript"></script>