<?php
   include './models/admin/mTaiKhoan.php';
   class tb_QR_DKKB{
      public function insertQR($name,$phone,$email,$content,$date,$qrImg,$trangthai){
         $p = new data();
         $inQR = $p->insertQR($name,$phone,$email,$content,$date,$qrImg,$trangthai);
         return $inQR;
      }
   }
?>