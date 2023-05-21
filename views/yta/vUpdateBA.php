<?php
    include '../../controllers/cTK.php'; 
    if(isset($_GET['idbenhan'])){
        $id = $_GET['idbenhan'];
        $p = new controllerBenhAn();
        $row = $p->loadOneBA($id);
        $rs = mysqli_fetch_assoc($row);
      //   $maBS = $rs['maBS'];
      //   $Bs = $p->getNameBs($maBS);
      //   $nameBs = mysqli_fetch_assoc($Bs);
    }else{
        return false;
    }
?>
<div class="container">
    <div class="row">
        <div class="mx-auto col-10 col-md-8 col-lg-8">
            <h4 style="text-align: center;color:#0000FF;">Thông tin bệnh án số:
                <?php echo $id;?></h4>
            <form class="form-control" method="post">
                <div class="form-group">
                    <label for="inputEmail4">Bệnh nhân</label>
                    <input type="text" class="form-control" name="ht" value="<?php echo $rs['hoten']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Ngày sinh</label>
                    <input type="text" class="form-control" name="ns" value="<?php echo $rs['ngaysinh']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Giới tính</label>
                    <?php
                            if($rs['gioitinh'] == 1)
                            {
                               echo ' <input type="text" class="form-control" name="gt" value="Nam">';
                            }
                            else
                            {
                              echo ' <input type="text" class="form-control" name="gt" value="Nữ">';
                            }
                        ?>

                </div>
                <div class="form-group">
                    <label for="inputEmail4">Dân tộc</label>
                    <input type="text" class="form-control" name="dt" value="<?php echo $rs['dantoc']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Số BHYT</label>
                    <input type="text" class="form-control" name="bhyt" value="<?php echo $rs['BHYT']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Nghề nghiệp</label>
                    <input type="text" class="form-control" name="nn" value="<?php echo $rs['nghenghiep']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Đơn vị công tác</label>
                    <input type="text" class="form-control" name="dvct" value="<?php echo $rs['donvicongtac']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Địa chỉ</label>
                    <input type="text" class="form-control" name="dc" value="<?php echo $rs['diachi']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Ngày khám</label>
                    <input type="text" class="form-control" name="nk" value="<?php echo $rs['thoigiankham']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Bác sĩ khám</label>
                    <input type="text" class="form-control" name="bs" value="<?php echo $rs['bacsi']; ?>">
                </div>

                <div class="form-group">
                    <label for="inputEmail4">Chuẩn đoán</label>
                    <textarea class="form-control" rows="5" name="cd"
                        style="background-color: white;"><?php echo $rs['chuandoan']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Phương pháp điều trị</label>
                    <textarea class="form-control" rows="5" name="ppdt"
                        style="background-color: white;"><?php echo $rs['phuongphapdieutri']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Kết luận</label>
                    <textarea class="form-control" rows="5" name="kl"
                        style="background-color: white;"><?php echo $rs['ketluan']; ?></textarea>
                </div>
                <div class="form-group  ">
                    <label for="inputEmail4">Y tá phụ trách</label>
                    <input type="text" class="form-control" name="yt" value="<?php echo $rs['nguoitao']; ?>">
                </div>
                <div class="form-group  ">
                    <label for="inputEmail4">Ghi chú</label>
                    <input type="text" class="form-control" name="gc" value="<?php echo $rs['ghichu']; ?>">
                </div>
                <div class="form-group  ">
                    <label for="inputEmail4">Loại khách hàng</label>
                    <?php
                            if($rs['loaikhachhang'] == 1)
                            {
                               echo ' <input type="text" class="form-control" name="lkh" value="Thành viên">';
                            }
                            else
                            {
                              echo ' <input type="text" class="form-control" name="lkh" value="Vãng lai">';
                            }
                        ?>
                </div>
                <br>
                <div class="mx-auto" style="text-align: center;">
                    <button type="submit" class="btn btn-warning" name="update">Cập nhật</button>
                    <a href="?action=ql&query=benhan">
                        <button type="button" class="btn btn-primary">Đóng</button>
                    </a>

                </div>
        </div>
        </form>
    </div>
</div>
</div>

<?php
   if(isset($_POST['update'])){
     $hoten      = $_POST['ht'];
     $bhyt       = $_POST['bhyt'];
     $bacsi      = $_POST['bs'];
     $chuandoan  = $_POST['cd'];
     $ppdt       = $_POST['ppdt'];
     $kl         = $_POST['kl'];
     $ghichu     = $_POST['gc'];
     $kq = $p->updateBA($id,$hoten,$bhyt,$bacsi,$chuandoan,$ppdt,$kl,$ghichu);
     if($kq){
        echo '
           <script> alert("Cập nhật thành công!"); </script>
        ';
        header("refresh:0;url='./yta.php?action=ql&query=benhan'");
     }else{
        echo '
           <script> alert("Cập nhật thất bại!"); </script>
        ';
        header("refresh:0;url='./yta.php?action=ql&query=benhan'");
     }
   }
?>