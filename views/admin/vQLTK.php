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

</script>
<!-- Start Đơn đăng ký -->
<button type="button" class="btn btn-primary btn-sm" style="margin-left: 20px; width:180px; height:40px;"
    data-toggle="modal" data-target="#myModal">

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus"
        viewBox="0 0 16 16">
        <path
            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
        <path
            d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z" />
    </svg>
    Thêm tài khoản mới
</button>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: bisque;">
                <h4 class="modal-title" style="margin-left: 100px; color:#0033FF;"> <b>Thông tin tài khoản mới</b></h4>
                <button type="button" class="close" data-dismiss="modal"
                    style="border-radius: 5px;border-color: white;">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST" action="../../controllers/cQLTK.php" class="form-control">
                    <div class="form-group col-12">
                        <label for="User name">Họ và tên:</label>
                        <input type="username" class="form-control" name="user" placeholder="Vd: Nguyễn An Long">
                    </div>
                    <div class="form-group col-12">
                        <label for="User name">Tài khoản:</label>
                        <input type="username" class="form-control" name="username"
                            placeholder="Tài khoản gồm có chữ thường, chữ in hoa và chữ số ">
                    </div>
                    <div class="form-group col-12">
                        <label for="Pass Word">Mật khẩu:</label>
                        <input type="password" class="form-control" name="password" id="psw"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}">
                    </div>
                    <div id="message">
                        <h6>Mật khẩu phải đảm bảo các điều khiện sau:</h6>
                        <p id="letter" class="invalid">Ít nhất 1<b>chữ cái viết thường</b></p>
                        <p id="capital" class="invalid">Ít nhất 1 <b>chữ cái viết hoa</b></p>
                        <p id="number" class="invalid">Ít nhất 1 <b>chữ số</b></p>
                        <p id="char" class="invalid"> <b>Ký tự đặc biệt</b></p>
                        <p id="length" class="invalid">Độ dài từ <b>8-15</b> ký tự</p>
                    </div>
                    <div class="form-group col-5">
                        <label for="cars">Vai trò:</label>
                        <select name="role" class="form-control">
                            <option value="Admin">Admin</option>
                            <option value="Bệnh nhân">Bệnh nhân</option>
                            <option value="Nhân viên y tá">Nhân viên y tá</option>
                            <option value="Bác sĩ">Bác sĩ</option>
                            <option value="Tiếp nhận">Nhân viên tiếp nhận</option>
                            <option value="Nhân viên xét nghiệm">Nhân viên xét nghiệm</option>
                            <option value="Nhân viên quản lý">Nhân viên quản lý</option>
                            <option value="Nhân viên quầy thuốc">Nhân viên quầy thuốc</option>
                            <option value="Giám Đốc">Giám Đốc</option>
                        </select>
                    </div>
                    <div class="form-group col-12">
                        <label for="">Ngày sinh:</label>
                        <input type="date" class="form-control" name="ngaysinh">
                    </div>
                    <br>
                    <div class="form-group col-12">
                        <label for="">Giới tính:</label>
                        <select name="gioitinh" class="form-control">
                            <option value="nam">Nam</option>
                            <option value="nu">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group col-12">
                        <label for="">Địa chỉ:</label>
                        <input type="text" class="form-control" name="diachi">
                    </div>
                    <div class="form-group col-12">
                        <label for="">SĐT:</label>
                        <input type="text" class="form-control" name="sdt" placeholder="Tối đa 10 chữ số">
                    </div>
                    <div class="form-group col-12">
                        <label for="">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Vd:email@gmail.com">
                    </div>
                    <div class="form-group col-12">
                        <label for="">Vị trí công việc:</label>
                        <input type="text" class="form-control" name="cv" placeholder="">

                    </div>
                    </br>
                    <button name="taotaikhoan" value="submit" class="btn btn-primary" style="margin-left: 180px;"> Đăng
                        ký</button>
                </form>
            </div>
        </div>
    </div>
</div>

<br>

<style>
/* The message box is shown when the user clicks on the password field */
#message {
    display: none;
    background: #f1f1f1;
    color: #000;
    position: relative;
    padding: 20px;
    margin-top: 10px;
}

#message p {
    padding: 10px 35px;
    font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
    color: green;
}

.valid:before {
    position: relative;
    left: -35px;
    content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
    color: red;
}

.invalid:before {
    position: relative;
    left: -35px;
    content: "✖";
}
</style>
<!-- js cho kiểm tra mật khẩu -->
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var cha = document.getElementById("char");

// Khi người dùng nhấp vào trường mật khẩu, hiển thị hộp thông báo
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

// Khi người dùng click ra ngoài trường mật khẩu thì ẩn hộp thông báo
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}

// Khi người dùng bắt đầu nhập nội dung nào đó bên trong trường mật khẩu
myInput.onkeyup = function() {
    // Xác nhận chữ thường
    var lowerCaseLetters = /[a-z]/g;
    if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }

    // Xác nhận chữ in hoa
    var upperCaseLetters = /[A-Z]/g;
    if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }

    // Xác nhận chữ số
    var numbers = /[0-9]/g;
    if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }

    // Xác nhận ký tự đặc biệt
    var cha1 = /[!@#$%^&*_=+-]/g;
    if (myInput.value.match(cha1)) {
        cha.classList.remove("invalid");
        cha.classList.add("valid");
    } else {
        cha.classList.remove("valid");
        cha.classList.add("invalid");
    }

    // Xác nhận độ dài
    if ((myInput.value.length >= 8) && (myInput.value.length <= 15)) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }

}
</script>

<br>
<h4 style="text-align: center; color:forestgreen;">Danh sách tài khoản</h4>
<table class="table bg-white rounded shadow-sm  table-hover col-4">
    <thead>
        <tr style="text-align: center;">
            <th scope="col">STT</th>
            <th scope="col">Mã TK</th>
            <th scope="col">Người dùng</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <?php
  $p = new controllerTK();
  $row = $p->loadTK();
  $i = 0;
  foreach($row as $rw){
    $i++;
?>
    <tbody>
        <tr style="text-align: center;">
            <th><?php echo $i;?></th>
            <th><?php echo $rw['MaTK'];?></th>
            <td><?php echo $rw['user'];?></td>
            <td><?php echo $rw['ngaytao'];?></td>
            <td>
                <a href="?tk=xem&idTK=<?php echo $rw['MaTK']; ?>">
                    <button type="button" value="submit" class="btn btn-warning btn-sm" data-toggle="modal"
                        data-target="xemchitiet">
                        <i class="bi bi-eye-fill"></i>
                    </button>
                </a>
                <a href="?tk=sua&idTK=<?php echo $rw['MaTK']; ?>">
                    <button type="button" value="submit" class="btn btn-primary btn-sm">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                </a>
                <a href="?tk=xoa&idTK=<?php echo $rw['MaTK']; ?>">
                    <button type="button" value="submit" class="btn btn-success btn-sm">
                        <i class="bi bi-trash3-fill"></i>
                    </button>
                </a>
            </td>
        </tr>
    </tbody>
    <?php
  }
?>
</table>

<style>
.button {
    background-color: green;
    /* Green */
    border: none;
    color: white;
    /* padding: 16px 32px; */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    border-color: blue;
}

.button1 {
    background-color: white;
    color: black;
    /* border: 2px solid #4CAF50; */
    border-radius: 10px
}

.button1:hover {
    background-color: blueviolet;
    color: white;
}

.button2 {
    background-color: white;
    color: black;
    /* border: 2px solid #008CBA; */
    border-color: blue;
}

.button2:hover {
    background-color: blueviolet;
    color: blue;
}
</style>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">