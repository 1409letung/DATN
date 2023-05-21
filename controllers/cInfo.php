<?php
   include "./models/mTK.php";
   class controllerInfoTK{

    public function getAllTaiKhoan(){
        $p = new modelTaiKhoan();
        $taiKhoan = $p->getAllTaiKhoan();
        return $taiKhoan;
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

    public function getInfoBN($maTK){
        $p = new modelTaiKhoan();
        $info = $p->getInfoBN($maTK);
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
   }
?>