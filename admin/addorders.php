<?php
require('../includes/db.php');

// Lấy dữ liệu từ form
$id = $_POST['id'] ?? '';
$user_id = $_POST['user_id'] ?? '';
$firstname = $_POST['firstname'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$address = $_POST['address'] ?? '';
$phone = $_POST['phone'] ?? '';
$email = $_POST['email'] ?? '';

// Kiểm tra dữ liệu đầu vào

// Xử lý dữ liệu để tránh SQL Injection
$id = mysqli_real_escape_string($conn, $id);
$user_id = mysqli_real_escape_string($conn, $user_id);
$firstname = mysqli_real_escape_string($conn, $firstname);
$lastname = mysqli_real_escape_string($conn, $lastname);
$address = mysqli_real_escape_string($conn, $address);
$phone = mysqli_real_escape_string($conn, $phone);
$email = mysqli_real_escape_string($conn, $email);

// Câu lệnh SQL
$sql_str = "INSERT INTO `orders` (`id`,`user_id`, `firstname`, `lastname`, `address`, `phone`, `email`, `status`, `created_at`, `updated_at`) 
VALUES ('$id', '$user_id', '$firstname', '$lastname', '$address', '$phone', '$email', 0, NOW(), NOW())";

// Thực thi câu lệnh SQL
$result = mysqli_query($conn, $sql_str);

if (!$result) {
    die("Lỗi thêm đơn hàng: " . mysqli_error($conn));
}

// Chuyển hướng về trang danh sách sản phẩm
header("location: ./listorders.php");
exit;
?>
