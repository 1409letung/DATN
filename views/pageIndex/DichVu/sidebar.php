<?php
    // include 'models/mDanhMucBaiDang.php';
    // $p = new modelBaiDang();
?>

<div class="col-lg-4 col-md-5 order-md-1 order-2">
    <div class="blog__sidebar">
        <div class="blog__sidebar__item">
            <h4>Các dịch vụ</h4>
                <ul>
                    <?php
                        $qr = $p->getAllDMDV();
                        foreach($qr as $row){
                        ?>
                            <li><a href="?page=dichvu&id=<?php echo $row['maDM'] ?>"><?php echo $row['tendanhmuc'] ?></a></li>
                        <?php
                            }
                    ?>
            </ul>
        </div>                                               
    </div>
</div>
                