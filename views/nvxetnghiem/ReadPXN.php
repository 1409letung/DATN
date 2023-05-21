<?php
include '../../controllers/cTK.php';
$p = new ControllerNVXN();

if(isset($_GET['id']))
{
    $loaiXN = $_GET['lxn'];
    $id = $_GET['id'];
    $query = $p->get1PXN($id);
    $row = mysqli_fetch_assoc($query);
    $result = $p->ResultXN($loaiXN, $id);
}else{
    return 0;
}
?>
<style>
        .tble-kq{
        border-collapse: collapse;
        border: 1px solid #000;
        width: auto;
    }
    .tble-kq th{
        border: 1px solid #000;
        text-align: center;

        background-color:aquamarine ;
    }
    .tble-kq td{
        border: 1px solid #000;

        text-align: center;

    }
</style>
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
        <label for="kq">Các chỉ số đo được:</label>
        <?php
         if($loaiXN == 'MÁU TỔNG QUÁT')
            {
               echo
               '
               <table class="tble-kq">
                   <thead>
                       <tr>
                           <th>Công thức máu</th>
                           <th>Kết quả xét nghiệm</th>
                           <th>Chỉ số bình thường</th>
                           <th>Đơn vị</th>
                       </tr>
                   </thead>
                   <tbody>';
                foreach($result as $rs)
                {
                    echo ' <tr>
                             <td>'.$rs['congthucmau'].'</td>
                             <td>'.$rs['ketquaxetnghiem'].'</td>
                             <td>'.$rs['chisobinhthuong'].'</td>
                             <td>'.$rs['donvi'].'</td>
                         </tr>';
                }
                echo ' </tbody>
                </table>
                ';
            }
        elseif($loaiXN == 'NƯỚC TIỂU')
            {
                echo
                '
                <table class="tble-kq">
                <thead>
                    <tr>
                        <th>Thông số</th>
                        <th>Kết quả</th>
                        <th>Chỉ số bình thường</th>
                    </tr>
                </thead>
                <tbody>
                ';
                 foreach($result as $rs)
                 {
                     echo ' <tr>
                              <td>'.$rs['thongso'].'</td>
                              <td>'.$rs['ketqua'].'</td>
                              <td>'.$rs['chisobinhthuong'].'</td>
                          </tr>';
                 }
                 echo ' </tbody>
                 </table>
                 ';
            }
        elseif($loaiXN == 'UNG THƯ GAN')
            {
                echo
                '
                <table class="tble-kq">
                <thead>
                    <tr>
                        <th>Mã miễn dịch</th>
                        <th>Xét nghiệm</th>
                        <th>Kết quả</th>
                        <th>Chỉ số bình thường</th>
                        <th>Đơn vị</th>
                    </tr>
                </thead>
                <tbody>
                ';
                 foreach($result as $rs)
                 {
                     echo ' <tr>
                              <td>'.$rs['maMD'].'</td>
                              <td>'.$rs['xetnghiem'].'</td>
                              <td>'.$rs['ketqua'].'</td>
                              <td>'.$rs['chisobinhthuong'].'</td>
                              <td>'.$rs['donvi'].'</td>
                          </tr>';
                 }
                 echo ' </tbody>
                 </table>
                 ';
            }
        elseif($loaiXN == 'VI SINH')
            {
                echo
                '
                <table class="tble-kq">
                <thead>
                    <tr>
                        <th>Kháng sinh</th>
                        <th>S</th>
                        <th>I</th>
                        <th>R</th>
                    </tr>
                </thead>
                <tbody>
                ';
                 foreach($result as $rs)
                 {
                     echo ' <tr>
                              <td>'.$rs['khangsinh'].'</td>
                              <td>'.$rs['S'].'</td>
                              <td>'.$rs['I'].'</td>
                              <td>'.$rs['R'].'</td>
                          </tr>';
                 }
                 echo ' </tbody>
                 </table>
                 ';
            }
        ?>
        
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