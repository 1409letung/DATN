<?php
   include '../../../models/mDanhMucBaiDang.php';
   $p = new modelBaiDang();
   $idVC = $_POST['idVC'];
//    $xx = "Giá: ";
   $query = $p->getXXVC($idVC);
   $num = mysqli_num_rows($query);
   if($num > 0){
    while($row = mysqli_fetch_array($query)){
?>
    <input type="text" name="gia" value="<?php echo  $row['gia']; ?>" readonly style="font-weight: bold;color: forestgreen;">
<?php
    }
   }else{
     echo '<option value="">Không rõ nguồn gốc!!!</option>';
   }
?>


