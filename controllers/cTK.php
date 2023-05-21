<?php
   include "../../models/mTK.php";
//Bệnh nhân
   class controllerTK{

    public function getAllTaiKhoan(){
        $p = new modelTaiKhoan();
        $taiKhoan = $p->getAllTaiKhoan();
        return $taiKhoan;
    }

    public function loadCK(){
        $p = new modelTaiKhoan();
        $taiKhoan = $p->loadCK();
        return $taiKhoan;
    }
    
    public function loadTK(){
        $p = new modelTaiKhoan();
        $taiKhoan = $p->loadTK();
        return $taiKhoan;
    }

    public function getOneTK($MaTK){
        $p = new modelTaiKhoan();
        $oneTK = $p->getOneTK($MaTK);
        return $oneTK;
    }

    public function upOneTK($MaTK,$user,$username,$password,$role){
        $p = new modelTaiKhoan();
        $sua = $p->upOneTK($MaTK,$user,$username,$password,$role);
        return $sua;
    }

    public function upMTKadmin($user,$mtk){
        $p = new modelTaiKhoan();
        $ad = $p->upMTKadmin($user,$mtk);
        return $ad;
    }

    public function upMTKbn($user,$mtk){
        $p = new modelTaiKhoan();
        $bn = $p->upMTKbn($user,$mtk);
        return $bn;
    }

    public function upMTKyt($user,$mtk){
        $p = new modelTaiKhoan();
        $yt = $p->upMTKyt($user,$mtk);
        return $yt;
    }

    public function upMTKbs($user,$mtk){
        $p = new modelTaiKhoan();
        $bs = $p->upMTKbs($user,$mtk);
        return $bs;
    }

    public function deOneTK($MaTK){
        $p = new modelTaiKhoan();
        $xoa = $p->deOneTK($MaTK);
        return $xoa;
    }

    public function showTaiKhoan($username, $password){
        $p = new modelTaiKhoan();
        $account = $p->showTaiKhoan($username, $password);
        return $account;
    }

    public function getMaTK($username){
        $p = new modelTaiKhoan();
        $maTK = $p->getMaTK($username);
        return $maTK;
    }
    
    public function getInfoAdmin($maTK){
        $p = new modelTaiKhoan();
        $info = $p->getInfoAdmin($maTK);
        return $info;
    }

    public function getInfoBN($maTK){
        $p = new modelTaiKhoan();
        $info = $p->getInfoBN($maTK);
        return $info;
    }

    public function getInfoYta($maTK){
        $p = new modelTaiKhoan();
        $info = $p->getInfoYta($maTK);
        return $info;
    }

    public function getInfoTK($maTK){
        $p = new modelTaiKhoan();
        $info = $p->getInfoTK($maTK);
        return $info;
    }

    public function resetPw($maTK, $passNew){
        $p = new modelTaiKhoan();
        $pN = $p->resetPw($maTK, $passNew);
        return $pN;
    }

    public function updateTTCN($maBN,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$nghenghiep){
       $p = new modelTaiKhoan();
       $upBN = $p->updateTTCN($maBN,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$nghenghiep);
       return $upBN;
    }

    public function updateTTCNYta($maYta,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new modelTaiKhoan();
        $upYta = $p->updateTTCNYta($maYta,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv);
        return $upYta;
    }

    public function updateTTCNYBs($maBS,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new modelTaiKhoan();
        $upBs = $p->updateTTCNBs($maBS,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv);
        return $upBs;
    }

     public function updateTTCNAd($maAd,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$cv){
        $p = new modelTaiKhoan();
        $upAd = $p->updateTTCNAd($maAd,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$cv);
        return $upAd;
     }
   }
   class controlerDangKy{
    public function loadBs(){
        $p = new modelDangKy();
        $bs = $p->loadBs();
        return $bs;
    }

    public function loadCk(){
        $p = new modelDangKy();
        $ck = $p->loadCk();
        return $ck;
    }

    public function getQR($id){
        $p = new modelDangKy();
        $qr = $p->getQR($id);
        return $qr;
    }

    public function insertDDKKB($hoten,$sdt,$email,$trieuchung,$chuyenkhoa,$bacsi,$cakham,$phidichvu,$trangthaitt,$ngaykham,$ngaydat,$qrImg,$trangthai,$hinhthuc){
        $p = new modelDangKy();
        $insert = $p->insertDDKKB($hoten,$sdt,$email,$trieuchung,$chuyenkhoa,$bacsi,$cakham,$phidichvu,$trangthaitt,$ngaykham,$ngaydat,$qrImg,$trangthai,$hinhthuc);
        return $insert;
    }
    

    public function loadDDKKB($hoten){
        $p = new modelDangKy();
        $load = $p->loadDDKKB($hoten);
        return $load; 
    }

    public function getDDKKB($id){
        $p = new modelDangKy();
        $g = $p->getDDKKB($id);
        return $g; 
    }

    public function chitietDDKKB($maDDKKB){
        $p = new modelDangKy();
        $load = $p->chitietDDKKB($maDDKKB);
        return $load; 
    }
    
   }
//Bác sĩ
   class controllerTKBS extends controllerTK{
    public function getInfoBS($maTK){
        $p = new modelTaiKhoanBS();
        $info = $p->getInfoBS($maTK);
        return $info;
    }

    public function loadLLV($idBs){
        $p = new modelTaiKhoanBS();
        $llv = $p->loadLLV($idBs);
        return $llv;
    }

    public function getLLV($maCa){
        $p = new modelTaiKhoanBS();
        $llv = $p->getLLV($maCa);
        return $llv;
    }

    public function updateLLV($maCa){
        $p = new modelTaiKhoanBS();
        $up_llv = $p->updateLLV($maCa);
        return $up_llv;
    }

    public function onLLV($maCa){
        $p = new modelTaiKhoanBS();
        $on_llv = $p->onLLV($maCa);
        return $on_llv;
    }

    public function insLLV($idBs,$bacsi,$cakham,$stt){
        $p = new modelTaiKhoanBS();
        $in = $p->insLLV($idBs,$bacsi,$cakham,$stt);
        return $in;
    }

    public function insPKB($bacsi,$benhnhan,$phong,$chuandoan,$xetnghiem,$ketluan){
        $p = new modelTaiKhoanBS();
        $ID = $p->insPKB($bacsi,$benhnhan,$phong,$chuandoan,$xetnghiem,$ketluan);
        return $ID;
    }

    public function insPXN($maPKB, $benhnhan,$xetnghiem, $bacsi){
        $p = new modelTaiKhoanBS();
        $in = $p->insPXN($maPKB, $benhnhan, $xetnghiem, $bacsi);
        return $in;
    }

    public function insertResultXNM($maPXN){
        $p = new modelTaiKhoanBS();
        $in = $p->insertResultXNM($maPXN);
        return $in;
    }

    public function insDThuoc($maPKB, $benhnhan, $bacsi){
        $p = new modelTaiKhoanBS();
        $in = $p->insDThuoc($maPKB, $benhnhan, $bacsi);
        return $in;
    }

    public function deletePKB($maPKB){
        $p = new modelTaiKhoanBS();
        $in = $p->deletePKB($maPKB);
        return $in;
    }

    public function loadPKB($Bs){
        $p = new modelTaiKhoanBS();
        $listPkb = $p->loadPKB($Bs);
        return $listPkb;
    }
     
    public function get1PKB($id){
        $p = new modelTaiKhoanBS();
        $listPkb = $p->get1PKB($id);
        return $listPkb;
    }

    public function up1PKB($id,$bacsi,$benhnhan,$phong,$chuandoan,$ketluan){
        $p = new modelTaiKhoanBS();
        $listPkb = $p->up1PKB($id,$bacsi,$benhnhan,$phong,$chuandoan,$ketluan);
        return $listPkb;
    }

    public function loadLT(){
        $p = new modelTaiKhoanBS();
        $listLT = $p->loadLT();
        return $listLT;
    }

    public function insDT($maPKB,$benhnhan,$bacsi,$tenthuoc,$soluong,$lieudung,$cachdung,$ngaycap,$bhyt){
        $p = new modelTaiKhoanBS();
        $insDT = $p->insDT($maPKB,$benhnhan,$bacsi,$tenthuoc,$soluong,$lieudung,$cachdung,$ngaycap,$bhyt);
        return $insDT;
    }

    public function updateDT($maDT,$tenthuoc,$soluong,$lieudung,$cachdung,$ngaycap,$bhyt){
        $p = new modelTaiKhoanBS();
        $listDT = $p->updateDT($maDT,$tenthuoc,$soluong,$lieudung,$cachdung,$ngaycap,$bhyt);
        return $listDT;
    }
 
    public function ListBN(){
        $p = new modelTaiKhoanBS();
        $listBN = $p->ListBN();
        return $listBN;
    }

    public function loadDT(){
        $p = new modelTaiKhoanBS();
        $listDT = $p->loadDT();
        return $listDT;
    }

    public function get1DT($id){
        $p = new modelTaiKhoanBS();
        $oneDT = $p->get1DT($id);
        return $oneDT;
    }

    public function up1DT($id,$soluong,$lieudung,$cachdung){
        $p = new modelTaiKhoanBS();
        $oneDT = $p->up1DT($id,$soluong,$lieudung,$cachdung);
        return $oneDT;
    }

    public function getPXN($bacsi){
        $p = new modelTaiKhoanBS();
        $query = $p->getPXN($bacsi);
        return $query;
    }

    public function ListThuoc(){
        $p = new modelTaiKhoanBS();
        $result = $p->ListThuoc();
        foreach($result as $row)
        {
            echo '<option value="'.$row['tenthuoc'].'">'.$row['tenthuoc'].'</option>';
        }
        return $result;
    }
   }
//Nhan vien y ta
   class controllerBenhAn{
    public function loaddsBA(){
        $p = new modelBenhAn();
        $list = $p->loaddsBA();
        return $list;
    }

    public function insertBA($hoten,$ngaysinh,$gioitinh,$dantoc,$bhyt,$nn,$dvct,$diachi,$thoigiankham,$bacsi,$chuandoan,$ppdt,$kl,$nguoitao,$ghichu,$loaikhachhang,$ngaytao){
        $p = new modelBenhAn();
        $in = $p->insertBA($hoten,$ngaysinh,$gioitinh,$dantoc,$bhyt,$nn,$dvct,$diachi,$thoigiankham,$bacsi,$chuandoan,$ppdt,$kl,$nguoitao,$ghichu,$loaikhachhang,$ngaytao);
        return $in;
    }

    public function loadOneBA($id){
        $p = new modelBenhAn();
        $one = $p->loadOneBA($id);
        return $one;
    }

    public function getNameBs($maBS){
        $p = new modelBenhAn();
        $one = $p->getNameBs($maBS);
        return $one;
    }

    public function updateBA($id,$hoten,$bhyt,$bacsi,$chuandoan,$ppdt,$kl,$ghichu){
        $p = new modelBenhAn();
        $up = $p->updateBA($id,$hoten,$bhyt,$bacsi,$chuandoan,$ppdt,$kl,$ghichu);
        return $up;
    }

    public function deleteBA($id){
        $p = new modelBenhAn();
        $de = $p->deleteBA($id);
        return $de;
    }

    public function showBABN($ten){
        $p = new modelBenhAn();
        $ba = $p->showBABN($ten);
        return $ba;
    }

    public function chiTietBABN($maBN){
        $p = new modelBenhAn();
        $ctba = $p->chiTietBABN($maBN);
        return $ctba;
    }
   }
   class controllerDDKKB{

    public function loadDDKKB(){
        $p = new modelDDKKB();
        $list = $p->loadDDKKB();
        return $list;
    }

    public function getOneDDKKB($id){
        $p = new modelDDKKB();
        $one = $p->getOneDDKKB($id);
        return $one;
    }

    public function deleteOneDDKKB($id){
        $p = new modelDDKKB();
        $one = $p->deleteOneDDKKB($id);
        return $one;
    }

    public function duyetOneDDKKB($id){
        $p = new modelDDKKB();
        $one = $p->duyetOneDDKKB($id);
        return $one;
    }
    
    public function getListDDKKB($nameBs,$today){
        $p = new modelDDKKB();
        $list = $p->getListDDKKB($nameBs,$today);
        return $list;
    } 

    public function xulyOneDDKKB($id){
        $p = new modelDDKKB();
        $xuly = $p->xulyOneDDKKB($id);
        return $xuly;
    }
    
    public function loadQrDKKB(){
        $p = new modelDDKKB();
        $listQr = $p->loadQrDKKB();
        return $listQr;
    }

    public function getOneQRDDKKB($idQr){
        $p = new modelDDKKB();
        $oneQR = $p->getOneQRDDKKB($idQr);
        return $oneQR;
    }

    public function deleteOneQRDDKKB($idQr){
        $p = new modelDDKKB();
        $one = $p->deleteOneQRDDKKB($idQr);
        return $one;
    }

    public function duyetOneQRDDKKB($idQr){
        $p = new modelDDKKB();
        $one = $p->duyetOneQRDDKKB($idQr);
        return $one;
    }
   }

   class controllerTTBN{
    public function insertBN($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$nghenghiep,$bhyt){
        $p = new modelTTBN();
        $ins = $p->insertBN($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$nghenghiep,$bhyt);
        return $ins;
    }


    public function loadBN(){
        $p = new modelTTBN();
        $load = $p->loadBN();
        return $load;
    }

    public function getBN($id){
        $p = new modelTTBN();
        $get = $p->getBN($id);
        return $get;
    }

    public function updateBN($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$nghenghiep,$bhyt){
        $p = new modelTTBN();
        $up = $p->updateBN($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$nghenghiep,$bhyt);
        return $up;
    }

    public function deleteBN($id){
        $p = new modelTTBN();
        $del = $p->deleteBN($id);
        return $del;
    }
   }
   
   //nhân viên tiếp nhận
   class controlNVTN{
    public function getInfo($maTK){
        $p = new modelNVTN();
        $qr = $p->getInfo($maTK);
        return $qr;
    }

    public function updateInfo($maTK,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new modelNVTN();
        $qr = $p->updateInfo($maTK,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv);
        return $qr;
    }

    public function getLH(){
        $p = new modelNVTN();
        $qr = $p->getLH();
        return $qr;
    }

    public function getLHR(){
        $p = new modelNVTN();
        $qr = $p->getLHR();
        return $qr;
    }

    public function get1LH($id){
        $p = new modelNVTN();
        $qr = $p->get1LH($id);
        return $qr;
    }

    public function update1LH($id,$nguoitraloi,$phanhoi,$ngaygui){
        $p = new modelNVTN();
        $qr = $p->update1LH($id,$nguoitraloi,$phanhoi,$ngaygui);
        return $qr;
    }

    public function del1LH($id){
        $p = new modelNVTN();
        $qr = $p->del1LH($id);
        return $qr;
    }

    public function UpdateTTOffline($id){
        $p = new modelNVTN();
        $qr = $p->UpdateTTOffline($id);
        return $qr;
    }

    public function getTC(){
        $p = new modelNVTN();
        $qr = $p->getTC();
        return $qr;
    }

    public function get1TC($id){
        $p = new modelNVTN();
        $qr = $p->get1TC($id);
        return $qr;
    }

    public function update1TC($id,$phanhoi,$noidung,$ngaygui){
        $p = new modelNVTN();
        $qr = $p->update1TC($id,$phanhoi,$noidung,$ngaygui);
        return $qr;
    }

    public function up1TCHT($id){
        $p = new modelNVTN();
        $qr = $p->up1TCHT($id);
        return $qr;
    }

    public function getKBOff(){
        $p = new modelNVTN();
        $qr = $p->getKBOff();
        return $qr;
    }

    public function searchBS($key){
        $p = new modelNVTN();
        $qr = $p->searchBS($key);
        return $qr;
    }

    public function searchBN($key){
        $p = new modelNVTN();
        $qr = $p->searchBN($key);
        return $qr;
    }

    public function searchKB($key){
        $p = new modelNVTN();
        $qr = $p->searchKB($key);
        return $qr;
    }

    public function searchTC($key){
        $p = new modelNVTN();
        $qr = $p->searchTC($key);
        return $qr;
    }
    public function thu2sang($maNVTN)
    {
        $p = new modelNVTN();
        $llv = $p->thu2sang($maNVTN);
        return $llv;
    }

    public function thu2chieu($maNVTN)
    {
        $p = new modelNVTN();
        $llv = $p->thu2chieu($maNVTN);
        return $llv;
    }

    public function thu3sang($maNVTN)
    {
        $p = new modelNVTN();
        $llv = $p->thu3sang($maNVTN);
        return $llv;
    }

    public function thu3chieu($maNVTN)
    {
        $p = new modelNVTN();
        $llv = $p->thu3chieu($maNVTN);
        return $llv;
    }

    public function thu4sang($maNVTN)
    {
        $p = new modelNVTN();
        $llv = $p->thu4sang($maNVTN);
        return $llv;
    }

    public function thu4chieu($maNVTN)
    {
        $p = new modelNVTN();
        $llv = $p->thu4chieu($maNVTN);
        return $llv;
    }

    public function thu5sang($maNVTN)
    {
        $p = new modelNVTN();
        $llv = $p->thu5sang($maNVTN);
        return $llv;
    }

    public function thu5chieu($maNVTN)
    {
        $p = new modelNVTN();
        $llv = $p->thu5chieu($maNVTN);
        return $llv;
    }

    public function thu6sang($maNVTN)
    {
        $p = new modelNVTN();
        $llv = $p->thu6sang($maNVTN);
        return $llv;
    }

    public function thu6chieu($maNVTN)
    {
        $p = new modelNVTN();
        $llv = $p->thu6chieu($maNVTN);
        return $llv;
    }

    public function thu7sang($maNVTN)
    {
        $p = new modelNVTN();
        $llv = $p->thu7sang($maNVTN);
        return $llv;
    }

    public function thu7chieu($maNVTN)
    {
        $p = new modelNVTN();
        $llv = $p->thu7chieu($maNVTN);
        return $llv;
    }

    public function thu8sang($maNVTN)
    {
        $p = new modelNVTN();
        $llv = $p->thu8sang($maNVTN);
        return $llv;
    }

    public function thu8chieu($maNVTN)
    {
        $p = new modelNVTN();
        $llv = $p->thu8chieu($maNVTN);
        return $llv;
    }

   }

   class ControllerNVXN
   {

    public function AddChuKy($id, $signatureFileName){
        $p = new modelNVXN();
        $qr = $p->AddChuKy($id, $signatureFileName);
        return $qr;
    }  

    public function getInfo($maTK){
        $p = new modelNVXN();
        $qr = $p->getInfo($maTK);
        return $qr;
    }

    public function updateInfo($maTK,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new modelNVTN();
        $qr = $p->updateInfo($maTK,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv);
        return $qr;
    }

    public function AddPXN($ht,$lxn,$mxn,$kq,$gc,$ngaythuchien,$nguoithuchien,$QRCode)
    {
        $p = new modelNVXN();
        $qr = $p->AddPXN($ht,$lxn,$mxn,$kq,$gc,$ngaythuchien,$nguoithuchien,$QRCode);
        return $qr;    
    }

    public function getPXN(){
        $p = new modelNVXN();
        $qr = $p->getPXN();
        return $qr;
    }

    public function get1PXN($id){
        $p = new modelNVXN();
        $qr = $p->get1PXN($id);
        return $qr;
    }

    public function ResultXN($loaiXN,$id){
        $p = new modelNVXN();
        $qr = $p->ResultXN($loaiXN,$id);
        return $qr;
    }

    public function Update($id,$mxn,$ngaythuchien,$nguoithuchien){
        $p = new modelNVXN();
        $qr = $p->Update($id,$mxn,$ngaythuchien,$nguoithuchien);
        return $qr;
    }

    public function UpdateResultXNM($maPXN,$ctm,$kqxn,$tsbt,$dv){
        $p = new modelNVXN();
        $qr = $p->UpdateResultXNM($maPXN,$ctm,$kqxn,$tsbt,$dv);
        return $qr;
    }

    public function Delete($id)
    {
        $p = new modelNVXN();
        $qr = $p->Delete($id);
        return $qr;
    }
   
   }
class ControllerGiamDoc
{
    public function thongkeDKKBon($ngaybatdau,$ngayketthuc){
        $p = new modelGiamDoc();
        $qr = $p->thongkeDKKBon($ngaybatdau,$ngayketthuc);
        return $qr;
    }
        public function thongkeDKKBondatt($ngaybatdau,$ngayketthuc){
        $p = new modelGiamDoc();
        $qr = $p->thongkeDKKBondatt($ngaybatdau,$ngayketthuc);
        return $qr;
    }
        public function thongkeDKKBonctt($ngaybatdau,$ngayketthuc){
        $p = new modelGiamDoc();
        $qr = $p->thongkeDKKBonchuatt($ngaybatdau,$ngayketthuc);
        return $qr;
    }
    public function thongkeDKKBoff($ngaybatdau,$ngayketthuc){
        $p = new modelGiamDoc();
        $qr = $p->thongkeDKKBoff($ngaybatdau,$ngayketthuc);
        return $qr;
    }
    public function thongkedoanhthu($ngaybatdau,$ngayketthuc){
        $p = new modelGiamDoc();
        $qr = $p->thongkedoanhthu($ngaybatdau,$ngayketthuc);
        return $qr;
    }
    public function thongkedoanhthutc($ngaybatdau,$ngayketthuc){
        $p = new modelGiamDoc();
        $qr = $p->thongkedoanhthutc($ngaybatdau,$ngayketthuc);
        return $qr;
    }
    public function dembs(){
        $p = new modelGiamDoc();
        $qr = $p->dembs();
        return $qr;
    }
    public function demyta(){
        $p = new modelGiamDoc();
        $qr = $p->demyta();
        return $qr;
    }
    public function demnvtn(){
        $p = new modelGiamDoc();
        $qr = $p->demnvtn();
        return $qr;
    }
    public function demnvxn(){
        $p = new modelGiamDoc();
        $qr = $p->demnvxn();
        return $qr;
    }
    public function demnvql(){
        $p = new modelGiamDoc();
        $qr = $p->demnvql();
        return $qr;
    }
    public function demnvqt(){
        $p = new modelGiamDoc();
        $qr = $p->demNVQT();
        return $qr;
    }
    public function getInfo($maTK){
        $p = new modelGiamDoc();
        $qr = $p->getInfo($maTK);
        return $qr;
    }
    public function updateInfo($maTK,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new modelGiamDoc();
        $qr = $p->updateInfo($maTK,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv);
        return $qr;
    }
    public function loadLichSu($tenbn)
    {
        $p = new modelgiamdoc();
        $a = $p->loadLichSu($tenbn);
        return $a;
    }
    public function loadBN()
    {
        $p = new modelgiamdoc();
        $a = $p->loadBN();
        return $a;
    }
    public function loadBS()
    {
        $p = new modelgiamdoc();
        $a = $p->loadBS();
        return $a;
    }
    public function get1BS($maBS)
    {
        $p = new modelgiamdoc();
        $a = $p->get1BS($maBS);
        return $a;
    }
    public function loadNVQT()
    {
        $p = new modelgiamdoc();
        $a = $p->loadNVQT();
        return $a;
    }
    public function get1NVQT($maBS)
    {
        $p = new modelgiamdoc();
        $a = $p->get1NVQT($maBS);
        return $a;
    }
    public function loadYTa()
    {
        $p = new modelgiamdoc();
        $a = $p->loadYTa();
        return $a;
    }
    public function get1YTa($maYTa)
    {
        $p = new modelgiamdoc();
        $a = $p->get1YTa($maYTa);
        return $a;
    }
    public function loadNVTN()
    {
        $p = new modelgiamdoc();
        $a = $p->loadNVTN();
        return $a;
    }
    public function get1NVTN($maNVTN)
    {
        $p = new modelgiamdoc();
        $a = $p->get1NVTN($maNVTN);
        return $a;
    }
    public function loadNVXN()
    {
        $p = new modelgiamdoc();
        $a = $p->loadNVXN();
        return $a;
    }
    public function get1NVXN($maNVXN)
    {
        $p = new modelgiamdoc();
        $a = $p->get1NVXN($maNVXN);
        return $a;
    }
    public function loadNVQL()
    {
        $p = new modelgiamdoc();
        $a = $p->loadNVQL();
        return $a;
    }
    public function get1NVQL($maNVQL)
    {
        $p = new modelgiamdoc();
        $a = $p->get1NVQL($maNVQL);
        return $a;
    }
    public function get1BN($maBN)
    {
        $p = new modelgiamdoc();
        $a = $p->get1BN($maBN);
        return $a;
    }
    public function get1BA($maBA)
    {
        $p = new modelgiamdoc();
        $a = $p->get1BA($maBA);
        return $a;
    }

}
class ControllerNVQL
{
    public function getInfo($maTK){
        $p = new modelnvql();
        $qr = $p->getInfo($maTK);
        return $qr;
    }
    public function updateInfo($maTK,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new modelnvql();
        $qr = $p->updateInfo($maTK,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv);
        return $qr;
    }
    public function loadBN()
    {
        $p = new modelnvql();
        $a = $p->loadBN();
        return $a;
    }
    public function loadBS()
    {
        $p = new modelnvql();
        $a = $p->loadBS();
        return $a;
    }
    public function get1BS($maBS)
    {
        $p = new modelnvql();
        $a = $p->get1BS($maBS);
        return $a;
    }
    public function loadYTa()
    {
        $p = new modelnvql();
        $a = $p->loadYTa();
        return $a;
    }
    public function get1YTa($maYTa)
    {
        $p = new modelnvql();
        $a = $p->get1YTa($maYTa);
        return $a;
    }
    public function loadNVTN()
    {
        $p = new modelnvql();
        $a = $p->loadNVTN();
        return $a;
    }
    public function get1NVTN($maNVTN)
    {
        $p = new modelnvql();
        $a = $p->get1NVTN($maNVTN);
        return $a;
    }
    public function loadGD()
    {
        $p = new modelnvql();
        $a = $p->loadGD();
        return $a;
    }
    public function get1GD($maGD)
    {
        $p = new modelnvql();
        $a = $p->get1gd($maGD);
        return $a;
    }
    public function loadNVXN()
    {
        $p = new modelnvql();
        $a = $p->loadNVXN();
        return $a;
    }
    public function get1NVXN($maNVXN)
    {
        $p = new modelnvql();
        $a = $p->get1NVXN($maNVXN);
        return $a;
    }
    public function loadNVQL()
    {
        $p = new modelnvql();
        $a = $p->loadNVQL();
        return $a;
    }
    public function get1NVQL($maNVQL)
    {
        $p = new modelnvql();
        $a = $p->get1NVQL($maNVQL);
        return $a;
    }
    public function get1BN($maBN)
    {
        $p = new modelnvql();
        $a = $p->get1BN($maBN);
        return $a;
    }
    public function loadTB()
    {
        $p = new modelnvql();
        $a = $p->loadTB();
        return $a;
    }
    public function get1tb($maNVTN)
    {
        $p = new modelnvql();
        $a = $p->get1tb($maNVTN);
        return $a;
    }
    public function loadNVQT()
    {
        $p = new modelnvql();
        $a = $p->loadNVQT();
        return $a;
    }
    public function get1NVQT($maNVTN)
    {
        $p = new modelnvql();
        $a = $p->get1NVQT($maNVTN);
        return $a;
    }
    public function insertTB($hoten,$ngaysinh,$diachi,$gioitinh)
    {
        $p = new modelnvql();
        $a = $p->insertTB($hoten,$ngaysinh,$diachi,$gioitinh);
        return $a;
    }
    public function insertBS($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv)
    {
        $p = new modelnvql();
        $a = $p->insertBS($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv);
        return $a;
    }
    public function insertYTa($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv)
    {
        $p = new modelnvql();
        $a = $p->insertYTa($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv);
        return $a;
    }
    public function insertGD($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv)
    {
        $p = new modelnvql();
        $a = $p->insertGD($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv);
        return $a;
    }
    public function insertNVTN($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv)
    {
        $p = new modelnvql();
        $a = $p->insertNVTN($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv);
        return $a;
    }
    public function insertNVXN($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv)
    {
        $p = new modelnvql();
        $a = $p->insertNVXN($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv);
        return $a;
    }
    public function insertNVQL($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv)
    {
        $p = new modelnvql();
        $a = $p->insertNVQL($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv);
        return $a;
    }    
    public function insertNVQT($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv)
    {
        $p = new modelnvql();
        $a = $p->insertNVQT($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv);
        return $a;
    }
    public function insertBN($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv,$bhyt)
    {
        $p = new modelnvql();
        $a = $p->insertBN($hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv,$bhyt);
        return $a;
    }
    public function updateTB($id,$hoten,$ngaysinh,$diachi,$gioitinh){
        $p = new modelnvql();
        $up = $p->updateTB($id,$hoten,$ngaysinh,$diachi,$gioitinh);
        return $up;
    }
    public function updateBS($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new modelnvql();
        $up = $p->updateBS($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv);
        return $up;
    }
    public function updateYta($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new modelnvql();
        $up = $p->updateYta($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv);
        return $up;
    }
    public function updateGD($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new modelnvql();
        $up = $p->updateGD($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv);
        return $up;
    }
    public function updateNVTN($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new modelnvql();
        $up = $p->updateNVTN($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv);
        return $up;
    }
    public function updateNVXN($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new modelnvql();
        $up = $p->updateNVXN($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv);
        return $up;
    }
    public function updateNVQL($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new modelnvql();
        $up = $p->updateNVQL($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv);
        return $up;
    }
    public function updateNVQT($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new modelnvql();
        $up = $p->updateNVQT($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv);
        return $up;
    }
    public function updateBN($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv,$bhyt){
        $p = new modelnvql();
        $up = $p->updateBN($id,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv,$bhyt);
        return $up;
    }
    public function Delete($id)
    {
        $p = new modelnvql();
        $qr = $p->Delete($id);
        return $qr;
    }

}
class controllerNVQT
{
    public function getInfo($maTK){
        $p = new modelNVQT();
        $qr = $p->getInfo($maTK);
        return $qr;
    }
    public function updateInfo($maTK,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv){
        $p = new modelNVQT();
        $qr = $p->updateInfo($maTK,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$vtcv);
        return $qr;
    }    public function loadThuoc()
    {
        $p = new modelNVQT();
        $a = $p->loadThuoc();
        return $a;
    }
    public function get1thuoc($maThuoc)
    {
        $p = new modelNVQT();
        $a = $p->get1thuoc($maThuoc);
        return $a;
    }
    public function loadLoaiThuoc()
    {
        $p = new modelNVQT();
        $a = $p->loadLoaiThuoc();
        return $a;
    }
    public function insertThuoc($maLoaiThuoc,$tenthuoc,$soluong,$gia)
    {
        $p = new modelNVQT();
        $a = $p->insertThuoc($maLoaiThuoc,$tenthuoc,$soluong,$gia);
        return $a;
    }
    public function updateThuoc($id,$maLoaiThuoc,$tenthuoc,$soluong,$gia)
    {
        $p = new modelNVQT();
        $a = $p->updateThuoc($id,$maLoaiThuoc,$tenthuoc,$soluong,$gia);
        return $a;
    }
    public function Delete($id)
    {
        $p = new modelNVQT();
        $qr = $p->Delete($id);
        return $qr;
    }
}
?>