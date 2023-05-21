<?php
include '../../controllers/cTK.php';
$p = new ControllerNVXN();

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query = $p->get1PXN($id);
    $row = mysqli_fetch_assoc($query);
}else{
    return 0;
}
?>

<form class="form-control" action="" method="POST" style="width: 80%; margin-left: 100px;">
    <h4><i class="bi bi-journal-bookmark-fill"></i> THÔNG TIN PHIẾU XÉT NGHIỆM </h4>

    <div class="form-group">
        <label for="exampleInputEmail1"> <b>Mã Số:</b></label>
        <input type="text" name="id" class="form-control" value="<?php echo $id; ?>">
    </div>
    <div class="form-group">
        <label for="hoten">Họ tên:</label>
        <input type="text" class="form-control" name="hoten" value="<?php echo $row['benhnhan']; ?>"></input>
    </div>
    <div class="form-group ">
        <label for="lxn">Loại xét nghiệm:</label>
        <input type="text" class="form-control" value="<?php echo $row['loaiXN']; ?>">

    </div>
    <div class="form-group ">
        <label for="mxn">Mẫu Xét Nghiệm:</label>
        <input type="text" class="form-control" name="mxn" value="<?php echo $row['mauXN']; ?>"></input>
    </div>
    <div class="form-group">
        <label for="kq">Kết Quả:</label>
        <input type="text" class="form-control" name="mxn" value="<?php echo $row['ketqua']; ?>"></input>
    </div>
    <div class="form-group">
        <label for="pwd">Ghi Chú:</label>
        <textarea name="gc" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $row['ghichu']; ?>
        </textarea>
    </div>
    <div class="form-group">
        <label for="kq">Ngày xét nghiệm:</label>
        <input type="text" class="form-control" name="mxn" value="<?php echo $row['ngaythuchien']; ?>"></input>
    </div>
    <div class="form-group">
        <label for="kq">Người thực hiện:</label>
        <input type="text" class="form-control" name="mxn" value="<?php echo $row['nguoithuchien']; ?>"></input>
    </div>
    <div class="form-group">
        <label for="kq">Mã QR:</label>
        <div class="QR">
            <img src="<?php echo $row['QRCode']; ?>" alt="">
        </div>
    </div>

    </div>
    <div class="form-group">
        <a href="NVXetNghiem.php?action=ql&query=pxn" style="text-decoration: none;">
            <button type="button" class="btn btn-danger">
                <i class="bi bi-arrow-return-left"> Đóng</i>
            </button>
        </a>

    </div>

</form>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
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
    color: green;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

label {
    font-weight: 200px;
    color: blueviolet;
}

button {
    margin-left: 45%;
}

.QR {
    width: 200px;
    height: 200px;
}
</style>