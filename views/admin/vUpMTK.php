<?php
    include '../../controllers/cTK.php'; 
    if(isset($_GET['idTK'])){
        $MaTK = $_GET['idTK'];
        $p = new controllerTK();
        $tk = $p->getOneTK($MaTK);
        $row = mysqli_fetch_assoc($tk);
    }else{
        return false;
    }
?>
<h4 style="text-align: center;">Cập nhật mã tài khoản: <?php echo $MaTK;?></h4>
<form method="POST">
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Tên người dùng:</label>
       <input type="text" class="form-control" value="<?php echo $row['user']; ?>" name="user">
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4">Vai trò:</label>
       <input type="text" class="form-control" value="<?php echo $row['role']; ?>" name="role">
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4">MTK:</label>
       <input type="text" class="form-control" value="" name="mtk">
    </div>
    <br>
  <button type="submit" name="updateMTK" class="btn btn-primary" style="margin-left: 900px;">Cập nhật</button>
  <a href="?action=QLTK&query=add">
    <button type="button" class="btn btn-danger" style="margin-left: 900px;">Đóng</button>
  </a>
</form>
<?php
   if(isset($_POST['updateMTK'])){
    $user = $_POST['user'];
    $role = $_POST['role'];
    $mtk  = $_POST['mtk'];
    if(!$user || !$role || !$mtk){
        echo '<script> 
        window.location.href="admin.php?tk=mtk&idTK='.$MaTK.'";
        alert("Thông tin không được để trống!"); </script>';
    }else{
        if(!preg_match("/^[0-9]{1,5}/",$mtk)){
            echo '<script>
                window.location.href="admin.php?tk=mtk&idTK='.$MaTK.'";
                alert("Cập nhật thất bại. Mã tài khoản không hợp lệ, vui lòng kiểm tra lại!");</script>';
        }else{
            switch($role){
                case "Admin":
                    $ad = $p->upMTKadmin($user,$mtk);
                    if($ad){
                        echo '<script> 
                                 window.location.href="admin.php?tk=mtk&idTK='.$MaTK.'";
                                 alert("Cập nhật thành công mã tài khoản Admin!"); </script>';
                      }
                    else{
                        echo '<script> 
                                 window.location.href="admin.php?tk=mtk&idTK='.$MaTK.'";
                                 alert("Cập nhật thất bại!"); </script>';
                    }
                    break;
                case "Bệnh nhân":
                    $bn = $p->upMTKbn($user,$mtk);
                    if($bn){
                        echo '<script> 
                                 window.location.href="admin.php?tk=mtk&idTK='.$MaTK.'";
                                 alert("Cập nhật thành công mã tài khoản bệnh nhân!"); </script>';
                      }
                    else{
                        echo '<script> 
                                 window.location.href="admin.php?tk=mtk&idTK='.$MaTK.'";
                                 alert("Cập nhật thất bại!"); </script>';
                    }
                    break;
                case "Nhân viên y tá":
                    $yt = $p->upMTKyt($user,$mtk);
                    if($yt){
                        echo '<script> 
                                 window.location.href="admin.php?tk=mtk&idTK='.$MaTK.'";
                                 alert("Cập nhật thành công mã tài khoản nhân viên y tá!"); </script>';
                      }
                    else{
                        echo '<script> 
                                 window.location.href="admin.php?tk=mtk&idTK='.$MaTK.'";
                                 alert("Cập nhật thất bại!"); </script>';
                    }
                    break;
                case "Bác sĩ":
                    $bs = $p->upMTKbs($user,$mtk);
                    if($yt){
                        echo '<script> 
                                 window.location.href="admin.php?tk=mtk&idTK='.$MaTK.'";
                                 alert("Cập nhật thành công mã tài khoản bác sĩ!"); </script>';
                      }
                    else{
                        echo '<script> 
                                 window.location.href="admin.php?tk=mtk&idTK='.$MaTK.'";
                                 alert("Cập nhật thất bại!"); </script>';
                    }
                    break;
                default:
                     echo '<script> 
                          window.location.href="admin.php?action=QLTK&query=add";
                          alert("Cập nhật không thành công!"); </script>';
                }
            }
                
        }
    }
   //}
?>