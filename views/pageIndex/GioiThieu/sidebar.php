<?php
    // include 'models/mDanhMucBaiDang.php';
    // $p = new modelBaiDang();
?>

<div class="col-lg-4 col-md-5 order-md-1 order-2">
    <div class="blog__sidebar">
        <div class="blog__sidebar__item">
            <h4>Giới Thiệu</h4>
                <ul>
                    <?php
                        $qr = $p->getAllDMGT();
                        foreach($qr as $row){
                        ?>
                            <li><a href="?page=gioithieu&id=<?php echo $row['maDM'] ?>"><?php echo $row['tendanhmuc'] ?></a></li>
                        <?php
                            }
                    ?>
            </ul>
        </div>                                               
    </div>
</div>
                