<section class="services" id="services" style="padding-top: 130px;">

    <div class="container">
        <div class="row">
            <?php
                include 'DichVu/sidebar.php';
            ?>
                <?php
                    if(isset($_GET['id'])){
                       $id = $_GET['id'];
                       include 'DichVu/content.php';
                   }
                   elseif(isset($_GET['tc'])){
                    include 'DichVu/vDKTiemChung.php';
                   }
                   else{
                       include 'DichVu/dv.php';
                   }

                   
                ?>
        </div>
    </div>
</section>