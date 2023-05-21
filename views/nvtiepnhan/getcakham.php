<?php
   include '../../models/mTK.php';
   $key = $_POST['nameBs'];
   $p = new modelTaiKhoanBS();
   $query = $p->getcakham($key);
   $num = mysqli_num_rows($query);
   if($num > 0){
    while($row = mysqli_fetch_array($query)){
?>
    <option value="<?php echo $row['cakham']; ?>"><?php echo $row['cakham']; ?></option>
<?php
    }
   }else{
     echo '<option value="">Bác sĩ này hiện chưa có lịch!!!</option>';
   }
?>
