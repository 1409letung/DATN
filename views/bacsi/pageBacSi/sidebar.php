<div class="bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
            class="fas fa-user-secret me-2"></i>Bác sĩ</div>
    <div class="list-group list-group-flush my-3">
        <a href="../../index.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                class="fas fa-tachometer-alt me-2"></i>Trang chủ</a>
        <a href="bacsi.php?action=ql&query=ca"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-map-marker-alt me-2"></i>Lịch làm việc</a>
        <a href="bacsi.php?action=show&query=listbenhnhan"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-project-diagram me-2"></i>Danh sách bệnh nhân</a>
        <a href="bacsi.php?c=qlkb&qr&action"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-chart-line me-2"></i>Quản lý khám bệnh</a>
        <!-- <a href="bacsi.php?action=ql&query=pxn"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-paperclip me-2"></i>Kết quả xét nghiệm</a>
        <a href="bacsi.php?action=ql&query=dthuoc"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-shopping-cart me-2"></i>Quản lý đơn thuốc</a> -->
        <!-- <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>Products</a>-->
        <!-- <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-comment-dots me-2"></i>Chat</a> -->
        <?php
        // ob_start();
        //session_start();
        if(isset($_GET['logout'])&&$_GET['logout']==1){
                unset($_SESSION['login']);
                header('Location:../../index.php');
        }
        ?>
        <a href="bacsi.php?logout=1"
            class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                class="fas fa-power-off me-2"></i>Đăng xuất</a>
    </div>
</div>