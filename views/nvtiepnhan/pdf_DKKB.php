
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn Đăng Ký Khám Bệnh PDF</title>
    <link rel="stylesheet" href="">
    <style>
        @font-face 
        {
            font-family: 'DejaVu Sans';
            src: url('../../vendor/dompdf/lib/fonts/DejaVuSans.ttf') format('truetype');

        }

        body 
        {
        font-family: DejaVu Sans, sans-serif;
        }
</style>
</head>

<body>
    <h4 style="text-align: center;"> ĐƠN ĐĂNG KÝ KHÁM BỆNH </h4>
    <br>
    <br>
   <table>
    <tr>
        <td><b>Họ và tên: </b></td>
        <td> <?=$sql['hoten'] ?> </td>
    </tr>
    <tr>
        <td><b>SĐT: </b></td>
        <td> <?=$sql['sdt'] ?> </td>
    </tr>
    <tr>
        <td><b>Email: </b></td>
        <td> <?=$sql['email'] ?> </td>
    </tr>
    <tr>
        <td><b>Triệu chứng: </b></td>
        <td> <?=$sql['trieuchung'] ?> </td>
    </tr>
    <tr>
        <td><b>Chuyên khoa: </b></td>
        <td> <?=$sql['chuyenkhoa'] ?> </td>
    </tr>
    <tr>
        <td><b>Bác sĩ: </b></td>
        <td> <?=$sql['bacsi'] ?> </td>
    </tr>
    <tr>
        <td><b>Ngày khám: </b></td>
        <td> <?=$sql['ngaykham'] ?> </td>
    </tr>
    <tr>
        <td><b>Ca khám: </b></td>
        <td> <?=$sql['cakham'] ?> </td>
    </tr>
    <tr>
        <td><b>Phí dịch vụ: </b></td>
        <td style="color:green"> <?=number_format($sql['phidichvu'],0,".")."VND".' '.$sql['trangthaithanhtoan']?> </td>
    </tr>
   </table>
   <img src="../image/imgQR/<?=$sql['qrImg']?>" alt="Lỗi QR">
</body>
</html>

