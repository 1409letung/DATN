<?php
if(!empty($_FILES["excel_file"]))
{
  $con = mysqli_connect('localhost','root','','pk_da_lieu');
  $file_array = explode(".", $_FILES["excel_file"]["name"]);
  if($file_array[1] == "xlsx")
  {
    include '../../vendor/PHPExcel/Classes/PHPExcel/IOFactory.php';
    if($file_array[0] == "XNM")
    {
       $output = '';  
       $output .= "<div class='container-lg'>  
           <h2><p style='color: green;text-align: center;'>Dữ liệu đã được cập nhật vào hệ thống!!</p></h2>
           <div class='mx-auto'>
                <table class='table table-light table-striped' style='align-item:center;'>
                <thead>  
                     <tr>  
                          <th>Công thức máu</th>  
                          <th>Kết quả xét nghiệm</th>  
                          <th>Trị số bình thường</th>  
                          <th>Đơn vị</th>  
                     </tr>
               </thead>
              <tbody>     
                     "; 
       $object = PHPExcel_IOFactory::load($_FILES["excel_file"]["tmp_name"]);
       foreach($object->getWorksheetIterator() as $worksheet)  
           {  
                $highestRow = $worksheet->getHighestRow();  
                for($row=4; $row<=$highestRow; $row++)  
                {  
                     $maPXN = $_POST["id"];
                     $ctm = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(0, $row)->getValue());  
                     $kqxn = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(1, $row)->getValue());  
                     $tsbt = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(2, $row)->getValue());  
                     $dv = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(3, $row)->getValue());                       
                     $query = "  
                     INSERT INTO `tb_xetnghiemmau`  
                     (maPXN, congthucmau, ketquaxetnghiem, chisobinhthuong, donvi)   
                     VALUES ('".$maPXN."', '".$ctm."', '".$kqxn."', '".$tsbt."', '".$dv."')  
                     ";  
                     mysqli_query($con, $query);  
                     $output .= '  
                     <tr>  
                          <td>'.$ctm.'</td>  
                          <td>'.$kqxn.'</td>  
                          <td>'.$tsbt.'</td>  
                          <td>'.$dv.'</td>  
                     </tr>  
                     ';  
                }  
           } 
           $maPXN = $_POST["id"];
           $mauXN = $_POST['mxn'];
           $day  = $_POST['day'];
           $nth  = $_POST['nth'];
           $qr = "UPDATE `tb_phieuxetnghiem` SET `mauXN`='$mauXN', `ngaythuchien`='$day', `nguoithuchien`='$nth' WHERE `maPXN`='$maPXN'";
           mysqli_query($con, $qr);
           $output .= '</tbody></table></div></div>';  
           echo $output;   
    }
    elseif($file_array[0] == "XNNT")
    {
       $output = '';  
       $output .= "<div class='container-lg'>  
          <h2><p style='color: green;text-align: center;'>Dữ liệu đã được cập nhật vào hệ thống!!</p></h2>
           <div class='mx-auto'>
                <table class='table table-light table-striped' style='align-item:center;'>
                <thead>  
                     <tr>  
                          <th>Thông số</th>  
                          <th>Kết quả xét nghiệm</th>  
                          <th>Chỉ số bình thường</th>   
                     </tr>
               </thead>
              <tbody>     
                     "; 
       $object = PHPExcel_IOFactory::load($_FILES["excel_file"]["tmp_name"]);
       foreach($object->getWorksheetIterator() as $worksheet)  
           {  
                $highestRow = $worksheet->getHighestRow();  
                for($row=4; $row<=$highestRow; $row++)  
                {  
                     $maPXN = $_POST["id"];
                     $ts = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(0, $row)->getValue());  
                     $kqxn = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(1, $row)->getValue());  
                     $csbt = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(2, $row)->getValue());                         
                     $query = "  
                     INSERT INTO `tb_xetnghiemnuoctieu`  
                     (maPXN, thongso, ketqua, chisobinhthuong)   
                     VALUES ('".$maPXN."', '".$ts."', '".$kqxn."', '".$csbt."')  
                     ";  
                     mysqli_query($con, $query);  
                     $output .= '  
                     <tr>  
                          <td>'.$ts.'</td>  
                          <td>'.$kqxn.'</td>  
                          <td>'.$csbt.'</td>  
                     </tr>  
                     ';  
                }  
           } 
           $maPXN = $_POST["id"];
           $mauXN = $_POST['mxn'];
           $day  = $_POST['day'];
           $nth  = $_POST['nth'];
           $qr = "UPDATE `tb_phieuxetnghiem` SET `mauXN`='$mauXN', `ngaythuchien`='$day', `nguoithuchien`='$nth' WHERE `maPXN`='$maPXN'";
           mysqli_query($con, $qr); 
           $output .= '</tbody></table></div></div>';  
           echo $output;   
    } 
    elseif($file_array[0] == "XNUTG")
    {
       $output = '';  
       $output .= "<div class='container-lg'>  
          <h2><p style='color: green;text-align: center;'>Dữ liệu đã được cập nhật vào hệ thống!!</p></h2>
           <div class='mx-auto'>
                <table class='table table-light table-striped' style='align-item:center;'>
                <thead>  
                     <tr>  
                          <th>Mã MD</th>  
                          <th>Xét nghiệm</th> 
                          <th>Kết quả</th>   
                          <th>Chỉ số bình thường</th> 
                          <th>Đơn vị</th>    
                     </tr>
               </thead>
              <tbody>     
                     "; 
       $object = PHPExcel_IOFactory::load($_FILES["excel_file"]["tmp_name"]);
       foreach($object->getWorksheetIterator() as $worksheet)  
           {  
                $highestRow = $worksheet->getHighestRow();  
                for($row=3; $row<=$highestRow; $row++)  
                {  
                    $maPXN = $_POST["id"];
                    $maMD = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(0, $row)->getValue());  
                    $xn = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(1, $row)->getValue());  
                    $kq = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(2, $row)->getValue()); 
                    $csbt = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(3, $row)->getValue());                         
                    $dv = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(4, $row)->getValue());                         
                     $query = "  
                     INSERT INTO `tb_xetnghiemutg`  
                     (maPXN, maMD, xetnghiem, ketqua, chisobinhthuong, donvi)   
                     VALUES ('".$maPXN."', '".$maMD."', '".$xn."', '".$kq."', '".$csbt."', '".$dv."')  
                     ";  
                     mysqli_query($con, $query);  
                     $output .= '  
                     <tr>  
                          <td>'.$maMD.'</td>  
                          <td>'.$xn.'</td>  
                          <td>'.$kq.'</td> 
                          <td>'.$csbt.'</td> 
                          <td>'.$dv.'</td>  
                     </tr>  
                     ';  
                }  
           }
           $maPXN = $_POST["id"];
           $mauXN = $_POST['mxn'];
           $day  = $_POST['day'];
           $nth  = $_POST['nth'];
           $qr = "UPDATE `tb_phieuxetnghiem` SET `mauXN`='$mauXN', `ngaythuchien`='$day', `nguoithuchien`='$nth' WHERE `maPXN`='$maPXN'";
           mysqli_query($con, $qr);  
           $output .= '</tbody></table></div></div>';  
           echo $output;   
    }
    elseif($file_array[0] == "XNVS")
    {
        $output = '';  
       $output .= "<div class='container-lg'>  
         <h2><p style='color: green;text-align: center;'>Dữ liệu đã được cập nhật vào hệ thống!!</p></h2>
           <div class='mx-auto'>
                <table class='table table-light table-striped' style='align-item:center;'>
                <thead>  
                     <tr>  
                          <th>Kháng sinh</th>  
                          <th>S</th> 
                          <th>I</th>   
                          <th>R</th>    
                     </tr>
               </thead>
              <tbody>     
                     "; 
       $object = PHPExcel_IOFactory::load($_FILES["excel_file"]["tmp_name"]);
       foreach($object->getWorksheetIterator() as $worksheet)  
           {  
                $highestRow = $worksheet->getHighestRow();  
                for($row=3; $row<=$highestRow; $row++)  
                {  
                    $maPXN = $_POST["id"];
                    $khangSinh = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(0, $row)->getValue());  
                    $S = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(1, $row)->getValue());  
                    $I = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(2, $row)->getValue()); 
                    $R = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(3, $row)->getValue());                         
               
                     $query = "  
                     INSERT INTO `tb_xetnghiemvisinh`  
                     (maPXN, khangsinh, S, I, R)   
                     VALUES ('".$maPXN."', '".$khangSinh."', '".$S."', '".$I."', '".$R."')  
                     ";  
                     mysqli_query($con, $query);  
                     $output .= '  
                     <tr>  
                          <td>'.$khangSinh.'</td>  
                          <td>'.$S.'</td>  
                          <td>'.$I.'</td> 
                          <td>'.$R.'</td> 
                     </tr>  
                     ';  
                }  
           }  
           $maPXN = $_POST["id"];
           $mauXN = $_POST['mxn'];
           $day  = $_POST['day'];
           $nth  = $_POST['nth'];
           $qr = "UPDATE `tb_phieuxetnghiem` SET `mauXN`='$mauXN', `ngaythuchien`='$day', `nguoithuchien`='$nth' WHERE `maPXN`='$maPXN'";
           mysqli_query($con, $qr);
           $output .= '</tbody></table></div></div>';  
           echo $output;   
    }
  }
  else
  {
    echo ' <script>alert(`Vui lòng chọn file  ".xlsx" `);</script>;';
   
  }
}

