<?php

include '../../controllers/cTK.php';
$p = new ControllerNVXN();

$maTK = $_SESSION['MaTK'];
$info = $p->getInfo($maTK);
$row = mysqli_fetch_assoc($info);
$nth = $row['hoten'];

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query = $p->get1PXN($id);
    $row = mysqli_fetch_assoc($query);
}else{
    return 0;
}

?>

<form class="form-control" id="export_excel" method="POST" enctype="multipart/form-data"
    style="width: 80%; margin-left: 100px;">
    <h4><i class="bi bi-journal-bookmark-fill"></i> CẬP NHẬT KẾT QUẢ PHIẾU XÉT NGHIỆM </h4>
    <label for=""> <b>Mã Số:</b></label>
    <input type="text" class="form-control id" name="id" value="<?php echo $id; ?>">
    <label for=""> <b>Bệnh nhân:</b></label>
    <input type="text"  class="form-control " value="<?php echo $row['benhnhan']; ?>">
    <label for=""> <b>Loại xét nghiệm:</b></label>
    <input type="text" class="form-control "  value="<?php echo $row['loaiXN']; ?>">
    <label for=""> <b>Mẫu xét nghiệm:</b></label>
    <input type="text" name="mxn" class="form-control " id="" value="">
    <input type="text" name="day" value="<?php echo date("Y/m/d"); ?>" hidden>
    <input type="text" name="nth" value="<?php echo $nth; ?>" hidden>
    <br>
    <label for="">File kết quả xét nghiệm(Excel):</label>
    <input type="file" name="excel_file" id="excel_file">
</form>

<br>
<div id="result">

</div>
<br>
<div class="form-group">
    <div class="active" style="text-align:center;">
        <a href="NVXetNghiem.php?action=ql&query=pxn" style="text-decoration: none;">
            <button type="button" class="btn btn-danger">
                <i class="bi bi-arrow-return-left"> Đóng</i>
            </button>
        </a>
    </div>
</div>
<script>
$(document).ready(function() {

    $('#excel_file').change(function() {
        $('#export_excel').submit();
    });

    $('#export_excel').on('submit', function(event) {
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "exportExcel_XNM.php",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                $('#result').html(data);
                $('#excel_file').val('');
            }
        });
    });
});
</script>

<script src="../js/jquery-3.6.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

<style>
/* form{
        width: 50%;
        margin-left: 0px;
    } */
h4 {
    text-align: center;
    color: blue;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

label {
    font-weight: 200px;
    color: blueviolet;
}
</style>