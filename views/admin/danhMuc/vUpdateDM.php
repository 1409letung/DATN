<a href="?c=baiviet&qr=danhmuc&action" style="text-decoration: none">
    <button type="button" value="submit" class="btn btn-primary btn-sm">
       <i class="bi bi-list"> Danh Mục</i>
    </button>
</a>

<a href="?c=baiviet&qr=gioithieu&action" style="text-decoration: none">
    <button type="button" value="submit" class="btn btn-warning btn-sm">
        <i class="bi bi-grid-1x2-fill"> Giới Thiệu</i>
    </button>
</a>
<a href="?c=baiviet&qr=dichvu&action" style="text-decoration: none">
    <button type="button" value="submit" class="btn btn-success btn-sm">
        <i class="bi bi-chat-left-heart-fill"> Dịch vụ</i>
    </button>
</a>
<a href="?c=baiviet&qr=chuyenkhoa&action" style="text-decoration: none">
    <button type="button" value="submit" class="btn btn-danger btn-sm">
       <i class="bi bi-microsoft-teams"> Chuyên Khoa</i>
    </button>
</a>
<hr>
<?php
    include '../../models/mDanhMucBaiDang.php';
    $p = new modelBaiDang();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $dm = $p->get1DM($id);
        $row = mysqli_fetch_assoc($dm);
    }else{
        return false;
    }
?>

<h4 style="text-align: center;">Danh mục số: <?php echo $id;?></h4>
<form method="POST">
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputEmail4">Tên danh mục:</label>
       <input type="text" class="form-control" value="<?php echo $row['tendanhmuc']; ?>" name="tendanhmuc">
    </div>
    <br>
  <button type="submit" name="up" class="btn btn-primary" style="margin-left: 0px;">Cập nhật</button>
  <a href="?c=baiviet&qr=danhmuc&action">
    <button type="button" class="btn btn-dark" style="margin-left: 262px;">Đóng</button>
  </a>
</form>
<?php
  if(isset($_POST['up'])){
    $tendanhmuc = $_POST['tendanhmuc'];
    if(!$tendanhmuc){
        echo '<script> alert("Tên danh mục không được để trống!"); </script>';
    }else{
        $ex = $p->upDM($id, $tendanhmuc);
        if($ex){
            unset($_POST['up']);
            echo '<script> 
                       window.location.href="admin.php?c=baiviet&qr=danhmuc&action";
                       alert("Đã cập nhật tên danh mục thành công!"); 
                  </script>';
        }else{
            echo '<script> 
                       window.location.href="admin.php?c=baiviet&qr=danhmuc&action";
                       alert("Cập nhật tên danh mục thất bại!"); 
                  </script>';
        }
    }
  }
?>

