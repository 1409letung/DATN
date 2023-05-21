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
<button type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#myModal">
   <i class="bi bi-newspaper"> Thêm danh mục mới</i>
</button>
<div class="modal" id="myModal">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header" style="background-color: bisque;"  >
                  <h4 class="modal-title" style="margin-left: 150px; color:#0033FF;"> <b>Danh mục mới</b></h4>
                  <button type="button" class="close" data-dismiss="modal" style="border-radius: 5px;border-color: white;">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
                  <form method="POST" action="" class="form-control">
                   <div class="form-group col-12">
                        <label for="User name">Tên danh mục:</label>
                           <input type="text" class="form-control" name="tendanhmuc" placeholder="">
                   </div>
                   </br>
                  <button name="them" value="submit" class="btn btn-primary" style="margin-left: 180px;"> Thêm</button>
                </form>
               </div>
            </div>
         </div>
</div>
<?php
  include '../../models/mDanhMucBaiDang.php';
  $p = new modelBaiDang();
  if(isset($_POST['them'])){
    $tendanhmuc = $_POST['tendanhmuc'];
    if(!$tendanhmuc){
         echo '<script> alert("Tên danh mục không được để trống!"); </script>';
    }else{
        $ex = $p->inDM($tendanhmuc);
        if($ex){
            unset($_POST['them']);
            echo '<script> alert("Thêm danh mục mới thành công!"); </script>';
            echo  '<meta http-equiv="refresh" content="url=admin.php?c=baiviet&qr=danhmuc">';
        }else{
            echo '<script> alert("Thêm danh mục mới thất bại!"); </script>';
            echo  '<meta http-equiv="refresh" content="url=admin.php?c=baiviet&qr=danhmuc">';
        }
    }
  }
?>
<br>
<br>
<!-- Danh sách danh mục  -->

<h4 style="text-align: center; color:forestgreen;">Danh sách danh mục</h4>
<table class="table table-sm bg-white rounded shadow-sm  table-hover col-3">
    <thead>
        <tr style="text-align: center;">
            <th scope="col">STT</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col"></th>
        </tr>
    </thead>
<?php 
  $row = $p->getDM();
  $i = 0;
  foreach($row as $rw){
    $i++
?>
    <tbody>
                <tr style="text-align: center;">
                <th><?php echo $i;?></th>
                <td><?php echo $rw['tendanhmuc'];?></td>
                <td>
                    <a href="?c=baiviet&qr=danhmuc&action=sua&id=<?php echo $rw['maDM'] ?>" style="text-decoration: none">
                       <button type="button"  value="submit" class="btn btn-warning btn-sm">
                         <i class="bi bi-pencil-square"> Sửa</i>
                       </button>
                    </a>
                    <a href="?c=baiviet&qr=danhmuc&action=xoa&id=<?php echo $rw['maDM'] ?>" style="text-decoration: none">
                       <button type="button" value="submit" class="btn btn-danger btn-sm">
                          <i class="bi bi-trash3-fill"> Xóa</i>
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
.button {
  background-color: green; /* Green */
  border: none;
  color: white;
  /* padding: 16px 32px; */
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  border-color: blue;
}

.button1 {
  background-color: white; 
  color: black; 
  /* border: 2px solid #4CAF50; */
  border-radius: 10px
}

.button1:hover {
  background-color: blueviolet;
  color: white;
}

.button2 {
  background-color: white; 
  color: black; 
  /* border: 2px solid #008CBA; */
  border-color: blue;
}

.button2:hover {
  background-color: blueviolet;
  color: blue;
}

 </style>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">