<!-- thành viên -->
<h4 style="text-align: center; color:dodgerblue; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><i class="bi bi-person-lines-fill"></i> Danh sách đăng ký khám bệnh của thành viên</h4>
<div style="height:430px; overflow-y:scroll">
    <table class="table rounded shadow-sm  table-hover ">
        <thead class="table table-danger text-dark" style="text-align: center;">
            <tr>
               <td scope="col"><b>STT</b></td> 
               <td scope="col"><b>ID</b></td>
               <td scope="col"><b>Bệnh nhân</b></td>
               <td scope="col"><b>Triệu chứng bệnh</b></td>
               <td scope="col"><b>Đăng ký bác sĩ</b></td>
               <td scope="col"><b>Ngày khám</b></td>
               <td scope="col"><b>Thao tác</b></td>
            </tr>
        </thead>
<?php
   include '../../controllers/cTK.php';
   $p = new controllerDDKKB();
   $row = $p->loadDDKKB();
   $i = 0;
   foreach($row as $rw){
   $i++;
?>
        <tbody class="table table-light" style="text-align: center;">
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $rw['maDDKKB'];?></td>
                <td><?php echo $rw['hoten'];?></td>
                <td><?php echo $rw['trieuchung'];?></td>
                <td><?php echo $rw['bacsi'];?></td>
                <td><?php echo $rw['ngaykham'];?></td>
                <td>
                    <a href="?ddkkb=xem&id=<?php echo $rw['maDDKKB']; ?>">
                       <button type="button" value="submit" class="btn btn-success btn-sm" data-toggle="modal" data-target="xemchitiet">
                          <i class="bi bi-eye-fill"></i>
                       </button>
                    </a>
                    <a href="?ddkkb=xoa&id=<?php echo $rw['maDDKKB']; ?>">
                       <button type="button"  value="submit" class="btn btn-danger btn-sm">
                         <i class="bi bi-file-excel"></i>
                       </button>
                    </a>
                    <a href="?ddkkb=duyet&id=<?php echo $rw['maDDKKB']; ?>">
                       <button type="button" value="submit" class="btn btn-primary btn-sm">
                          <i class="bi bi-check2-square"> <?php echo $rw['trangthai']; ?> </i>
                       </button></a>
                </td>
            </tr>                    
        </tbody>    
<?php
   }
?>
    </table>
</div>
<!-- end thành viên -->
<hr>
<!-- vãng lai -->
<h4 style="text-align: center; color:#660066; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><i class="bi bi-list-stars"></i> Danh sách đăng ký khám bệnh khách vãng lai</h4>
<div style="height:430px; overflow-y:scroll">
    <table class="table rounded shadow-sm  table-hover ">
        <thead class="table table-warning text-dark" style="text-align: center;">
            <tr>
               <td scope="col"><b>STT</b></td> 
               <td scope="col"><b>ID</b></td>
               <td scope="col"><b>Họ tên</b></td>
               <td scope="col"><b>SĐT</b></td>
               <td scope="col"><b>Triệu chứng</b></td>
               <td scope="col"><b>Ngày khám</b></td>
               <td scope="col"><b>Thao tác</b></td>
            </tr>
        </thead>
<?php
   $kq = $p->loadQrDKKB();
   $a = 0;
   foreach($kq as $show){
   $a++;
?>
        <tbody class="table table-light" style="text-align: center;">
            <tr>
                <td><?php echo $a; ?></td>
                <td><?php echo $show['idQR']; ?></td>
                <td><?php echo $show['hoten']; ?></td>
                <td><?php echo $show['sdt']; ?></td>
                <td><?php echo $show['content']; ?></td>
                <td><?php echo $show['date']; ?></td>
                <td>
                    <a  href="?qr=xem&idQr=<?php echo $show['idQR']; ?>">
                       <button type="button" value="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="xemchitiet">
                          <i class="bi bi-eye-fill"></i>
                       </button>
                    </a>
                    <a href="?qr=xoa&idQr=<?php echo $show['idQR']; ?>">
                       <button type="button"  value="submit" class="btn btn-primary btn-sm">
                         <i class="bi bi-file-excel"></i>
                       </button>
                    </a>
                    <a href="?qr=duyet&idQr=<?php echo $show['idQR']; ?>">
                       <button type="button" value="submit" class="btn btn-success btn-sm">
                          <i class="bi bi-check2-square"> <?php echo $show['trangthai']; ?> </i>
                       </button></a>
                </td>
            </tr>                    
        </tbody>    
<?php
   }
?>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">