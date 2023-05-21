
<h4 style="text-align: center; color:red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"><i class="bi bi-journal-bookmark-fill"></i> Danh sách đơn liên hệ của khách hàng</h4>
<div style="height:350px; overflow-y:scroll">
    <table class="table rounded shadow-sm  table-hover ">
        <thead class="table table-danger text-dark" style="text-align: center;">
            <tr>
               <td scope="col"><b>Mã ĐLH</b></td> 
               <td scope="col"><b>Ngày gửi</b></td>
               <td scope="col"><b>Người gửi</b></td>
               <td scope="col"><b>SĐT</b></td>
               <td scope="col"><b>Email</b></td>
               <td scope="col"><b>Thao tác</b></td>
            </tr>
        </thead>
<?php
   include '../../controllers/cTK.php';
   $p = new controlNVTN();
   $row = $p->getLH();
   foreach($row as $rw){
?>
        <tbody class="table table-light" style="text-align: center;">
            <tr>
                <td><?php echo $rw['maDLH'];?></td>
                <td><?php echo $rw['ngaynhan'];?></td>
                <td><?php echo $rw['ten'];?></td>
                <td><?php echo $rw['sdt'];?></td>
                <td><?php echo $rw['email'];?></td>
                <td>
                    <a href="?lh=rep&id=<?php echo $rw['maDLH']; ?>" style="text-decoration: none">
                       <button type="button" value="submit" class="btn btn-success btn-sm" >
                          <i class="bi bi-envelope-fill"> Phản hồi</i>
                          <i class="bi bi-reply-all-fill"></i>
                       </button>
                    </a>
                    <a href="?lh=del&id=<?php echo $rw['maDLH']; ?>" style="text-decoration: none">
                       <button type="button"  value="submit" class="btn btn-danger btn-sm" >
                         <i class="bi bi-file-excel"> Xóa</i>
                       </button>
                </td>
            </tr>                    
        </tbody>    
<?php
   }
?>
 </table>
</div>
<hr>
<br>
<!--  -->
<h4 style="text-align: center; color:green; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><i class="bi bi-check-square-fill"></i> Danh sách liên hệ đã phản hồi cho khách hàng</h4>
<div style="height:350px; overflow-y:scroll">
    <table class="table rounded shadow-sm  table-hover ">
        <thead class="table table-warning text-dark" style="text-align: center;">
            <tr>
               <td scope="col"><b>Mã ĐLH</b></td> 
               <td scope="col"><b>Người gửi</b></td>
               <td scope="col"><b>Người phản hồi</b></td>
               <td scope="col"><b>Ngày trả lời</b></td>
               <td scope="col"><b>Thao tác</b></td>
            </tr>
        </thead>
<?php
   $row1 = $p->getLHR();
   foreach($row1 as $rw){
?>
        <tbody class="table table-light" style="text-align: center;">
            <tr>
                <td><?php echo $rw['maDLH'];?></td>
                <td><?php echo $rw['ten'];?></td>
                <td><?php echo $rw['nguoitraloi'];?></td>
                <td><?php echo $rw['ngaygui'];?></td>
                <td>
                    <a href="?lh=xem&id=<?php echo $rw['maDLH']; ?>" style="text-decoration: none">
                       <button type="button" value="submit" class="btn btn-primary btn-sm" >
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
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">