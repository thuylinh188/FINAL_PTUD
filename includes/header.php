
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Palatino Linotype', sans-serif;
      background-color: #FFF;
    }

    /* Thanh trên */
    .top-bar {
      width: 100%;
      padding: 10px 20px;
      background-color: #F5F5F5;
      display: flex;
      justify-content: space-between;
      font-size: 13px;
      color: #000;
    }

    /* Thanh giữa: Logo, tìm kiếm, các biểu tượng */
    .middle-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
      padding: 0px 20px;
      background-color: #FFFFFF;
      height: 110px;
    }

    /* Phần Logo */
    .logo {
      flex: 1;
      text-align: left;
    }

    .logo img {
      width: 230px;
      height: auto;
    }

    /* Phần thanh tìm kiếm */
    .search-bar {
      flex: 2;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 45px;
      border-radius: 10px;
      background-color: #F0F0F0;
      padding: 0 10px;
    }

    .search-bar input {
      width: 100%;
      border: none;
      outline: none;
      padding: 0 10px;
      font-size: 13px;
      background-color: transparent;
      color: #000;
      font-family: Palatino Linotype;
    }

    .search-bar button {
      max-width: 80%;
      height: auto;
      border: none;
      background: url('search-icon.png') no-repeat center center;
      background-size: cover;
      cursor: pointer;
    }

    /* Phần các biểu tượng */
    .icons {
      flex: 1;
      display: flex;
      justify-content: center;
      gap: 10px;
    }

    .icons .icon {
      width: 40px;
      height: 40px;
      cursor: pointer;
      background-size: cover;
    }

    .icons .icon.bell {
      background: url('http://localhost:8088/FINAL/hinhanh/bell.png') no-repeat center center;
    }

    .icons .icon.cart {
      background: url('http://localhost:8088/FINAL/hinhanh/cart.png') no-repeat center center;
    }

    .icons .icon.user {
      background: url('http://localhost:8088/FINAL/hinhanh/user-circle.png') no-repeat center center;
    }

    /* Thanh dưới: Menu điều hướng */
    .bottom-bar {
      width: 100%;
      height: 60px;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #F5F5F5;
      border-bottom: 1px solid #d9d9d9;
    }

    .bottom-bar a {
      text-decoration: none;
      font-size: 16px;
      font-weight: 700;
      color: #000;
      margin-right: 60px;
    }

    /* Nút hamburger */
    .hamburger {
      display: none;
      flex-direction: column;
      gap: 5px;
      cursor: pointer;
    }

    .hamburger div {
      width: 30px;
      height: 4px;
      background-color: #000;
      border-radius: 5px;
    }
    .hamburger .menu-text {
  font-size: 9px;
  font-weight: bold;
  color: #000;
  margin-top: none;
  text-align: center;
}
    /* Hamburger Menu Responsive */
    @media screen and (max-width: 768px) {
  /* Ẩn các phần tử top-bar và middle-bar trên mobile */
  .top-bar,
  .middle-bar {
    display: none;
  }

  .hamburger {
    display: flex;
    z-index: 11;
    margin-left: auto;
    margin-right: 10px;
  }

  .menu {
    display: none;
    position: fixed;
    top: 0;
    right: 0;
    width: 200px;
    height: 100%;
    background-color: #FFF;
    box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
    flex-direction: column;
    padding: 10px 15px;
    transform: translateX(100%);
    transition: transform 0.3s ease;
    z-index: 10;
  }
  .bottom-bar {
    display: flex;
    justify-content: center; /* Căn giữa logo theo chiều ngang */
    align-items: center; /* Căn giữa logo theo chiều dọc */
    padding-top: 8px;
  }
  .menu.open {
    display: flex;
    transform: translateX(0);
  }

  .menu a {
    font-size: 14px;
    font-weight: bold;
    padding: 8px 0;
    margin-bottom: 5px;
    border-bottom: 1px solid #ddd;
  }

  .overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 9;
  }

  .overlay.open {
    display: block;
  }
  .bottom-bar .logo img {
    width: 150px;
    height: auto;
    margin-left: none;
  }
}
@media screen and (min-width: 769px) {
  .bottom-bar .logo {
    display: none;
  }
}
  </style>
</head>
<body>
  <header>
    <!-- Thanh trên -->
    <div class="top-bar">
      <span class="left-contact">+840123456789 | chimootee@gmail.com</span>
      <span class="right-options">VND | VIE | ORDER TRACKING</span>
    </div>

    <!-- Thanh giữa -->
    <div class="middle-bar">
      <div class="logo">
        <img src="http://localhost:8088/FINAL/hinhanh/logo1.png" alt="Logo">
      </div>
      <form action="search.php" method="get" class="search-bar">
        <input type="text" name="query" placeholder="Tìm kiếm">
        <button type="submit"></button>
      </form>
      <div class="icons">
        <a href="giohang.php"><div class="icon cart"></div></a>
        <a href="taikhoan.php"><div class="icon user"></div></a>
      </div>
    </div>

    <nav class="bottom-bar">
    <div class="logo">
        <img src="http://localhost:8088/FINAL/hinhanh/logo1.png" alt="Logo">
      </div>
      <div class="hamburger" id="hamburger-menu">
        <div></div>
        <div></div>
        <div></div>
        <span class="menu-text">MENU</span>
      </div>
      <div class="menu" id="menu">
        <a href="index.php">TRANG CHỦ</a>
        <a href="shop.php">CỬA HÀNG</a>
        <a href="gioithieu.php">GIỚI THIỆU</a>
        <a href="blog.php">TIN TỨC</a>
        <a href="taikhoan.php">TÀI KHOẢN</a>
        <a href="giohang.php">GIỎ HÀNG</a>
      </div>
    </nav>
  </header>

  <div class="overlay" id="overlay"></div>

  <script>
    const hamburger = document.getElementById('hamburger-menu');
    const menu = document.getElementById('menu');
    const overlay = document.getElementById('overlay');

    hamburger.addEventListener('click', function() {
      menu.classList.toggle('open');
      overlay.classList.toggle('open');
    });

    overlay.addEventListener('click', function() {
      menu.classList.remove('open');
      overlay.classList.remove('open');
    });
  </script>
</body>
</html>