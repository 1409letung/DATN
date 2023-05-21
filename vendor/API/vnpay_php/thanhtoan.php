<?php
require_once("./config.php");
$n = 0;
$tt =0;
$t = 0;
$dt = 0;
$email = 0;
$kttt = 0;
session_start();
if(isset($_SESSION['order_id'])&&isset($_SESSION['dt'])&&isset($_SESSION['kttt'])&&isset($_SESSION['tongtien'])&&isset($_SESSION['ten'])&&isset($_SESSION['email']))
{
    $kttt = $_SESSION['kttt'];
    $n = $_SESSION['order_id'];
    $tt = $_SESSION['tongtien'];
    $t = $_SESSION['ten'];
    $dt = $_SESSION['dt'];
    $email = $_SESSION['email'];
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thanh Toán</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="assets/thanhtoan.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <section>
          <div class="form-box">
            <div class="form-value">
                <form action="vnpay_create_payment.php" id="create_form" method="post">
                    <h2>Thông Tin Thanh Toán</h2>
                    <div class="input-box-2">
                        <label>Loại Hoá Đơn</label>
                          <select name="order_type" id="order_type" class="form-select">
                            <option value="billpayment">Đặt Cọc</option>
                        </select>
                    </div>
                    <div class="input-box">
                    <ion-icon name="order-outline"></ion-icon>
                        <input  id="order_id" readonly name="order_id" type="text" value="<?php echo $n ?>">
                        <label for="">Mã hóa đơn</label>
                    </div>
                    <div class="input-box">
                    <ion-icon name="card-outline"></ion-icon>
                        <input id="amount" readonly
                               name="amount" type="number" value="<?php echo $tt; ?>">
                        <label for="">Số tiền</label>
                    </div>
                    <div class="input-box">
                    <ion-icon name="document-text-outline"></ion-icon>
                        <input id="order_desc" name="order_desc" placeholder=" " value="<?php echo "Thanh Toán Khám Bệnh" ?>">
                        <label for="">Nội Dung Thanh Toán:</label>
                    </div>
                    <div class="input-box-2">
                        <label>Chọn Ngân Hàng</label>
                        <select name="bank_code" id="bank_code" class="form-control">
                            <option value="">Không chọn</option>
                            <option value="VnPayQR"> Thanh toan VnPayQR</option>
                            <option value="NCB"> Ngan hang NCB</option>
                            <option value="AGRIBANK"> Ngan hang Agribank</option>
                            <option value="SCB"> Ngan hang SCB</option>
                            <option value="SACOMBANK">Ngan hang SacomBank</option>
                            <option value="EXIMBANK"> Ngan hang EximBank</option>
                            <option value="MSBANK"> Ngan hang MSBANK</option>
                            <option value="NAMABANK"> Ngan hang NamABank</option>
                            <option value="VNMART"> Vi dien tu VnMart</option>
                            <option value="VIETINBANK">Ngan hang Vietinbank</option>
                            <option value="VIETCOMBANK"> Ngan hang VCB</option>
                            <option value="HDBANK">Ngan hang HDBank</option>
                            <option value="DONGABANK"> Ngan hang Dong A</option>
                            <option value="TPBANK"> Ngân hàng TPBank</option>
                            <option value="OJB"> Ngân hàng OceanBank</option>
                            <option value="BIDV"> Ngân hàng BIDV</option>
                            <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                            <option value="VPBANK"> Ngan hang VPBank</option>
                            <option value="MBBANK"> Ngan hang MBBank</option>
                            <option value="ACB"> Ngan hang ACB</option>
                            <option value="OCB"> Ngan hang OCB</option>
                            <option value="IVB"> Ngan hang IVB</option>
                            <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                        </select>
                    </div>
                    <div class="input-box-2">
                        <label>Ngôn Ngữ</label>
                        <select name="language" id="language" class="form-control">
                            <option value="vn">Tiếng Việt</option>
                            <option value="en">English</option>
                        </select>
                    </div>
                    <div class="input-box">
                    <ion-icon name="hourglass-outline"></ion-icon>
                        <input class="form-control" id="txtexpire"
                               name="txtexpire" type="text" readonly value="<?php echo $expire; ?>"/>
                               <label >Thời hạn thanh toán</label>
                    </div>
                    <h2>Thông Tin Hoá Đơn (Billing)</h2>
                    <div class="input-box">
                    <ion-icon name="person-outline"></ion-icon>
                        <input class="form-control" placeholder="" id="txt_billing_fullname"
                               name="txt_billing_fullname" type="text" value="<?php echo $t; ?>"/>
                               <label >Họ tên (*)</label>  
                    </div>
                    <div class="input-box">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input class="form-control" placeholder="" id="txt_billing_email"
                               name="txt_billing_email" type="text" value="<?php echo $email; ?>"/>  
                               <label >Email (*)</label>  
                    </div>
                    <div class="input-box">
                    <ion-icon name="call-outline"></ion-icon>
                    <input class="form-control" placeholder="" id="txt_billing_mobile"
                               name="txt_billing_mobile" type="text" value="<?php echo $dt; ?>"/>  
                               <label >Số Điện Thoại (*)</label>  
                    </div>
                    <div class="input-box">
                    <ion-icon name="home-outline"></ion-icon>
                    <input class="home-control" id="txt_billing_addr1"
                               name="txt_billing_addr1" placeholder="" type="text" value=""/> 
                               <label >Địa Chỉ (*)</label>  
                    </div>
                    <div class="input-box">
                    <ion-icon name="business-outline"></ion-icon>
                    <input class="form-control" id="txt_bill_city"
                               name="txt_bill_city" placeholder="" type="text" value=""/> 
                               <label >Tỉnh/Thành Phố (*)</label>  
                    </div>
                    <div class="input-box">
                    <ion-icon name="flag-outline"></ion-icon>
                    <input class="form-control" placeholder="" id="txt_bill_country"
                               name="txt_bill_country" type="text" value="VN"/>
                               <label >Quốc Gia (*)</label>  
                    </div>
                    <h2>Thông tin HĐ điện tử (Invoice)</h2>
                    <div class="input-box">
                    <ion-icon name="person-outline"></ion-icon>
                    <input class="form-control" placeholder=" " id="txt_inv_customer"
                               name="txt_inv_customer" type="text" value="<?php echo $t; ?>"/>
                               <label >Tên Khách Hàng (*)</label>  
                    </div>
                    <div class="input-box">
                    <ion-icon name="home-outline"></ion-icon>
                    <input class="form-control" id="txt_inv_addr1"
                               name="txt_inv_addr1" type="text" placeholder="" value=""/>
                               <label >Địa Chỉ (*)</label>  
                    </div>
                    <div class="input-box">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input class="form-control" placeholder="" id="txt_inv_email"
                               name="txt_inv_email" type="text" value="<?php echo $email; ?>"/>
                               <label >Email (*)</label>  
                    </div>
                    <div class="input-box">
                    <ion-icon name="call-outline"></ion-icon>
                    <input class="form-control" placeholder="" id="txt_inv_mobile"
                               name="txt_inv_mobile" type="text" value="<?php echo $dt; ?>"/>
                               <label >Điện Thoại (*)</label>  
                    </div>
                     <button type="submit" class="btn btn-success" name="redirect" id="redirect" class="btn btn-default">THANH TOÁN</button>
                    <div class="register">
                        <a href="../../../index.php">Trở Về Trang Chủ</a>
                    </div>
                </form>
            </div>
          </div>

    </section>

    <!-- Checkout Section Begin -->

    
    <!-- Checkout Section End -->

    <!-- Footer Section Begin -->
    
    <!-- Footer Section End -->

    <!-- Js Plugins -->

 

</body>

</html>
