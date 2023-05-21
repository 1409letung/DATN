<?php
   include 'connect.php';
   class modelBaiDang{
    //thêm danh mục mới
    public function inDM($tendanhmuc){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "INSERT INTO `tb_danhmuc` (`tendanhmuc`) VALUES ('$tendanhmuc');";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
    }

    //lấy danh sách danh mục
    public function getDM(){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "SELECT * FROM `tb_danhmuc` ORDER BY `tb_danhmuc`.`maDM` ASC";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
    }

    //lấy 1 danh mục
    public function get1DM($id){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "SELECT * FROM `tb_danhmuc` WHERE `tb_danhmuc`.`maDM`='$id'";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
    }

    //lấy toàn bộ danh mục giới thiệu
    public function getAllDMGT(){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "SELECT * FROM `tb_danhmuc` WHERE `tb_danhmuc`.`maTD`='1'";
               $result = mysqli_query($con, $sql);
               $list = [];
               while ($row = mysqli_fetch_array($result, 1)) {
               $list[] = $row;
               }
               $p->closeConnect($con);
               return $list;
           }else{
               return 0;
           }
    }

    //lấy toàn bộ danh mục dịch vụ
    public function getAllDMDV(){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "SELECT * FROM `tb_danhmuc` WHERE `tb_danhmuc`.`maTD`='2'";
               $result = mysqli_query($con, $sql);
               $list = [];
               while ($row = mysqli_fetch_array($result, 1)) {
               $list[] = $row;
               }
               $p->closeConnect($con);
               return $list;
           }else{
               return 0;
           }
    }
    //lấy toàn bộ danh mục chuyên khoa
    public function getAllDMCK(){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "SELECT * FROM `tb_danhmuc` WHERE `tb_danhmuc`.`maTD`='3'";
               $result = mysqli_query($con, $sql);
               $list = [];
               while ($row = mysqli_fetch_array($result, 1)) {
               $list[] = $row;
               }
               $p->closeConnect($con);
               return $list;
           }else{
               return 0;
           }
    }

    //lấy nội dung bài đăng theo id danh mục tương ứng
    public function get1BV($id){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "SELECT * 
                       FROM `tb_baidang` 
                       INNER JOIN `tb_danhmuc` ON `tb_baidang`.`maDM`=`tb_danhmuc`.`maDM` 
                       WHERE `tb_danhmuc`.`maDM` = '$id'";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
    }

    //sửa tên danh mục
    public function upDM($id, $tendanhmuc){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "UPDATE `tb_danhmuc` SET `tendanhmuc` = '$tendanhmuc' WHERE `tb_danhmuc`.`maDM` = '$id';";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
    }

    //xóa tên danh mục
    public function deleteDM($id){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "DELETE FROM `tb_danhmuc` WHERE `tb_danhmuc`.`maDM` = '$id'";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
    }

    //thêm bài đăng
    public function inBD($maDM,$noidung,$name){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "INSERT INTO `tb_baidang` (`maDM`, `noidung`, `hinhanh`) VALUES ('$maDM', '$noidung', '$name');";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
    }

    //upload hình ảnh
    public function upload($name, $tmp_name, $folder){
        if($name!=''  && $folder!=''){
            $newname = $folder.$name;
            if(move_uploaded_file($tmp_name,$newname)){
                return 1;
            }else{
                return 0;
            }
        }else{
            return 0;
        }
    }

    //lấy bài viết  danh mục giới thiệu
    public function getGT(){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = " SELECT `tb_title`.`tieude`,`tb_danhmuc`.`tendanhmuc` AS tendanhmuc, `tb_baidang`.`maBD`AS maBD, `tb_baidang`.`noidung`AS noidung, `tb_baidang`.`hinhanh` AS hinhanh 
                        FROM `tb_danhmuc` 
                           INNER JOIN `tb_baidang` ON `tb_danhmuc`.`maDM`=`tb_baidang`.`maDM`
                           INNER JOIN `tb_title` ON `tb_danhmuc`.`maTD`=`tb_title`.`maTD`
                        WHERE `tb_title`.`tieude`='Giới thiệu' ";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
    }

    //lấy bài viết  danh mục dịch vụ
    public function getDV(){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = " SELECT `tb_title`.`tieude`,`tb_danhmuc`.`tendanhmuc` AS tendanhmuc, `tb_baidang`.`maBD`AS maBD, `tb_baidang`.`noidung`AS noidung, `tb_baidang`.`hinhanh` AS hinhanh 
                        FROM `tb_danhmuc` 
                           INNER JOIN `tb_baidang` ON `tb_danhmuc`.`maDM`=`tb_baidang`.`maDM`
                           INNER JOIN `tb_title` ON `tb_danhmuc`.`maTD`=`tb_title`.`maTD`
                        WHERE `tb_title`.`tieude`='Dịch vụ' ";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
    }

    //lấy bài viết  danh mục dịch vụ
    public function getCK(){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = " SELECT `tb_title`.`tieude`,`tb_danhmuc`.`tendanhmuc` AS tendanhmuc, `tb_baidang`.`maBD`AS maBD, `tb_baidang`.`noidung`AS noidung, `tb_baidang`.`hinhanh` AS hinhanh 
                        FROM `tb_danhmuc` 
                           INNER JOIN `tb_baidang` ON `tb_danhmuc`.`maDM`=`tb_baidang`.`maDM`
                           INNER JOIN `tb_title` ON `tb_danhmuc`.`maTD`=`tb_title`.`maTD`
                        WHERE `tb_title`.`tieude`='Chuyên khoa' ";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
    }

    //xem chi tiết bài viết giới thiệu
    public function getCTGT($id){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "SELECT `tb_danhmuc`.`tendanhmuc` AS tendanhmuc, `tb_baidang`.`maBD`AS maBD, `tb_baidang`.`noidung`AS noidung, `tb_baidang`.`hinhanh` AS hinhanh 
                       FROM `tb_danhmuc` 
                       INNER JOIN `tb_baidang` ON `tb_danhmuc`.`maDM`=`tb_baidang`.`maDM`
                       WHERE `tb_baidang`.`maBD`='$id'";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
    }

    //cập nhật bài viết giới thiệu
    public function updateGT($id,$noidung,$name){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "UPDATE `tb_baidang` SET `noidung` = '$noidung', `hinhanh` = '$name' WHERE `tb_baidang`.`maBD` = '$id';";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
    }

    //xóa bài viết giới thiệu
    public function deleteGT($id){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "DELETE FROM `tb_baidang` WHERE `tb_baidang`.`maBD` = '$id'";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
    }
     
    //lấy danh sách phòng bệnh
    public function getBenh(){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "SELECT * FROM `tb_benh`";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
    }

    //lấy vaccin theo bệnh
    public function getVaccin($name){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "SELECT * 
                    FROM `tb_benh`
                    INNER JOIN `tb_vaccin`
                    ON `tb_benh`.`maBenh`=`tb_vaccin`.`maBenh`
                    WHERE `tb_benh`.`tenbenh`= '$name'";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
    }

    //lấy xuất xứ vaccin theo mã vaccin
    public function getXXVC($idVC){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "SELECT * FROM `tb_vaccin` WHERE `tb_vaccin`.`tenvaccin`='$idVC'";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
    }

    //đăng ký tiêm chủng
    public function inDKTC($maDKTC,$hoten,$gioitinh,$ngaysinh,$sdt,$email,$diachi,$benh,$vaccin,$sanxuat,$gia,$ngaydk,$trangthai,$pttt){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "INSERT INTO `tb_dktc` (`maDKTC`,`hoten`, `gioitinh`, `ngaysinh`, `sdt`, `email`, `diachi`, `benh`, `vaccin`, `sanxuat`, `gia`, `ngaydk`, `trangthai`, `hinhthucthanhtoan`) VALUES ('$maDKTC','$hoten', '$gioitinh', '$ngaysinh', '$sdt', '$email', '$diachi', '$benh', '$vaccin', '$sanxuat', '$gia', '$ngaydk', '$trangthai', '$pttt');";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
    }

    //lấy list mã đơn đăng ký tiêm chủng
    public function getidDKTC(){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "SELECT `maDKTC` FROM `tb_dktc`";
               $result = mysqli_query($con, $sql);
               $list = [];
               while ($row = mysqli_fetch_array($result, 1)) {
               $list[] = $row;
               }
               $p->closeConnect($con);
               return $list;
           }else{
               return 0;
           }
    }

    //Gửi liên hệ
    public function SendLH($ten,$sdt,$email,$noidung,$ngaynhan,$trangthai){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "INSERT INTO `tb_lienhe` (`ten`, `sdt`, `email`, `noidung`, `ngaynhan`,`trangthai`) VALUES ('$ten', '$sdt', '$email', '$noidung', '$ngaynhan','$trangthai');";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
    }
   }
   class modelTTBacSi
   {
    public function loadBs(){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "SELECT * FROM `tb_bacsi`  order by maBS asc limit 6;";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
    }
    public function loadCK($mack){
        $p = new connectDB();
           if($p->connect($con)){
               $sql = "SELECT chuyenkhoa FROM `tb_chuyenkhoa` where maCK = '$mack';";
               $row = mysqli_query($con, $sql);
               $p->closeConnect($con);
               return $row;
           }else{
               return 0;
           }
    }
   }
?>
