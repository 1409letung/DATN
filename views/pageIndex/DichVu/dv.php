<div class="col-lg-8 col-md-7 order-md-1 order-1">
<h1 class="heading"> <span>Dịch vụ</span> của chúng tôi</h1>
    <div class="box-container">
<?php
    $qr = $p->getAllDMDV();
    foreach($qr as $row)
    {
?>
        <div class="box">
            <i class="fas fa-notes-medical"></i> 
            <h3><?php echo $row['tendanhmuc'] ?></h3>
            <p></p>
            <a href="?page=dichvu&id=<?php echo $row['maDM'] ?>" class="btn"> Xem Thêm <span class="fas fa-chevron-right"></span> </a>
                      
    </div>
<?php
    }
?> 
    </div>
</div>
