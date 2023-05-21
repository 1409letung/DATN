<?php
 class data 
{
    function connect()
    {
        $conn = new mysqli('localhost', 'root', '', 'pk_da_lieu');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $conn->set_charset('utf8');
        return $conn;
    }
    // XUẤT NHIÈU RA DANH SÁCH
    function executeLesult($sql)
    {
        $conn = $this->connect();
        $result = mysqli_query($conn, $sql);
        $list = [];
        while ($row = mysqli_fetch_array($result, 1)) {
            $list[] = $row;
        }
        mysqli_close($conn);
        return $list;
    }
    // INSERT //update
    function execute($sql)
    {
        //cap nhat chen
        $conn = $this->connect();
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }

    //insert_id
    function ExecuteInsertId($sql)
    {
        //cap nhat chen
        $conn = $this->connect();
        mysqli_query($conn, $sql);
        $ID = mysqli_insert_id($conn);
        mysqli_close($conn);
        return $ID;
    }

    // XUẤT RA 1 PRODUCT
    function executeSingLesult($sql)
    {
        //select 1 row
        $conn = $this->connect();
        $result = mysqli_query($conn, $sql);
        $row = null;
        if ($result != null) {
            $row = mysqli_fetch_array($result, 1);
        }
        return $row;
    }

    function insertQR($name,$phone,$email,$content,$date,$qrImg,$trangthai){
        $conn = $this->connect();
        $sql = "INSERT INTO `tb_qr_dkkb`(`hoten`, `sdt`, `email`, `content`, `date`, `qr_img`,`trangthai`) VALUES ('$name', '$phone', '$email', '$content', '$date', '$qrImg','$trangthai')";
        $row = mysqli_query($conn,$sql);
        mysqli_close($conn);
        return $row;
    }
}

