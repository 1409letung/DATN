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
      $list = $p->ListBN();
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
<h4 style="text-align: center; color: green;"> <b>Thông tin đơn thuốc</b></h4>

<form action="" method="POST" class="form-control" id="insert_form">

    <div class="form-group">
        <label for="pwd">Bệnh nhân:</label>
        <select name="benhnhan" id="" class="form-control">
            <option value="">Chọn bệnh nhân</option>
            <?php
               foreach($list as $row)
               {
                   echo '<option value="'.$row['maPKB'].'_'.$row['benhnhan'].'">'.$row['benhnhan'].'</option>';
               }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="pwd">BHYT:</label>
        <select name="bhyt" id="" class="form-control">
            <option value="1">Có</option>
            <option value="0">Không</option>
        </select>
    </div>
    <div class="form-group ">
        <label for="">Bác sĩ:</label>
        <input type="text" class="form-control" name="bacsi" value="<?php echo $rowBS['hoten']; ?>">
    </div>
    <!-- paste -->
    <br>
    <p>Chọn thuốc</p>
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
   
   <button class="btn btn-success" name="sub" type="submit">Xác nhận</button>
</form>
<script>
    $(document).ready(function(){
       $(document).on('change', '#thuoc', function(){
          var tenthuoc = $(this).val();
          alert('tenthuoc');
          $.ajax({
            url: "giaThuoc.php",
            type: "POST",
            data: {tenthuoc : tenthuoc},
            success: function(data)
            {
                $('#gia').html(data);
            }
          })
       });
    });
</script>

<?php
   if(isset($_POST['sub'])){
    $array = explode("_", $_POST['benhnhan']);
    $maPKB = $array[0];
    $bennhan = $array[1];
    $BHYT = $_POST['bhyt'];
    $bacsi  = $_POST['bacsi'];
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
               alert("Tạo đơn thuốc thành công!");
             </script>';
            if(!$result){
              echo " <script>
                 alert('Tạo đơn thuốc thất bại!');
                 </script>";
            }
          }
    }
   }
?>

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