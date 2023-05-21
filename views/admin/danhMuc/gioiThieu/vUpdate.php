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
<h4 style="text-align: center;">Cập nhật bài viết: <?php echo $id;?></h4>
<form method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Tên bài viết:</label>
       <span type="text" class="form-control" id="fullName"><?php echo $rs['tendanhmuc']; ?></span>
    <div class="form-group col-md-12">
      <label for="inputEmail4">Nội dung:</label>
       <textarea name="noidung" id="" class="form-control" cols="30" rows="10"><?php echo $rs['noidung']; ?></textarea>
    </div>
    <div class="form-group col-md-13">
      <label for="inputEmail4">Hình ảnh:</label>
       <img src="uploads/<?php echo $rs['hinhanh'];?>" alt="" class="form-control">
       <input type="file" class="form-control" name="hinhanh" placeholder="">
    </div>
    <br>
    <button type="submit" name="update" class="btn btn-success">Cập nhật</button>
    <a href="?c=baiviet&qr=gioithieu&action">
      <button type="button" name="close" class="btn btn-primary" style="margin-left: 900px;">Đóng</button>
    </a>
</form>
<?php
  if(isset($_POST['update'])){
    $noidung = $_POST['noidung'];
    $tmp_name = $_FILES['hinhanh']['tmp_name'];
    $name = $_FILES['hinhanh']['name'];
    $folder = 'uploads/';
    if($noidung != ''){
       if($p->upload($name,$tmp_name,$folder)==1){
            $ex = $p->updateGT($id,$noidung,$name);
            if($ex){
                unset($_POST['update']);
                //echo '<script> alert("Cập nhật thành công!"); </script>';
                //echo  '<meta http-equiv="refresh" content="url=admin.php?c=baiviet&qr=gioithieu&action">';
                echo '<script> 
                        window.location.href="admin.php?c=baiviet&qr=gioithieu&action";
                        alert("Cập nhật thành công!");
                      </script>';
            }else{
                echo '<script> alert("Cập nhật thất bại!"); </script>';
                echo  '<meta http-equiv="refresh" content="url=admin.php?c=baiviet&qr=gioithieu&action">';
            }
        }else{
            echo '<script> alert("Lỗi upload hình ảnh!"); </script>';
            echo  '<meta http-equiv="refresh" content="url=admin.php?c=baiviet&qr=gioithieu&action">';
        }
    }else{
        echo '<script> alert("Nội dung không được để trống!!!"); </script>';
    }
  }
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
