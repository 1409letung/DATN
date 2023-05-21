<?php
    if(isset($_GET['id'])){
      $ex = $p->get1BV($id);
      $rw = mysqli_fetch_assoc($ex);
    }else{
        return 0;
    }
    
?>
<div class="col-lg-8 col-md-7 order-md-1 order-1">
    <div class="blog__details__text">
        <h2><?php echo $rw['tendanhmuc']; ?></h2>
        <p><?php  echo nl2br($rw['noidung']); ?></p>    
        <img src="views/admin/uploads/<?php echo $rw['hinhanh']; ?>" alt="Error_img!!">  
        <?php
          if($_GET['id'] == '6'){
            echo '<a href="?page=dichvu&tc" style="text-decoration: none">
                    <button type="button" name="dk" value="submit" class="btn btn-light">
                      Đăng ký tiêm chủng
                    </button>
                 </a>';
          }
        ?>
    </div>                    
</div>


<style>
    img{
        height: 50%;
        width: 100%;
        border-radius: 10px;
    }

    button{
        margin-left: 270px;
    }
</style>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


