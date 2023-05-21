<div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>Tiếp Nhận</div>
            <div class="list-group list-group-flush my-3">
                <a href="../../index.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Trang Chủ</a>
                <a href="NVTiepNhan.php?action=ql&query=dkkb" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-server me-2"></i>Đăng Ký Khám Bệnh Online</a>
                <a href="NVTiepNhan.php?action=ql&query=dkoff" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-home me-2"></i>Đăng Ký Khám Bệnh Offline </a>
                <a href="NVTiepNhan.php?action=ql&query=dktc" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-heartbeat me-2"></i>Quản Lý Tiêm Chủng</a>
                <a href="NVTiepNhan.php?action=ql&query=lh" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-envelope me-2"></i>Khách Hàng Liên hệ</a>
                <a href="NVTiepNhan.php?action=ql&query=xllv" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-calendar me-2"></i>Xem Lịch Làm Việc</a>        
                
<?php
        if(isset($_GET['logout'])&&$_GET['logout']==1){
           unset($_SESSION['login']);
           header('Location:../../index.php');
        }
?>
                <a href="NVTiepNhan.php?logout=1" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Đăng xuất</a>
            </div>
</div>
