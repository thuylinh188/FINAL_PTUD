<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Footer</title>
  <style>
    /* Các thiết lập chung */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Palatino Linotype', sans-serif;
      background-color: #F5F5F5;
      color: #000;
    }

    /* Footer */
    footer {
      background-color: #F5F5F5;
      padding: 40px 20px;
      border-top: 1px solid #ddd;
    }

    .footer-top-bar {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 10px;
      padding: 0 150px;
    }

    .footer-section {
      flex: 1;
      min-width: 200px;
    }

    .footer-section h4 {
      font-size: 16px;
      font-weight: bold;
      margin-bottom: 15px;
      color: #000;
    }

    .footer-section ul {
      list-style: none;
      padding: 0;
    }

    .footer-section ul li {
      margin-bottom: 10px;
    }

    .footer-section ul li a {
      text-decoration: none;
      color: #555;
      font-size: 14px;
    }

    .footer-section ul li a:hover {
      color: #000;
      text-decoration: underline;
    }

    /* Logo và mạng xã hội */
    .footer-logo-social {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      flex: 1;
      text-align: center;
    }

    .footer-logo {
      width: 220px;
      margin-bottom: 0px;
    }

    .social-icons {
      margin-bottom: 10px;
    }

    .social-icons a {
      margin: 0 5px;
      display: inline-block;
    }

    .social-icons img {
      width: 30px;
      height: 30px;
      object-fit: cover;
    }

    /* Form nhập email */
    .subscribe-form {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: 10px;
    }

    .subscribe-form input {
      width: calc(100% - 100px);
      max-width: 300px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      outline: none;
      font-family: 'Palatino Linotype';
    }

    .subscribe-form button {
      width: 120px;
      padding: 10px;
      border: none;
      background-color: #529efc;
      color: #fff;
      border-radius: 5px;
      cursor: pointer;
      font-family: 'Palatino Linotype';
      margin-left: 10px;
    }

    .subscribe-form button:hover {
      background-color: #78B1F8;
    }

    /* Bottom-bar */
    .footer-bottom-bar {
      margin-top: 20px;
      text-align: center;
      font-size: 14px;
      color: #555;
    }

    .footer-bottom-bar span {
      font-weight: bold;
      font-family: 'Palatino Linotype';
    }

    /* Media Queries for responsive design */
    @media (max-width: 1024px) {
      .footer-top-bar {
        padding: 0 50px;
      }

      .footer-section h4 {
        font-size: 14px;
      }

      .footer-section ul li a {
        font-size: 13px;
      }

      .footer-logo {
        width: 180px;
      }
    }

    @media (max-width: 768px) {
      .footer-top-bar {
        flex-direction: column;
        padding: 0 20px;
      }

      .footer-section {
        width: 100%;
        margin-bottom: 20px;
      }

      .footer-logo {
        width: 160px;
      }

      .subscribe-form input {
        width: calc(100% - 70px);
      }

      .footer-bottom-bar {
        font-size: 12px;
      }
    }

    @media (max-width: 480px) {
      .footer-top-bar {
        padding: 0 10px;
      }

      .footer-logo {
        width: 150px;
      }

      .footer-section h4 {
        font-size: 12px;
      }

      .footer-section ul li a {
        font-size: 12px;
      }

      .subscribe-form input {
        width: calc(100% - 60px);
      }

      .footer-bottom-bar {
        font-size: 10px;
      }
    }
  </style>
</head>
<body>
  <footer>
    <!-- Top-bar -->
    <div class="footer-top-bar">
      <!-- Phần 1: DANH MỤC SẢN PHẨM -->
      <div class="footer-section">
        <h4>DANH MỤC SẢN PHẨM</h4>
        <ul>
          <li><a href="#">Áo</a></li>
          <li><a href="#">Quần</a></li>
          <li><a href="#">Váy</a></li>
        </ul>
      </div>

      <!-- Phần 2: TRANG -->
      <div class="footer-section">
        <h4>TRANG</h4>
        <ul>
          <li><a href="#">Chimootee</a></li>
          <li><a href="#">Cửa hàng</a></li>
          <li><a href="#">Về chúng tôi</a></li>
          <li><a href="#">Tin tức</a></li>
          <li><a href="#">Tài khoản</a></li>
        </ul>
      </div>

      <!-- Phần 3: HỖ TRỢ -->
      <div class="footer-section">
        <h4>HỖ TRỢ</h4>
        <ul>
          <li><a href="#">Tổng đài</a></li>
          <li><a href="#">Thông tin liên hệ</a></li>
          <li><a href="#">Hỏi đáp sản phẩm</a></li>
          <li><a href="#">Bảo hành</a></li>
          <li><a href="#">Theo dõi đơn hàng</a></li>
        </ul>
      </div>

      <!-- Phần 4: Logo, mạng xã hội và email -->
      <div class="footer-section footer-logo-social">
        <img src="../hinhanh/logo1.png" alt="Logo" class="footer-logo">
        <div class="social-icons">
          <a href="#"><img src="../hinhanh/fb.png" alt="Facebook"></a>
          <a href="#"><img src="../hinhanh/ig.png" alt="Instagram"></a>
          <a href="#"><img src="../hinhanh/youtube.png" alt="YouTube"></a>
          <a href="#"><img src="../hinhanh/tiktok.png" alt="TikTok"></a>
        </div>
        <form class="subscribe-form">
          <input type="email" placeholder="Nhập email của bạn">
          <button type="submit">ĐĂNG KÝ</button>
        </form>
      </div>
    </div>

    <!-- Bottom-bar -->
    <div class="footer-bottom-bar">
      © - Powered by <span>Chimootee</span>
    </div>
  </footer>
</body>
</html>