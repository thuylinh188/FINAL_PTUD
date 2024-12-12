<?php
session_start();

// Kiểm tra kết nối cơ sở dữ liệu
require_once('../includes/db.php');

// Xử lý nút "Thêm vào giỏ hàng"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['atcbtn'])) {
    $id = intval($_POST['pid']); // Đảm bảo `id` là số nguyên
    $qty = max(1, intval($_POST['qty'])); // Số lượng không nhỏ hơn 1

    // Lấy giỏ hàng từ session hoặc khởi tạo mới
    $cart = $_SESSION['cart'] ?? [];

    $isFound = false;

    // Tìm sản phẩm trong giỏ hàng
    foreach ($cart as $i => $product) {
        if ($product['id'] == $id) {
            $cart[$i]['qty'] += $qty;
            $isFound = true;
            break;
        }
    }

    // Nếu không tìm thấy sản phẩm trong giỏ, thêm sản phẩm
    if (!$isFound) {
        $sql_str = "SELECT id, name, price, images FROM products WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql_str);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($product = mysqli_fetch_assoc($result)) {
            $product['qty'] = $qty;
            $cart[] = $product;
        }
    }

    // Lưu lại giỏ hàng trong session
    $_SESSION['cart'] = $cart;
    header("Location: sanpham.php?id=$id"); // Làm mới trang để tránh form resubmission
    exit;
}
$idsp = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql_str = "SELECT p.*, c.name AS category_name FROM products p INNER JOIN categories c ON p.category_id = c.id WHERE p.id = ?";
$stmt = mysqli_prepare($conn, $sql_str);
mysqli_stmt_bind_param($stmt, 'i', $idsp);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$anh_arr = explode(';', $row['images']);
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= htmlspecialchars($row['name']) ?></title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
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
        body {
            font-family: 'Palatino Linotype', serif;
            background-color: #ffffff !important;
        }
        h1, h2, h3, h4, h5, h6, p, li, a {
            font-family: 'Palatino Linotype', serif;
        }
        .social-icon {
            font-size: 24px;
            color: #000;
            transition: color 0.3s;
            margin-right: 15px;
        }
        h3 {
            font-size: 36px;
            font-weight: bold;
            color: #F18EA7;
            margin-bottom: 0px;
            text-align: center;
        }
        h4 {
            font-size: 36px;
        }
        .social-icon:hover {
            color: #F18EA7; /* Màu thay đổi khi hover (cho Facebook) */
        }
        .primary-btn {
            background-color: #FFF;
            color: #000;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 5px;
            border: 1px solid #F18EA7;
            cursor: pointer;
            margin-left: 20px;
        }

        .primary-btn:hover {
            background-color: #fdf5f7;
        }
        .product__details__quantity {
            background-color: #fff !important;
        }
        p {
            color: #000000; /* Màu đen */
        }
        .product-meta p {
            color: #9fa0a4 !important;
        }
        h2 {
            color: #F18EA7 !important;
            text-decoration: none;
        }
        .view-all-button {
            text-align: center;
            margin-top: 20px;
        }

        .view-all-button .btn {
            background-color: #fff; /* Màu hồng */
            color: #000;
            padding: 10px 30px;
            font-size: 16px;
            border-radius: 10px;
            text-decoration: none;
            border: 1px solid #F18EA7;
        }

        .view-all-button .btn:hover {
            background-color: #F18EA7;
            color: #fff;
        }
        .related-product .product__item__text h5 {
            color: red;
            font-size: 16px;
        }

        .suggested-product .product__item__text h5 {
            color: red;
            font-size: 16px;
        }
        .related-product .product__item__text h6 {
            font-weight: bold;
            font-size: 18px;
        }

        .suggested-product .product__item__text h6 {
            font-weight: bold;
            font-size: 18px;
        }
        .divider {
            margin: 20px 0;
            border-top: 1px solid #9F9F9F; /* Line color */
        }
        .product__details__pic__item--large {
            height: 600px; /* Giới hạn chiều cao tối đa của hình ảnh */
            width: 100%; /* Giữ tỷ lệ cho hình ảnh */
            object-fit: contain; /* Giữ nguyên tỷ lệ và cắt bớt phần thừa nếu có */
        }
        
        .product-tabs {
            margin-right: 100px;
            margin-left: 100px;
        }
        .tabs {
            display: flex;
            list-style: none;
            padding: 0;
            text-align: center;
        }
        .tab-link {
            padding: 10px 20px;
            cursor: pointer;
            background: #fffff;
            border-bottom: none;
            font-weight: bold;
            color: #9f9f9f;
        }
        .tab-link.current {
            background: #fff;
            color: #000;
        }

        .tab-content {
            display: none;
            padding: 20px;
        }

        .tab-content.current {
            display: block;
        }
        .product__item__pic__hover {
            align-items: center;
            justify-content: center;
        }
        section.product-details{
            padding-bottom: 30px;
        }
        .product__item__pic {
            width: 100%;
            height: 100% !important;
            object-fit: cover;
            margin-top: 0px;
        }
        @media (max-width: 768px) {
    /* Thay đổi cách hiển thị tab cho dễ đọc trên màn hình nhỏ */
    .tabs {
        flex-direction: column; /* Chuyển các tab thành cột */
        text-align: left; /* Căn lề trái cho tab */
    }

    .tab-link {
        padding: 12px 16px; /* Điều chỉnh padding cho các tab */
        font-size: 16px; /* Giảm kích thước font */
        width: 100%; /* Tab chiếm hết chiều rộng */
        text-align: left; /* Căn lề trái cho tab */
    }

    /* Cập nhật tab hiện tại */
    .tab-link.current {
        background: #F18EA7;
        color: white;
    }

    .tab-content {
        padding: 10px 15px; /* Điều chỉnh padding cho nội dung tab */
    }

    /* Điều chỉnh margin của section */
    .product-tabs {
        margin-right: 20px;
        margin-left: 20px;
    }

    section.product-details {
        padding-bottom: 20px; /* Giảm padding dưới cùng của section */
    }
}

/* Tối ưu cho màn hình dưới 480px (Điện thoại nhỏ) */
@media (max-width: 480px) {
    .tab-link {
        padding: 10px 15px; /* Điều chỉnh thêm padding cho tab */
        font-size: 14px; /* Giảm kích thước font cho các thiết bị nhỏ */
    }

    .tab-content {
        padding: 8px 10px; /* Điều chỉnh padding nhỏ hơn */
    }

    section.product-details {
        padding-bottom: 15px; /* Giảm padding dưới cùng */
    }
}
    </style>
    <script>
        document.querySelectorAll('.product__details__pic__slider img').forEach(img => {
        img.addEventListener('click', function() {
        const bigImage = document.querySelector('.product__details__pic__item--large');
        bigImage.src = this.getAttribute('data-imgbigurl');
            });
        });
    </script>
</head>
<body>
    <?php include('../includes/header.php'); ?>

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="<?= "http://localhost:8088/FINAL/admin/" . htmlspecialchars($anh_arr[0]) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <?php 
                                $image_count = 0; // Counter to limit images
                                foreach ($anh_arr as $image): 
                                if ($image_count >= 3) break; // Stop after 3 images
                            ?>
                            <img data-imgbigurl="<?= "http://localhost:8088/FINAL/admin/" . htmlspecialchars($image) ?>" src="<?= "http://localhost:8088/FINAL/admin/" . htmlspecialchars($image) ?>">
                        <?php $image_count++; ?>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h4><strong><?= htmlspecialchars($row['name']) ?></strong></h4>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 đánh giá)</span>
                        </div>
                        <div class="product__details__price"><?= htmlspecialchars(number_format($row['price'], 0, ',', '.')) ?> VND</div>
                        <p><?= htmlspecialchars($row['description']) ?></p>
                        <form method="post">
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="number" value="1" name="qty" min="1">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="pid" value="<?= htmlspecialchars($idsp) ?>">
                            <button class="primary-btn" name="atcbtn">Thêm vào giỏ hàng</button>
                        </form>
                    </div>
                    <div class="divider"></div>
                    <div class="product-meta">
                        <p><strong>Mã:</strong> <?= htmlspecialchars($row['id']) ?></p>
                        <p><strong>Danh mục:</strong> <?= htmlspecialchars($row['category_name']) ?></p>
                        <p><strong>Từ khóa:</strong> Thời trang, áo kiểu, áo khoác</p>
                        <div class="share d-flex align-items-center">
                    <p class="mb-0"><strong>Chia sẻ:</strong></p>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode('http://localhost:8088/FINAL/frontend/sanpham.php?id=' . $row['id']) ?>" target="_blank" class="ml-2">
                            <i class="fa fa-facebook social-icon"></i>
                        </a>
                        <a href="https://www.instagram.com/?url=<?= urlencode('http://localhost:8088/FINAL/frontend/sanpham.php?id=' . $row['id']) ?>" target="_blank" class="ml-2">
                            <i class="fa fa-instagram social-icon"></i>
                        </a>
                        <a href="https://www.youtube.com/share?url=<?= urlencode('http://localhost:8088/FINAL/frontend/sanpham.php?id=' . $row['id']) ?>" target="_blank" class="ml-2">
                            <i class="fa fa-youtube social-icon"></i>
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->
    <div class="divider"></div>
    <!-- Mô tả chi tiết nha -->
    <div class="product-tabs">
    <ul class="tabs">
        <li class="tab-link current" data-tab="tab-1">Mô tả sản phẩm</li>
        <li class="tab-link" data-tab="tab-2">Hướng dẫn sử dụng</li>
    </ul>
    <div id="tab-1" class="tab-content current">
        <p><?= htmlspecialchars($row['description']) ?></p>
    </div>
    <div id="tab-2" class="tab-content">
        <p>
        <li>Thời gian đổi hàng: 3 ngày tính từ thời điểm giao hàng thành công.</li>
        <li>Hỗ trợ đổi size/ đổi mẫu 1 lần cho một đơn hàng.</li>
        <li>Sản phẩm chưa qua sử dụng; không dính bẩn, hư hỏng; sản phẩm còn nguyên tag mạc.</li>
        <li>Khách hàng vui lòng đổi sản phẩm bằng giá hoặc cao giá hơn và thanh toán tiền chênh lệch, nếu sản phẩm đổi giá thấp hơn shop không hoàn tiền thừa.</li>
        <li>Khách hàng vui lòng thanh toán phí ship 2 chiều khi có nhu cầu đổi hàng. Nếu khách hàng đổi tại cửa hàng vui lòng ghé sau 16h mỗi ngày, khi đến đổi đem theo mã đơn hàng.</li>
      </ul>
        </p>
    </div>
</div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.tab-link');
    const tabContents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove 'current' class from all tabs and tab contents
            tabs.forEach(t => t.classList.remove('current'));
            tabContents.forEach(tc => tc.classList.remove('current'));

            // Add 'current' class to clicked tab and its corresponding content
            tab.classList.add('current');
            document.querySelector(`#${tab.dataset.tab}`).classList.add('current');
        });
    });
});
    </script>

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h3>Sản phẩm liên quan</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                // Lấy sản phẩm cùng danh mục, ngoại trừ sản phẩm hiện tại
                $dmid = $row['category_id'];
                $sql2 = "SELECT * FROM products WHERE category_id = ? AND id <> ?";
                $stmt2 = mysqli_prepare($conn, $sql2);
                mysqli_stmt_bind_param($stmt2, 'ii', $dmid, $idsp);
                mysqli_stmt_execute($stmt2);
                $result2 = mysqli_stmt_get_result($stmt2);

                while ($row2 = mysqli_fetch_assoc($result2)) {
                    // Tách mảng hình ảnh từ database
                    $arrs = explode(";", $row2["images"]);

                    // Kiểm tra xem có hình ảnh hay không và tạo đường dẫn phù hợp
                    $image_url = !empty($arrs[0]) ? "http://localhost:8088/FINAL/admin/" . $arrs[0] : 'default.jpg';
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic">
                                <img src="<?= $image_url ?>" alt="<?= htmlspecialchars($row2['name']) ?>">
                                <div class="product__item__pic__hover">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="sanpham.php?id=<?= htmlspecialchars($row2['id']) ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                    </div>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="sanpham.php?id=<?= htmlspecialchars($row2['id']) ?>"><?= htmlspecialchars($row2['name']) ?></a></h6>
                                <h5><?= number_format($row2['price'], 0, ',', '.') ?> VND</h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Related Product Section End -->

    <!-- Có thể bạn sẽ thích -->
    <section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h3>Có thể bạn sẽ thích</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            // Lấy sản phẩm cùng danh mục, ngoại trừ sản phẩm hiện tại
            $sql2 = "SELECT * FROM products ORDER BY RAND() LIMIT 4"; // Lấy ngẫu nhiên 4 sản phẩm
            $stmt2 = mysqli_prepare($conn, $sql2);
            mysqli_stmt_execute($stmt2);
            $result2 = mysqli_stmt_get_result($stmt2);

            while ($row2 = mysqli_fetch_assoc($result2)) {
                // Tách mảng hình ảnh từ database
                $arrs = explode(";", $row2["images"]);

                // Kiểm tra xem có hình ảnh hay không và tạo đường dẫn phù hợp
                $image_url = !empty($arrs[0]) ? "http://localhost:8088/FINAL/admin/" . $arrs[0] : 'default.jpg';
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic">
                            <img src="<?= $image_url ?>" alt="<?= htmlspecialchars($row2['name']) ?>">
                            <div class="product__item__pic__hover">
                                <ul>
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="sanpham.php?id=<?= htmlspecialchars($row2['id']) ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="sanpham.php?id=<?= htmlspecialchars($row2['id']) ?>"><?= htmlspecialchars($row2['name']) ?></a></h6>
                            <h5><?= number_format($row2['price'], 0, ',', '.') ?> VND</h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- Button Xem Tất Cả -->
        <div class="row">
            <div class="col-lg-12">
                <div class="view-all-button">
                    <a href="shop.php" class="btn btn-primary">Xem tất cả</a>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Có thể bạn sẽ thích -->

    <?php include('../includes/footer.php'); ?>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>