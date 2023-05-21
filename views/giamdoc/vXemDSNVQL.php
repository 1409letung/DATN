
<!-- Start Đơn đăng ký -->
<!-- End Đơn đăng ký -->
<!-- Start Table đơn đăng ký -->
<br>
<br>
<h4 style="text-align: center; color:forestgreen;">Danh Sách Nhân Viên Quản Lý</h4>
<table class="table bg-white rounded shadow-sm  table-hover col-4">
    <thead>
        <tr style="text-align: center;">
            <th scope="col" width="100">STT</th>
            <th scope="col">Họ Tên</th>
            <th scope="col">Ngày Sinh</th>
            <th scope="col">SĐT</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <?php
  $row =  $p->loadNVQL();
  $i = 0;
  foreach($row as $row){
   $i++;
  ?>
    <tbody>
        <tr style="text-align: center;">
            <th><?php echo $i ?></th>
            <td><?php echo $row['hoten']; ?></td>
            <td><?php echo $row['ngaysinh']; ?></td>
            <td><?php echo $row['sdt']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
                <a href="?xnv=readnvql&id=<?php echo $row['maNVQL'];?>" style="text-decoration: none;">
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