<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fptteam";

// Tạo kết nối
$con = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$con) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>