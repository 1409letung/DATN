<?php
include '../../controllers/cTK.php';
$p = new controlNVTN();

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query = $p->get1LH($id);
    $row = mysqli_fetch_assoc($query);
}else{
    return 0;
}
?>

<form class="form-control" action="" method="POST" style="width: 80%; margin-left: 100px;">
<h4><i class="bi bi-repeat"></i></i> Thông tin phản hồi khách hàng</h4>
  
  <div class="form-group">
    <label for="exampleInputEmail1"> <b>Mã ĐLH:</b></label>
    <input type="text"  class="form-control"  value="<?php echo $id; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"> <b>Khách hàng:</b></label>
    <input type="text" class="form-control"  value="<?php echo $row['ten']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"> <b>SĐT:</b></label>
    <input type="text"  class="form-control"  value="<?php echo $row['sdt'];; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"> <b>Email người nhận</b></label>
    <input type="email"  class="form-control"  value="<?php echo $row['email']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><b>Nội dung</b></label>
    <textarea  id="" cols="30" rows="5" class="form-control"> <?php echo $row['noidung']; ?> </textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"> <b>Ngày nhận:</b></label>
    <input type="text" class="form-control"  value="<?php echo $row['ngaynhan']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"> <b>Người trả lời:</b></label>
    <input type="text" class="form-control"  value="<?php echo $row['nguoitraloi']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><b>Phản hồi</b></label>
    <textarea name="reply" id="" cols="30" rows="5" class="form-control"><?php echo $row['phanhoi']; ?></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"> <b>Ngày gửi:</b></label>
    <input type="text" class="form-control"  value="<?php echo $row['ngaygui']; ?>">
  </div>
  <div class="form-check">
    
  </div>
  <div class="form-group">
    <a href="NVTiepNhan.php?action=ql&query=lh" style="text-decoration: none;">
        <button type="button" class="btn btn-warning">
            <i class="bi bi-arrow-return-left"> Trở về</i>
        </button>
    </a>
  </div>

</form>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

<style>
    /* form{
        width: 50%;
        margin-left: 0px;
    } */
    h4{
       text-align: center; 
       color: #a232a8; 
       font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    b{
        color: blueviolet;
    }

    button{
        margin-left: 45%;
    }
</style>