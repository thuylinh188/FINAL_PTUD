<?php
require('../includes/db.php');
?>
<?php require_once('../includes/header.php');
; ?>
<style>

  /* css chung */
html, body, main {
  background-color: white;
  font-family: Palatino Linotype;
  margin: 0;
  padding: 0;
}
/* CSS Banner mặc định */
.banner {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px 120px;
  width: 100%;
  background-color: white;
}

.banner-description {
  flex: 1.5;
  font-size: 18px;
  line-height: 1.6;
  color: #333;
  padding-right: 20px;
  box-sizing: border-box;
  text-align: justify;
}

.banner-description-title {
  font-family: 'Lobster', cursive;
  font-size: 65px;
  color: #f18ea7;
  margin-bottom: 20px;
  text-align: center;
  text-shadow: 3px 3px 8px rgba(241, 142, 167, 0.5);
}

.banner-description p {
  margin-bottom: 20px;
}

.banner-images {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  background-color: white;
}

.carousel {
  width: 100%;
  height: 400px; /* Đặt chiều cao cố định cho carousel */
  position: relative;
  overflow: hidden;
}

.carousel img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  transition: opacity 1s ease-in-out;
  border-radius: 10px;
}

.carousel img.active {
  opacity: 1;
}

/* Cập nhật cho màn hình nhỏ (Responsive Design) */
@media (max-width: 768px) {
  .banner {
    flex-direction: column;
    padding: 20px;
  }

  .banner-description {
    flex: none;
    font-size: 16px;
    padding-right: 0;
    text-align: center;
  }

  .banner-description-title {
    font-size: 32px;
    text-align: center;
    margin-bottom: 10px;
  }

  .banner-description p {
    font-size: 14px;
    margin-bottom: 15px;
  }

  .banner-images {
    flex: none;
    width: 100%;
    height: 250px;
  }

  .carousel {
    width: 100%;
    height: 250px;
  }

  .carousel img {
    height: 100%;
  }
}

/* css section 2 - danh mục sản phẩm */
.product-category {
  padding: 40px 20px; /* Giảm padding hai bên cho phù hợp với màn hình nhỏ */
  background-color: #fff;
}

.product-category-title {
  font-size: 32px;
  font-weight: bold;
  color: #f18ea7;
  margin-bottom: 20px;
  text-align: center;
}

.product-category-description {
  font-size: 18px;
  line-height: 1.6;
  color: #555;
  text-align: center;
  margin-bottom: 40px;
}

.product-columns {
  display: flex;
  justify-content: space-between;
  gap: 20px;
  margin-top: 20px;
  flex-wrap: wrap; /* Cho phép các cột chuyển sang hàng mới khi cần */
}

.product-column {
  flex: 1;
  text-align: center;
  max-width: 30%; /* Giới hạn cột ở 30% cho màn hình lớn */
  margin-bottom: 20px; /* Thêm khoảng cách giữa các cột */
}

.product-column img {
  width: 100%;
  height: auto;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease-in-out;
}

.product-column img:hover {
  transform: scale(1.05);
}

.product-column p {
  margin-top: 10px;
  font-size: 16px;
  color: #333;
}

/* Responsive Design cho màn hình nhỏ */
@media (max-width: 768px) {
  .product-columns {
    justify-content: center; /* Căn giữa các cột trên màn hình nhỏ */
  }

  .product-column {
    max-width: 100%; /* Cột chiếm toàn bộ chiều rộng trên màn hình nhỏ */
  }

  .product-category-title {
    font-size: 28px; /* Điều chỉnh font-size cho tiêu đề */
  }

  .product-category-description {
    font-size: 16px; /* Điều chỉnh font-size cho mô tả */
  }
}

/* Section thời gian khuyến mãi */
/* CSS cho phần timer khuyến mãi */
.promo-timer {
  background-color: white;
  position: relative;
  text-align: center;
  background-image: url('http://localhost:8088/FINAL/hinhanh/timeout.png'); /* Hình ảnh bìa */
  background-size: cover;
  background-position: center;
  color: white;
  padding: 50px 0;
}

.promo-timer h2 {
  font-size: 36px;
  margin-bottom: 50px;
  text-transform: uppercase;
  font-weight: bold;
  color: #78B1F8;
  font-family: Palatino Linotype;
}

/* Đồng hồ đếm ngược */
.promo-timer, .featured-section {
  background-color: white;
  margin: 0;
}

.countdown {
  font-size: 70px;
  font-weight: bold;
  margin-bottom: 20px;
}

.countdown span {
  margin: 0 10px;
  padding: 20px;
  background-color: #e8e9eb;
  border-radius: 5px;
  color: #f18ea7;
}

/* Form nhập email */
.email-form {
  margin-top: 30px;
  padding: 20px;
  border-radius: 10px;
  display: inline-block;
}

.email-form input[type="email"] {
  padding: 10px;
  width: 300px;
  border: solid 1px;
  border-radius: 5px;
  font-size: 16px;
  font-family: Palatino Linotype;
}

.email-form button {
  padding: 10px 20px;
  background-color: #78b1f8;
  color: white;
  border: solid 1px;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s;
  font-family: Palatino Linotype;
  margin-top: 20px;
}

.email-form button:hover {
  background-color: #d17089;
}

.email-form input[type="email"], .email-form button {
  margin-right: 10px;
}

/* Media Queries cho các thiết bị di động */
@media (max-width: 768px) {
  .promo-timer {
    padding: 30px 15px; /* Giảm padding trên màn hình nhỏ */
  }

  .promo-timer h2 {
    font-size: 28px; /* Giảm kích thước tiêu đề */
    margin-bottom: 30px;
  }

  .countdown {
    font-size: 50px; /* Giảm kích thước đồng hồ đếm ngược */
  }

  .countdown span {
    padding: 15px; /* Giảm padding trong các span đồng hồ */
    font-size: 30px; /* Giảm font-size cho các span */
  }

  .email-form {
    margin-top: 20px;
    width: 100%; /* Đảm bảo form chiếm 100% chiều rộng */
  }

  .email-form input[type="email"], .email-form button {
    width: 100%; /* Đảm bảo input và button rộng 100% */
    margin: 5px 0; /* Giảm khoảng cách giữa các phần tử */
  }

  .email-form input[type="email"] {
    font-size: 14px; /* Giảm kích thước chữ trong input */
  }

  .email-form button {
    font-size: 14px;
    width: 25%;
  }
}

/* Media Queries cho các thiết bị rất nhỏ (điện thoại) */
@media (max-width: 480px) {
  .countdown {
    font-size: 40px;
  }

  .countdown span {
    padding: 10px; /* Giảm padding thêm */
  }

  .email-form input[type="email"], .email-form button {
    font-size: 12px; /* Giảm font-size cho các thiết bị rất nhỏ */
  }
}
    /* Section sản phẩm nổi bật */
.featured-section {
  width: 100%;
  padding: 40px 20px;
  background-color: #FFF;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
}

.featured-section .header {
  width: 100%;
  text-align: center;
  font-size: 32px;
  margin-bottom: 40px;
  color: #f18ea7;
  font-weight: bold;
}

.featured-section .content {
  display: flex;
  flex: 1;
  justify-content: space-between;
  align-items: center;
  gap: 30px;
  background-color: #faf9f4;
  margin-left: 100px;
  margin-right: 100px;
}

.featured-section .content .image {
  flex: 1;
  display: flex;
  justify-content: left;
  align-items: left;
}

.featured-section .content .image img {
  max-width: 80%;  /* Giảm kích thước hình ảnh xuống 80% */
  max-height: auto;
  object-fit: cover;
  border-radius: 0;
}

.featured-section .content .description {
  flex: 1.5;
  font-family: "Palatino Linotype", sans-serif;
  text-align: center;
  padding-right: 10px;
}

.featured-section .content .description h3 {
  font-size: 65px;
  margin-bottom: 15px;
  font-family: 'Lobster', cursive;
  color: #f18ea7;
  text-shadow: 3px 3px 8px rgba(241, 142, 167, 0.5);
}

.featured-section .content .description p {
  font-size: 16px;
  color: #555;
  line-height: 1.5;
}

.featured-section .content .description .buy-now-btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007bff;
  color: #FFF;
  text-align: center;
  text-decoration: none;
  margin-top: 20px;
  border-radius: 8px;
}

.featured-section .content .description .buy-now-btn:hover {
  background-color: #78B1F8;
}

/* Responsive Design */
@media (max-width: 768px) {
  .featured-section {
    padding: 20px 10px;  /* Giảm padding cho section trên điện thoại */
    text-align: center;
  }

  .featured-section .content {
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 20px;
    padding: 0 10px;  /* Giảm khoảng cách lề trái và phải */
    margin: 0;  /* Đảm bảo không có margin */
  }

  .featured-section .content .image img {
    width: 100%;
    max-width: 100%;
    height: auto;
  }

  .featured-section .content .description h3 {
    font-size: 36px;
    margin-bottom: 10px;
  }

  .featured-section .content .description p {
    font-size: 16px;
    margin: 0 auto;
    line-height: 1.6;
    padding: 0 10px;
  }

  .featured-section .content .description .buy-now-btn {
    margin: 20px auto;
  }
}
    /* Section Câu chuyện thương hiệu */
    .brand-story {
      text-align: center;
      padding: 50px 20px;
      background-color: #fff;
    }

    .brand-story-title {
      font-size: 32px;
      margin-bottom: 20px;
      color: #f18ea7;
    }

    .brand-story-slider {
      position: relative;
      width: 100%;
      max-width: 100%;
      margin: 0 auto 30px;
      overflow: hidden;
    }

    .brand-story-slider .slide {
      display: none;
      transition: opacity 1s ease-in-out;
    }

    .brand-story-slider .slide.active {
      display: block;
    }

    .brand-story-slider img {
      width: 100%;
      height: auto;
      object-fit: cover;
      border-radius: 10px;
    }

    .brand-story-button {
      background-color: #007bff;
      color: #fff;
      font-family: Palatino Linotype;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      font-size: 1rem;
      cursor: pointer;
    }

    .brand-story-button:hover {
      background-color: #78B1F8;
    }

    /* Css cho sản phẩm mới nhất */
    .product-section {
        padding-left: 120px;
        padding-right: 120px;
        text-align: center;
        background-color: white;
    }

    .section-title {
        font-size: 32px;
        font-weight: bold;
        color: #F18EA7;
        padding-top: 20px;
        background-color: #fff;
    }

    .product-list {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 0px;
    }

    .product-item {
        position: relative;
        width: 400px;
        text-align: center;
        border: 1px solid #ddd;
        padding: 20px;
        background-color: #f9f9f9;
        transition: transform 0.3s ease;
        margin-bottom: 10px;
    }
    .product-image {
        position: relative;
        width: 100%;
        overflow: hidden;
        margin-bottom: 10px;
    }
    .product-image img {
        width: 100%;
        height: auto;
        transition: opacity 0.3s ease;
    }

    .product-image .img-hover {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .product-item:hover .img-hover {
        opacity: 1;
    }
    .product-item img {
        width: 100%;
        border-radius: 8px;
    }

    .new-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #C80404;
        color: white;
        font-size: 12px;
        font-weight: bold;
        text-align: center;
        display: flex; /* Sử dụng flexbox */
        align-items: center; /* Căn giữa theo chiều dọc */
        justify-content: center; /* Căn giữa theo chiều ngang */
        height: 50px; /* Chiều cao của hình tròn */
        width: 50px; /* Chiều rộng của hình tròn */
        border-radius: 50%; /* Tạo hình tròn */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* (Tùy chọn) Bóng */
    }

    .price {
        font-size: 16px;
        color: red;
        font-weight: bold;
    }

    .sold {
        font-size: 14px;
        color: #888;
    }

    .rating {
        margin-top: 10px;
    }

    .star {
        color: #ffcc00;
    }

    .reviews {
        font-size: 14px;
        color: #888;
    }

    .buy-now {
        font-family: Palatino Linotype;
        color: #F18EA7;
        background-color: white;
        padding: 10px;
        border: none;
        border: 1px solid #F18EA7;
        border-radius: 5px;
        margin-top: 10px;
        cursor: pointer;
        text-align: center;
    }
    .buy-now:hover {
        color: white; /* Màu chữ khi hover */
        background-color: #f16e82; /* Màu nền khi hover */
        border-color: #f16e82; /* Màu viền khi hover */
        transform: scale(1.05); /* Phóng to nhẹ nút khi hover */
    }
    .view-all {
        font-size: 16px;
        color: white; /* Màu chữ */
        background-color: #f16e82; /* Màu nền */
        text-decoration: none; /* Xóa gạch chân */
        padding: 10px 20px; /* Tăng kích thước vùng bấm */
        display: inline-block; /* Hiển thị như nút */
        border: none; /* Xóa viền cũ */
        border-radius: 5px; /* Bo góc */
        cursor: pointer; /* Thay đổi con trỏ chuột */
        text-align: center; /* Canh giữa chữ */
        transition: all 0.3s ease; /* Hiệu ứng hover */
        margin-bottom: 30px;
        margin-top: 20px;
    }

    .view-all:hover {
        background-color: #f18ea7; /* Màu nền khi hover */
        transform: scale(1.05); /* Phóng to nhẹ khi hover */
    }

    @media (max-width: 768px) {
    .product-section {
        padding-left: 20px;
        padding-right: 20px;
    }

    .section-title {
        font-size: 24px;
    }

    .product-list {
        justify-content: center; /* Centering the products */
        gap: 15px;
    }

    .product-item {
        width: 100%; /* Full width on mobile */
        max-width: 320px; /* Limiting the max width */
    }

    .new-badge {
        top: 5px;
        right: 5px;
        height: 40px;
        width: 40px;
    }

    .price {
        font-size: 14px;
    }

    .buy-now {
        width: 35%; /* Full width button on mobile */
    }

    .view-all {
        width: 35%; /* Full width view-all button on mobile */
    }
}

/* Further adjustments for smaller screens */
@media (max-width: 480px) {
    .section-title {
        font-size: 20px;
    }

    .new-badge {
        height: 35px;
        width: 35px;
    }

    .product-item {
        padding: 15px; /* Adjust padding for smaller screens */
    }

    .price {
        font-size: 14px;
    }
}

/* css cho bài viết gần đây */
      /* Default styles for larger screens */
.recent-posts {
  padding: 60px 120px;
  background-color: #fff;
}

.section-title {
  font-size: 32px;
  font-weight: bold;
  color: #F18EA7;
  text-align: center;
  margin-bottom: 30px;
}

.posts-list {
  display: flex;
  justify-content: space-between;
  gap: 30px;
  flex-wrap: wrap; /* Allow wrapping */
}

.post-item {
  width: calc(33.333% - 20px); /* 3 items per row with space for gap */
  background-color: white;
  padding: 20px;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border-radius: 10px;
  overflow: hidden;
  min-height: 300px;
  max-height: 700px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.post-image {
  width: 100%;
  height: 200px;
  border-radius: 8px;
  margin-bottom: 25px;
  object-fit: cover;
}

.post-item:hover {
  transform: scale(1.05);
}

.post-title {
  font-size: 18px;
  font-weight: bold;
  color: #333;
  margin-bottom: 10px;
  margin-top: 10px;
}

.post-summary {
  font-size: 14px;
  color: #555;
  margin-bottom: 15px;
}

.read-more {
  display: inline-block;
  color: #F18EA7;
  font-family: Palatino Linotype;
  background-color: #ffff;
  font-weight: bold;
  font-size: 14px;
  border: none;
  cursor: pointer;
  padding: 8px 16px;
  border-radius: 5px;
  border: 1px solid #F18EA7;
  transition: background-color 0.3s ease, transform 0.3s ease;
  text-align: center;
  margin-top: auto;
  align-self: center;
}

.read-more:hover {
  transform: scale(1.05);
  border-color: #F18EA7;
}

/* Responsive styles for smaller screens */
@media screen and (max-width: 768px) {
  .recent-posts {
    padding: 20px; /* Giảm padding cho phù hợp với màn hình nhỏ */
  }

  .posts-list {
    display: flex;
    flex-direction: column; /* Sắp xếp bài viết theo chiều dọc */
    gap: 20px; /* Khoảng cách giữa các bài viết */
  }

  .post-item {
    width: 100%; /* Bài viết chiếm toàn bộ chiều ngang màn hình */
    padding: 10px; /* Giảm padding bên trong */
    border-radius: 10px; /* Bo góc mềm mại */
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ */
    max-height: none; /* Gỡ bỏ giới hạn chiều cao */
  }

  .post-image {
    width: 100%; /* Chiếm toàn bộ chiều ngang bài viết */
    height: auto; /* Tự động điều chỉnh chiều cao theo hình ảnh */
    margin-bottom: 10px; /* Tạo khoảng cách giữa ảnh và nội dung */
    border-radius: 10px; /* Bo góc ảnh */
  }

  .post-title {
    font-size: 18px; /* Điều chỉnh kích thước tiêu đề */
    font-weight: bold;
    color: #333;
    margin-bottom: 8px;
    text-align: center; /* Căn giữa tiêu đề */
  }

  .post-summary {
    font-size: 14px; /* Font chữ dễ đọc trên màn hình nhỏ */
    color: #555;
    line-height: 1.6; /* Tăng khoảng cách dòng cho dễ đọc */
    text-align: justify; /* Căn đều văn bản */
  }

  .read-more {
    font-size: 14px;
    padding: 8px 12px;
    margin-top: 10px;
    text-align: center; /* Căn giữa nút */
    align-self: center; /* Giữ nút luôn ở giữa */
    background-color: #fff;
    border: 1px solid #F18EA7;
    color: #F18EA7;
    border-radius: 5px;
    transition: transform 0.3s ease, background-color 0.3s ease;
  }

  .read-more:hover {
    transform: scale(1.05);
    background-color: #F18EA7;
    color: #fff;
  }
}

</style>
<head>
  <title>Trang chủ</title>
</head>
<body>
  <section class="banner">
    <div class="banner-description">
      <div class="banner-description-title">Đa dạng phong cách</div>
      <p>Chimootee mang đến các sản phẩm với đa dạng phong cách cho “em xinh” lựa chọn. Từ phong cách nhẹ nhàng, cổ điển cho đến phong cách cá tính hay đơn giản đi học hằng ngày.</p>
      <p>Chimootee mong muốn trở thành nền tảng thời trang secondhand hàng đầu, cung cấp sự lựa chọn đa dạng và chất lượng, đồng thời lan tỏa thông điệp về tiêu dùng bền vững. Chúng tôi không ngừng nỗ lực để mang đến trải nghiệm mua sắm tuyệt vời và giúp mỗi khách hàng thể hiện phong cách riêng một cách tự tin.</p>
    </div>
    <div class="banner-images">
      <div class="carousel">
        <img src="http://localhost:8088/FINAL/hinhanh/banner1.jpg" alt="Banner 1" class="active">
        <img src="http://localhost:8088/FINAL/hinhanh/banner2.jpg" alt="Banner 2">
        <img src="http://localhost:8088/FINAL/hinhanh/banner3.jpg" alt="Banner 3">
        <img src="http://localhost:8088/FINAL/hinhanh/banner4.jpg" alt="Banner 4">
      </div>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      let images = document.querySelectorAll('.carousel img');
      if (images.length === 0) {
        console.error('Không tìm thấy hình ảnh trong carousel.');
        return;
      }

      let currentIndex = 0;

      function changeImage() {
        images[currentIndex].classList.remove('active');
        currentIndex = (currentIndex + 1) % images.length;
        images[currentIndex].classList.add('active');
      }

      setInterval(changeImage, 5000); // Thay đổi ảnh sau mỗi 5 giây
    });
  </script>
<!-- Phần danh mục sản phẩm -->
<section class="product-category">
    <div class="product-category-title">DANH MỤC SẢN PHẨM</div>
    <div class="product-category-description">
      Các sản phẩm được thiết kế với đa dạng phong cách, kiểu dáng
    </div>
    <div class="product-columns">
      <div class="product-column">
        <img src="http://localhost:8088/FINAL/hinhanh/dmsp1.png" alt="Áo nữ">
        <p><strong>Áo nữ</strong></p>
      </div>
      <div class="product-column">
        <img src="http://localhost:8088/FINAL/hinhanh/quandai2.png" alt="Quần nữ">
        <p><strong>Quần nữ</strong></p>
      </div>
      <div class="product-column">
        <img src="http://localhost:8088/FINAL/hinhanh/dmsp3.png" alt="Váy">
        <p><strong>Váy</strong></p>
      </div>
    </div>
  </section>

    <!-- Phần đồng hồ đếm ngược khuyến mãi -->
    <section class="promo-timer">
    <h2>KHUYẾN MÃI KẾT THÚC SAU</h2>

    <!-- Đồng hồ đếm ngược -->
    <div class="countdown">
      <span id="days">00</span>
      <span id="hours">00</span>
      <span id="minutes">00</span>
      <span id="seconds">00</span>
    </div>

    <!-- Form nhập email -->
    <div class="email-form">
      <input type="email" id="email" placeholder="Nhập email của bạn" required>
      <button type="submit" onclick="submitEmail()">Gửi</button>
    </div>
  </section>

  <script>
    // Thiết lập thời gian đếm ngược
    const countDownDate = new Date("Dec 31, 2024 23:59:59").getTime();

    const countdownFunction = setInterval(function() {
      const now = new Date().getTime();
      const distance = countDownDate - now;

      // Tính toán thời gian còn lại
      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Hiển thị kết quả
      document.getElementById("days").innerHTML = days;
      document.getElementById("hours").innerHTML = hours;
      document.getElementById("minutes").innerHTML = minutes;
      document.getElementById("seconds").innerHTML = seconds;

      // Khi đồng hồ đếm ngược kết thúc, hiển thị thông báo
      if (distance < 0) {
        clearInterval(countdownFunction);
        document.getElementById("days").innerHTML = "00";
        document.getElementById("hours").innerHTML = "00";
        document.getElementById("minutes").innerHTML = "00";
        document.getElementById("seconds").innerHTML = "00";
      }
    }, 1000);

    // Xử lý form nhập email
    function submitEmail() {
      const email = document.getElementById('email').value;
      if (email) {
        alert('Cảm ơn bạn đã đăng ký nhận thông báo!');
        // Bạn có thể thêm mã gửi email tại đây (sử dụng AJAX hoặc API)
      } else {
        alert('Vui lòng nhập email của bạn!');
      }
    }
  </script>

<header class="Header">

<!-- Sản phẩm mới nhất !-->
<section class="product-section new-product">
    <h2 class="section-title">SẢN PHẨM MỚI NHẤT</h2>
    <div class="product-list">
    <?php
    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli("localhost", "root", "", "ecommerceshop");

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

     // Truy vấn SQL để lấy 3 sản phẩm cụ thể
     $sql = "SELECT * FROM products WHERE name IN ('Quần Dài Nữ Avery Pants RR08', 'Áo kiểu nữ Lanna Top RR14', 'Đầm Dài Wisky Dress RR15')";
     $result = $conn->query($sql);
 
     // Kiểm tra nếu có sản phẩm
     if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          // Chèn thẳng link hình ảnh cho từng sản phẩm
          switch ($row['name']) {
              case 'Quần Dài Nữ Avery Pants RR08':
                  $imagePath1 = 'http://localhost:8088/FINAL/hinhanh/quandai1.png';
                  $imagePath2 = 'http://localhost:8088/FINAL/hinhanh/quandai2.png';
                  break;
              case 'Áo kiểu nữ Lanna Top RR14':
                  $imagePath1 = 'http://localhost:8088/FINAL/hinhanh/aokieu1.png';
                  $imagePath2 = 'http://localhost:8088/FINAL/hinhanh/aokieu2.png';
                  break;
              case 'Đầm Dài Wisky Dress RR15':
                  $imagePath1 = 'http://localhost:8088/FINAL/hinhanh/vay1.png';
                  $imagePath2 = 'http://localhost:8088/FINAL/hinhanh/vay2.png';
                  break;
              default:
                  $imagePath1 = 'http://localhost:8088/FINAL/hinhanh/default.png';
                  $imagePath2 = 'http://localhost:8088/FINAL/hinhanh/default.png';
                  break;
          }

          // Hiển thị sản phẩm với hình ảnh đã chèn thẳng
          echo '<div class="product-item">';
          echo '<div class="product-image">';
          echo '<img src="' . $imagePath1 . '" alt="' . $row['name'] . '" class="img-main">';
          echo '<img src="' . $imagePath2 . '" alt="' . $row['name'] . '" class="img-hover">';
          echo '</div>';
          echo '<span class="new-badge">NEW</span>';
          echo '<h3>' . $row['name'] . '</h3>';
          echo '<p class="price">' . number_format($row['price'], 0, ',', '.') . 'đ</p>';
          echo '<button class="buy-now">Mua ngay</button>';
          echo '</div>';
      }
     } else {
         echo "Không có sản phẩm nào.";
     }
    // Đóng kết nối
    $conn->close();
    ?>
    </div>
    <a href="http://localhost:8088/FINAL/frontend/shop.php" class="view-all">Xem tất cả</a>
</section>

<!-- Sản phẩm bán chạy !-->
<section class="product-section best-selling-product">
    <h2 class="section-title">SẢN PHẨM BÁN CHẠY</h2>
    <div class="product-list">
    <?php
    $conn = new mysqli("localhost", "root", "", "ecommerceshop");

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    // Mảng ánh xạ tên sản phẩm với đường dẫn hình ảnh
    $productImages = [
        'Jumpsuit Ngắn Karen RR17' => [
            'img1' => 'http://localhost:8088/FINAL/hinhanh/jumpsuit1.png',
            'img2' => 'http://localhost:8088/FINAL/hinhanh/jumpsuit2.png'
        ],
        'Đầm Ngắn Missy Dress EE18' => [
            'img1' => 'http://localhost:8088/FINAL/hinhanh/dam1.png',
            'img2' => 'http://localhost:8088/FINAL/hinhanh/dam2.png'
        ],
        'Áo Thun Nữ Bona Sweater EE19' => [
            'img1' => 'http://localhost:8088/FINAL/hinhanh/aothun1.png',
            'img2' => 'http://localhost:8088/FINAL/hinhanh/aothun2.png'
        ]
    ];

    // Truy vấn SQL để lấy 3 sản phẩm cụ thể
    $sql = "SELECT * FROM products WHERE name IN ('Jumpsuit Ngắn Karen RR17', 'Đầm Ngắn Missy Dress EE18', 'Áo Thun Nữ Bona Sweater EE19')";
    $result = $conn->query($sql);

    // Kiểm tra nếu có sản phẩm
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $productName = $row['name'];
            // Nếu tên sản phẩm có trong mảng, lấy đường dẫn hình ảnh
            if (isset($productImages[$productName])) {
                $imagePath1 = $productImages[$productName]['img1'];
                $imagePath2 = $productImages[$productName]['img2'];
            } else {
                // Sử dụng hình ảnh mặc định nếu không có tên sản phẩm trong mảng
                $imagePath1 = 'http://localhost:8088/FINAL/hinhanh/default.png';
                $imagePath2 = 'http://localhost:8088/FINAL/hinhanh/default.png';
            }

            // Hiển thị sản phẩm với hình ảnh đã chèn thẳng
            echo '<div class="product-item">';
            echo '<div class="product-image">';
            echo '<img src="' . $imagePath1 . '" alt="' . $productName . '" class="img-main">';
            echo '<img src="' . $imagePath2 . '" alt="' . $productName . '" class="img-hover">';
            echo '</div>';
            echo '<span class="new-badge">HOT</span>';
            echo '<h3>' . $productName . '</h3>';
            echo '<p class="price">' . number_format($row['price'], 0, ',', '.') . 'đ</p>';
            echo '<button class="buy-now">Mua ngay</button>';
            echo '</div>';
        }
    } else {
        echo "Không có sản phẩm nào.";
    }
    
    // Đóng kết nối
    $conn->close();
    ?>
    </div>
    <a href="http://localhost:8088/FINAL/frontend/shop.php" class="view-all">Xem tất cả</a>
</section>

<!-- Bài viết gần đây -->
<?php
    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli('localhost', 'root', '', 'ecommerceshop');

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Truy vấn để lấy 3 bài viết cụ thể
    $result = $conn->query("SELECT * FROM news WHERE title IN ('Cách phối đồ đẹp cho mùa giáng sinh', 'Xu hướng thời trang đơn giản', 'Các phong cách thời trang ở Chimootee')");
?>

<section class="recent-posts">
    <h2 class="section-title">BÀI VIẾT GẦN ĐÂY</h2>
    <div class="posts-list">
        <?php
        // Kiểm tra nếu có kết quả từ truy vấn
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Chèn thẳng link hình ảnh cho từng bài viết
        switch ($row['title']) {
            case 'Cách phối đồ đẹp cho mùa giáng sinh':
                $imagePath = 'http://localhost:8088/FINAL/hinhanh/blog1.png';
                break;
            case 'Xu hướng thời trang đơn giản':
                $imagePath = 'http://localhost:8088/FINAL/hinhanh/blog2.png';
                break;
            case 'Các phong cách thời trang ở Chimootee':
                $imagePath = 'http://localhost:8088/FINAL/hinhanh/blog3.png';
                break;
            default:
                $imagePath = 'http://localhost:8088/FINAL/hinhanh/default.jpg';
                break;
        }
        // Hiển thị bài viết với hình ảnh đã chèn thẳng
        echo '<div class="post-item">';
        echo '<img src="' . $imagePath . '" alt="' . $row['title'] . '" class="article-image">';
        echo '<h3 class="post-title">' . $row['title'] . '</h3>';
        echo '<p class="post-summary">' . $row['summary'] . '</p>'; // Hiển thị tóm tắt của bài viết
        echo '<button class="read-more" onclick="window.location.href=\'news-detail.php?slug=' . $row['slug'] . '\'">Đọc tiếp</button>';
        echo '</div>';
    }
} else {
    echo "Không có bài viết nào.";
}
        ?>
    </div>
</section>

<?php
    // Đóng kết nối
    $conn->close();
?>
  <!-- Section sản phẩm nổi bật -->
  <section class="featured-section">
      <!-- Tiêu đề của section -->
      <div class="header">
        SẢN PHẨM NỔI BẬT
      </div>

      <!-- Nội dung của sản phẩm nổi bật -->
      <div class="content">
        <!-- Phần hình ảnh -->
        <div class="image">
          <img src="http://localhost:8088/FINAL/hinhanh/spnbat.png" alt="Áo khoác Ellen Outer">
        </div>

        <!-- Phần mô tả -->
        <div class="description">
          <h3>Áo khoác Ellen Outer</h3>
          <p>
            Áo khoác Ellen Outer là lựa chọn lý tưởng cho những ngày lạnh. Với chất liệu vải cao cấp, thiết kế hiện đại, và sự thoải mái tối đa, chiếc áo khoác này sẽ là một phần không thể thiếu trong tủ đồ của bạn. Đặc biệt, với kiểu dáng thanh lịch, bạn có thể dễ dàng phối đồ cho nhiều dịp khác nhau.
          </p>
          <p>
          Thiết kế dáng dài thướt tha tôn lên vóc dáng người mặc, với đường cắt may tinh tế và chi tiết nhấn nhá đầy tinh tế. Cổ áo cao và rộng, có thể dựng lên hoặc gập xuống tùy theo sở thích, vừa giữ ấm cho vùng cổ vừa tạo điểm nhấn thời trang.
          </p>
          <a href="http://localhost:8088/FINAL/frontend/shop.php" class="buy-now-btn">Mua ngay</a>
        </div>
      </div>
  </section>

  <!-- Câu chuyện thương hiệu -->
<section class="brand-story">
      <div class="container">
        <h2 class="brand-story-title">CÂU CHUYỆN THƯƠNG HIỆU</h2>
        <div class="brand-story-slider">
          <div class="slide active">
            <img src="http://localhost:8088/FINAL/hinhanh/story1.png" alt="Câu chuyện thương hiệu 1">
          </div>
          <div class="slide">
            <img src="http://localhost:8088/FINAL/hinhanh/story2.png" alt="Câu chuyện thương hiệu 2">
          </div>
          <div class="slide">
            <img src="http://localhost:8088/FINAL/hinhanh/story3.png" alt="Câu chuyện thương hiệu 3">
          </div>
        </div>
      <button class="brand-story-button">Xem ngay</button>
    </div>
  </section>
  <script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.brand-story-slider .slide');

    function showNextSlide() {
      slides[currentSlide].classList.remove('active');
      currentSlide = (currentSlide + 1) % slides.length;
      slides[currentSlide].classList.add('active');
    }

      setInterval(showNextSlide, 5000); // Thay đổi hình ảnh sau 5s
  </script>

<?php require_once('../includes/footer.php'); ?>
</body>
</html>