<?php
  include("../models/admin/mTaiKhoan.php");
     $s=new data();
            $user = $_POST['user'];
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $repeatPassword = md5($_POST['psw-repeat']);
            $email = $_POST['email'];
            $role = 'Bệnh nhân';
            $today = date("Y/m/d");
            if($user!='' && $username!='' && $password!='' && $repeatPassword!='' && $email!=''){
                if($password == $repeatPassword){
                    $sql_1 = "INSERT INTO tb_taikhoan (user,username,password,role,ngaytao) 
                               VALUES ('$user','$username', '$password', '$role', '$today')";
                    $ID = $s->ExecuteInsertId($sql_1);
                    $sql_2 = "INSERT INTO tb_benhnhan(MaTK,hoten,email) VALUES ('$ID','$user','$email')";
                    $s2 = $s->execute($sql_2);


                }else{
                    echo '<script>
                            alert("Mật khẩu không khớp")
                            window.location.href="../register.php";
                         </script>';
                }
                echo '<script>
                            alert("Đăng ký tài khoản thành công! Hãy đăng nhập vào hệ thống để cập nhật thông tin của bạn")
                            window.location.href="../index.php";
                         </script>';
                // echo $user;
                // echo $username;
            }else{

            }




            // {
            //   $sql="INSERT INTO tb_taikhoan (user,username,password,role,ngaytao) 
            //         VALUES ('$user','$username', '$password', '$role', '$today')";
            //   $s->execute($sql);  
            //   echo '<script>
            //             window.location.href="../views/admin/admin.php?action=QLTK&query=add";
            //             alert("Tạo tài khoản thành công")
            //        </script>';
            // }else{
            //   echo '<script>
            //             window.location.href="../views/admin/admin.php?action=QLTK&query=add";
            //             alert("Tạo tài khoản thất bại")
            //        </script>';
            // }  
?>