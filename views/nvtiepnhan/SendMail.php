<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/PHPMailer/src/Exception.php';
require '../../vendor/PHPMailer/src/PHPMailer.php';
require '../../vendor/PHPMailer/src/SMTP.php';
include '../../controllers/cTK.php';

//Lấy tên người trả lời
if(isset($_SESSION['login']))
{
   $nguoitraloi = $_SESSION['login'];
}

//Gửi mail
if(isset($_POST['guimail']))
{
    $mail = new PHPMailer(true);
    $p = new controlNVTN();
   //  $mail->CharSet = "UTF-8";
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
    $p->update1LH($_POST["id"],$nguoitraloi,$_POST["reply"],$ngaygui);
    echo "
       <script>
          alert('Đã gửi phản hồi cho khách hàng thành công!!');
          document.location.href = 'NVTiepNhan.php?action=ql&query=lh';
       </script>";
}
?>