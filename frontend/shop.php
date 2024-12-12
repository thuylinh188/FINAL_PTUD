<!DOCTYPE html>
    <html lang="zxx">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Ogani Template">
        <meta name="keywords" content="Ogani, unica, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Chimotee</title>

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
        <link rel="stylesheet" href="css/jquery-ui.css" type="text/css">
        <style>
            h1, h2, h3, h4, h5, h6 {
                font-family: "Palatino Linotype";
            }
            .product__pagination {
                float: right !important;
                width: 200px;
            }
            .section-title h2:after {
                background: #f08ea7;
            }
            .product__item__pic__hover li:hover a {
                background: #f18ea7;
                border-color: #f18ea7;
            }
            .product__pagination a:hover {
                background: #f18ea7;
                border-color: #f18ea7;
                color: #ffffff;
            }
            .price-range-wrap .price-range .ui-slider-range {
                background: #f18ea7 !important;
                border-radius: 0;
            }
        </style>
    </head>
    <body>
    <?php
    session_start();
    $is_homepage = false;
    require_once('../includes/header.php');
    ?>
    
        <!-- Product Section Begin -->
        <section class="product spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-5">
                        <div class="sidebar">
                            <div class="sidebar__item">
                                <h4>DANH MỤC SẢN PHẨM</h4>
                                <ul>
                            <?php
                            require('../includes/db.php');
                            $sql_str = "select * from categories order by name";
                            $result = mysqli_query($conn, $sql_str);
                                while ($row = mysqli_fetch_assoc($result)){
                            ?>
                            
                            <li><a href="search_by_category.php?category_id=<?= $row['id'] ?>"><?= $row['name'] ?></a></li>
                                
                            <?php } ?>
                            
                                </ul>
                            </div>
                            <!-- Lọc theo giá -->



                            <div class="sidebar__item">
                                <div class="latest-product__text">
                                    <h4>Sản phẩm mới</h4>
                                    <div class="latest-product__slider owl-carousel">
                                        <div class="latest-prdouct__slider__item">
    <?php
    $sql_str = "SELECT * FROM `products` order by created_at desc limit 0, 5";
    $result = mysqli_query($conn, $sql_str);
    while ($row = mysqli_fetch_assoc($result)){
        $anh_arr = explode(';', $row['images']);
    ?>
                                            <a href="sanpham.php?id=<?=$row['id']?>" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="<?="http://localhost:8088/FINAL/admin/".$anh_arr[0]?>" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6><?=$row['name']?></h6>
                                                    <!-- <span><?=$row['price']?></span> -->
                                                    <div class="prices">
                                                        <span class="old"><?=$row['price']?></span>
                                                        <span class="curr"><?= number_format($row['discounted_price'], 0, '', '.') . " VNĐ" ?></span>
                                                    </div>
                                                </div>
                                            </a>
    <?php
    }
    ?>
                                            
                                        </div>
                                        <div class="latest-prdouct__slider__item">
    <?php
    $sql_str = "SELECT * FROM `products` order by created_at desc limit 3, 5";
    $result = mysqli_query($conn, $sql_str);
    while ($row = mysqli_fetch_assoc($result)){
        $anh_arr = explode(';', $row['images']);
    ?>
                                            <a href="sanpham.php?id=<?=$row['id']?>" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="<?="http://localhost:8088/FINAL/admin/".$anh_arr[0]?>" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6><?=$row['name']?></h6>
                                                    <div class="prices">
                                                        <span class="old"><?=$row['price']?></span>
                                                        <span class="curr"><?= number_format($row['discounted_price'], 0, '', '.') . " VNĐ" ?></span>
                                                    </div>
                                                </div>
                                            </a>
                                        <?php } ?>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-7">
                        <div class="product__discount">
                            <div class="section-title product__discount__title">
                                <h2>Thời Trang Nữ</h2>
                            </div>
                            <div class="row">
                                <div class="product__discount__slider owl-carousel">
                                <?php
    $sql_str = "SELECT products.id as pid, products.name as pname, categories.name as cname, round((price - discounted_price)/price*100) as discount, images, price, discounted_price  FROM `products`, `categories` where products.category_id=categories.id order by discount desc limit 0, 6 ";
    $result = mysqli_query($conn, $sql_str);
    while ($row = mysqli_fetch_assoc($result)){
        $anh_arr = explode(';', $row['images']);
    ?>                                
                                    <div class="col-lg-4">
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg"
                                                data-setbg="<?="http://localhost:8088/FINAL/admin/".$anh_arr[0]?>">
                                                <div class="product__discount__percent">-<?=$row['discount']?>%</div>
                                                <ul class="product__item__pic__hover">
                                                    <li><a href="dien link trang gio hang"><i class="fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                <span><?=$row['cname']?></span>
                                                <h5><a href="sanpham.php?id=<?=$row['pid']?>"><?=$row['pname']?></a></h5>
                                                <!-- <div class="product__item__price"><?=$row['discounted_price']?> <span><?=$row['price']?></span></div> -->
                                                <div class="prices">
                                                        <span class="old"><?=$row['price'] ?></span>
                                                        <span class="curr"><?= number_format($row['discounted_price'], 0, '', '.') . " VNĐ" ?></span>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
    <?php } ?>
                                
                                </div>
                            </div>
                        </div>
                        <div class="filter__item">
                            <div class="row">
                                <div class="col-lg-4 col-md-5">
                                    <div class="filter__sort">
                                        <span>Lọc theo</span>
                                            <select id="sort" name="sort" onchange="location = this.value;">
                                                <option value="?sort=default" <?= isset($_GET['sort']) && $_GET['sort'] == 'default' ? 'selected' : '' ?>>Mặc định</option>
                                                <option value="?sort=asc" <?= isset($_GET['sort']) && $_GET['sort'] == 'asc' ? 'selected' : '' ?>>Giá tăng dần</option>
                                                <option value="?sort=desc" <?= isset($_GET['sort']) && $_GET['sort'] == 'desc' ? 'selected' : '' ?>>Giá giảm dần</option>
                                            </select>
                                    </div>
                                </div>

    <?php
        // Lấy giá trị lọc từ URL
    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'default';

    // Xây dựng truy vấn SQL dựa trên giá trị lọc
    switch ($sort) {
        case 'asc':
            $sql_str = "SELECT * FROM products ORDER BY discounted_price ASC";
            break;
        case 'desc':
            $sql_str = "SELECT * FROM products ORDER BY discounted_price DESC";
            break;
        default:
            $sql_str = "SELECT * FROM products ORDER BY name";
            break;
    }

    // Thực thi truy vấn
    $result = mysqli_query($conn, $sql_str);

    ?>
                                <div class="col-lg-4 col-md-4">
                                    <div class="filter__found">
                                        <h6>Có  <span><?=mysqli_num_rows($result)?></span>sản phẩm</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
    <?php
    while ($row = mysqli_fetch_assoc($result)){
        $anh_arr = explode(';', $row['images']);
    ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="<?="http://localhost:8088/FINAL/admin/".$anh_arr[0]?>">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="sanpham.php?id=<?=$row['id']?>"><?=$row['name']?></a></h6>
                                        <!-- <h5><?=$row['price']?></h5> -->
                                        <div class="prices">
                                            <span class="old"><?=$row['price']?></span>
                                            <span class="curr"><?= number_format($row['discounted_price'], 0, '', '.') . " VNĐ" ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
    <?php } ?>

                        </div>
                        <div class="product__pagination">
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Product Section End -->

        <?php

    require_once('../includes/footer.php');
    ?>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    </body>
    </html>