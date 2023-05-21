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
<h4><i class="bi bi-journal-bookmark-fill"></i> Phản Hồi Liên Hệ Khách Hàng</h4>
  
  <div class="form-group">
    <label for="exampleInputEmail1"> <b>Mã ĐLH:</b></label>
    <input type="text" name="id" class="form-control"  value="<?php echo $id; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"> <b>Email người nhận</b></label>
    <input type="email" name="email" class="form-control"  value="<?php echo $row['email']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"><b>Tiêu đề</b></label>
    <input type="text" class="form-control" name="title" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><b>Nội dung</b></label>
    <textarea  id="" cols="30" rows="8" class="form-control"> <?php echo $row['noidung']; ?> </textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><b>Phản hồi</b></label>
    <textarea name="reply" id="" cols="30" rows="8" class="form-control"></textarea>
  </div>
  <div class="form-check">
    
  </div>
  <div class="form-group">
   <button type="submit" name="guimail" class="btn btn-danger">
    <i class="bi bi-envelope-check-fill"> Gửi</i>
   </button>
  </div>

</form>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/PHPMailer/src/Exception.php';
require '../../vendor/PHPMailer/src/PHPMailer.php';
require '../../vendor/PHPMailer/src/SMTP.php';
//include '../../controllers/cTK.php';

//Lấy tên người trả lời
if(isset($_SESSION['login']))
{
   $nguoitraloi = $_SESSION['login'];
}

//Gửi mail
if(isset($_POST['guimail']))
{
    $mail = new PHPMailer(true);
    //$p = new controlNVTN();

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'taothichmay8911@gmail.com'; //Your email
    $mail->Password = 'iidfmddfquoytheq'; //Your password email app
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('taothichmay8911@gmail.com'); //your email
    $mail->addAddress($_POST["email"]);
    
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);

    $mail->Subject = $_POST["title"];
    $mail->Body    = $_POST["reply"];

    $mail->send();

    $ngaygui = date("Y/m/d");
    
    //update data lien he
    $p->update1LH($_POST["id"],$nguoitraloi,$_POST["reply"],$ngaygui);
    echo "
       <script>
          alert('Đã gửi phản hồi cho khách hàng thành công!!');
          document.location.href = 'NVTiepNhan.php?action=ql&query=lh';
       </script>";
}
?>
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
       color:green; 
       font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    b{
        color: blueviolet;
    }

    button{
        margin-left: 45%;
    }
</style>
