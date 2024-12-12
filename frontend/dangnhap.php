<?php
// Include database connection
include '../includes/db.php';
session_start();

// Set homepage flag (you can modify this flag according to your logic)
$is_homepage = false;

// Handle form submission first
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL query to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email); // "s" indicates the email is a string

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, log the user in
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];

            // Check if the user wants to be remembered (set a cookie for 30 days)
            if (isset($_POST['remember'])) {
                setcookie('user_id', $user['id'], time() + (86400 * 30), "/", "", true, true); // HttpOnly and Secure flags
            }

            // Redirect to the homepage (or original page if redirected from somewhere else)
            $redirect_url = isset($_GET['redirect']) ? $_GET['redirect'] : 'http://localhost:8088/FINAL/frontend/taikhoan.php';
            header("Location: taikhoan.php");
            exit();
        } else {
            // Incorrect password
            $error_message = "Mật khẩu không chính xác!";
        }
    } else {
        // Email does not exist
        $error_message = "Email không tồn tại!";
    }

    // Close the statement
    $stmt->close();
}

// Include header (should be included after handling the logic above)
require_once('../includes/header.php');
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Tài Khoản</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Layout cho toàn bộ trang tài khoản */
        .account-container {
            display: flex;
            justify-content: space-between;
            padding-right: 80px;
            padding-left: 80px;
            background-color: #fff;
            flex: 1; /* Cho phép phần tử chiếm hết không gian còn lại */
        }

        /* Cấu trúc cho phần form đăng nhập */
        .form-container {
            width: 35%; /* Chiếm 45% chiều rộng màn hình */
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
            text-align: left; /* Căn trái */
            margin-bottom: 15px; /* Khoảng cách dưới đoạn văn */
            font-size: 15px;
            margin-top: 15px;
        }

        .form-container form {
            display: flex;
            flex-direction: column;
        }

        .form-container form label {
            margin: 10px 0 5px;
            text-align: left;
        }

        .form-container form input {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            text-align: left;
        }

        .form-container .remember-me {
            display: flex;
            align-items: center;
        }

        .form-container .remember-me input {
            margin-right: 5px;
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

        /* Cấu trúc cho phần hình ảnh */
        .image-container {
            width: 60%; /* Chiếm 45% chiều rộng màn hình */
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

        /* Responsive design cho các màn hình nhỏ */
        @media (max-width: 768px) {
            .account-container {
                flex-direction: column; /* Chuyển thành dạng cột cho màn hình nhỏ */
                padding-right: 20px;
                padding-left: 20px;
            }

            .form-container, .image-container {
                width: 100%; /* Mỗi phần chiếm 100% chiều rộng màn hình */
                margin-bottom: 20px;
            }

            .form-container {
                box-sizing: border-box; /* Đảm bảo padding không làm tràn phần tử */
            }
        }
    </style>
</head>
<body>
    <main>
        <div class="account-container">
            <div class="form-container">
                <header>
                    <h2>ĐĂNG NHẬP</h2>
                </header>
                <p>Nếu bạn đã là thành viên, bạn có thể đăng nhập bằng địa chỉ email và mật khẩu của mình.</p>

                <!-- Display error message if any -->
                <?php
                if (isset($error_message)) {
                    echo "<p style='color: red;'>$error_message</p>";
                }
                ?>

                <form id="login-form" action="dangnhap.php" method="POST">
                    <label for="email">Email address</label>
                    <input type="email" id="email" name="email" required>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <button type="submit" class="btn">Đăng nhập</button>
                </form>
                <p>Don't have an account? <a href="dangky.php">Sign up here</a></p> <!-- Dẫn đến trang đăng ký -->
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
// Close the database connection
$conn->close();
?>