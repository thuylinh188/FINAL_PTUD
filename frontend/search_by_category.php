<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục sản phẩm</title>
    <style>
    .section-title{
        text-align: center;
        color: #F17EA8;
    }
        .product-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin-top: 30px;
}

.product-item {
    width: 30%;
    margin-bottom: 30px;
    text-align: center;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    transition: all 0.3s ease;
}

.product-item:hover {
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    transform: scale(1.05);
}

.product__item__pic__hover ul {
    list-style-type: none; /* Xóa dấu chấm đầu dòng */
    padding: 0;
    margin: 0;
}
.product__item__pic {
    position: relative;
    padding-bottom: 20px;
}

.product__item__pic img {
    width: 100%;
    border-radius: 10px;
    object-fit: cover;
    height: 250px;
}

.product__item__text {
    margin-top: 20px;
}

.product__item__text h6 {
    font-size: 18px;
    font-weight: 600;
    color: #333;
    margin-bottom: 10px;
}

.product-price {
    font-size: 18px;
    font-weight: 700;
    color: #F18EA7;
    margin-bottom: 20px;
}

.buy-now-btn {
    background-color: #F18EA7;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    transition: background-color 0.3s;
    cursor: pointer;
    text-decoration: none;
}

.buy-now-btn:hover {
    background-color: #F16E82;
    text-decoration: none;
}
.product-section {
    margin-bottom: 50px; }

@media (max-width: 768px) {
    .product-item {
        width: 48%; /* 2 sản phẩm mỗi hàng */
    }
}

@media (max-width: 480px) {
    .product-item {
        width: 100%; /* 1 sản phẩm mỗi hàng */
    }
}
/* CSS tối ưu trên điện thoại */
@media (max-width: 768px) {
    .product-item {
        width: 48%; /* Hiển thị 2 sản phẩm mỗi hàng trên máy tính bảng */
        margin-bottom: 15px; /* Giảm khoảng cách giữa các sản phẩm */
    }
    .product__item__text h6 {
        font-size: 16px; /* Giảm kích thước chữ */
    }
    .product-price {
        font-size: 16px; /* Giảm kích thước chữ giá */
    }
    .buy-now-btn {
        font-size: 14px; /* Nhỏ hơn để vừa màn hình */
        padding: 8px 16px; /* Giảm padding để nút không bị to quá */
    }
}

@media (max-width: 480px) {
    .product-item {
        width: 100%; /* Hiển thị 1 sản phẩm mỗi hàng trên điện thoại */
        margin-bottom: 20px;
    }
    .product__item__pic img {
        height: 200px; /* Điều chỉnh chiều cao ảnh để phù hợp hơn */
    }
    .product__item__text h6 {
        font-size: 14px; /* Nhỏ hơn nữa trên màn hình rất nhỏ */
    }
    .product-price {
        font-size: 14px;
    }
    .buy-now-btn {
        font-size: 12px;
        padding: 6px 12px;
    }
    .section-title {
        font-size: 20px; /* Thu nhỏ tiêu đề danh mục */
    }
}


    </style>
</head>
<body>
<?php
// Kiểm tra kết nối cơ sở dữ liệu
require_once('../includes/db.php');
require_once('../includes/header.php');

// Lấy category_id từ URL (thông qua GET)
$categoryId = isset($_GET['category_id']) ? trim($_GET['category_id']) : '';

// Xử lý tìm kiếm theo danh mục
echo '<div class="product-section">';
if ($categoryId) {
    // Hiển thị tiêu đề danh mục
    echo '<h2 class="section-title">Sản phẩm trong danh mục: "' . htmlspecialchars($categoryId) . '"</h2>';

    // Chuẩn bị câu truy vấn
    $sql = "SELECT * FROM products WHERE category_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $categoryId); // 's' cho kiểu chuỗi
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
        echo '<p>Không có sản phẩm nào trong danh mục này.</p>';
    }
    echo '</div>'; // End .product-list
} else {
    echo '<h2 class="section-title">Vui lòng chọn một danh mục</h2>';
}
echo '</div>'; // End .product-section

    // Đóng kết nối cơ sở dữ liệu
    $conn->close();

    require_once('../includes/footer.php'); // Gọi footer sau khi nội dung trang đã được hiển thị
    ?>
</body>
</html>
