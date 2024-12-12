<?php
// Kiểm tra kết nối cơ sở dữ liệu
require_once('../includes/db.php');
require_once('../includes/header.php');

// Lấy từ khóa tìm kiếm từ người dùng
$searchQuery = isset($_GET['query']) ? trim($_GET['query']) : '';

// Xử lý tìm kiếm
echo '<div class="product-section">';
if ($searchQuery) {
    echo '<h2 class="section-title">Kết quả tìm kiếm cho: "' . htmlspecialchars($searchQuery) . '"</h2>';
    
    // Chuẩn bị câu truy vấn
    $sql = "SELECT * FROM products WHERE name LIKE ? OR description LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%" . $searchQuery . "%";
    $stmt->bind_param('ss', $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    echo '<div class="product-list row">';
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Tách hình ảnh từ database
            $images = explode(";", $row["images"]);
            $image_url = !empty($images[0]) ? "http://localhost:8088/FINAL/admin/" . $images[0] : 'default.jpg';

            // Hiển thị sản phẩm
            echo '<div class="col-lg-3 col-md-4 col-sm-6">';
            echo '<div class="product__item">';
            echo '<div class="product__item__pic">';
            echo '<img src="' . htmlspecialchars($image_url) . '" alt="' . htmlspecialchars($row['name']) . '">';
            echo '<div class="product__item__pic__hover">';
            echo '<ul>';
            echo '<li><a href="#"><i class="fa fa-heart"></i></a></li>';
            echo '<li><a href="#"><i class="fa fa-retweet"></i></a></li>';
            echo '<li><a href="sanpham.php?id=' . htmlspecialchars($row['id']) . '"><i class="fa fa-shopping-cart"></i></a></li>';
            echo '</ul>';
            echo '</div>'; // End .product__item__pic__hover
            echo '</div>'; // End .product__item__pic
            echo '<div class="product__item__text">';
            echo '<h6><a href="sanpham.php?id=' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['name']) . '</a></h6>';
            echo '<h5 class="product-price">' . number_format($row['price'], 0, ',', '.') . ' VND</h5>';
            echo '<a href="sanpham.php?id=' . htmlspecialchars($row['id']) . '" class="buy-now-btn">Mua ngay</a>';
            echo '</div>'; // End .product__item__text
            echo '</div>'; // End .product__item
            echo '</div>'; // End .col-lg-3
        }
    } else {
        echo '<p>Không có sản phẩm nào phù hợp.</p>';
    }
    echo '</div>'; // End .product-list
} else {
    echo '<h2 class="section-title">Vui lòng nhập từ khóa tìm kiếm</h2>';
}
echo '</div>'; // End .product-section

// Đóng kết nối
$stmt->close();
$conn->close();
require_once('../includes/footer.php');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kết quả tìm kiếm</title>
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
        /* Thiết lập kiểu chữ và màu nền cho toàn bộ trang */
        body {
    font-family: 'Palatino Linotype', serif;
    background-color: #ffffff !important;
}

h1, h2, h3, h4, h5, h6, p, li, a {
    font-family: 'Palatino Linotype', serif;
}

/* Tối ưu hóa cho các màn hình lớn hơn */
.product-section {
    padding-left: 60px;
    padding-right: 60px;
    text-align: center;
    background-color: white;
}

/* Tiêu đề của phần tìm kiếm */
.section-title {
    font-size: 28px;
    font-weight: bold;
    color: #F18EA7;
    padding-bottom: 20px;
    padding-top: 20px;
    background-color: #fff;
}

/* Thiết lập layout sản phẩm */
.product-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Các sản phẩm căn sang trái thay vì bị giãn ra */
    gap: 10px; /* Giảm khoảng cách giữa các sản phẩm */
}

/* Kiểu dáng sản phẩm */
.product-item {
    width: 30%; /* 4 sản phẩm mỗi dòng */
    margin-bottom: 10px; /* Giảm khoảng cách dưới mỗi sản phẩm */
    box-sizing: border-box; /* Đảm bảo phần tử không vượt quá chiều rộng */
    padding: 5px
}

/* Đảm bảo kích thước giá và nút phù hợp */
.product-item h5 {
    font-weight: bold;
    font-size: 18px;
}

.product-price {
    font-size: 18px;
    color: red;
    font-weight: bold;
    margin-top: 10px;
    margin-bottom: 20px; /* Giảm khoảng cách dưới giá */
}

/* Nút "Mua ngay" */
.buy-now-btn {
    font-family: 'Palatino Linotype';
    color: #F18EA7;
    background-color: white;
    padding: 10px;
    border: 1px solid #F18EA7;
    border-radius: 5px;
    margin-top: 20px;
    cursor: pointer;
    text-align: center;
    font-size: 16px;
    width: 100%;
    box-sizing: border-box;
}

.buy-now-btn:hover {
    color: white;
    background-color: #f16e82;
    border-color: #f16e82;
    transform: scale(1.05);
    text-decoration: none;
}

.product__item__pic {
    width: 100%; /* Giữ chiều rộng hình ảnh là 100% của phần tử chứa */
    height: 100% !important; /* Giữ tỷ lệ khung hình */
    object-fit: cover; /* Đảm bảo hình ảnh sẽ được cắt sao cho vừa vặn với kích thước mà không bị biến dạng */
}

/* Tối ưu cho màn hình dưới 768px (Mobile) */
@media (max-width: 768px) {
    .product-item {
        width: 48%; /* 2 sản phẩm mỗi hàng */
        margin-bottom: 10px; /* Giảm khoảng cách giữa các sản phẩm */
    }

    .buy-now-btn {
        font-size: 14px; /* Giảm kích thước font chữ cho nút */
        padding: 8px; /* Giảm padding */
    }

    .section-title {
        font-size: 24px; /* Giảm kích thước tiêu đề */
    }
}

/* Tối ưu cho màn hình dưới 480px (Điện thoại nhỏ) */
@media (max-width: 480px) {
    .product-item {
        width: 100%; /* 1 sản phẩm mỗi hàng trên điện thoại nhỏ */
        margin-bottom: 10px; /* Giảm khoảng cách giữa các sản phẩm */
    }

    .buy-now-btn {
        font-size: 14px;
        padding: 8px;
    }

    .section-title {
        font-size: 20px; /* Giảm tiêu đề cho phù hợp */
    }

    .product-price {
        font-size: 16px; /* Giảm kích thước giá để tiết kiệm không gian */
    }

    .product-item h5 {
        font-size: 16px; /* Giảm kích thước tên sản phẩm */
    }
}
</style>
</html>
<!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>