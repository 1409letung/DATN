<?php
   include '../../models/mTK.php';
   $key = $_POST['ck'];
   $p = new modelTaiKhoanBS();
   $query = $p->getBacSi($key);
   $num = mysqli_num_rows($query);
   if($num > 0){
    echo "<option value=''>>--Hãy chọn bác sĩ--<</option>";
    while($row = mysqli_fetch_array($query)){
?>
    <option value="<?php echo $row['hoten']; ?>"><?php echo $row['hoten']; ?></option>
<?php
    }
   }else{
     echo '<option value="">Chuyên khoa này hiện chưa có bác sĩ làm việc!!!</option>';
   }
?>
