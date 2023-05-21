<h4 style="text-align: center; color:blue; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"><i class="bi bi-shield-fill-check"></i> Danh sách đăng ký tiêm chủng</h4>
<div style="height:350px; overflow-y:scroll">
    <table class="table rounded shadow-sm  table-hover ">
        <thead class="table table-danger text-dark" style="text-align: center;">
            <tr>
               <td scope="col"><b>MĐKTC</b></td>
               <td scope="col"><b>Khách hàng</b></td> 
               <td scope="col"><b>Giới tính</b></td>
               <td scope="col"><b>Vaccin</b></td>
               <td scope="col"><b>Phí vaccin</b></td>
               <td scope="col"><b>Ngày tiêm</b></td>
               <td scope="col"><b></b></td>
            </tr>
        </thead>
<?php
   include '../../controllers/cTK.php';
   $p = new controlNVTN();
   $row = $p->getTC();
   foreach($row as $rw){
?>
        <tbody class="table table-light" style="text-align: center;">
            <tr>
               <td><?php echo $rw['maDKTC'];?></td>
                <td><?php echo $rw['hoten'];?></td>
                <td><?php echo $rw['gioitinh'];?></td>
                <td><?php echo $rw['vaccin'];?></td>
                <td><?php echo $rw['trangthai'];?></td>
                <td><?php echo $rw['ngaydk'];?></td>
                <td>
                    <a href="?tc=rep&id=<?php echo $rw['maDKTC']; ?>" style="text-decoration: none">
                       <button type="button" value="submit" class="btn btn-success btn-sm" >
                          <i class="bi bi-envelope-fill"> Phản hồi</i>
                          <i class="bi bi-reply-all-fill"></i>
                       </button>
                    </a>
                    <a href="?tc=success&id=<?php echo $rw['maDKTC']; ?>" style="text-decoration: none">
                       <button type="button"  value="submit" class="btn btn-danger btn-sm" >
                         <i class="bi bi-check-square-fill"> Hoàn thành</i>
                       </button>
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