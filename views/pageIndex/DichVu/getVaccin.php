<?php
   include '../../../models/mDanhMucBaiDang.php';
   $p = new modelBaiDang();
   $name = $_POST['name'];
   $query = $p->getVaccin($name);
   $num = mysqli_num_rows($query);
   if($num > 0){
    echo "<option value=''>>--Hãy chọn bệnh muốn tiêm phòng--<</option>";
    while($row = mysqli_fetch_array($query)){
?>
    <option value="<?php echo $row['tenvaccin']; ?>"><?php echo $row['tenvaccin']; ?></option>
<?php
    }
   }else{
     echo '<option value="">Tạm thời chưa có vaccin!!!</option>';
   }
?>
