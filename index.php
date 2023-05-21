<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Phòng Khám Đa Khoa Tùng Thịnh </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="views/css/styleHomePage.css">
    <link rel="stylesheet" href="views/css/menu.css">
    <link rel="stylesheet" href="views/css/gioithieu.css">
    <link rel="stylesheet" href="views/css/lienhe.css">
    <link rel="stylesheet" href="views/css/submenu.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
    input[type=text] {
        width: 150px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        transition: width 0.4s ease-in-out;
    }

    input[type=text]:focus {
        width: 100%;
    }
    </style>
</head>

<body>

    <?php
    session_start();
    include 'models/mDanhMucBaiDang.php';
    $p = new modelBaiDang();
?>
    <!-- header section starts  -->
    <header class="header">

        <a href="index.php" class="logo"> <i class="fas fa-heartbeat"></i> Tùng Thịnh </a>
        <div class="navbar">
            <a href="#" data-toggle="modal" data-target="#modalsearch"><i class="fa fa-search"></i></a>
            <a href="index.php">Trang Chủ</a>
            <div class="dropdown">
                <a class="nut_dropdown" href="?page=gioithieu">Giới Thiệu</a>
                <div class="noidung_dropdown">
                    <?php
        $qr = $p->getAllDMGT();
        foreach($qr as $row)
        {
        ?>
                    <a href="?page=gioithieu&id=<?php echo $row['maDM'] ?>"><?php echo $row['tendanhmuc'] ?></a>
                    <?php
        }
        ?>
                </div>
            </div>
            <div class="dropdown">

                <a class="nut_dropdown" href="?page=dichvu">Dịch Vụ</a>
                <div class="noidung_dropdown">
                    <?php
        $qr = $p->getAllDMDV();
        foreach($qr as $row)
        {
        ?>
                    <a href="?page=dichvu&id=<?php echo $row['maDM'] ?>"><?php echo $row['tendanhmuc'] ?></a>
                    <?php
        }
        ?>
                </div>
            </div>
            <div class="dropdown">
                <a class="nut_dropdown" href="?page=chuyenkhoa">Chuyên Khoa</a>
                <div class="noidung_dropdown">
                    <?php
        $qr = $p->getAllDMCK();
        foreach($qr as $row)
        {
        ?>
                    <a href="?page=chuyenkhoa&id=<?php echo $row['maDM'] ?>"><?php echo $row['tendanhmuc'] ?></a>
                    <?php
        }
        ?>
                </div>
            </div>
            <a href="?page=bacsi">Bác sĩ</a>
            <a href="?page=lienhe">Liên Hệ</a>
            <!-- <a href="#book">book</a> -->
            <a href="?page=lichkham">Đặt lịch khám</a>
            <?php
            if(isset($_SESSION['login']))
            {
            // session_destroy();
            if($_SESSION['role']==1)
                {
                    echo '<a href="views/admin/admin.php"><i class="bi bi-person-circle"></i> '.$_SESSION['login'].'</a>';
                }elseif($_SESSION['role']==2)
                {
                    echo '<a href="views/bacsi/bacsi.php"><i class="bi bi-person-circle"></i> '.$_SESSION['login'].'</a>';
                }elseif($_SESSION['role']==3)
                {
                    echo '<a href="views/yta/yta.php"><i class="bi bi-person-circle"></i> '.$_SESSION['login'].'</a>';
                }elseif($_SESSION['role']==4)
                {
                    echo '<a href="views/benhnhan/benhnhan.php"><i class="bi bi-person-circle"></i> '.$_SESSION['login'].'</a>';
                }elseif($_SESSION['role']==5)
                {
                    echo '<a href="views/nvtiepnhan/NVTiepNhan.php"><i class="bi bi-person-circle"></i> '.$_SESSION['login'].'</a>';
                }elseif($_SESSION['role']==6)
                {
                    echo '<a href="views/nvxetnghiem/NVXetNghiem.php"><i class="bi bi-person-circle"></i> '.$_SESSION['login'].'</a>';
                }elseif($_SESSION['role']==7)
                {
                    echo '<a href="views/giamdoc/Giamdoc.php"><i class="bi bi-person-circle"></i> '.$_SESSION['login'].'</a>';
                }elseif($_SESSION['role']==8)
                {
                    echo '<a href="views/nvql/NvQuanLy.php"><i class="bi bi-person-circle"></i> '.$_SESSION['login'].'</a>';
                }
                elseif($_SESSION['role']==9)
                {
                    echo '<a href="views/nvquaythuoc/NVQT.php"><i class="bi bi-person-circle"></i> '.$_SESSION['login'].'</a>';
                }
            }    
            else
            {
                echo '<a href="register.php">Đăng ký</a>';
                echo '<a href="login.php">Đăng nhập</a>';
            }
        ?>

        </div>



        <div id="menu-btn" class="fas fa-bars"></div>

    </header>


    <?php
   if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = '';
}
if($page == ''){
    include_once 'views/pageIndex/trangChu.php';
}elseif($page == 'dichvu'){
    include_once 'views/pageIndex/dichVu.php';
}
elseif($page == 'bacsi'){
    include_once 'views/pageIndex/bacSi.php';
}
elseif($page == 'lichkham'){
    include_once 'views/pageIndex/lichKham.php';
}
elseif($page == 'gioithieu'){
    include_once 'views/pageIndex/gioiThieu.php';
}
elseif($page == 'chuyenkhoa'){
    include_once 'views/pageIndex/chuyenKhoa.php';
}
elseif($page == 'lienhe'){
    include_once 'views/pageIndex/lienHe.php';
}

// end tài khoản
?>

    <!-- about section ends -->

    <!-- doctors section starts  -->



    <!-- doctors section ends -->

    <!-- booking section starts   -->






    <!-- footer section ends -->
    <section class="footer">

        <div class="box-container">

            <!-- <div class="box">
            <h3>quick links</h3>
            <a href="#"> <i class="fas fa-chevron-right"></i> home </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> services </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> about </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> doctors </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> book </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> review </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> blogs </a>
        </div> -->

            <!--  <div class="box">
            <h3>our services</h3>
            <a href="#"> <i class="fas fa-chevron-right"></i> dental care </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> message therapy </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> cardioloty </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> diagnosis </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> ambulance service </a>
        </div> -->

            <div class="box">
                <h3>Thông Tin Liên Hệ</h3>
                <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
                <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
                <a href="#"> <i class="fas fa-envelope"></i> tungle82149@gmail.com </a>
                <a href="#"> <i class="fas fa-envelope"></i> thinhtran15621562@gmail.com </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> Ho Chi Minh City, VietNam - 400104 </a>
            </div>

            <div class="box">
                <h3>Theo Dỗi Chúng Tôi</h3>
                <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
                <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
                <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
                <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
                <a href="#"> <i class="fab fa-pinterest"></i> pinterest </a>
            </div>

        </div>

        <div class="credit"> Website được tạo bởi <span>Lê Tùng Và Hồng Thịnh</span> | đồ án tốt nghiệp | IUH - IS -
            DHHTTT15A</div>

    </section>
    <!-- custom js file link  -->
    <script src="views/js/script.js"></script>

    <div class="modal" id="modalsearch">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <form>
                        <input type="text" name="search" placeholder="Tìm Kiếm...">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary">Tìm Kiếm</button>
                </div>
            </div>
        </div>
    </div>
    </div>



</body>

</html>