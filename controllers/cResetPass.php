<?php 
include '../models/admin/mTaiKhoan.php';
   class passWord{
    public $user;
    static public function profileUser($user){
        if(isset($_SESSION['login'])){
        $p = new data();
        $sql = "SELECT * 
                FROM tb_taikhoan AS tk INNER JOIN tb_benhnhan AS bn
                ON tk.user = bn.hoten
                WHERE tk.user = $user ";
        $s = $p->executeSingLesult($sql);
        return $s;
      }
    }
   }

?>