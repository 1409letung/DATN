<?php
   include '../../../models/mPay.php';
   $p = new updateTT();
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>VNPAY RESPONSE</title>
        <!-- Bootstrap core CSS -->
        <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="assets/thanhtoan.css" type="text/css">
        <!-- Custom styles for this template -->
        <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">         
        <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <?php
        require_once("./config.php");
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        ?>
        <!--Begin display -->
        <section class="section-return">
          <div class="form-box">
            <div class="form-value">
                <form action="" method="POST">
                    <h2>VNPAY RESPONSE</h2>
                    <div class="input-box-3">
                    <label >Mã đơn hàng: </label>
                    <label style="color:#fff;"><?php echo $_GET['vnp_TxnRef'] ?></label>
                    </div>
                    <div class="input-box-3">
                    <label >Số tiền: </label>
                    <?php $quydoi = $_GET['vnp_Amount']/100; ?>
                    <label style="color:#fff;"><?php echo number_format($_GET['vnp_Amount'],0,".")  ?> (<?php echo number_format($quydoi,0,"."); ?> VNĐ)</label>
                    </div>
                    <div class="input-box-3">
                    <label >Nội dung thanh toán:</label>
                    <label style="color:#fff;"><?php echo $_GET['vnp_OrderInfo'] ?></label>
                    </div>
                    <div class="input-box-3">
                    <label >Mã phản hồi (vnp_ResponseCode):</label>
                    <label style="color:#fff;"><?php echo $_GET['vnp_ResponseCode'] ?></label>
                    </div>
                    <div class="input-box-3">
                    <label >Mã GD Tại VNPAY:</label>
                    <label style="color:#fff;"><?php echo $_GET['vnp_TransactionNo'] ?></label>
                    </div>
                    <div class="input-box-3">
                    <label >Mã Ngân hàng:</label>
                    <label style="color:#fff;"><?php echo $_GET['vnp_BankCode'] ?></label>
                    </div>
                    <div class="input-box-3">
                    <label >Thời gian thanh toán:</label>
                    <label style="color:#fff;"><?php echo $_GET['vnp_PayDate'] ?></label>
                    </div>
                    <div class="input-box-3">
                    <label >Kết quả:</label>
                    <label>
                        <?php
                        $madh = $_GET['vnp_TxnRef'];
                        $tt = $_GET['vnp_Amount'];
                        $nd = $_GET['vnp_OrderInfo'];
                        $code = $_GET['vnp_ResponseCode'];
                        $gd = $_GET['vnp_TransactionNo'];
                        $nh = $_GET['vnp_BankCode'];
                        $tg = $_GET['vnp_PayDate'];
                        if ($secureHash == $vnp_SecureHash) {
                            if ($_GET['vnp_ResponseCode'] == '00') {
                                if($_SESSION['kttt'] > 0)
                                {
                                    $id = $madh;
                                    $query = $p->updateTTTC($id);
                                    if($query){
                                        echo "<span style='color:green'>Giao Dịch Thành Công</span>";
                                        echo '<br></br><a href="../../../index.php">Về Trang Chủ</a>';
                                    }else{
                                        echo "<span style='color:green'>Giao Dịch Thất Bại</span>";
                                        echo '<br></br><a href="../../../index.php">Về Trang Chủ</a>';
                                    }
                                }
                                else
                                {
                                    $id = $madh;
                                    $up = $p->updateTTTT($id);
                                    if($up){
                                        echo "<span style='color:white'>Giao Dịch Thành Công</span>";
                                        
                                        unset($_SESSION['cart']);   
                                        unset($_SESSION['order_id']);                                     
                                        unset($_SESSION['tongtien']);                                     
                                        unset($_SESSION['ten']);                                     
                                        unset($_SESSION['dt']);                                     
                                        unset($_SESSION['email']);
                                    }else{
                                       echo "<span style='color:red'>Giao Dịch Thất Bại!!!</span>";
                                    }
                                }
                                
                            } else {
                                echo "<span style='color:red'>GD Khong thanh cong</span>";
             
                                    unset($_SESSION['cart']);   
                                    unset($_SESSION['order_id']);                                     
                                    unset($_SESSION['tongtien']);                                     
                                    unset($_SESSION['ten']);                                     
                                    unset($_SESSION['dt']);                                     
                                    unset($_SESSION['email']);  
                            }
                        } else {
                            echo "<span style='color:red'>Chu ky khong hop le</span>";
                            echo '<br></br>';

                                    unset($_SESSION['cart']);   
                                    unset($_SESSION['order_id']);                                     
                                    unset($_SESSION['tongtien']);                                     
                                    unset($_SESSION['ten']);                                     
                                    unset($_SESSION['dt']);                                     
                                    unset($_SESSION['email']);  
                        }
                        ?>

                    </label>
                    </div>
                    <div class="register">
                    <p>&copy; VNPAY <?php echo date('Y')?></p>
                    <a href="../../../views/benhnhan/benhnhan.php">Trở Về Trang Chủ</a>
                    </div>
                </form>
            </div>
          </div>

    </section>
        <!-- <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">VNPAY RESPONSE</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label >Mã đơn hàng:</label>

                    <label><?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>    
                <div class="form-group">

                    <label >Số tiền:</label>
                    <label><?php echo $_GET['vnp_Amount'] ?></label>
                </div>  
                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã phản hồi (vnp_ResponseCode):</label>
                    <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã GD Tại VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Thời gian thanh toán:</label>
                    <label><?php echo $_GET['vnp_PayDate'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Kết quả:</label>
                    <label>
                        <?php
                        $madh = $_GET['vnp_TxnRef'];
                        $tt = $_GET['vnp_Amount'];
                        $nd = $_GET['vnp_OrderInfo'];
                        $code = $_GET['vnp_ResponseCode'];
                        $gd = $_GET['vnp_TransactionNo'];
                        $nh = $_GET['vnp_BankCode'];
                        $tg = $_GET['vnp_PayDate'];
                        if ($secureHash == $vnp_SecureHash) {
                            if ($_GET['vnp_ResponseCode'] == '00') {
                                if($_SESSION['kttt'] > 0)
                                {
                                    $id = $madh;
                                    $query = $p->updateTTTC($id);
                                    if($query){
                                        echo "<span style='color:green'>Giao Dịch Thành Công</span>";
                                        echo '<br></br><a href="../../../index.php">Về Trang Chủ</a>';
                                    }else{
                                        echo "<span style='color:green'>Giao Dịch Thất Bại</span>";
                                        echo '<br></br><a href="../../../index.php">Về Trang Chủ</a>';
                                    }
                                }
                                else
                                {
                                    $id = $madh;
                                    $up = $p->updateTTTT($id);
                                    if($up){
                                        echo "<span style='color:blue'>GD Thanh cong</span>";
                                        
                                        unset($_SESSION['cart']);   
                                        unset($_SESSION['order_id']);                                     
                                        unset($_SESSION['tongtien']);                                     
                                        unset($_SESSION['ten']);                                     
                                        unset($_SESSION['dt']);                                     
                                        unset($_SESSION['email']);
                                        echo '<br></br><a href="../../../views/benhnhan/benhnhan.php">Trở Về</a>';     
                                    }else{
                                       echo "<span style='color:red'>GD That bai!!!</span>";
                                    }
                                }
                                
                            } else {
                                echo "<span style='color:red'>GD Khong thanh cong</span>";
                                echo '<br></br><a href="../../../views/benhnhan/benhnhan.php">Trở Về</a>';
             
                                    unset($_SESSION['cart']);   
                                    unset($_SESSION['order_id']);                                     
                                    unset($_SESSION['tongtien']);                                     
                                    unset($_SESSION['ten']);                                     
                                    unset($_SESSION['dt']);                                     
                                    unset($_SESSION['email']);  
                            }
                        } else {
                            echo "<span style='color:red'>Chu ky khong hop le</span>";
                            echo '<br></br><a href="../../../views/benhnhan/benhnhan.php">Trở Về</a>';

                                    unset($_SESSION['cart']);   
                                    unset($_SESSION['order_id']);                                     
                                    unset($_SESSION['tongtien']);                                     
                                    unset($_SESSION['ten']);                                     
                                    unset($_SESSION['dt']);                                     
                                    unset($_SESSION['email']);  
                        }
                        ?>

                    </label>
                </div> 
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                   <p>&copy; VNPAY <?php echo date('Y')?></p>
            </footer>
        </div>   -->
    </body>
</html>
