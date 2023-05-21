<?php
  include("../models/admin/mTaiKhoan.php");
     $s=new data();
            $user = $_POST['user'];
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $role = $_POST['role'];
            $today = date("Y/m/d");
            $ngaysinh = $_POST['ngaysinh'];
            $gioitinh = $_POST['gioitinh'];
            $diachi = $_POST['diachi'];
            $sdt = $_POST['sdt'];
            $email = $_POST['email'];
            $cv = $_POST['cv'];
            if(!$user || !$username || !$password || !$role || !$ngaysinh || !$gioitinh || !$diachi || !$sdt || !$email || !$cv)
            {
              echo '
                <script>
                 window.location.href="../views/admin/admin.php?action=QLTK&query=add";
                  alert("Vui lòng nhập đầy đủ thông tin!");
                </script>';
            }else{
                  if(!preg_match("/^[A-ZĐÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĨŨƠỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỬỮỰỲỴÝỶỸ]{1}[a-zàáâãèéêìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,}(\s[A-ZĐÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĨŨƠỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỬỮỰỲỴÝỶỸ]{1}[a-zàáâãèéêìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,}){1,}$/",$user)){
                     echo '<script>
                     window.location.href="../views/admin/admin.php?action=QLTK&query=add";
                     alert("Đăng ký thất bại. Họ tên không phù hợp, vui lòng kiểm tra lại!");</script>';
                  }
                  elseif(!preg_match("/^[a-zA-Z0-9]+$/",$username)){
                    echo '<script>
                     window.location.href="../views/admin/admin.php?action=QLTK&query=add";
                    alert("Đăng ký thất bại. Tên tài khoản không phù hợp, vui lòng kiểm tra lại!");</script>';
                  }
                  elseif(!preg_match("/^[0]{1}+[0-9]{9}$/",$sdt)){
                    echo '<script>
                     window.location.href="../views/admin/admin.php?action=QLTK&query=add";
                    alert("Đăng ký thất bại. Số điện thoại không đúng, vui lòng kiểm tra lại!");</script>';
                  }elseif(!preg_match("/^[a-zA-Z0-9]+[@]+[a-z]{5}+[.]+[a-z]{3}$/", $email)){
                    echo '<script>
                     window.location.href="../views/admin/admin.php?action=QLTK&query=add";
                    alert("Đăng ký thất bại. Email không đúng, vui lòng kiểm tra lại!");</script>';
                  }else{
                      $sql1="INSERT INTO tb_taikhoan (user,username,password,role,ngaytao) 
                             VALUES ('$user','$username', '$password', '$role', '$today')";     
                      //$s->execute($sql1); 
                       $ID = $s->ExecuteInsertId($sql1);
                      switch($role){
                          case "Nhân viên y tá":
                             $sql3 = "INSERT INTO tb_yta(MaTK,hoten,ngaysinh,gioitinh,diachi,sdt,email,vitricongviec)
                                       VALUES ('$ID','$user', '$ngaysinh', '$gioitinh', '$diachi', '$sdt', '$email', '$cv')";
                             $s->execute($sql3);
                               break;
                          case "Bác sĩ":
                                if($cv == "Bác sĩ khoa nhi")
                                {
                                  $maCK = 7;
                                }
                                elseif($cv == "Bác sĩ khoa tim mạch")
                                {
                                  $maCK = 4;
                                }
                                elseif($cv == "Bác sĩ khoa tai - mũi - họng")
                                {
                                  $maCK = 5;
                                }
                                elseif($cv == "Bác sĩ phụ khoa")
                                {
                                  $maCK = 6;
                                }
                                elseif($cv == "Bác sĩ khoa ngoại")
                                {
                                  $maCK = 8;
                                }
                                elseif($cv == "Bác sĩ khoa vật lý trị liệu - phục hồi chức năng")
                                {
                                  $maCK = 9;
                                }
                                elseif($cv == "Bác sĩ khoa chuẩn đoán hình ảnh")
                                {
                                  $maCK = 10;
                                }
                                $sql2 = "INSERT INTO tb_bacsi(MaTK,maCk,hoten,ngaysinh,gioitinh,diachi,sdt,email,vitricongviec)
                                          VALUES ('$ID',$maCK,'$user', '$ngaysinh', '$gioitinh', '$diachi', '$sdt', '$email', '$cv')";
                                $s->execute($sql2);
                               break;
                          case "Bệnh nhân":
                               $sql5 = "INSERT INTO tb_benhnhan(MaTK,hoten,ngaysinh,gioitinh,diachi,sdt,email,nghenghiep)
                                        VALUES ('$ID','$user', '$ngaysinh', '$gioitinh', '$diachi', '$sdt', '$email', '$cv')";
                               $s->execute($sql5);
                              break;
                          case "Admin":
                               $sql4 = "INSERT INTO tb_admin(MaTK,hoten,ngaysinh,gioitinh,diachi,sdt,email,congviec)
                                        VALUES ('$ID','$user', '$ngaysinh', '$gioitinh', '$diachi', '$sdt', '$email', '$cv')";
                               $s->execute($sql4);
                               break;
                          case "Nhân viên tiếp nhận":
                             $sql6 = "INSERT INTO tb_nvtiepnhan(MaTK,hoten,ngaysinh,gioitinh,diachi,sdt,email,congviec)
                                       VALUES ('$ID','$user', '$ngaysinh', '$gioitinh', '$diachi', '$sdt', '$email', '$cv')";
                             $s->execute($sql6);
                               break;
                          case "Nhân viên xét nghiệm":
                             $sql7 = "INSERT INTO tb_nvxetnghiem(MaTK,hoten,ngaysinh,gioitinh,diachi,sdt,email,congviec)
                                       VALUES ('$ID','$user', '$ngaysinh', '$gioitinh', '$diachi', '$sdt', '$email', '$cv')";
                             $s->execute($sql7);
                               break;
                          case "Nhân viên quản lý":
                                $sql8 = "INSERT INTO tb_nvql(MaTK,hoten,ngaysinh,gioitinh,diachi,sdt,email,vitricongviec)
                                          VALUES ('$ID','$user', '$ngaysinh', '$gioitinh', '$diachi', '$sdt', '$email', '$cv')";
                                $s->execute($sql8);
                                  break;     
                          case "Giám Đốc":
                                $sql9 = "INSERT INTO tb_giamdoc(MaTK,hoten,ngaysinh,gioitinh,diachi,sdt,email,vitricongviec)
                                          VALUES ('$ID','$user', '$ngaysinh', '$gioitinh', '$diachi', '$sdt', '$email', '$cv')";
                                $s->execute($sql9);
                                  break;
                         case "Nhân viên quầy thuốc":
                                $sql10 = "INSERT INTO tb_nvquaythuoc(MaTK,hoten,ngaysinh,gioitinh,diachi,sdt,email,vitricongviec)
                                         VALUES ('$ID','$user', '$ngaysinh', '$gioitinh', '$diachi', '$sdt', '$email', '$cv')";
                                  $s->execute($sql10);
                                  break;             
                          default:
                              echo '<script>
                                    window.location.href="../views/admin/admin.php?action=QLTK&query=add";
                                           alert("Tạo tài khoản thất bại!")
                                    </script>';
                         }
                             echo '<script>
                               window.location.href="../views/admin/admin.php?action=QLTK&query=add";
                                    alert("Tạo tài khoản thành công")
                              </script>';
              }
              
            }  
?>