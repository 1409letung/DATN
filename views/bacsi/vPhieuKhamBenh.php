<?php
    include '../../controllers/cTK.php';
      $maTK = $_SESSION['MaTK'];
      $p = new controllerTKBS();
	    $infoBS = $p->getInfoBS($maTK);
	    $infoTK = $p->getInfoTK($maTK);
	    $rowBS = mysqli_fetch_assoc($infoBS);
      $idBs = $rowBS['maBS'];
      $Bs = $rowBS['hoten'];
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
<!-- Start Đơn đăng ký -->
<button type="button" class="btn btn-primary btn-sm" style="margin-left: 20px;" data-toggle="modal"
    data-target="#myModal">
    <i class="bi bi-clipboard-plus-fill"></i> PKB Mới
</button>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: bisque;">
                <h4 class="modal-title" style="margin-left: 80px; color:lime;"> <b>Phiếu khám bệnh mới</b></h4>
                <button type="button" class="close" data-dismiss="modal"
                    style="border-radius: 5px;border-color: white;">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" class="">
                    <div class="form-group ">
                        <label for="">Bác sĩ thực hiện:</label>
                        <input type="text" class="form-control" name="bacsi" value="<?php echo $rowBS['hoten']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Bệnh nhân:</label>
                        <input type="text" class="form-control" name="benhnhan" placeholder="Vd: Nguyễn Văn Long">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Phòng:</label>
                        <input type="text" class="form-control" name="phong" value="<?php echo $rowBS['phonglamviec']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Chuẩn đoán:</label>
                        <textarea name="chuandoan" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Xét nghiệm:</label>
                        <select name="xn" id="" class="form-control">
                            <option value="0">Không</option>
                            <option value="MÁU TỔNG QUÁT">Xét Nghiệm Máu</option>
                            <option value="NƯỚC TIỂU">Xét Nghiệm Nước Tiểu</option>
                            <option value="UNG THƯ GAN">Xét Nghiệm Ung Thư Gan</option>
                            <option value="VI SINH">Xét Nghiệm Vi Sinh</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Kết luận:</label>
                        <textarea name="ketluan" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="taopkb" class="btn btn-primary btn-footer"
                            style="text-align: center;">Tạo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
   if(isset($_POST['taopkb'])){
    $bacsi     = $_POST['bacsi'];
    $benhnhan  = $_POST['benhnhan'];
    $phong     = $_POST['phong'];
    $chuandoan = $_POST['chuandoan'];
    $xetnghiem = $_POST['xn'];
    $ketluan   = $_POST['ketluan'];
    if(!$benhnhan || !$phong || !$chuandoan){
      echo " <script>
        alert('Vui lòng nhập đầy đủ thông tin!');
      </script>";
    }else{
      if(!preg_match("/^[A-ZĐÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĨŨƠỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỬỮỰỲỴÝỶỸ]{1}[a-zàáâãèéêìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,}(\s[A-ZĐÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĨŨƠỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỬỮỰỲỴÝỶỸ]{1}[a-zàáâãèéêìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,}){1,}$/",$benhnhan)){
           echo '<script>alert("Đăng ký thất bại. Họ tên bệnh nhân không phù hợp, vui lòng kiểm tra lại!");</script>';
      }else{
          if($xetnghiem == 'MÁU TỔNG QUÁT' || $xetnghiem == 'NƯỚC TIỂU' || $xetnghiem == 'UNG THƯ GAN' || $xetnghiem == 'VI SINH')
          {
             $maPKB = $p->insPKB($bacsi,$benhnhan,$phong,$chuandoan,$xetnghiem,$ketluan);
            $maPXN = $p->insPXN($maPKB,$benhnhan, $xetnghiem,$bacsi);
            //$result = $p->insDThuoc($maPKB, $benhnhan, $bacsi);
            if($maPXN)
            {
                unset($_POST['taopkb']);
                echo " <script>alert('Tạo phiếu khám bệnh thành công!');</script>";
            }else
            {
                echo " <script>alert('Thao tác thất bại!');</script>";
            }
        }
        else
        {
               $result = $p->insPKB($bacsi,$benhnhan,$phong,$chuandoan,$xetnghiem,$ketluan);
          if($result){
             echo " <script>
                    alert('Tạo phiếu khám bệnh thành công!');
                 </script>";
          unset($_POST['taopkb']);
          }else{
              echo " <script>
              alert('Thao tác thất bại!');
             </script>";
          }
        }
      }
    }
   }
?>
<!-- End Đơn đăng ký -->
<!-- Start Table đơn đăng ký -->
<br>
<br>
<h4 style="text-align: center; color:forestgreen;">Danh sách phiếu khám bệnh</h4>
<table class="table bg-white rounded shadow-sm  table-hover col-4">
    <thead>
        <tr style="text-align: center;">
            <th scope="col" width="100">STT</th>
            <th scope="col" width="100">ID</th>
            <th scope="col">Bệnh nhân</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <?php
   $row = $p->loadPKB($Bs);
   $i = 0;
   while($rs = mysqli_fetch_array($row)){
   $i++;
?>
    <tbody>
        <tr style="text-align: center;">
            <th><?php echo $i; ?> </th>
            <td><?php echo $rs['maPKB'] ?> </td>
            <td><?php echo $rs['benhnhan'] ?></td>
            <td>
                <a href="?pkb=sua&id=<?php echo $rs['maPKB']; ?>" style="text-decoration: none;">
                    <button type="button" value="submit" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil-square"> Cập nhật</i>
                    </button>
                </a>
                <a href="?pkb=xem&id=<?php echo $rs['maPKB']; ?>" style="text-decoration: none;">
                    <button type="button" value="submit" class="btn btn-primary btn-sm">
                        <i class="bi bi-eye-fill"> Xem</i>
                    </button>
                </a>
                <a href="?pkb=xoa&id=<?php echo $rs['maPKB']; ?>" style="text-decoration: none;">
                    <button type="button" value="submit" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash3-fill"> Xóa</i>
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