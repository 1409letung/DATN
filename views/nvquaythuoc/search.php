<?php 
    include '../../controllers/cTK.php';
    $connect = mysqli_connect("localhost", "root", "", "pk_da_lieu");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM tb_thuoc 
  WHERE tenthuoc LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM tb_thuoc ORDER BY maThuoc
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
 <h4 style="text-align: center; color:forestgreen;">Danh Sách Thuốc</h4>
 <table class="table bg-white rounded shadow-sm  table-hover col-4">
     <thead>
         <tr style="text-align: center;">
             <th scope="col">Mã Thuốc</th>
             <th scope="col">Tên Thuốc</th>
             <th scope="col">Số Lượng</th>
             <th scope="col">Giá</th>
             <th scope="col"> </th>
         </tr>
     </thead>
     <tbody>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr style="text-align: center;">
   <td>'.$row["maThuoc"].'</td>
    <td>'.$row["tenthuoc"].'</td>
    <td>'.$row["soluong"].'</td>
    <td>'.$row["gia"].'</td>
    <td><a href="?qlt=read&id='.$row['maThuoc'].'" style="text-decoration: none;">
    <button type="button" value="submit" class="btn btn-primary btn-sm" data-toggle="modal"
        data-target="xemchitiet">
        <i class="bi bi-eye-fill"> Cập Nhật</i>
    </button>
</a>
<a href="?qlt=delete&id='.$row['maThuoc'].'" style="text-decoration: none;">
    <button type="button" value="submit" class="btn btn-warning btn-sm" data-toggle="modal"
        data-target="xemchitiet">
        <i class="bi bi-calendar-x"> Xóa</i>
    </button>
</a></td>
   </tr>
  ';
 }
 $output.='</tbody';
 echo $output;
}
else
{
 echo 'Không Tìm Thấy Thuốc';
}
?>