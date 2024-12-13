<?php
session_start();
$is_homepage = false;

require_once('../includes/db.php');



require_once('../includes/header.php');
?>
<head>
<title>Giỏ hàng</title>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">     
<style>
    body{
        background-color: white !important;
        font-family: "Palatino Linotype", serif !important;
    }
     .breadcrumb-section {
        background: url('http://localhost:8088/FINAL/hinhanh/timeout.png') no-repeat center center;
        background-size: cover;
        position: relative;
        padding: 120px 0;
        text-align: center;
        background-position: center;
        margin-top: 30px;
    }
     .breadcrumb__text h2 {
         font-family: "Palatino Linotype";
         color: #f18ea7;
     }
     .breadcrumb__option a {
        font-family: "Palatino Linotype";
        color: #f18ea7;
        font-size: 18px;
     }
     .breadcrumb__option span {
        font-family: "Palatino Linotype";
        color: #f18ea7;
        font-size: 18px;
     }
     .breadcrumb__option a:after {
        background: #f18ea7;
        right: -18px;
     }
 
     .checkout {
        margin-top: 20px;
    }
   
    .checkout__form h4 {
        font-family: "Palatino Linotype";
        color: #f18ea7;
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }
    .table-bordered thead th {
    background-color: #F5F5F5;
    color: black;
    font-weight: bold;
    text-align: center;
    border: 1px solid #ddd;
}
    .table input[type="number"] {
        width: 40px;
        text-align: center;
    }
    .btn-primary {
        background-color: #f18ea7;
        border: none;
        border-radius: 15px;
        margin-top: 20px;


    }

    .btn-success {
        background-color: #28a745;
        border: none;
    }


    .checkout__order {
    max-width: 400px; /* Giới hạn độ rộng tối đa */
    margin-left: 60px; /* Canh giữa cột bên phải */
    margin-right: 0; /* Đẩy cột sang sát phải */
    background: ##F5F5F5;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 40px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }
    .checkout__order h4 {
        font-family: "Palatino Linotype";
        color: #f18ea7;
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }
    .checkout__order ul {
        list-style: none;
        padding: 0;
    }


    .checkout__order ul li {
        font-size: 16px;
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
        color: black;
    }


    .checkout__order ul li span {
        font-weight: bold;
        color: black;
    }


    .checkout__order h5 {
        font-family: "Palatino Linotype";
        font-size: 20px;
        font-weight: bold;
        text-align: left;
        margin-bottom: 20px;
    }


    .checkout__order__total {
        font-size: 20px;
        font-weight: bold;
        text-align: left;
        margin-top: 20px;
    }


    .checkout__order__total span {
          color: #f18ea7 !important;
          font-size: 18px;
          font-weight: bold;
          margin-left: 5px;
    }


    .checkout__order .btn-success {
          background-color:#f18ea7;
          border: none;
    }


    .checkout__order .btn-success:hover {
          background-color: #007bff;
    }


    .container-fluid {
        padding-left: 40px;
        padding-right: 40px;
    }
    @media (max-width: 768px) {
    .breadcrumb-section {
        padding: 60px 0;
    }
    .breadcrumb__text h2 {
        font-size: 22px;
    }
    .breadcrumb__option a, .breadcrumb__option span {
        font-size: 16px;
    }
    
    .checkout__form {
        margin: 0 20px;
        padding: 0;
        box-shadow: none;
    }
    
    .checkout__form h4, .checkout__order h4 {
        font-size: 20px;
    }
    
    .checkout__order ul li {
        font-size: 14px;
    }

    .checkout__order__total {
        font-size: 18px;
    }

    .btn-primary, .btn-success {
        width: 100%;
        font-size: 16px;
    }

    .table {
        font-size: 12px;
    }
     

    .table thead th {
        font-size: 14px;
    }

    .table input[type="number"] {
        width: 60px;
    }
    .checkout__order {
        margin: 0 20px;
        padding: 15px;
        box-shadow: none;
    }
    /* Cột trái và cột phải xếp chồng khi trên thiết bị di động */
    .col-lg-7, .col-lg-5 {
        width: 100%;
        margin-bottom: 20px;
    }

    .breadcrumb__option a:after {
        display: none;
    }
    .container-fluid {
        padding-left: 0;
        padding-right:0;
    }
}
</style>
</head>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>GIỎ HÀNG</h2>
                    <div class="breadcrumb__option">
                        <a href="../index.php">Home</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container-fluid">
        <div class="row">
            <!-- Cột trái: 70% -->
            <div class="col-lg-7">
                <div class="checkout__form">
                    <h4>Giỏ hàng</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng cộng</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cart = [];
                            if (isset($_SESSION['cart'])) {
                                $cart = $_SESSION['cart'];
                            }
                            $count = 0; // Số thứ tự
                            $total = 0;
                            foreach ($cart as $item) {
                                $discountedPrice = isset($item['discounted_price']) ? $item['discounted_price'] : (isset($item['price']) ? $item['price'] : 0);
                                $lineTotal = $discountedPrice * $item['qty'];
                                $total += $lineTotal;
                            ?>
                            <tr>
                                <form action="updatecart.php?id=<?= $item['id'] ?>" method="post">
                                    <td><?= htmlspecialchars($item['name']) ?></td>
                                    <td><?= number_format($discountedPrice, 0, '', '.') . " VNĐ" ?></td>
                                    <td><input type="number" name="qty" value="<?= $item['qty'] ?>" min="1" /></td>
                                    <td><?= number_format($lineTotal, 0, '', '.') . " VNĐ" ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm">Cập nhật</button>
                                        <a href="./deletecart.php?id=<?= $item['id'] ?>" class="btn btn-danger btn-sm">Xóa</a>
                                    </td>
                                </form>
                            </tr>
                            <?php } ?>                            
                        </tbody>
                    </table>
                    <a href="shop.php" class="btn btn-primary">Tiếp tục mua sắm</a>
                </div>
            </div>

            <!-- Cột phải: 30% -->
            <div class="col-lg-5">
                <div class="checkout__order">
                    <h4>Tổng tiền</h4>
                    <ul>
                        <li>Tổng: <span><?= number_format($total, 0, '', '.') . " VNĐ" ?></span></li>
                    </ul>
                    <h5>Phương thức giao hàng</h5>
                    <div>
                        <input type="radio" name="delivery" id="store" value="store" checked>
                        <label for="store">Giao tại cửa hàng</label>
                    </div>
                    <div>
                        <input type="radio" name="delivery" id="fast" value="fast">
                        <label for="fast">Giao hàng nhanh</label>
                    </div>
                    <div>
                        <input type="radio" name="delivery" id="economy" value="economy">
                        <label for="economy">Giao hàng tiết kiệm</label>
                    </div>
                    <div class="checkout__order__total">
                        Tổng cộng:  <span><?= number_format($total * 1.1, 0, '', '.') . " VNĐ" ?></span>
                    </div>
                    <a href="thanhtoan.php" class="btn btn-success btn-block">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

<?php

require_once('../includes/footer.php');
?>