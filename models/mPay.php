<?php
 include 'connect.php';
 class updateTT{
    //update trạng thái thanh toán đơn đăng ký khám bệnh
    public function updateTTTT($id){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "UPDATE `tb_ddkkb` SET `trangthaithanhtoan` = 'Đã Thanh Toán', `trangthai`='Đã duyệt' WHERE `tb_ddkkb`.`maDDKKB` = '$id';";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
   }

   //update trạng thái thanh toán đăng ký tiêm chủng 
   public function updateTTTC($id){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "UPDATE `tb_dktc` SET `trangthai` = 'Đã thanh toán' WHERE `tb_dktc`.`maDKTC` = '$id';";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
   }
 }
?>