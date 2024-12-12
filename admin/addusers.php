<?php

require('../includes/db.php');

// Lấy dữ liệu từ form
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$phone = $_POST['phone'] ?? '';
$address = $_POST['address'] ?? '';
$type = $_POST['type'] ?? '';

// Kiểm tra dữ liệu đầu vào
if (empty($name) || empty($email) || empty($password) || empty($phone) || empty($type)) {
    die("Vui lòng nhập đầy đủ thông tin.");
}

// Mã hóa mật khẩu để bảo mật (khuyến nghị)
$password = password_hash($password, PASSWORD_DEFAULT);

// Tạo câu lệnh SQL (sử dụng đúng cột `status`)
$sql_str = "INSERT INTO `admins` (`name`, `email`, `password`, `phone`, `address`, `type`, `status`, `created_at`, `updated_at`) VALUES 
    ('$name', 
    '$email',
    '$password', 
    '$phone',
    '$address',  
    '$type', 
    'active', NOW(), NOW());";

// Thực thi câu lệnh SQL
if (mysqli_query($conn, $sql_str)) {
    // Quay lại trang danh sách người dùng nếu thành công
    header("location: ./listusers.php");
} else {
    // Hiển thị lỗi nếu thất bại
    die("Lỗi thêm dữ liệu: " . mysqli_error($conn));
}
?>
