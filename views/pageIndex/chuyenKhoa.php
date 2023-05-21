<section class="blog-details spad" style="padding-top: 130px;">
        <div class="container">
            <div class="row">
                <?php
                   include 'ChuyenKhoa/sidebar.php';
                ?>
                <?php
                   if(isset($_GET['id'])){
                     $id = $_GET['id'];
                     include 'ChuyenKhoa/content.php';
                   }else{
                    $id = '';
                   }
                ?>
            </div>
        </div>
</section>