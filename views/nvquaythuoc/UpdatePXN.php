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

<form class="form-control" action="" method="POST" style="width: 80%; margin-left: 100px;">
    <h4><i class="bi bi-journal-bookmark-fill"></i> THÔNG TIN THUỐC </h4>

    <div class="form-group">
        <label for="exampleInputEmail1"> <b>Mã Thuốc:</b></label>
        <input type="text" name="id" class="form-control" value="<?php echo $id; ?>">
    </div>
    <div class="form-group">
        <label for="hoten">Tên Thuốc:</label>
        <input type="text" class="form-control" name="hoten" value="<?php echo $row['tenthuoc']; ?>"></input>
    </div>
    <div class="form-group ">
        <label for="lxn">Loại Thuốc:</label>
        <input type="text" class="form-control" value="<?php echo $row['tenloaithuoc']; ?>">

    </div>
    <div class="form-group ">
        <label for="mxn">Số Lượng:</label>
        <input type="text" class="form-control" name="mxn" value="<?php echo $row['soluong']; ?>"></input>
    </div>
    <div class="form-group">
        <label for="kq">Giá:</label>
        <input type="text" class="form-control" name="mxn" value="<?php echo $row['gia']; ?>"></input>
    </div>
    </div>
    <div class="form-group">
        <a href="NVQT.php?action=ql&query=qlt" style="text-decoration: none;">
            <button type="button" class="btn btn-danger">
                <i class="bi bi-arrow-return-left"> Đóng</i>
            </button>
        </a>
        <a href="#" style="text-decoration: none;">
            <button type="button" class="btn btn-danger">
                <i class="bi bi-arrow-return-left"> Đóng</i>
            </button>
        </a>
    </div>

</form>

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