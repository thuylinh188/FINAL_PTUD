<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerceshop";

// Tạo connect
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>