<?php
 include '../../models/mDanhMucBaiDang.php';
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    //echo $id;
    $p = new modelBaiDang();
    $row = $p->getCTGT($id);
    $rs = mysqli_fetch_assoc($row);
  }else{
    return false;
  }
?>
<h4 style="text-align: center;">Chi tiết bài viết: <?php echo $id;?></h4>
<form >
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Tên bài viết:</label>
       <span type="text" class="form-control" id="fullName"><?php echo $rs['tendanhmuc']; ?></span>
    </div>
    <div class="form-group col-md-10">
      <label for="inputEmail4">Nội dung:</label>
       <textarea name="" id="" class="form-control" cols="30" rows="10"><?php echo $rs['noidung']; ?></textarea>
    </div>
    <div class="form-group col-md-4 .ml-md-auto">
      <label for="inputEmail4">Hình ảnh:</label>
       <img src="uploads/<?php echo $rs['hinhanh'];?>" alt="" class="form-control">
    </div>
    <br>
    <a href="?c=baiviet&qr=dichvu&action">
      <button type="button" name="close" class="btn btn-primary" style="margin-left: 900px;">Đóng</button>
    </a>
  
</form>
