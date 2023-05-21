<div class="bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
            class="fas fa-user-secret me-2"></i>Giám Đốc</div>
    <div class="list-group list-group-flush my-3">
        <a href="../../index.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                class="fas fa-tachometer-alt me-2"></i>Trang Chủ</a>
        <a href="Giamdoc.php?action=ql&query=xbn"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-user me-2"></i>Xem Thông Tin Bệnh Nhân</a>
                <a href="Giamdoc.php?action=ql&query=xbc"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-server me-2"></i>Xem Báo Cáo Đơn Đăng Ký Khám Bệnh</a>
                <a href="Giamdoc.php?action=ql&query=xbc1"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-server me-2"></i>Xem Báo Cáo Doanh Thu</a>
                <a href="Giamdoc.php?action=ql&query=xbc2"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-server me-2"></i>Xem Báo Cáo Nhân Viên</a>
                <a href="Giamdoc.php?action=ql&query=xnv"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-user me-2"></i>Xem Thông Tin Nhân Viên</a>
        <?php
        if(isset($_GET['logout'])&&$_GET['logout']==1){
           unset($_SESSION['login']);
           header('Location:../../index.php');
        }
?>
        <a href="Giamdoc.php?logout=1"
            class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                class="fas fa-power-off me-2"></i>Đăng xuất</a>
    </div>
</div>