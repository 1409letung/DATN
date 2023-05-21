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
    </div>                    
</div>
<style>
    img{
        height: 50%;
        width: 100%;
        border-radius: 10px;
    }
</style>