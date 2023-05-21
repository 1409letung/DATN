<section class="blog-details spad" style="padding-top: 130px;">
        <div class="container">
            <div class="row">
                <?php
                   include 'GioiThieu/sidebar.php';
                ?>
                <?php
                   if(isset($_GET['id'])){
                     $id = $_GET['id'];
                     include 'GioiThieu/content.php';
                   }else{
                    $id = '';
                   }
                ?>
            </div>
        </div>
</section>