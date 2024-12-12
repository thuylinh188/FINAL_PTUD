
<?php
session_start();
include '../includes/db.php'; // Kết nối cơ sở dữ liệu

// Xử lý đăng xuất nếu người dùng nhấn nút "Đăng xuất"
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: dangnhap.php");
    exit();
}

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['user_id'])) {
    header("Location: dangnhap.php");
    exit();
}

// Lấy thông tin người dùng từ session
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];

// Truy vấn lịch sử đơn hàng
$query = "
    SELECT 
        o.id AS order_id,
        o.created_at AS order_date,
        o.status AS order_status,
        od.product_id,
        od.price,
        od.qty,
        od.total
    FROM orders o
    LEFT JOIN order_details od ON o.id = od.order_id
    WHERE o.user_id = ?
    ORDER BY o.created_at DESC
";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Chuyển kết quả truy vấn thành một mảng
$order_history = [];
while ($row = $result->fetch_assoc()) {
    $order_history[] = $row;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<?php require_once('../includes/header.php'); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài Khoản</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }

        main {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #f18ea7;
        }
        
        h2 {
            color: #333;
            padding-top: 20px;
        }

        .account-details {
            margin-bottom: 30px;
        }

        .account-details ul {
            list-style: none;
            padding: 0;
        }

        .account-details ul li {
            margin: 5px 0;
        }

        .order-history {
            margin-top: 20px;
        }

        .order-history table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-history table th,
        .order-history table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .order-history table th {
            background-color: #f8f8f8;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #f18ea7;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            font-family: Palatino Linotype;
            text-align: center;
        }

        .btn:hover {
            background-color: #fdccd8;
        }

        .logout-form {
            margin-top: 20px;
        }

        .no-orders {
            text-align: center;
            color: #999;
            margin: 20px 0;
        }
        /* Media query cho mobile */
@media (max-width: 768px) {
    main {
        margin: 10px;
        padding: 15px;
    }

    h1 {
        font-size: 20px;
    }

    h2 {
        font-size: 18px;
    }

    .account-details ul li {
        font-size: 14px;
    }

    .order-history table {
        font-size: 12px;
    }

    .order-history table th,
    .order-history table td {
        padding: 8px;
    }

    .btn {
        font-size: 14px;
        padding: 8px 16px;
    }
}

/* Media query cho màn hình rất nhỏ */
@media (max-width: 480px) {
    h1 {
        font-size: 18px;
    }

    h2 {
        font-size: 16px;
        text-align: center;
    }

    .order-history table th,
    .order-history table td {
        font-size: 10px;
        padding: 5px;
    }

    .btn {
        font-size: 12px;
        padding: 6px 12px;
    }
}
    </style>
</head>
<body>
    <main>
        <header>
            <h1>Xin chào, <?php echo htmlspecialchars($user_name); ?>!</h1>
        </header>

        <div class="account-details">
            <h2>Thông tin tài khoản</h2>
            <ul>
                <li><strong>Họ và tên:</strong> <?php echo htmlspecialchars($user_name); ?></li>
                <li><strong>Email:</strong> <?php echo htmlspecialchars($user_email); ?></li>
                <li><strong>ID: </strong><?php echo htmlspecialchars($user_id); ?></li>
            </ul>
        </div>

        <div class="order-history">
            <h2>Lịch sử mua hàng</h2>

            <?php if (empty($order_history)) { ?>
                <p class="no-orders">Bạn chưa có đơn hàng nào.</p>
            <?php } else { ?>
                <table>
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt</th>
                            <th>Trạng thái</th>
                            <th>ID sản phẩm</th>
                            <th>Giá</th>
                            <th>Số Lượng</th>
                            <th>Tổng cộng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order_history as $order) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($order['order_id']); ?></td>
                                <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                                <td><?php echo htmlspecialchars($order['order_status']); ?></td>
                                <td><?php echo htmlspecialchars($order['product_id']); ?></td>
                                <td><?php echo number_format($order['price'], 0, ',', '.'); ?>₫</td>
                                <td><?php echo htmlspecialchars($order['qty']); ?></td>
                                <td><?php echo number_format($order['total'], 0, ',', '.'); ?>₫</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>

        <!-- Form đăng xuất -->
        <div class="logout-form">
            <form action="taikhoan.php" method="POST">
                <button type="submit" name="logout" class="btn">Đăng xuất</button>
            </form>
        </div>
    </main>
</body>
<?php include '../includes/footer.php'; ?>
</html>
