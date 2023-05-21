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
?>
<button type="button" class="btn btn-success btn-sm"  data-toggle="modal" data-target="#myModal">
    <i class="bi bi-card-heading"> Thêm bài đăng mới</i>
</button>
<div class="modal" id="myModal">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header" style="background-color: bisque;"  >
                  <h4 class="modal-title" style="margin-left: 100px; color:#0033FF;"> <b>Thông tin bài đăng mới</b></h4>
                  <button type="button" class="close" data-dismiss="modal" style="border-radius: 5px;border-color: white;">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
                  <form method="POST" action="" class="form-control" enctype="multipart/form-data">
                   <div class="form-group col-12">
                        <label for="User name">Chọn danh mục:</label>
                        <select name="maDM" id="" class="form-control">
                            <?php
                                $row = $p->getDM();                                
                                foreach($row as $row){
                            ?>
                            <option value="<?php echo $row['maDM'] ?>"><?php echo $row['tendanhmuc'] ?></option>
                            <?php
                                 }
                            ?>
                        </select>
                   </div>
                   <div class="form-group col-12">
                        <label for="User name">Nội dung:</label>
                           <textarea name="noidung" id="" cols="30" rows="8" class="form-control"></textarea>
                   </div>
                   <div class="form-group col-12">
                        <label for="User name">Hình ảnh:</label>
                           <input type="file" class="form-control" name="hinhanh" placeholder="">
                   </div>
                   </br>
                  <button name="them" value="submit" class="btn btn-primary" style="margin-left: 180px;"> Thêm</button>
                </form>
               </div>
            </div>
         </div>
</div>
<?php
   if(isset($_POST['them'])){
    $maDM = $_POST['maDM'];
    $noidung = $_POST['noidung'];
    $tmp_name = $_FILES['hinhanh']['tmp_name'];
    $name = $_FILES['hinhanh']['name'];
    $folder = 'uploads/';
    if($maDM!='' && $noidung!='' && $name!=''){
        $name = time()."_".$name;
        if($p->upload($name,$tmp_name,$folder)==1){
            $ex = $p->inBD($maDM,$noidung,$name);
            if($ex){
                unset($_POST['them']);
                echo '<script> alert("Thêm bài đăng thành công!"); </script>';
                echo  '<meta http-equiv="refresh" content="url=admin.php?c=baiviet&qr=dichvu&action">';
            }else{
                echo '<script> alert("Thêm bài đăng thất bại!"); </script>';
                echo  '<meta http-equiv="refresh" content="url=admin.php?c=baiviet&qr=dichvu&action">';
            }
        }else{
            echo '<script> alert("Lỗi upload hình ảnh!"); </script>';
            echo  '<meta http-equiv="refresh" content="url=admin.php?c=baiviet&qr=dichvu&action">';
        }
    }else{
        echo '<script> alert("Vui lòng nhập đầy đủ thông tin!"); </script>';
    }

   }
?>
<br>
<!-- Danh sách bài viết chuyên mục giới thiệu -->
<div class="tt" style="text-align: center; color:forestgreen; width: auto;">
    <h5> &#9728;Danh sách bài đăng <i>Dịch Vụ</i>&#9728;</h5>
</div>

<table class="table bg-white rounded shadow-sm  table-hover col-4">
    <thead>
        <tr style="text-align: center;">
            <th scope="col">STT</th>
            <th scope="col">Bài viết</th>
            <!-- <th scope="col">Nội dung</th> -->
            <th scope="col">Hình ảnh</th>         
            <th scope="col">Thao tác</th>        
        </tr>
    </thead>
<?php
  $row = $p->getDV();
  $i = 0;
  foreach($row as $rw){
    $i++
?>
    <tbody>
                <tr style="text-align: center;">
                <th><?php echo $i;?></th>
                <th class="th"><?php echo $rw['tendanhmuc'];?></th>
                <!-- <th class="th"><?php //echo $rw['noidung'];?></th> -->
                <td class="td"> <img src="uploads/<?php echo $rw['hinhanh'];?>" alt="error_img" >  </td>
                <td>
                  <a href="?dv=xem&id=<?php echo $rw['maBD'] ?>" style="text-decoration: none">
                       <button type="button" value="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="xemchitiet">
                          <i class="bi bi-eye-fill"></i>
                       </button>
                    </a>

                    <a href="?dv=sua&id=<?php echo $rw['maBD'] ?>" style="text-decoration: none">
                       <button type="button"  value="submit" class="btn btn-primary btn-sm">
                         <i class="bi bi-pencil-square"></i>
                       </button>
                    </a>
                    
                    <a href="?dv=xoa&id=<?php echo $rw['maBD'] ?>" style="text-decoration: none">
                       <button type="button" value="submit" class="btn btn-success btn-sm">
                          <i class="bi bi-trash3-fill"></i>
                       </button>
                    </a>
                </td>
             </tr>
    </tbody>
<?php
  }
?>
</table> 
<style>
    .th{
        text-align: justify;
    }
    .td img{
        width: 150px;
        height: 100px;
        border-radius: 10px;
    }
</style>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">