<?php
include '../../controllers/cTK.php';
$p = new ControllerGiamDoc();

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query = $p->get1BA($id);
    $row = mysqli_fetch_assoc($query);
}else{
    return 0;
}
?>

<form class="form-control" action="" method="POST" style="width: 80%; margin-left: 100px;">
    <h4><i class="bi bi-journal-bookmark-fill"></i> THÔNG TIN BỆNH ÁN </h4>

    <div class="form-group">
        <label for="exampleInputEmail1"> <b>Mã Bệnh Án:</b></label>
        <input type="text" name="id" class="form-control" value="<?php echo $id; ?>">
    </div>
    <div class="form-group">
        <label for="hoten">Họ Tên Bệnh Nhân:</label>
        <input type="text" class="form-control" name="hoten" value="<?php echo $row['hoten']; ?>"></input>
    </div>
    <div class="form-group ">
        <label for="lxn">Ngày Sinh:</label>
        <input type="text" class="form-control" value="<?php echo $row['ngaysinh']; ?>">
    </div>
    <div class="form-group ">
        <label for="mxn">Giới Tính:</label>
        <input type="text" class="form-control" name="mxn" value="<?php if($row['gioitinh']==1) echo 'Nam'; elseif($row['gioitinh']==2) echo 'Nữ'; ?>"></input>
    </div>
    <div class="form-group ">
        <label for="lxn">Dân Tộc:</label>
        <input type="text" class="form-control" value="<?php echo $row['dantoc']; ?>">
    </div>
    <div class="form-group ">
        <label for="lxn">Bảo Hiểm Y Tế:</label>
        <input type="text" class="form-control" value="<?php echo $row['BHYT']; ?>">
    </div>
    <div class="form-group ">
        <label for="lxn">Nghề Nghiệp:</label>
        <input type="text" class="form-control" value="<?php echo $row['nghenghiep']; ?>">
    </div>
    <div class="form-group ">
        <label for="lxn">Đơn Vị Công Tác:</label>
        <input type="text" class="form-control" value="<?php echo $row['donvicongtac']; ?>">
    </div>
    <div class="form-group">
        <label for="kq">Địa Chỉ:</label>
        <input type="text" class="form-control" name="mxn" value="<?php echo $row['diachi']; ?>"></input>
    </div>
    <div class="form-group">
        <label for="pwd">Thời Gian Khám:</label>
        <input type="text" class="form-control" name="mxn" value="<?php echo $row['thoigiankham']; ?>"></input>
    </div>
    <div class="form-group">
        <label for="kq">Bác Sĩ Khám:</label>
        <input type="text" class="form-control" name="mxn" value="<?php echo $row['bacsi']; ?>"></input>
    </div>
    <div class="form-group">
        <label for="kq">Chuẩn Đoán:</label>
        <textarea class="form-control" rows="3"><?php echo $row['chuandoan']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="kq">Phương Pháp Điều Trị:</label>
        <textarea class="form-control" rows="3"><?php echo $row['phuongphapdieutri']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="kq">Kết Luận:</label>
        <textarea class="form-control" rows="3"><?php echo $row['ketluan']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="kq">Người Tạo:</label>
        <input type="text" class="form-control" name="mxn" value="<?php echo $row['nguoitao']; ?>"></input>
    </div>
    <div class="form-group">
        <label for="kq">Ghi Chú:</label>
        <textarea class="form-control" rows="3"><?php echo $row['ghichu']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="kq">Loại Khách Hàng:</label>
        <input type="text" class="form-control" name="mxn" value="<?php if($row['loaikhachhang']==1) echo 'Thành Viên'; elseif($row['loaikhachhang']==2) echo 'Khách Vãng Lai'; ?>"></input>
    </div>
    <div class="form-group">
        <label for="kq">Ngày Tạo:</label>
        <input type="text" class="form-control" name="mxn" value="<?php echo $row['ngaytao']; ?>"></input>
    </div>
    <div class="form-group">
        <label for="kq"> </label>
    </div>
    <div class="form-group" style="text-align: center;">
    <label for="kq"> </label>
        <a href="Giamdoc.php?xbn=xemLS&tenbn=<?php echo $row['hoten'] ?>" style="text-decoration: none;">
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



.QR {
    width: 200px;
    height: 200px;
}
</style>