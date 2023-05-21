<?php
include 'connect.php';

class DataPDF{
    //lấy data đơn đăng ký khám bệnh
    public function getDKKB($id){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "SELECT * FROM `tb_ddkkb` INNER JOIN `tb_chuyenkhoa` ON `tb_ddkkb`.`maCk`= `tb_chuyenkhoa`.`maCk` WHERE `maDDKKB` = '$id'";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
    }

    //lấy data phiếu xét nghiệm máu
     public function getXNM($id)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * 
                        FROM `tb_phieuxetnghiem` AS `pxn` 
                            JOIN `tb_xetnghiemmau` AS `xnm`
                                ON `pxn`.`maPXN` = `xnm`.`maPXN`
                        WHERE `pxn`.`maPXN` = '$id'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    //lấy data phiếu xét nghiệm nước tiểu
    public function getXNNT($id)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * 
                        FROM `tb_phieuxetnghiem` AS `pxn` 
                            JOIN `tb_xetnghiemnuoctieu` AS `xnnt`
                            ON `pxn`.`maPXN` = `xnnt`.`maPXN`
                        WHERE `pxn`.`maPXN` = '$id'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    //lấy data phiếu xét nghiệm ung thư gan
    public function getXNUGT($id)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = " SELECT * 
                         FROM `tb_phieuxetnghiem` AS `pxn` 
                             JOIN `tb_xetnghiemutg` AS `xnutg`
                                ON `pxn`.`maPXN` = `xnutg`.`maPXN`
                         WHERE `pxn`.`maPXN` = '$id' ";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    //lấy data phiếu xét nghiệm vi sinh
    public function getXNVS($id)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * 
                        FROM `tb_phieuxetnghiem` AS `pxn` 
                           JOIN `tb_xetnghiemvisinh` AS `xnvs`
                               ON `pxn`.`maPXN` = `xnvs`.`maPXN`
                        WHERE `pxn`.`maPXN` = '$id' ";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
}