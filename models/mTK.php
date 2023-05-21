<?php
   include 'connect.php';
//Bệnh nhân
    class modelTaiKhoan{

        public function getAllTaiKhoan(){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_taikhoan` ORDER BY `role` ASC";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        public function loadCK(){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_chuyenkhoa`";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }
        
        public function loadTK(){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_taikhoan` ORDER BY `MaTK` ASC";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        public function getOneTK($MaTK){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_taikhoan` WHERE `tb_taikhoan`.`MaTK` = '$MaTK'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        public function deOneTK($MaTK){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "DELETE FROM `tb_taikhoan` WHERE `tb_taikhoan`.`MaTK` = '$MaTK'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        public function upOneTK($MaTK,$user,$username,$password,$role){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_taikhoan` SET  `user` = '$user', `username` = '$username', `password` = '$password', `role` = '$role' WHERE `tb_taikhoan`.`MaTK` = '$MaTK'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }
        //cập nhật mã tài khoản cho bảng thông tin cá nhân
        public function upMTKadmin($user,$mtk){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_admin` SET  `MaTK` = '$mtk' WHERE `tb_admin`.`hoten` = '$user'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        public function upMTKbn($user,$mtk){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_benhnhan` SET  `MaTK` = '$mtk' WHERE `tb_benhnhan`.`hoten` = '$user'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        public function upMTKyt($user,$mtk){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_yta` SET  `MaTK` = '$mtk' WHERE `tb_yta`.`hoten` = '$user'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        public function upMTKbs($user,$mtk){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_bacsi` SET  `MaTK` = '$mtk' WHERE `tb_bacsi`.`hoten` = '$user'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }
        //kết thúc cập nhật mã tài khoản thông tin cá nhân
        public function showTaiKhoan($username, $password){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_taikhoan` WHERE `username` = '$username' AND `password` = '$password'";
                $row = mysqli_query($con, $sql);
                $row1 = mysqli_fetch_array($row,1);
                $p->closeConnect($con);
                return $row1;
            }else{
                return 0;
            }
        }

        public function getMaTK($username){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT `MaTK` FROM `tb_taikhoan` WHERE `username` = '$username'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }
        
        public function getInfoAdmin($maTK){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_admin` WHERE `MaTK` = '$maTK'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        public function updateTTCNAd($maAd,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$cv){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_admin` SET `hoten` = '$hoten', `ngaysinh` = '$ngaysinh', `gioitinh` = '$gioitinh', `diachi` = '$diachi', `sdt` = '$sdt', `email` = '$email', `congviec` = '$cv' WHERE `tb_admin`.`MaAdmin` = '$maAd'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        public function getInfoBN($maTK){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_benhnhan` WHERE `MaTK` = '$maTK'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        public function getInfoTK($maTK){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_taikhoan` WHERE `MaTK` = '$maTK'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }
        
        public function resetPw($maTK, $passNew){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_taikhoan` SET `password`='$passNew' WHERE `MaTK` = '$maTK'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        public function updateTTCN($maBN,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$nghenghiep){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_benhnhan` SET `hoten` = '$hoten', `ngaysinh` = '$ngaysinh', `gioitinh` = '$gioitinh', `diachi` = '$diachi', `sdt` = '$sdt', `email` = '$email', `nghenghiep` = '$nghenghiep' WHERE `tb_benhnhan`.`maBN` = '$maBN'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        public function getInfoYta($maTK){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_yta` WHERE `MaTK` = '$maTK'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        public function updateTTCNYta($maYta,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_yta` SET `hoten` = '$hoten', `ngaysinh` = '$ngaysinh', `gioitinh` = '$gioitinh', `diachi` = '$diachi', `sdt` = '$sdt', `email` = '$email', `vitricongviec` = '$vtcv' WHERE `tb_yta`.`maYta` = '$maYta'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        public function updateTTCNBs($maBS,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_bacsi` SET `hoten` = '$hoten', `ngaysinh` = '$ngaysinh', `gioitinh` = '$gioitinh', `diachi` = '$diachi', `sdt` = '$sdt', `email` = '$email', `vitricongviec` = '$vtcv' WHERE `tb_bacsi`.`maBS` = '$maBS'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }
   }
   
   class modelDangKy{
        //lấy danh sách bác sĩ
        public function loadBs(){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_bacsi`";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }
        //lấy danh sách chuyên khoa
        public function loadCk(){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_chuyenkhoa`";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        public function getQR($id){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_ddkkb` WHERE `maDDKKB`='$id'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        public function insertDDKKB($hoten,$sdt,$email,$trieuchung, $chuyenkhoa,$bacsi,$cakham,$phidichvu,$trangthaitt,$ngaykham,$ngaydat,$qrImg,$trangthai,$hinhthuc){
            $p = new connectDB(); 
            if($p->connect($con)){
                $sql = "INSERT INTO `tb_ddkkb`(hoten,sdt,email,trieuchung,maCk,bacsi,cakham,phidichvu,trangthaithanhtoan,ngaykham,ngaydat,qrImg,trangthai,hinhthuc) VALUES ('$hoten','$sdt','$email','$trieuchung','$chuyenkhoa','$bacsi','$cakham','$phidichvu','$trangthaitt','$ngaykham','$ngaydat','$qrImg','$trangthai','$hinhthuc')";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

  
        public function getDDKKB($id){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_ddkkb` INNER JOIN `tb_chuyenkhoa` ON `tb_ddkkb`.`maCk`=`tb_chuyenkhoa`.`maCk` WHERE `tb_ddkkb`.`maDDKKB`='$id'";
                $query = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $query;
            }else{
                return 0;
            }
        }

        public function loadDDKKB($hoten){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_ddkkb` INNER JOIN `tb_chuyenkhoa` ON `tb_ddkkb`.`maCk`=`tb_chuyenkhoa`.`maCk` WHERE `tb_ddkkb`.`hoten`='$hoten' ORDER BY `tb_ddkkb`.`maDDKKB` DESC";
                $query = mysqli_query($con, $sql);
                $list = [];
                while($row = mysqli_fetch_array($query,1)){
                     $list[] = $row;
                }
                $p->closeConnect($con);
                return $list;
            }else{
                return 0;
            }
        }

        public function chitietDDKKB($maDDKKB){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_ddkkb` WHERE `maDDKKB`= '$maDDKKB'";
                $query = mysqli_query($con, $sql);
                $list = [];
                while($row = mysqli_fetch_array($query,1)){
                     $list[] = $row;
                }
                $p->closeConnect($con);
                return $list;
            }else{
                return 0;
            }
        }
        
   }
   
//Bác sĩ
   class modelTaiKhoanBS extends modelTaiKhoan{
        public function getInfoBS($maTK){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_bacsi` WHERE `MaTK` = '$maTK'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        public function loadLLV($idBs){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_cakham` WHERE `tb_cakham`.`maBS`='$idBs'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        public function getLLV($maCa){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_cakham` WHERE `tb_cakham`.`maCa`='$maCa'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

         public function updateLLV($maCa){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_cakham` SET `trangthai`='Tạm nghỉ' WHERE `tb_cakham`.`maCa` = '$maCa'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        public function onLLV($maCa){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_cakham` SET `trangthai`='Làm việc' WHERE `tb_cakham`.`maCa` = '$maCa'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }
        //lấy bác sĩ theo chuyên khoa
        public function getBacSi($key){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_bacsi` WHERE `tb_bacsi`.`maCk`='$key'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }
        //lấy lịch làm việc của bác sĩ theo bác sĩ
        public function getcakham($key){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_cakham` WHERE `tb_cakham`.`bacsi`='$key' AND `tb_cakham`.`trangthai`='Làm việc' ";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }
         //đăng ký lịch làm việc
        public function insLLV($idBs,$bacsi,$cakham,$stt){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "INSERT INTO `tb_cakham` (`maBS`, `bacsi`, `cakham`,`trangthai`) VALUES ('$idBs', '$bacsi', '$cakham', '$stt');";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }
        //tạo phiếu khám bệnh
        public function insPKB($bacsi,$benhnhan,$phong,$chuandoan,$xetnghiem,$ketluan){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "INSERT INTO `tb_pkb` (`bacsi`, `benhnhan`, `phong`, `chuandoan`, `phieuxetnghiem`, `ketluan`) VALUES ('$bacsi', '$benhnhan', '$phong', '$chuandoan', '$xetnghiem','$ketluan');";
                $row = mysqli_query($con, $sql);
                $ID  = mysqli_insert_id($con);
                $p->closeConnect($con);
                return $ID;
            }else{
                return 0;
            }
        }
        //chèn id PKB vào PXN
        public function insPXN($maPKB,$benhnhan,$xetnghiem,$bacsi){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "INSERT INTO `tb_phieuxetnghiem` (`maPKB`, `benhnhan`, `loaiXN`,`nguoiyeucau`) VALUES ('$maPKB', '$benhnhan', '$xetnghiem','$bacsi');";
                $row = mysqli_query($con, $sql);
                $ID  = mysqli_insert_id($con);
                $p->closeConnect($con);
                return $ID;
            }else{
                return 0;
            }
        }
         //chèn id PXN vào kết quả xét nghiệm máu
        public function insertResultXNM($maPXN){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "INSERT INTO `tb_xetnghiemmau` (`maPXN`) VALUES ('$maPXN');";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }
         //chèn id PKB vào tb_donthuoc
        public function insDThuoc($maPKB,$benhnhan,$bacsi){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "INSERT INTO `tb_donthuoc` (`maPKB`, `benhnhan`, `bacsi`) VALUES ('$maPKB', '$benhnhan', '$bacsi');";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }
        //xóa PKB
        public function deletePKB($maPKB){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "DELETE FROM tb_pkb WHERE `tb_pkb`.`maPKB` = '$maPKB'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }
        //lấy danh sách phiếu khám bệnh tương ứng với tên bác sĩ
        public function loadPKB($Bs){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_pkb` WHERE `tb_pkb`.`bacsi`='$Bs' ORDER BY `tb_pkb`.`maPKB` DESC";
                $result = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $result;
            }else{
                return 0;
            }
        }
        //lấy thông tin chi tiết của phiếu khám bệnh
        public function get1PKB($id){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_pkb` WHERE `tb_pkb`.`maPKB`='$id'";
                $result = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $result;
            }else{
                return 0;
            }
        }
        //cập nhật thông tin phiếu khám bệnh
        public function up1PKB($id,$bacsi,$benhnhan,$phong,$chuandoan,$ketluan){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_pkb` SET `bacsi` = '$bacsi', `benhnhan` = '$benhnhan', `phong` = '$phong', `chuandoan` = '$chuandoan',`ketluan` = '$ketluan' WHERE `tb_pkb`.`maPKB` = '$id';";
                $result = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $result;
            }else{
                return 0;
            }
        }
        //lấy danh sách loại thuốc
        public function loadLT(){
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_loaithuoc`";
                $result = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $result;
            }else{
                return 0;
            }
        }
        //Ajax lấy tên thuốc theo loại thuốc
        public function ajaxThuoc($maLoaiThuoc){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_thuoc` WHERE `maLoaiThuoc`='$maLoaiThuoc'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }
        //insert don thuoc moi
        public function insDT($maPKB,$benhnhan,$bacsi,$tenthuoc,$soluong,$lieudung,$cachdung,$ngaycap,$bhyt){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "INSERT INTO `tb_donthuoc` (`maPKB`,`benhnhan`, `bacsi`, `tenthuoc`, `soluong`, `lieudung`, `cachdung`, `ngaycap`, `BHYT`) VALUES ('$maPKB','$benhnhan', '$bacsi', '$tenthuoc', '$soluong', '$lieudung', '$cachdung', '$ngaycap', '$bhyt');";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

         //update don thuoc moi
        public function updateDT($maDT,$tenthuoc,$soluong,$lieudung,$cachdung,$ngaycap,$bhyt){
            $p = new connectDB();
                if($p->connect($con)){
                    $sql = "UPDATE `tb_donthuoc` SET `tenthuoc` = '$tenthuoc', `soluong` = '$soluong', `lieudung` = '$lieudung', `cachdung` = '$cachdung', `ngaycap` = '$ngaycap', `BHYT` = '$bhyt' WHERE `tb_donthuoc`.`maDonThuoc` = '$maDT'";
                    $row = mysqli_query($con, $sql);
                    $p->closeConnect($con);
                    return $row;
                }else{
                    return 0;
                }
            }

        //load PKB
        public function ListBN(){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_pkb` ORDER BY `maPKB` DESC";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }
        public function loadDT(){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT DISTINCT `maPKB`, `benhnhan` FROM `tb_donthuoc` ORDER BY `tb_donthuoc`.`maPKB` DESC";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        public function get1DT($id){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_donthuoc` WHERE `maPKB`='$id'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        public function up1DT($id,$soluong,$lieudung,$cachdung){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_donthuoc` SET `soluong` = '$soluong', `lieudung` = '$lieudung', `cachdung` = '$cachdung' WHERE `maDonThuoc`='$id'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        //xem phieu xet nghiem
         public function getPXN($bacsi)
        {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_phieuxetnghiem` WHERE `nguoiyeucau`='$bacsi' ORDER BY `maPXN` DESC ";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

        //lay list thuoc
        public function ListThuoc()
        {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_thuoc` ORDER BY `tenthuoc` ASC ";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
        }

   }

//Nhân viên y tá
 class modelBenhAn{
    public function loaddsBA(){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_benhan`";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
//show thông tin bệnh án
    public function showBABN($ten){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_benhan` WHERE `hoten`='$ten' AND `loaikhachhang`=1 ORDER BY `maBA` DESC";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
// chi tiết bệnh án bệnh nhân của user bệnh nhân
    public function chiTietBABN($maBN){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT bn.hoten AS hoten, bn.gioitinh AS gioitinh, bn.ngaysinh AS ngaysinh, bn.sdt AS sdt, bn.email AS email, bn.diachi AS diachi, bn.nghenghiep AS nghenghiep, ba.thoigian AS ngaykham, bs.hoten as bacsi, ba.nguoitao AS yta, ba.tiensusuckhoe AS tiensusuckhoe, ba.chuandoan AS chuandoan, ba.ketluan AS ketluan, dt.maDonThuoc AS maDonThuoc, dt.tenthuoc AS tenthuoc, dt.soluong AS soluong, dt.lieudung AS lieudung, dt.cachdung AS cachdung, dt.ngaycap AS ngaycap FROM `tb_benhnhan` AS bn JOIN `tb_benhan` AS ba ON bn.maBN=ba.maBN JOIN `tb_bacsi` AS bs ON ba.maBS=bs.maBS JOIN `tb_donthuoc` AS dt ON ba.maDonThuoc=dt.maDonThuoc WHERE bn.maBN = '$maBN'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function insertBA($hoten,$ngaysinh,$gioitinh,$dantoc,$bhyt,$nn,$dvct,$diachi,$thoigiankham,$bacsi,$chuandoan,$ppdt,$kl,$nguoitao,$ghichu,$loaikhachhang,$ngaytao){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "INSERT INTO `tb_benhan` (`hoten`, `ngaysinh`, `gioitinh`, `dantoc`, `BHYT`, `nghenghiep`, `donvicongtac`, `diachi`, `thoigiankham`, `bacsi`, `chuandoan`, `phuongphapdieutri`, `ketluan`, `nguoitao`, `ghichu`, `loaikhachhang`,`ngaytao`) 
                VALUES ('$hoten', '$ngaysinh', '$gioitinh', '$dantoc', '$bhyt', '$nn', '$dvct', '$diachi', '$thoigiankham', '$bacsi', '$chuandoan', '$ppdt', '$kl', '$nguoitao', '$ghichu', '$loaikhachhang','$ngaytao')";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function loadOneBA($id){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_benhan` WHERE `maBA` = '$id'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function getNameBs($maBS){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_bacsi` WHERE `maBS` = '$maBS'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function updateBA($id,$hoten,$bhyt,$bacsi,$chuandoan,$ppdt,$kl,$ghichu){
       $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_benhan` 
                        SET `hoten`='$hoten', `BHYT`='$bhyt', `bacsi`='$bacsi', `chuandoan`='$chuandoan', `phuongphapdieutri`='$ppdt', `ketluan`='$kl', `ghichu`='$ghichu'
                        WHERE `tb_benhan`.`maBA` = '$id'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function deleteBA($id){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "DELETE FROM `tb_benhan` WHERE `tb_benhan`.`maBA` = '$id'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
   }

   class modelDDKKB{
    public function loadDDKKB(){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_ddkkb` WHERE `trangthai`='Chờ duyệt'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function getOneDDKKB($id){
         $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_ddkkb` WHERE `tb_ddkkb`.`maDDKKB` = '$id'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function deleteOneDDKKB($id){
         $p = new connectDB();
            if($p->connect($con)){
                $sql = "DELETE FROM `tb_ddkkb` WHERE `tb_ddkkb`.`maDDKKB` = '$id'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function duyetOneDDKKB($id){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_ddkkb` SET `trangthai` = 'Đã duyệt' WHERE `tb_ddkkb`.`maDDKKB` = '$id';";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function xulyOneDDKKB($id){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_ddkkb` SET `trangthai` = 'Đã xử lý' WHERE `tb_ddkkb`.`maDDKKB` = '$id'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
    
    public function getListDDKKB($nameBs,$today){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_ddkkb` WHERE `bacsi`='$nameBs' AND `ngaykham`='$today' AND `trangthai`='Đã duyệt'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
//tb_qr_dkkb
// Ajax tb_cakham
    public function ajaxCKB($maBS){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_cakham` WHERE `maBS`='$maBS'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
// End Ajax tb_cakham
    public function loadQrDKKB(){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_qr_dkkb`";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function getOneQRDDKKB($idQr){
         $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_qr_dkkb` WHERE `tb_qr_dkkb`.`idQR` = '$idQr'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function deleteOneQRDDKKB($idQr){
         $p = new connectDB();
            if($p->connect($con)){
                $sql = "DELETE FROM `tb_qr_dkkb` WHERE `tb_qr_dkkb`.`idQR` = '$idQr'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

     public function duyetOneQRDDKKB($idQr){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_qr_dkkb` SET `trangthai` = 'Đã duyệt' WHERE `tb_qr_dkkb`.`idQR` = '$idQr';";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
   }

   class modelTTBN{
    public function insertBN($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$nghenghiep,$bhyt){
       $p = new connectDB();
            if($p->connect($con)){
                $sql = "INSERT INTO `tb_benhnhan`(`hoten`, `ngaysinh`, `gioitinh`, `diachi`, `sdt`, `email`, `nghenghiep`, `BHYT`) 
                        VALUES('$hoten','$ngaysinh','$gioitinh','$diachi','$sdt','$email','$nghenghiep', '$bhyt')";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
    
    public function loadBN(){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_benhnhan` ORDER BY `maBN` ASC";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function getBN($id){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_benhnhan` WHERE `tb_benhnhan`.`maBN` = '$id'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function updateBN($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$nghenghiep,$bhyt){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_benhnhan` SET `hoten` = '$hoten', `ngaysinh` = '$ngaysinh', `gioitinh` = '$gioitinh', `diachi` = '$diachi', `sdt` = '$sdt', `email` = '$email', `nghenghiep` = '$nghenghiep', `BHYT`='$bhyt' WHERE `tb_benhnhan`.`maBN` = '$id'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function deleteBN($id){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "DELETE FROM `tb_benhnhan` WHERE `tb_benhnhan`.`maBN` = '$id'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
   }

//Nhân viên tiếp nhận

   class modelNVTN{
    public function getInfo($maTK)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * 
                        FROM `tb_taikhoan` 
                        INNER JOIN `tb_nvtiepnhan` 
                                ON `tb_taikhoan`.`MaTK`=`tb_nvtiepnhan`.`MaTK`
                        WHERE `tb_taikhoan`.`MaTK` = '$maTK';";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function updateInfo($maTK,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_nvtiepnhan` SET `hoten` = '$hoten', `ngaysinh` = '$ngaysinh', `gioitinh` = '$gioitinh', `diachi` = '$diachi', `sdt`='$sdt', `email`='$email', `congviec`='$vtcv' WHERE `tb_nvtiepnhan`.`MaTK` = '$maTK';";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    //lấy danh sách liên hệ chưa trả lời
    public function getLH()
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * 
                        FROM `tb_lienhe`
                        WHERE `trangthai` = 'Chưa trả lời' 
                        ORDER BY `maDLH` DESC";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    //lấy danh sách liên hệ đã trả lời
    public function getLHR()
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * 
                        FROM `tb_lienhe`
                        WHERE `trangthai` = 'Đã phản hồi' 
                        ORDER BY `maDLH` DESC";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    //lấy danh sách liên hệ theo id
    public function get1LH($id)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * 
                        FROM `tb_lienhe` 
                        WHERE `maDLH`='$id'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    //update table lien he sau khi gui mail thanh cong
    public function update1LH($id,$nguoitraloi,$phanhoi,$ngaygui)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_lienhe` 
                        SET `nguoitraloi` = '$nguoitraloi', 
                            `phanhoi` = '$phanhoi', 
                            `ngaygui` = '$ngaygui',
                            `trangthai` = 'Đã phản hồi'
                        WHERE `tb_lienhe`.`maDLH` = '$id';";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function UpdateTTOffline($id)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_ddkkb` SET `trangthaithanhtoan` = 'Đã Thanh Toán', `trangthai` = 'Đã duyệt' WHERE `tb_ddkkb`.`maDDKKB` = '$id'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    //xóa liên hệ theo id
    public function del1LH($id)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "DELETE FROM `tb_lienhe` WHERE `tb_lienhe`.`maDLH` = '$id';";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    //lấy danh sách đăng ký tiêm chủng
    public function getTC()
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_dktc` WHERE `hoanthanh`='Chưa' ORDER BY `maDKTC` DESC;";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    //lấy 1 đăng ký tiêm chủng theo mã đktc
    public function get1TC($id)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_dktc` WHERE `maDKTC` = '$id';";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    //update table tiem chung sau khi gui mail thanh cong
    public function update1TC($id,$phanhoi,$noidung,$ngaygui)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_dktc` 
                        SET `phanhoi` = '$phanhoi', 
                            `noidung` = '$noidung', 
                            `ngaygui` = '$ngaygui'
                        WHERE `tb_dktc`.`maDKTC` = '$id';";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    //update tiêm chủng hoàn thành
    public function up1TCHT($id)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_dktc` SET `hoanthanh` = 'Đã hoàn thành' WHERE `tb_dktc`.`maDKTC` = '$id';";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    //lấy danh sách đăng ký khám bệnh offline
    public function getKBOff()
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * 
                        FROM `tb_ddkkb` INNER JOIN `tb_chuyenkhoa` ON `tb_ddkkb`.`maCk` = `tb_chuyenkhoa`.`maCk` 
                        WHERE `tb_ddkkb`.`hinhthuc` = 'Offline';";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    //tìm kiếm bác sĩ
    public function searchBS($key)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = " SELECT * 
                         FROM `tb_bacsi` INNER JOIN `tb_chuyenkhoa` ON `tb_bacsi`.`maCk`=`tb_chuyenkhoa`.`maCk` INNER JOIN `tb_cakham` ON `tb_bacsi`.`maBS`=`tb_cakham`.`maBS`
                         WHERE `tb_bacsi`.`hoten` LIKE '%$key%';";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    //tìm kiếm bệnh nhân
    public function searchBN($key)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = " SELECT * 
                         FROM `tb_benhnhan` 
                         WHERE `tb_benhnhan`.`hoten` LIKE '%$key%'; ";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    //tìm kiếm thông tin đăng ký khám bệnh
    public function searchKB($key)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = " SELECT * 
                         FROM `tb_ddkkb` INNER JOIN `tb_chuyenkhoa` ON `tb_ddkkb`.`maCk`=`tb_chuyenkhoa`.`maCk` 
                         WHERE `tb_ddkkb`.`hoten` LIKE '%$key%'; ";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    //tìm kiếm thông tin đăng ký tiêm chủng
    public function searchTC($key)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = " SELECT * 
                         FROM `tb_dktc` 
                         WHERE `tb_dktc`.`hoten` LIKE '%$key%'; ";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
    //xem lịch làm việc
    public function thu2Sang($maNVTN)
    {
        $p = new connectDB();
        if($p->connect($con)){
            $sql = "SELECT * FROM `tb_lichlamviec` WHERE CaLamViec like '%Thứ hai sáng%' and TenNV = '$maNVTN';";
            $row = mysqli_query($con, $sql);
            $ketqua = mysqli_fetch_assoc($row);
            $p->closeConnect($con);
            return $ketqua;
        }else{
            return 0;
        }
    }

    public function thu2chieu($maNVTN)
    {
        $p = new connectDB();
        if($p->connect($con)){
            $sql = "SELECT * FROM `tb_lichlamviec` WHERE CaLamViec like '%Thứ hai chiều%' and TenNV = '$maNVTN';";
            $row = mysqli_query($con, $sql);
            $ketqua = mysqli_fetch_assoc($row);
            $p->closeConnect($con);
            return $ketqua;
        }else{
            return 0;
        }
    }

    public function thu3Sang($maNVTN)
    {
        $p = new connectDB();
        if($p->connect($con)){
            $sql = "SELECT * FROM `tb_lichlamviec` WHERE CaLamViec like '%Thứ ba sáng%' and TenNV = '$maNVTN';";
            $row = mysqli_query($con, $sql);
            $ketqua = mysqli_fetch_assoc($row);
            $p->closeConnect($con);
            return $ketqua;
        }else{
            return 0;
        }
    }

    public function thu3chieu($maNVTN)
    {
        $p = new connectDB();
        if($p->connect($con)){
            $sql = "SELECT * FROM `tb_lichlamviec` WHERE CaLamViec like '%Thứ ba chiều%' and TenNV = '$maNVTN';";
            $row = mysqli_query($con, $sql);
            $ketqua = mysqli_fetch_assoc($row);
            $p->closeConnect($con);
            return $ketqua;
        }else{
            return 0;
        }
    }

    public function thu4Sang($maNVTN)
    {
        $p = new connectDB();
        if($p->connect($con)){
            $sql = "SELECT * FROM `tb_lichlamviec` WHERE CaLamViec like '%Thứ tư sáng%' and TenNV = '$maNVTN';";
            $row = mysqli_query($con, $sql);
            $ketqua = mysqli_fetch_assoc($row);
            $p->closeConnect($con);
            return $ketqua;
        }else{
            return 0;
        }
    }

    public function thu4chieu($maNVTN)
    {
        $p = new connectDB();
        if($p->connect($con)){
            $sql = "SELECT * FROM `tb_lichlamviec` WHERE CaLamViec like '%Thứ tư chiều%' and TenNV = '$maNVTN';";
            $row = mysqli_query($con, $sql);
            $ketqua = mysqli_fetch_assoc($row);
            $p->closeConnect($con);
            return $ketqua;
        }else{
            return 0;
        }
    }

    public function thu5Sang($maNVTN)
    {
        $p = new connectDB();
        if($p->connect($con)){
            $sql = "SELECT * FROM `tb_lichlamviec` WHERE CaLamViec like '%Thứ năm sáng%' and TenNV = '$maNVTN';";
            $row = mysqli_query($con, $sql);
            $ketqua = mysqli_fetch_assoc($row);
            $p->closeConnect($con);
            return $ketqua;
        }else{
            return 0;
        }
    }

    public function thu5chieu($maNVTN)
    {
        $p = new connectDB();
        if($p->connect($con)){
            $sql = "SELECT * FROM `tb_lichlamviec` WHERE CaLamViec like '%Thứ năm chiều%' and TenNV = '$maNVTN';";
            $row = mysqli_query($con, $sql);
            $ketqua = mysqli_fetch_assoc($row);
            $p->closeConnect($con);
            return $ketqua;
        }else{
            return 0;
        }
    }

    public function thu6Sang($maNVTN)
    {
        $p = new connectDB();
        if($p->connect($con)){
            $sql = "SELECT * FROM `tb_lichlamviec` WHERE CaLamViec like '%Thứ sáu sáng%' and TenNV = '$maNVTN';";
            $row = mysqli_query($con, $sql);
            $ketqua = mysqli_fetch_assoc($row);
            $p->closeConnect($con);
            return $ketqua;
        }else{
            return 0;
        }
    }

    public function thu6chieu($maNVTN)
    {
        $p = new connectDB();
        if($p->connect($con)){
            $sql = "SELECT * FROM `tb_lichlamviec` WHERE CaLamViec like '%Thứ sáu chiều%' and TenNV = '$maNVTN';";
            $row = mysqli_query($con, $sql);
            $ketqua = mysqli_fetch_assoc($row);
            $p->closeConnect($con);
            return $ketqua;
        }else{
            return 0;
        }
    }

    public function thu7Sang($maNVTN)
    {
        $p = new connectDB();
        if($p->connect($con)){
            $sql = "SELECT * FROM `tb_lichlamviec` WHERE CaLamViec like '%Thứ bẩy sáng%' and TenNV = '$maNVTN';";
            $row = mysqli_query($con, $sql);
            $ketqua = mysqli_fetch_assoc($row);
            $p->closeConnect($con);
            return $ketqua;
        }else{
            return 0;
        }
    }

    public function thu7chieu($maNVTN)
    {
        $p = new connectDB();
        if($p->connect($con)){
            $sql = "SELECT * FROM `tb_lichlamviec` WHERE CaLamViec like '%Thứ bẩy chiều%' and TenNV = '$maNVTN';";
            $row = mysqli_query($con, $sql);
            $ketqua = mysqli_fetch_assoc($row);
            $p->closeConnect($con);
            return $ketqua;
        }else{
            return 0;
        }
    }

    public function thu8Sang($maNVTN)
    {
        $p = new connectDB();
        if($p->connect($con)){
            $sql = "SELECT * FROM `tb_lichlamviec` WHERE CaLamViec like '%Chủ nhật sáng%' and TenNV = '$maNVTN';";
            $row = mysqli_query($con, $sql);
            $ketqua = mysqli_fetch_assoc($row);
            $p->closeConnect($con);
            return $ketqua;
        }else{
            return 0;
        }
    }

    public function thu8chieu($maNVTN)
    {
        $p = new connectDB();
        if($p->connect($con)){
            $sql = "SELECT * FROM `tb_lichlamviec` WHERE CaLamViec like '%Chủ nhật chiều%' and TenNV = '$maNVTN';";
            $row = mysqli_query($con, $sql);
            $ketqua = mysqli_fetch_assoc($row);
            $p->closeConnect($con);
            return $ketqua;
        }else{
            return 0;
        }
    }
 
   } 

   class modelNVXN
   {
    public function AddChuKy($id, $signatureFileName)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_phieuxetnghiem` 
                        SET `chuky` = '$signatureFileName' 
                        WHERE `tb_phieuxetnghiem`.`maPXN` = '$id'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function getInfo($maTK)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * 
                        FROM `tb_taikhoan` 
                        INNER JOIN `tb_nvxetnghiem` 
                                ON `tb_taikhoan`.`MaTK`=`tb_nvxetnghiem`.`MaTK`
                        WHERE `tb_taikhoan`.`MaTK` = '$maTK';";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function updateInfo($maTK,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_nvxetnghiem` SET `hoten` = '$hoten', `ngaysinh` = '$ngaysinh', `gioitinh` = '$gioitinh', `diachi` = '$diachi', `sdt`='$sdt', `email`='$email', `congviec`='$vtcv' WHERE `tb_nvxetnghiem`.`MaTK` = '$maTK';";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function AddPXN($ht,$lxn,$mxn,$kq,$gc,$ngaythuchien,$nguoithuchien,$QRCode)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "INSERT INTO `tb_phieuxetnghiem` (`benhnhan`, `loaiXN`, `mauXN`, `ketqua`, `ghichu`, `ngaythuchien`, `nguoithuchien`, `QRCode`) VALUES ('$ht', '$lxn', '$mxn', '$kq', '$gc', '$ngaythuchien', '$nguoithuchien', '$QRCode');";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function getPXN()
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_phieuxetnghiem` ORDER BY `maPXN` DESC ";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function get1PXN($id)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * FROM `tb_phieuxetnghiem` WHERE `maPXN`='$id' ";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function ResultXN($loaiXN,$id)
    {
            $p = new connectDB();
            if($p->connect($con)){
                if($loaiXN == 'MÁU TỔNG QUÁT')
                {
                    $sql = "SELECT * FROM `tb_xetnghiemmau` WHERE `maPXN`='$id' ";
                }
                elseif($loaiXN == 'NƯỚC TIỂU')
                {
                    $sql = "SELECT * FROM `tb_xetnghiemnuoctieu` WHERE `maPXN`='$id' ";
                }
                elseif($loaiXN == 'UNG THƯ GAN')
                {
                    $sql = "SELECT * FROM `tb_xetnghiemutg` WHERE `maPXN`='$id' ";
                }
                elseif($loaiXN == 'VI SINH')
                {
                    $sql = "SELECT * FROM `tb_xetnghiemvisinh` WHERE `maPXN`='$id' ";
                }
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function Update($id,$mxn,$ngaythuchien,$nguoithuchien)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_phieuxetnghiem` SET `mauXN` = '$mxn', `ngaythuchien`='$ngaythuchien', `nguoithuchien`=`$nguoithuchien`  WHERE `maPXN` = '$id' ";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function UpdateResultXNM($maPXN,$ctm,$kqxn,$tsbt,$dv)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "INSERT INTO `tb_xetnghiemmau` (`congthucmau`, `ketquaxetnghiem`, `chisobinhthuong`, `donvi`) VALUES($maPXN, $ctm, $kqxn, $tsbt, $dv) ";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function Delete($id)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "DELETE FROM tb_phieuxetnghiem WHERE `tb_phieuxetnghiem`.`maPXN` = '$id'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
   }
   class modelGiamDoc
   {
    public function thongkeDKKBon($ngaybatdau,$ngayketthuc)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT count(maDDKKB) as ThongkeOn FROM tb_ddkkb where (ngaydat between '$ngaybatdau' and '$ngayketthuc') and hinhthuc = 'Online'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }   
    public function thongkeDKKBondatt($ngaybatdau,$ngayketthuc)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT count(maDDKKB) as ThongkeOntt FROM tb_ddkkb where (ngaydat between '$ngaybatdau' and '$ngayketthuc') and hinhthuc = 'Online' and trangthaithanhtoan like 'Đã Thanh Toán'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    } 
    public function thongkeDKKBonchuatt($ngaybatdau,$ngayketthuc)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT count(maDDKKB) as ThongkeOnctt FROM tb_ddkkb where (ngaydat between '$ngaybatdau' and '$ngayketthuc') and hinhthuc = 'Online' and trangthaithanhtoan like 'Chưa Thanh Toán'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }  
    public function thongkedoanhthu($ngaybatdau,$ngayketthuc)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT sum(phidichvu) as ThongkeDTDKKB FROM tb_ddkkb where (ngaydat between '$ngaybatdau' and '$ngayketthuc') and trangthaithanhtoan like 'Đã Thanh Toán'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function thongkedoanhthutc($ngaybatdau,$ngayketthuc)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT sum(gia) as ThongkeTC FROM tb_dktc where (ngaydk between '$ngaybatdau' and '$ngayketthuc') and trangthai like 'Đã Thanh Toán'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function thongkeDKKBoff($ngaybatdau,$ngayketthuc)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT count(maDDKKB) as ThongkeOff FROM tb_ddkkb where (ngaydat between '$ngaybatdau' and '$ngayketthuc') and hinhthuc='Offline'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function dembs()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT count(maBS) as TKBS FROM tb_bacsi";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function demyta()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT count(maYTa) as TKYT FROM tb_yta";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function demnvtn()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT count(maNVTN) as TKNVTN FROM tb_nvtiepnhan";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function demnvxn()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT count(maNVXN) as TKNVXN FROM tb_nvxetnghiem";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function demnvql()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT count(maNVQL) as TKNVQL FROM tb_nvql";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function demNVQT()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT count(maNVQT) as TKNVQT FROM tb_nvquaythuoc";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function getInfo($maTK)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * 
                        FROM `tb_taikhoan` 
                        INNER JOIN `tb_giamdoc` 
                                ON `tb_taikhoan`.`MaTK`=`tb_giamdoc`.`MaTK`
                        WHERE `tb_taikhoan`.`MaTK` = '$maTK';";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
    public function updateInfo($maTK,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_giamdoc` SET `hoten` = '$hoten', `ngaysinh` = '$ngaysinh', `gioitinh` = '$gioitinh', `diachi` = '$diachi', `sdt`='$sdt', `email`='$email', `vitricongviec`='$vtcv' WHERE `tb_giamdoc`.`MaTK` = '$maTK';";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }

    public function loadBN()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_benhnhan";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function loadBS()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_bacsi";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function get1BS($maBS)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_bacsi where maBS = '$maBS'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function loadYTa()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_yta";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function get1YTa($maYTa)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_yta where maYta = '$maYTa'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function loadNVTN()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_nvtiepnhan";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function get1NVTN($maNVTN)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_nvtiepnhan where maNVTN = '$maNVTN'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function loadNVXN()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_nvxetnghiem";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function get1NVXN($maNVXN)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_nvxetnghiem where maNVXN = '$maNVXN'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function loadNVQL()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_nvql";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function get1NVQL($maNVQL)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_nvql where maNVQL = '$maNVQL'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function loadNVQT()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_nvquaythuoc";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function get1NVQT($maNVQT)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_nvquaythuoc where maNVQT = '$maNVQT'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function loadLichSu($tenbn)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_benhan where hoten = '$tenbn'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function get1BN($maBN)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_benhnhan where maBN = '$maBN'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function get1BA($maBA)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_benhan where maBA = '$maBA'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
   }
   class modelnvql
   {
    public function getInfo($maTK)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * 
                        FROM `tb_taikhoan` 
                        INNER JOIN `tb_nvql` 
                                ON `tb_taikhoan`.`MaTK`=`tb_nvql`.`MaTK`
                        WHERE `tb_taikhoan`.`MaTK` = '$maTK';";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
    public function updateInfo($maTK,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_nvql` SET `hoten` = '$hoten', `ngaysinh` = '$ngaysinh', `gioitinh` = '$gioitinh', `diachi` = '$diachi', `sdt`='$sdt', `email`='$email', `vitricongviec`='$vtcv' WHERE `tb_nvql`.`MaTK` = '$maTK';";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
    public function loadBN()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_benhnhan";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function loadBS()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_bacsi";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function get1BS($maBS)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_bacsi where maBS = '$maBS'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function loadYTa()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_yta";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function get1YTa($maYTa)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_yta where maYta = '$maYTa'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function loadNVTN()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_nvtiepnhan";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function get1NVTN($maNVTN)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_nvtiepnhan where maNVTN = '$maNVTN'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function loadNVXN()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_nvxetnghiem";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function get1NVXN($maNVXN)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_nvxetnghiem where maNVXN = '$maNVXN'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function loadNVQL()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_nvql";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function loadGD()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_giamdoc";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function loadNVQT()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_nvquaythuoc";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function get1gd($maGD)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_giamdoc where maGD = '$maGD'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function loadTB()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_trangthietbi";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function get1tb($maTB)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_trangthietbi where maTB = '$maTB'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function get1NVQL($maNVQL)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_nvql where maNVQL = '$maNVQL'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function get1NVQT($maNVQL)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_nvquaythuoc where maNVQT = '$maNVQL'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function get1BN($maBN)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_benhnhan where maBN = '$maBN'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function insertTB($hoten,$ngaysinh,$diachi,$gioitinh){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "INSERT INTO `tb_trangthietbi` (`tenthietbi`, `ngaynhap`, `soluong`, `tinhtrang`) 
                VALUES ('$hoten', '$ngaysinh', '$diachi', '$gioitinh')";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
    public function updateTB($id,$hoten,$ngaysinh,$diachi,$gioitinh){
        $p = new connectDB();
             if($p->connect($con)){
                 $sql = "UPDATE `tb_trangthietbi` 
                         SET `tenthietbi`='$hoten', `ngaynhap`='$ngaysinh', `soluong`='$diachi', `tinhtrang`='$gioitinh'
                         WHERE `tb_trangthietbi`.`maTB` = '$id'";
                 $row = mysqli_query($con, $sql);
                 $p->closeConnect($con);
                 return $row;
             }else{
                 return 0;
             }
     }
    public function insertBS($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "INSERT INTO `tb_bacsi` (`hoten`, `ngaysinh`, `gioitinh`, `diachi`, `sdt`, `email`, `vitricongviec`) 
                VALUES ('$hoten', '$ngaysinh', '$gioitinh', '$diachi', '$sdt', '$email', '$vtcv')";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
    public function insertYTa($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "INSERT INTO `tb_yta` (`hoten`, `ngaysinh`, `gioitinh`, `diachi`, `sdt`, `email`, `vitricongviec`) 
                VALUES ('$hoten', '$ngaysinh', '$gioitinh', '$diachi', '$sdt', '$email', '$vtcv')";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
    public function insertGD($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "INSERT INTO `tb_giamdoc` (`hoten`, `ngaysinh`, `gioitinh`, `diachi`, `sdt`, `email`, `vitricongviec`) 
                VALUES ('$hoten', '$ngaysinh', '$gioitinh', '$diachi', '$sdt', '$email', '$vtcv')";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
    public function insertNVTN($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "INSERT INTO `tb_nvtiepnhan` (`hoten`, `ngaysinh`, `gioitinh`, `diachi`, `sdt`, `email`, `congviec`) 
                VALUES ('$hoten', '$ngaysinh', '$gioitinh', '$diachi', '$sdt', '$email', '$vtcv')";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
    public function insertNVXN($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "INSERT INTO `tb_nvxetnghiem` (`hoten`, `ngaysinh`, `gioitinh`, `diachi`, `sdt`, `email`, `congviec`) 
                VALUES ('$hoten', '$ngaysinh', '$gioitinh', '$diachi', '$sdt', '$email', '$vtcv')";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
    public function insertNVQL($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "INSERT INTO `tb_nvql` (`hoten`, `ngaysinh`, `gioitinh`, `diachi`, `sdt`, `email`, `vitricongviec`) 
                VALUES ('$hoten', '$ngaysinh', '$gioitinh', '$diachi', '$sdt', '$email', '$vtcv')";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
    public function insertNVQT($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "INSERT INTO `tb_nvquaythuoc` (`hoten`, `ngaysinh`, `gioitinh`, `diachi`, `sdt`, `email`, `vitricongviec`) 
                VALUES ('$hoten', '$ngaysinh', '$gioitinh', '$diachi', '$sdt', '$email', '$vtcv')";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
    public function insertBN($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv,$bhyt){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "INSERT INTO `tb_benhnhan` (`hoten`, `ngaysinh`, `gioitinh`, `diachi`, `sdt`, `email`, `nghenghiep`, `BHYT`) 
                VALUES ('$hoten', '$ngaysinh', '$gioitinh', '$diachi', '$sdt', '$email', '$vtcv', '$bhyt')";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
    public function updateBS($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new connectDB();
             if($p->connect($con)){
                 $sql = "UPDATE `tb_bacsi` 
                         SET `hoten`='$hoten', `ngaysinh`='$ngaysinh', `gioitinh`='$gioitinh', `diachi`='$diachi', `sdt`='$sdt', `email`='$email', `vitricongviec`='$vtcv'
                         WHERE `tb_bacsi`.`maBS` = '$id'";
                 $row = mysqli_query($con, $sql);
                 $p->closeConnect($con);
                 return $row;
             }else{
                 return 0;
             }
     }
     public function updateYta($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new connectDB();
             if($p->connect($con)){
                 $sql = "UPDATE `tb_yta` 
                         SET `hoten`='$hoten', `ngaysinh`='$ngaysinh', `gioitinh`='$gioitinh', `diachi`='$diachi', `sdt`='$sdt', `email`='$email', `vitricongviec`='$vtcv'
                         WHERE `tb_yta`.`maYta` = '$id'";
                 $row = mysqli_query($con, $sql);
                 $p->closeConnect($con);
                 return $row;
             }else{
                 return 0;
             }
     }
     public function updateGD($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new connectDB();
             if($p->connect($con)){
                 $sql = "UPDATE `tb_giamdoc` 
                         SET `hoten`='$hoten', `ngaysinh`='$ngaysinh', `gioitinh`='$gioitinh', `diachi`='$diachi', `sdt`='$sdt', `email`='$email', `vitricongviec`='$vtcv'
                         WHERE `tb_giamdoc`.`maGD` = '$id'";
                 $row = mysqli_query($con, $sql);
                 $p->closeConnect($con);
                 return $row;
             }else{
                 return 0;
             }
     }
     public function updateNVTN($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new connectDB();
             if($p->connect($con)){
                 $sql = "UPDATE `tb_nvtiepnhan` 
                         SET `hoten`='$hoten', `ngaysinh`='$ngaysinh', `gioitinh`='$gioitinh', `diachi`='$diachi', `sdt`='$sdt', `email`='$email', `congviec`='$vtcv'
                         WHERE `tb_nvtiepnhan`.`maNVTN` = '$id'";
                 $row = mysqli_query($con, $sql);
                 $p->closeConnect($con);
                 return $row;
             }else{
                 return 0;
             }
     }
     public function updateNVXN($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new connectDB();
             if($p->connect($con)){
                 $sql = "UPDATE `tb_nvxetnghiem` 
                         SET `hoten`='$hoten', `ngaysinh`='$ngaysinh', `gioitinh`='$gioitinh', `diachi`='$diachi', `sdt`='$sdt', `email`='$email', `congviec`='$vtcv'
                         WHERE `tb_nvxetnghiem`.`maNVXN` = '$id'";
                 $row = mysqli_query($con, $sql);
                 $p->closeConnect($con);
                 return $row;
             }else{
                 return 0;
             }
     }
     public function updateNVQL($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new connectDB();
             if($p->connect($con)){
                 $sql = "UPDATE `tb_nvql` 
                         SET `hoten`='$hoten', `ngaysinh`='$ngaysinh', `gioitinh`='$gioitinh', `diachi`='$diachi', `sdt`='$sdt', `email`='$email', `vitricongviec`='$vtcv'
                         WHERE `tb_nvql`.`maNVQL` = '$id'";
                 $row = mysqli_query($con, $sql);
                 $p->closeConnect($con);
                 return $row;
             }else{
                 return 0;
             }
     }
     public function updateNVQT($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new connectDB();
             if($p->connect($con)){
                 $sql = "UPDATE `tb_nvquaythuoc` 
                         SET `hoten`='$hoten', `ngaysinh`='$ngaysinh', `gioitinh`='$gioitinh', `diachi`='$diachi', `sdt`='$sdt', `email`='$email', `vitricongviec`='$vtcv'
                         WHERE `tb_nvquaythuoc`.`maNVQT` = '$id'";
                 $row = mysqli_query($con, $sql);
                 $p->closeConnect($con);
                 return $row;
             }else{
                 return 0;
             }
     }
     public function updateBN($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv,$bhyt){
        $p = new connectDB();
             if($p->connect($con)){
                 $sql = "UPDATE `tb_benhnhan` 
                         SET `hoten`='$hoten', `ngaysinh`='$ngaysinh', `gioitinh`='$gioitinh', `diachi`='$diachi', `sdt`='$sdt', `email`='$email', `nghenghiep`='$vtcv', `BHYT`='$bhyt'
                         WHERE `tb_benhnhan`.`maBN` = '$id'";
                 $row = mysqli_query($con, $sql);
                 $p->closeConnect($con);
                 return $row;
             }else{
                 return 0;
             }
     }
     public function Delete($id)
     {
             $p = new connectDB();
             if($p->connect($con)){
                 $sql = "DELETE FROM tb_trangthietbi WHERE `tb_trangthietbi`.`maTB` = '$id'";
                 $row = mysqli_query($con, $sql);
                 $p->closeConnect($con);
                 return $row;
             }else{
                 return 0;
             }
     }
   }
   class modelNVQT
   {
    public function getInfo($maTK)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "SELECT * 
                        FROM `tb_taikhoan` 
                        INNER JOIN `tb_nvquaythuoc` 
                                ON `tb_taikhoan`.`MaTK`=`tb_nvquaythuoc`.`MaTK`
                        WHERE `tb_taikhoan`.`MaTK` = '$maTK';";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
    public function updateInfo($maTK,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_nvquaythuoc` SET `hoten` = '$hoten', `ngaysinh` = '$ngaysinh', `gioitinh` = '$gioitinh', `diachi` = '$diachi', `sdt`='$sdt', `email`='$email', `vitricongviec`='$vtcv' WHERE `tb_nvquaythuoc`.`MaTK` = '$maTK';";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
    public function loadLoaiThuoc()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_loaithuoc";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function loadThuoc()
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_thuoc inner join tb_loaithuoc where tb_thuoc.maLoaiThuoc = tb_loaithuoc.maLoaiThuoc";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function get1thuoc($maThuoc)
    {
        $p = new connectDB();
        if($p->connect($con))
        {
            $sql = "SELECT * FROM tb_thuoc inner join tb_loaithuoc where tb_thuoc.maLoaiThuoc = tb_loaithuoc.maLoaiThuoc and tb_thuoc.maThuoc = '$maThuoc'";
            $row = mysqli_query($con, $sql);
            $p->closeConnect($con);
            return $row;
        }
        else
        {
            return 0;
        }
    }
    public function insertThuoc($maLoaiThuoc,$tenthuoc,$soluong,$gia){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "INSERT INTO `tb_thuoc` (`maLoaiThuoc`, `tenthuoc`, `soluong`, `gia`) 
                VALUES ('$maLoaiThuoc', '$tenthuoc', '$soluong', '$gia')";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
    public function updateThuoc($id,$maLoaiThuoc,$tenthuoc,$soluong,$gia){
        $p = new connectDB();
            if($p->connect($con)){
                $sql = "UPDATE `tb_thuoc` SET `maLoaiThuoc` = '$maLoaiThuoc', `tenthuoc`= '$tenthuoc', `soluong` = '$soluong', `gia` = '$gia' Where `maThuoc`='$id'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
    public function Delete($id)
    {
            $p = new connectDB();
            if($p->connect($con)){
                $sql = "DELETE FROM tb_thuoc WHERE `tb_thuoc`.`maThuoc` = '$id'";
                $row = mysqli_query($con, $sql);
                $p->closeConnect($con);
                return $row;
            }else{
                return 0;
            }
    }
   }
?>