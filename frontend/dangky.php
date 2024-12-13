<?php
ob_start();  // Bắt đầu output buffering
session_start();
include '../includes/db.php';
$is_homepage = false;

// Di chuyển gọi header() lên trước bất kỳ output nào
require_once('../includes/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Kiểm tra mật khẩu và mật khẩu nhập lại có khớp không
    if ($password != $confirm_password) {
        echo "Mật khẩu và mật khẩu nhập lại không khớp!";
    } else {
        // Băm mật khẩu trước khi lưu vào cơ sở dữ liệu
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Thêm dữ liệu vào bảng `users`
        $query = "INSERT INTO users (name, email, password, created_at, updated_at) 
                  VALUES ('$fullname', '$email', '$hashed_password', NOW(), NOW())";

        // Thực thi câu lệnh SQL
        if (mysqli_query($conn, $query)) {
            echo "Đăng ký thành công!";
            // Bạn có thể chuyển hướng người dùng đến trang đăng nhập sau khi đăng ký thành công
            header('Location: dangnhap.php');
            exit; // Dừng thực thi mã sau khi chuyển hướng
        } else {
            echo "Có lỗi xảy ra: " . mysqli_error($conn);
        }
    }
}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký - ChiMooTee</title>
    <style>
        /* Layout cho toàn bộ trang đăng ký */
        .account-container {
            display: flex;
            justify-content: space-between;
            padding-right: 80px;
            padding-left: 80px;
            background-color: #fff;
            flex: 1;
        }
        .form-container {
            width: 35%;
            padding: 20px;
            background-color: #f8f8f8;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
            margin-top: 80px;
            margin-bottom: 80px;
        }
        .form-container header {
            margin-bottom: 20px;
            text-align: center;
            font-size: 20px;
            color: #F18EA7;
        }
        .form-container p {
            text-align: left;
            margin-bottom: 15px;
            font-size: 15px;
            margin-top: 15px;
        }
        .form-container form {
            display: flex;
            flex-direction: column;
        }
        .form-container form label {
            margin: 10px 0 5px;
        }
        .form-container form input {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-family: Palatino Linotype;
        }
        .form-container .btn {
            padding: 10px;
            background-color: #F18EA7;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: Palatino Linotype;
        }
        .form-container .btn:hover {
            background-color: #fdccd8;
        }
        .form-container p {
            text-align: center;
        }
        .form-container p a {
            color: #F18EA7;
        }
        .image-container {
            width: 60%;
            padding: 20px;
            text-align: center;
            margin-top: 80px;
            margin-bottom: 80px;
        }
        .image-container img {
            width: 70%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        @media (max-width: 768px) {
            .account-container {
                flex-direction: column;
                padding-right: 20px;
                padding-left: 20px;
            }
            .form-container, .image-container {
                width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
<main>
    <div class="account-container">
        <div class="form-container">
            <header>
                <h2>ĐĂNG KÝ</h2>
            </header>
            <p>Trở thành thành viên và tận hưởng những ưu đãi độc quyền.</p>
            <form action="dangky.php" method="POST">
                <label for="fullname">Họ và tên</label>
                <input type="text" id="fullname" name="fullname" required>

                <label for="email">Email address</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" required>

                <label for="confirm-password">Nhập lại mật khẩu</label>
                <input type="password" id="confirm-password" name="confirm_password" required>

                <button type="submit" class="btn">Đăng ký</button>
            </form>
        </div>
        <div class="image-container">
            <img src="http://localhost:8088/FINAL/hinhanh/logo2.png" alt="ChiMooTee" class="login-image">
        </div>
    </div>
</main>
</body>
<?php include '../includes/footer.php'; ?>
</html>

<?php
$conn->close();
?>