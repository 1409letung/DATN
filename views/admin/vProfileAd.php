<?php
    include '../../controllers/cTK.php';
      $maTK = $_SESSION['MaTK'];
	  $p = new controllerTK();
	  $infoAdmin = $p->getInfoAdmin($maTK);
	  $infoTK = $p->getInfoTK($maTK);
	  $rowAdmin = mysqli_fetch_assoc($infoAdmin);
	  $maAd = $rowAdmin['MaAdmin'];
	  $rowTK = mysqli_fetch_assoc($infoTK);
?>
<h3 style="text-align: center; color:#007ae1; font-family: Times New Roman, Times, serif;">Thông tin người dùng</h3>
<div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-50">
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
				</div>
				<h5 class="user-name"><?php echo $rowAdmin['hoten']; ?></h5>
				<!-- <h6 class="user-email">yuki@Maxwell.com</h6> -->
			</div>
			<!-- <div class="about">
				<h5>about</h5>
				<p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human experiences.</p>
			</div> -->
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
        <div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Thông tin tài khoản</h6>
			</div>
			
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">Tên tài khoản</label>
					<!-- <input type="text" class="form-control" id="fullName" placeholder="Enter full name"> -->
                    <span type="text" class="form-control" id="fullName"><?php echo $rowTK['username']; ?></span>
				</div>
			</div>
            <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Mật khẩu</label>
                    <input type="password" class="form-control" id="gioitinh" readonly value="<?php echo $rowTK['password'] ?>">
				</div>
			</div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<button type="button" id="submit" name="submit" class="btn btn-warning" data-toggle="modal" data-target="#myModal" style="margin-top: 20px;">Đổi mật khẩu</button>
				</div>
			</div>
		</div>
        <br>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Thông tin cá nhân</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">Họ và tên</label>
					<!-- <input type="text" class="form-control" id="fullName" placeholder="Enter full name"> -->
                    <span type="text" class="form-control" id="fullName"><?php echo $rowAdmin['hoten'] ?></span>
				</div>
			</div>
            <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Giới tính</label>
					<!-- <input type="email" class="form-control" id="eMail" placeholder="Enter email ID"> -->
                    <span type="text" class="form-control" id="gioitinh"><?php echo $rowAdmin['gioitinh'] ?></span>
				</div>
			</div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Ngày sinh</label>
					<!-- <input type="email" class="form-control" id="eMail" placeholder="Enter email ID"> -->
                    <span type="date" class="form-control" id="ngaysinh"><?php echo $rowAdmin['ngaysinh'] ?></span>
				</div>
			</div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Số điện thoại</label>
					<!-- <input type="text" class="form-control" id="phone" placeholder="Enter phone number"> -->
                    <span type="text" class="form-control" id="phone"><?php echo $rowAdmin['sdt'] ?></span>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Email</label>
					<!-- <input type="email" class="form-control" id="eMail" placeholder="Enter email ID"> -->
                    <span type="email" class="form-control" id="eMail"><?php echo $rowAdmin['email'] ?></span>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">Nghề nghiệp</label>
                    <span type="url" class="form-control" id="website"><?php echo $rowAdmin['congviec'] ?></span>
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mt-3 mb-2 text-primary">Địa chỉ</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Street">Nơi ở hiện tại</label>
					<!-- <input type="name" class="form-control" id="Street" placeholder="Enter Street"> -->
                    <span type="name" class="form-control" id="Street"><?php echo $rowAdmin['diachi'] ?></span>
				</div>
			</div>
		</div>
        <br>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-center">
					<button type="button" id="submit" name="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalUpdate">Cập nhật thông tin </button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>

<style>
    /* body {
    margin: 0;
    padding-top: 40px;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
} */
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}
</style>

<!-- Popup đổi mật khẩu -->
<!-- The Modal -->
      <div class="modal" id="myModal">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header" >
                  <h4 class="modal-title" style="color: #00FF00; margin-left: 150px;">Đổi mật khẩu</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
                  <form action="" method="POST" class="">
                  <div class="form-group ">
                    <label for="">Mật khẩu hiện tại:</label>
                       <input type="text" class="form-control"  name="passNow">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Mật khẩu mới:</label>
                       <input type="password" class="form-control"  name="passNew">
                  </div>
				  <div class="form-group">
                    <label for="pwd">Nhập lại khẩu mới:</label>
                       <input type="password" class="form-control"  name="rePassNew">
                  </div>
				
				  <div class="modal-footer">
					<button type="submit" name="resetPass" class="btn btn-primary btn-footer" style="text-align: center;">Xác nhận</button>
                  </div>
                 </form>
               </div>
<?php
	if(isset($_POST['resetPass'])){
        $passNow = md5($_POST['passNow']);  
	    $passNew = md5($_POST['passNew']);
	    $rePassNew = md5($_POST['rePassNew']);
		if($passNow != $rowTK['password']){
		    echo '<script> alert("Mật khẩu hiện tại không đúng!") </script>';
            //echo header("refresh:0;url=''");
		}else{
			if($passNew != $rePassNew){
				echo '<script> alert("Mật khẩu mới không khớp nhau!") </script>';
                echo  '<meta http-equiv="refresh" content="3;url=admin.php?action=show&query=profile">';
			}else{
				$rs = $p->resetPw($maTK, $passNew);
				if($rs){
                    unset($_POST['resetPass']);
					echo '<script> alert("Đổi mật khẩu thành công!") </script>';
                    echo  '<meta http-equiv="refresh" content="3;url=admin.php?action=show&query=profile">';
				}else{
                    unset($_POST['resetPass']);
					echo '<script> alert("Đổi mật khẩu thất bại!") </script>';
					echo  '<meta http-equiv="refresh" content="3;url=admin.php?action=show&query=profile">';
				}
			}
		}
	}
	else{

	}             
?>
            </div>
         </div>
      </div>
<!-- cho thuộc tính này vào nút button sẽ thực hiện thao tác đóng hộp thông báo data-dismiss="modal" -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- end popup đổi mật khẩu -->
<!-- Start cập nhật thông tin tài khoản -->
<div class="modal" id="modalUpdate">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header" >
                  <h4 class="modal-title" style="color: #FF000088; margin-left: 80px;">Cập nhật thông tin cá nhân</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
                  <form action="" method="POST" class="">
                  <div class="form-group ">
                    <label for="">Họ tên:</label>
                       <input type="text" class="form-control"  name="hoten" value="<?php echo $rowAdmin['hoten'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Ngày sinh:</label>
                       <input type="date" class="form-control"  name="ngaysinh" value="<?php echo $rowAdmin['ngaysinh'] ?>">
                  </div>
				  <div class="form-group">
                    <label for="pwd">Giới tính:</label>
                       <input type="text" class="form-control"  name="gioitinh" value="<?php echo $rowAdmin['gioitinh'] ?>">
                  </div>
				  <div class="form-group ">
                    <label for="">Địa chỉ:</label>
                       <input type="text" class="form-control"  name="diachi" value="<?php echo $rowAdmin['diachi'] ?>">
                  </div>
				  <div class="form-group">
                    <label for="">Số điện thoại:</label>
                       <input type="text" class="form-control"  name="sdt" value="<?php echo $rowAdmin['sdt'] ?>">
                  </div>
				  <div class="form-group ">
                    <label for="">Email:</label>
                       <input type="text" class="form-control"  name="email" value="<?php echo $rowAdmin['email'] ?>">
                  </div>
				  <div class="form-group ">
                    <label for="">Nghề nghiệp:</label>
                       <input type="text" class="form-control"  name="cv" value="<?php echo $rowAdmin['congviec'] ?>">
                  </div>
				  <div class="modal-footer">
					<button type="submit" name="updateTTCNAd" class="btn btn-primary btn-footer" style="text-align: center;">Xác nhận</button>
                  </div>
                 </form>
               </div>
<!-- End cập nhật thông tin tài khoản -->
<?php
    if(isset($_POST['updateTTCNAd'])){
        $hoten       = $_POST['hoten'];
        $ngaysinh    = $_POST['ngaysinh'];
        $gioitinh    = $_POST['gioitinh'];
        $diachi      = $_POST['diachi'];
        $sdt         = $_POST['sdt'];
        $email       = $_POST['email'];
        $cv  = $_POST['cv'];
        if(!$hoten || !$ngaysinh || !$gioitinh || !$diachi || !$sdt || !$email || !$cv){
            echo '<script> alert("Hãy nhập thông tin cần cập nhật!") </script>';
        }else
        {
            $kq = $p->updateTTCNAd($maAd,$hoten,$ngaysinh,$gioitinh,$diachi,$sdt,$email,$cv);
            if($kq){
                unset($_POST['updateTTCNAd']);
                echo '<script> alert("Cập nhật thông tin thành công!") </script>';
                echo  '<meta http-equiv="refresh" content="3;url=admin.php?action=show&query=profile">';
            }else{
                unset($_POST['updateTTCNAd']);
                echo '<script> alert("Cập nhật thông tin thất bại!") </script>';
                echo  '<meta http-equiv="refresh" content="3;url=admin.php?action=show&query=profile">';
            }
        }
    }
?>

