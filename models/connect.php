<?php
    class connectDB{
        function connect(& $con){
            $con = mysqli_connect('localhost','root','','pk_da_lieu');
            mysqli_set_charset($con,'utf8');
            if($con){
                return mysqli_select_db($con, "pk_da_lieu");
            }else{
                return false;
            }
        }

        function closeConnect($con){
            mysqli_close($con);
        }
    }
?>