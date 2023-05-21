<?php
  include '../../controllers/cTK.php';
  $p = new controlNVTN();

  if(isset($_POST['search']))
  {
    $category = $_POST['category'];
    $key = $_POST['keyword'];
    if(!$key)
    {
        echo 'Chưa nhập thông tin cần tìm kiếm!!';
    }else
    {
        switch($category)
    {
        case "0":
            echo "Vui lòng chọn thông tin cần tìm kiếm...!";
            break;
        case "1":
            $ex = $p->searchBS($key);
            $num = mysqli_num_rows($ex);
            if($num > 0)
            {
                echo '<h5 style="color: red;">Kết quả tìm kiếm bác sĩ: '.$key.'</h5>';
                echo '<br>';
                echo '<table class="table table-light" style="text-align: center;">
                <thead>
                         <tr>
                             <th scope="col"><b>STT</b></th> 
                             <th scope="col"><b>Họ tên</b></th> 
                             <th scope="col"><b>Chuyên khoa</b></th>
                             <th scope="col"><b>Công việc</b></th>
                             <th scope="col"><b>Lịch làm việc</b></th>
                             <th scope="col"><b>Số lượng bệnh nhân đã đăng ký</b></th>
                             <th scope="col"><b>Trạng thái</b></th>
                        </tr>
                </thead>';
                        
                $i = 1;
                while($row = mysqli_fetch_array($ex))
                {
                    $hoten      = $row['hoten'];
                    $chuyenkhoa = $row['chuyenkhoa'];
                    $congviec   = $row['vitricongviec'];
                    $cakham     = $row['cakham'];
                    $soluong    = $row['soluong'];
                    $status     = $row['trangthai'];
                    echo '
                         <tr>
                            <td>'.$i.'</td>
                            <td>'.$hoten.'</td>
                            <td>'.$chuyenkhoa.'</td>
                            <td>'.$congviec.'</td>
                            <td>'.$cakham.'</td>
                            <td>'.$soluong.'</td>
                            <td>'.$status.'</td>
                         </tr>                      
                    ';
                    $i++;
                }
                echo '</table>';
                
            }else
            {
                echo "Không tìm thấy thông tin!";
            }
            break;
        case "2":
            $ex = $p->searchBN($key);
            $num = mysqli_num_rows($ex);
            if($num > 0)
            {
                echo '<h5 style="color: red;">Kết quả tìm kiếm bệnh nhân: '.$key.'</h5>';
                echo '<table class="table table-light" style="text-align: center;">
                     <thead>
                         <tr>
                             <th scope="col"><b>STT</b></th> 
                             <th scope="col"><b>Họ tên</b></th> 
                             <th scope="col"><b>Ngày sinh</b></th>
                             <th scope="col"><b>Giới tính</b></th>
                             <th scope="col"><b>Địa chỉ</b></th>
                             <th scope="col"><b>SĐT</b></th>
                             <th scope="col"><b>Email</b></th>
                             <th scope="col"><b>Nghề nghiệp</b></th>
                             <th scope="col"><b>BHYT</b></th>
                        </tr>
                        </thead>';
                echo '<br>';
                $i = 1;
                while($row = mysqli_fetch_array($ex))
                {
                    $hoten      = $row['hoten'];
                    $ngaysinh   = $row['ngaysinh'];
                    $gioitinh   = $row['gioitinh'];
                    $diachi     = $row['diachi'];
                    $sdt        = $row['sdt'];
                    $email      = $row['email'];
                    $nghenghiep = $row['nghenghiep'];
                    $bhyt       = $row['BHYT'];
                    echo '
                         <tr>
                            <td>'.$i.'</td>
                            <td>'.$hoten.'</td>
                            <td>'.$ngaysinh.'</td>
                            <td>'.$gioitinh.'</td>
                            <td>'.$diachi.'</td>
                            <td>'.$sdt.'</td>
                            <td>'.$email.'</td>
                            <td>'.$nghenghiep.'</td>
                            <td>'.$bhyt.'</td>
                         </tr>                      
                    ';
                    $i++;
                }
                echo '</table>';
                
            }else
            {
                echo "Không tìm thấy thông tin!";
            }
            break;
        case "3":
            $ex = $p->searchKB($key);
            $num = mysqli_num_rows($ex);
            if($num > 0)
            {
                echo '<h5 style="color: red;">Kết quả tìm kiếm thông tin đăng ký khám bệnh: '.$key.'</h5>';
                echo '<table width="1300" border="1" cellpadding="2" cellspacing="0">
                         <tr>
                             <th scope="col"><b>STT</b></th> 
                             <th scope="col"><b>Họ tên</b></th> 
                             <th scope="col"><b>SĐT</b></th>
                             <th scope="col"><b>Email</b></th>
                             <th scope="col"><b>Triệu chứng</b></th>
                             <th scope="col"><b>Chuyên khoa</b></th>
                             <th scope="col"><b>Bác sĩ</b></th>
                             <th scope="col"><b>Ca khám</b></th>
                             <th scope="col"><b>Ngày khám</b></th>
                             <th scope="col"><b>Phí dịch vụ</b></th>
                             <th scope="col"><b>Trạng thái thanh toán</b></th>
                             <th scope="col"><b>Ngày đặt</b></th>
                             <td width="10" valign="middle"><b>Hình thức</b></td>
                        </tr>';
                $i = 1;
                while($row = mysqli_fetch_array($ex))
                {
                    echo '
                         <tr>
                            <td>'.$i.'</td>
                            <td>'.$row['hoten'].'</td>
                            <td>'.$row['sdt'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['trieuchung'].'</td>
                            <td>'.$row['chuyenkhoa'].'</td>
                            <td>'.$row['bacsi'].'</td>
                            <td>'.$row['cakham'].'</td>
                            <td>'.$row['ngaykham'].'</td>
                            <td>'.$row['phidichvu'].'</td>
                            <td>'.$row['trangthaithanhtoan'].'</td>
                            <td>'.$row['ngaydat'].'</td>
                            <td>'.$row['hinhthuc'].'</td>
                         </tr>                      
                    ';
                    $i++;
                }
                echo '</table>';
                
            }else
            {
                echo "Không tìm thấy thông tin!";
            }
            break;
        case "4":
            $ex = $p->searchTC($key);
            $num = mysqli_num_rows($ex);
            if($num > 0)
            {
                $row = mysqli_fetch_array($ex);
                echo '<h5 style="color: red;">Kết quả tìm kiếm thông tin đăng ký tiêm chủng: '.$key.'</h5>';
                echo 'Họ tên:'.' '.$row['hoten'];
                echo '<br>';
                echo 'Giới tính:'.' '.$row['gioitinh'];
                echo '<br>';
                echo 'Ngày sinh:'.' '.$row['ngaysinh'];
                echo '<br>';
                echo 'SĐT:'.' '.$row['sdt'];
                echo '<br>';
                echo 'Email:'.' '.$row['email'];
                echo '<br>';
                echo 'Địa chỉ:'.' '.$row['diachi'];
                echo '<br>';
                echo 'Phòng bệnh:'.' '.$row['benh'];
                echo '<br>';
                echo 'Vaccin:'.' '.$row['vaccin'];
                echo '<br>';
                echo 'Xuất xứ:'.' '.$row['sanxuat'];
                echo '<br>';
                echo 'Giá:'.' '.number_format($row['gia']).' '.'VNĐ';
                echo '<br>';
                echo 'Ngày đăng ký:'.' '.$row['ngaydk'];
                echo '<br>';
                echo 'Trạng thái thanh toán:'.' '.$row['trangthai'];
                echo '<br>';
                echo 'Người phản hồi:'.' '.$row['phanhoi'];
                echo '<br>';
                echo 'Nội dung:'.' '.$row['noidung'];
                echo '<br>';
                echo 'Ngày gửi phản hồi:'.' '.$row['ngaygui'];
                echo '<br>';
                echo 'Kết quả:'.' '.$row['hoanthanh'];
                
                
            }else
            {
                echo "Không tìm thấy thông tin!";
            }
            break;
        default:
           echo "Đây là chức năng tìm kiếm!";
    }
    }
  }else{
    return 0;
  }
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">



