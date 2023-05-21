<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn Đăng Ký Khám Bệnh PDF</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="../js/jquery-3.6.1.js">

    </script>
    <style>
    @font-face {
        font-family: 'DejaVu Sans';
        src: url('../../vendor/dompdf/lib/fonts/DejaVuSans.ttf') format('truetype');

    }

    body {
        font-family: DejaVu Sans, sans-serif;
    }

    .logo {
        float: left;
        width: 150px;
    }

    .thongtin {
        float: left;
    }

    .chxh {
        text-align: center;
    }

    nav {
        text-align: right;
    }

    .tble {
        margin-left: 75px;
    }

    .qrimg {
        margin-top: 50px;
        margin-left: 75px;
        float: left;
    }

    .chuky {
        float: left;
        margin-top: 50px;
        margin-left: 250px;

    }

    .text {
        width: 500px;
        height: auto;
    }

    .text textarea {
        width: 500px;
        border: none;
        font-family: DejaVu Sans, sans-serif;
        white-space: pre-line;
        overflow-x: auto;
        overflow-y: auto;
        resize: none;
    }

    .form-group {
        width: 300px;
    }

    .form-items {
        width: 150px;
        height: auto;
        text-align: center;
    }
    </style>

</head>

<body>
    <header>

        <img class="logo"
            src="data:image/png;base64,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">
        <b>Bệnh Viện Đa Khoa Tùng-Thịnh</b>
        <br>
        <b>Địa Chỉ: Ho Chi Minh City ||</b>
        <b>SĐT: 011-223-344</b>
        <hr>
        <div class="chxh">
            <b> CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM </b><br>
            <u>Độc lập - Tự do - Hạnh phúc</u>
        </div>

    </header>
    <br>
    <nav>
        <?php
           //$date = $sql['ngaydat'];
           list($year, $month, $day) = explode('-', $sql['ngaydat']); 
           echo "Ngày $day, tháng $month năm $year";
        ?>
    </nav>
    <main>
        <h4 style="text-align: center;"> ĐƠN ĐĂNG KÝ KHÁM BỆNH </h4>
        <br>

        <table class="tble">
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
                <td class="td-text">
                    <div class="text">
                        <p> <?=nl2br($sql['trieuchung']) ?></p>

                    </div>
                </td>

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
                <td style="color:green">
                    <?=number_format($sql['phidichvu'],0,".")."VND".' '.$sql['trangthaithanhtoan']?> </td>
            </tr>

        </table>

        <?php
$path = ''.$sql['qrImg'].'';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>

    </main>
    <div class="" style="width:650px; margin-left:75px;">
        <h5 style="text-align:justify; font-weight:none; ">
            Phòng khám đa khoa Tùng Thịnh gửi lời cảm ơn chân thành đến quý khách vì đã tin tưởng và sử dụng
            dịch vụ đăng ký khám bệnh online của phòng khám đa khoa chúng tôi.<br>

            Chúng tôi rất hân hạnh được phục vụ và cung cấp cho anh/chị những dịch vụ y tế chất lượng cao nhất
            với đội ngũ bác sĩ, y tá và nhân viên phục vụ nhiệt tình và chuyên nghiệp.<br>

            Sự hài lòng của anh/chị là động lực lớn để chúng tôi tiếp tục cải thiện và hoàn thiện hơn nữa dịch
            vụ của mình. Một lần nữa, xin chân thành cảm ơn và hy vọng sớm được gặp anh/chị tại phòng khám.<br>

            Trân trọng,<br>

            Phòng khám đa khoa Tùng Thịnh.
        </h5>
    </div>
    <footer>
        <footer style="margin-top: -75px;">
            <div class="footer">
                <div class="qrimg">
                    <h5 style="margin-left:50px;">Mã QR</h5>
                    <img src="<?php echo $base64 ?>" alt="ERROR IMG" width="150px" height="150px" />
                </div>
                <div class="chuky">
                    <h5>Chữ Ký</h5>
                </div>


        </footer>
</body>

</html>