<?php
  include '../../controllers/cTK.php'; 
  include '../../models/DonThuoc.php';
      $maTK = $_SESSION['MaTK'];
      $p = new controllerTKBS();
	    $infoBS = $p->getInfoBS($maTK);
	    $infoTK = $p->getInfoTK($maTK);
	    $rowBS = mysqli_fetch_assoc($infoBS);
      $idBs = $rowBS['maBS'];
      $BacSi = $rowBS['hoten'];
	  $rowTK = mysqli_fetch_assoc($infoTK);
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $p = new controllerTKBS();
        $row = $p->get1DT($id);
        $rs = mysqli_fetch_assoc($row);
    }else{
        return false;
    }
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
<h4 style="text-align: center;color:#0000FF;">Cập nhật thông tin đơn thuốc mã số:<?php echo $id;?></h4>
<form method="POST" class="form-control">
<input type="text" class="form-control" name="maPKB" value="<?php echo $rs['maPKB']; ?>" hidden>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputEmail4">Bệnh nhân</label>
            <input type="text" class="form-control" name="bn" value="<?php echo $rs['benhnhan']; ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="inputEmail4">Bác sĩ</label>
            <input type="text" class="form-control" name="bs" value="<?php echo $rs['bacsi']; ?>">
        </div>
        <div class="form-group">
        <label for="pwd">BHYT:</label>
        <select name="bhyt" id="" class="form-control">
          <?php
            if($rs['BHYT'] == 1)
            {
              echo ' <option value="'.$rs['BHYT'].'">Có</option>';
            }
            else
            {
              echo ' <option value="'.$rs['BHYT'].'">Không</option>';
            }
          ?>
        </select>
       </div>
        <br>
        <table class="table table-bordered" id="table_field" width="800px;" style="text-align: center;">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th width="25%">Tên thuốc</th>
                <th width="10%">Số lượng</th>
                <th width="20%">Liều dùng</th>
                <th width="20%">Cách dùng</th>
                <th width="5%"></th>
            </tr>
        </thead>
        <tbody id="tbody">
        <tr>
        <td width="5%">
             <input type="text" class="form-control stt" name="stt[]" id="stt" value="1" readonly>
            </td>
          <td width="25%">
             <select name="thuoc[]" class="thuoc" id="thuoc">
              <option value="1"> Chọn thuốc </option>
              <?php
                 $result = $p->ListThuoc();
              ?>
            </select>
          </td>
          <td width="10%">
            <input class="form-control" type="number" name="soluong[]" id="soluong">
          </td>
          <td width="20%">
          <input class="form-control" type="text" name="lieudung[]" id="lieudung">
          </td>
          <td width="20%">
          <input class="form-control" type="text" name="cachdung[]" id="cachdung">
          </td>
          <td width="5%">
          <input class="btn btn-sm btn-warning add" type="button" name="add" id="add" value="Thêm">
          </td>
      </tr>
        </tbody>

    </table>
        <br>
        <br>
        <button type="submit" name="sub" class="btn btn-primary" style="margin-left: 900px;">Cập nhật</button>
</form>
<?php
   if(isset($_POST['sub'])){
    $maPKB = $id;
    $bennhan = $_POST['bn'];
    $BHYT = $_POST['bhyt'];
    $bacsi  = $_POST['bs'];
    $ngaycap   = date("Y/m/d");
    for($i = 0; $i < count($_POST['stt']); $i++)
    {
        $tenthuoc   = $_POST['thuoc'][$i];
        $soluong  = $_POST['soluong'][$i];
        $lieudung  = $_POST['lieudung'][$i];
        $cachdung = $_POST['cachdung'][$i];

        if(!$bennhan || !$tenthuoc || !$soluong || !$lieudung || !$cachdung){
            echo " <script>
              alert('Vui lòng nhập đầy đủ thông tin!');
            </script>";
          }else{
            $result = $p->insDT($maPKB,$bennhan,$bacsi,$tenthuoc,$soluong,$lieudung,$cachdung,$ngaycap,$BHYT);
            unset($_POST['sub']);
              echo '<script>
              window.location.href="bacsi.php?c=qlkb&qr=dt&action";
               alert("Đã cập nhật thông tin đơn thuốc");
             </script>';
             if(!$result){
              echo " <script>
                 alert('Thao tác thất bại!');
                 </script>";
            }
          }
    }
   }
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="../../library/dselect.js"></script>
<!-- Thêm thuốc -->
<script type="text/javascript">
$(document).ready(function() {
    var select_box = document.querySelector('#thuoc');

   dselect(select_box, {
     search: true
   });
   //add row
});

$('#add').click(function(){
   var length = $('.stt').length;
   var i = parseInt(length) + parseInt(1);
   var html = '<tr><td><input type="text" class="form-control stt" name="stt[]" id="stt" value="'+i+'" readonly></td>';
   html += '<td width="25%"><select name="thuoc[]" class="thuoc" id="thuoc'+i+'"><option value="1" on> Chọn thuốc </option><?php $result = $p->ListThuoc(); ?> </select></td>';
   html += '<td width="20%"><input class="form-control" type="number" name="soluong[]" id="soluong'+i+'"></td><td width="20%"><input class="form-control" type="text" name="lieudung[]" id="lieudung'+i+'"></td><td width="20%"><input class="form-control" type="text" name="cachdung[]" id="cachdung'+i+'"></td><td width="5%"><input class="btn btn-sm btn-danger remove" type="button" name="remove" id="remove" value="Xóa"></td></tr>';
   var newRow = $('#tbody').append(html);
//    var newRow = $('#tbody').append('<tr><td><input type="text" class="form-control stt" name="stt[]" id="stt" value="'+i+'" readonly></td><td width="35%"><select name="thuoc[]" class="thuoc" id="thuoc'+i+'"><option value="1"> Chọn thuốc </option><?php $result = $p->ListThuoc(); ?> </select></td><td width="20%"><input class="form-control" type="text" name="soluong[]" id="soluong'+i+'"></td><td width="20%"><input class="form-control" type="text" name="lieudung[]" id="lieudung'+i+'"></td><td width="20%"><input class="form-control" type="text" name="cachdung[]" id="cachdung'+i+'"></td><td width="5%"><input class="btn btn-sm btn-danger remove" type="button" name="remove" id="remove" value="Xoa"></td></tr>');
  
  $('#table_field').on('click', '.remove', function(){
     $(this).closest('tr').remove()
  });
});


    

</script>