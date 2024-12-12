<?php
session_start();
require_once("../includes/db.php");

$errorMsg = "";

if (isset($_POST["btSubmit"])) {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Truy vấn bảo mật với prepared statements
    $stmt = $conn->prepare("SELECT * FROM admins WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Kiểm tra mật khẩu
        if ($password === $row['password']) { // Nếu không dùng mã hóa
            $_SESSION['user'] = $row;
            header("Location: index.php");
            exit;
        } else {
            $errorMsg = "Mật khẩu không đúng!";
        }
    } else {
        $errorMsg = "Email không tồn tại!";
    }
}
require_once("includes/loginform.php");
?>
