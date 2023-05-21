<?php
   include '../../../models/mDanhMucBaiDang.php';
   $p = new modelBaiDang();
   $idVC = $_POST['idVC'];
  //  $xx = "Xuất xứ: ";
   $query = $p->getXXVC($idVC);
   $num = mysqli_num_rows($query);
   if($num > 0){
    while($row = mysqli_fetch_array($query)){
?>
    <input type="text" name="xuatxu" value="<?php echo  $row['sanxuat']; ?>" readonly style="font-weight: bold;color: forestgreen;">
<?php
    }
   }else{
     echo '<option value="">Không rõ nguồn gốc!!!</option>';
   }
?>
