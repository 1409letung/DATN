<?php
   include '../../controllers/cTK.php';
   if(isset($_GET['idca'])){
      $maCa = $_GET['idca'];
      //echo $idca;
      $p = new controllerTKBS();
      $row = $p->getLLV($maCa);
      $rs = mysqli_fetch_assoc($row);
   }
?>
<h4 style="text-align: center;color:#0000FF;">Cập nhật lịch làm việc số: <?php echo $maCa;?></h4>
<form method="POST">
  <div class="form-control">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Ca khám</label>
       <input type="text" class="form-control" name="ca" value="<?php echo $rs['cakham']; ?>">
    </div>
    <br>
  <button type="submit" name="update" class="btn btn-warning" style="text-align:center;">Cập nhật</button>
</form>

<?php
  if(isset($_POST['update'])){
    $ca         = $_POST['ca'];
    $kq = $p->updateLLV($maCa,$ca);
    if($kq){
            echo '<script> alert("Cập nhật lịch làm việc thành công!"); </script>';
            header("refresh:0;url='./bacsi.php?action=ql&query=ca'");
    }else{
            echo '<script> alert("Cập nhật lịch làm việc thất bại!"); </script>';
            header("refresh:0;url='./bacsi.php?action=ql&query=ca'");
     }
  }
?>
