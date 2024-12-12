<?php
ob_start();  // Bắt đầu output buffering
session_start();
require_once('../includes/header.php');

// Kết nối cơ sở dữ liệu
require_once('../includes/db.php');

// Xử lý khi nhấn nút "Đặt hàng"
$order_id = $_POST['order_id']??'';

// Kiểm tra xem order_id có hợp lệ và chưa tồn tại trong bảng orders
if (empty($order_id) || !is_numeric($order_id)) {
    echo "";
} else {
    $sql_check_order = "SELECT * FROM orders WHERE id = '$order_id'";
    $result = mysqli_query($conn, $sql_check_order);
    
    if (mysqli_num_rows($result) > 0) {
        // Nếu order_id đã tồn tại, thông báo lỗi
        echo "Mã đơn hàng đã tồn tại, vui lòng chọn mã khác.";
    } else {
        // Tiếp tục xử lý đơn hàng
        $user_id = $_POST['user_id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        // Chèn đơn hàng vào bảng orders
        $sql_order = "INSERT INTO orders (id, user_id, firstname, lastname, address, phone, email, status, created_at, updated_at)
                      VALUES ('$order_id', '$user_id', '$firstname', '$lastname', '$address', '$phone', '$email', 'Processing', NOW(), NOW())";

        if (mysqli_query($conn, $sql_order)) {
            // Chèn chi tiết đơn hàng vào bảng order_details
            foreach ($_SESSION['cart'] as $item) {
                $product_id = $item['id'];
                $price = isset($item['discounted_price']) && !empty($item['discounted_price']) 
                         ? $item['discounted_price'] 
                         : (isset($item['price']) ? $item['price'] : 0);
                $quantity = $item['qty'];
                $total_item = $price * $quantity;

                $sql_order_details = "INSERT INTO order_details (order_id, product_id, price, qty, total, created_at, updated_at)
                                      VALUES ('$order_id', '$product_id', '$price', '$quantity', '$total_item', NOW(), NOW())";
                mysqli_query($conn, $sql_order_details);
            }

            // Xóa giỏ hàng sau khi đặt hàng thành công
            unset($_SESSION['cart']);

            // Chuyển hướng đến trang cảm ơn
            header("Location: ?thankyou=1");
            exit();
        } else {
            echo "Đặt hàng thất bại: " . mysqli_error($conn);
        }
    }
}
ob_end_flush();  // Kết thúc output buffering
?>


<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
        body {
            font-family: 'Palatino Linotype', sans-serif !important;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .banner {
            position: relative;
            width: 100%;
            height: 200px;
        }
        .background-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('http://localhost:8088/FINAL/hinhanh/4.png');
            background-size: cover;
            background-position: center center;
            opacity: 0.5;
            z-index: -1;
        }
        .news-title {
            font-size: 3rem;
            color: #f17ea8;
            z-index: 2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .form-container {
            display: flex;
            gap: 20px;
        }
        .form-left, .form-right {
            padding: 20px;
            background: #f9f9f9;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
        .form-left {
            flex: 6;
        }
        .form-right {
            flex: 4;
        }
        .site-btn {
            margin-top: 20px;
            padding: 10px;
            background: #e4748b;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php if (isset($_GET['thankyou'])): ?>
        <div style="text-align: center; margin-top: 50px;">
            <h1>Cảm ơn bạn đã đặt hàng!</h1>
            <p>Đơn hàng của bạn đã được nhận. Chúng tôi sẽ liên hệ sớm để xác nhận.</p>
        </div>
    <?php else: ?>
        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section">
            <div class="banner">
                <div class="background-pattern"></div>
                <h1 class="news-title">THANH TOÁN</h1>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Checkout Section Begin -->
        <section class="checkout spad">
            <div class="container">
                <div class="form-container">
                    <!-- Left Column -->
                    <div class="form-left">
                        <h4>Thông tin Khách hàng</h4>
                        <form action="" method="post">
                        <div class="checkout__input">
                                <p>Mã đơn hàng<span>*</span></p>
                                <input type="text" name="order_id" placeholder="Mã sản phẩm" required>
                            </div>
                            <div class="checkout__input">
                                <p>Mã khách hàng<span>*</span></p>
                                <input type="text" name="user_id" placeholder="Mã khách hàng" required>
                            </div>
                            <div class="checkout__input">
                                <p>Họ & tên lót<span>*</span></p>
                                <input type="text" name="firstname" placeholder="Họ & tên lót" required>
                            </div>
                            <div class="checkout__input">
                                <p>Tên<span>*</span></p>
                                <input type="text" name="lastname" placeholder="Tên" required>
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ nhận hàng:<span>*</span></p>
                                <input type="text" name="address" placeholder="Địa chỉ" required>
                            </div>
                            <div class="checkout__input">
                                <p>Số điện thoại:<span>*</span></p>
                                <input type="text" name="phone" placeholder="Số điện thoại" required>
                            </div>
                            <div class="checkout__input">
                                <p>Email:<span>*</span></p>
                                <input type="email" name="email" placeholder="Email" required>
                            </div>
                            <button type="submit" class="site-btn" name="btDathang">Đặt hàng</button>
                        </form>
                    </div>

                    <!-- Right Column -->
                    <div class="form-right">
                        <h4>Đơn hàng</h4>
                        <div class="checkout__order">
                            <div class="checkout__order__products">Sản phẩm <span>Thành tiền</span></div>
                            <ul>
                                <?php
                                $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
                                $total = 0;
                                foreach ($cart as $item) {
                                    // Kiểm tra và lấy giá
                                    $price = isset($item['discounted_price']) && !empty($item['discounted_price']) 
                                             ? $item['discounted_price'] 
                                             : (isset($item['price']) ? $item['price'] : 0);
                                
                                    // Tính tổng tiền cho sản phẩm
                                    $subtotal = $item['qty'] * $price;
                                    $total += $subtotal;
                                
                                    // Hiển thị sản phẩm
                                    echo "<li>{$item['name']} <span>" . number_format($subtotal, 0, '', '.') . " VNĐ</span></li>";
                                }
                                
                                ?>
                            </ul>
                            <div class="checkout__order__total">
                                Tổng tiền: <span><?= number_format($total, 0, '', '.') . " VNĐ" ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Checkout Section End -->
    <?php endif; ?>
</body>
<?php include '../includes/footer.php'; ?>
</html>