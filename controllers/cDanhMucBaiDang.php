<?php
   include '../models/mDanhMucBaiDang.php';
   
   class cBaiDang{
     public function inDM($tendanhmuc){
        $p = new modelBaiDang();
        $rs = $p->inDM($tendanhmuc);
        return $rs;
    }
   }
   class cTTBacSi{
      public function loadBs(){
         $p = new modelTTBacSi();
         $rs = $p->loadBs();
         return $rs;
     }
     public function loadCK($mack){
      $p = new modelTTBacSi();
      $rs = $p->loadCK($mack);
      return $rs;
  }
    }
?>