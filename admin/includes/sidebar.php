<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ChiMooTee Admin</title>

  <!-- Chèn CSS cho Sidebar -->
  <style>
  body{
    color: #F17EA8 !important;
  }
   .sidebar-divider,.collapse-item, .sidebar-heading,.sidebar, .sidebar a, .sidebar .nav-item {
  background-color: #F17EA8 !important;
  }
  #accordionSidebar {
    background-color: #F17EA8 !important;
  }
  </style>
</head>
<body>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">ChiMooTee Admin <sup></sup></div>
  </a>



  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="index.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  

  <!-- Heading -->
  <div class="sidebar-heading">Chức năng chính:</div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
      aria-controls="collapseOne">
      <i class="fas fa-calendar-day"></i>
      <span>Thương hiệu - Brand</span>
    </a>
    <div id="collapseOne" class="collapse" aria-labelledby="collapseOne" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Các chức năng:</h6>
        <a class="collapse-item" href="./listbrands.php">Liệt kê</a>
        <a class="collapse-item" href="./themthuonghieu.php">Thêm mới</a>
      </div>
    </div>
  </li>
  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-calendar-day"></i>
      <span>Danh mục sản phẩm</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Các chức năng:</h6>
        <a class="collapse-item" href="./listcats.php">Liệt kê</a>
        <a class="collapse-item" href="./themdanhmuc.php">Thêm mới</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fab fa-product-hunt"></i>
      <span>Sản phẩm</span>
    </a>
    <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Các chức năng:</h6>
        <a class="collapse-item" href="./listsanpham.php">Liệt kê</a>
        <a class="collapse-item" href="./themsanpham.php">Thêm mới</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDMTT" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-calendar-day"></i>
      <span>Danh mục tin tức</span>
    </a>
    <div id="collapseDMTT" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Các chức năng:</h6>
        <a class="collapse-item" href="./listnewscats.php">Liệt kê</a>
        <a class="collapse-item" href="./themdanhmuctintuc.php">Thêm mới</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTT" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fab fa-product-hunt"></i>
      <span>Tin tức</span>
    </a>
    <div id="collapseTT" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Các chức năng:</h6>
        <a class="collapse-item" href="./listnews.php">Liệt kê</a>
        <a class="collapse-item" href="./themtintuc.php">Thêm mới</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-wallet"></i>
      <span>Đơn hàng</span>
    </a>
    <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Các chức năng:</h6>
        <a class="collapse-item" href="./listorders.php">Liệt kê</a>
        <a class="collapse-item" href="./themdonhang.php">Thêm mới</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-users"></i>
      <span>Người dùng</span>
    </a>
    <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Các chức năng:</h6>
        <a class="collapse-item" href="./listusers.php">Liệt kê</a>
        <a class="collapse-item" href="./themnguoidung.php">Thêm mới</a>
      </div>
    </div>
  </li>


  <!-- Heading -->
  <div class="sidebar-heading">Chức năng khác</div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
      aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Login Screens:</h6>
        <a class="collapse-item" href="login.php">Login</a>
        <a class="collapse-item" href="register.html">Register</a>
        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
        <div class="collapse-divider"></div>s
        <h6 class="collapse-header">Other Pages:</h6>
        <a class="collapse-item" href="../frontend/index.php">Trang chủ</a>
        <a class="collapse-item" href="../frontend/shop.php">Cửa hàng</a>
        <a class="collapse-item" href="../frontend/gioithieu.php">Giới thiệu</a>
        <a class="collapse-item" href="../frontend/blog.php">Tin tức</a>
        <a class="collapse-item" href="../frontend/taikhoan.php">Tài khoản</a>
        <a class="collapse-item" href="../frontend/giohang.php">Giỏ hàng</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="charts.html">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Biểu đồ</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link" href="tables.html">
      <i class="fas fa-fw fa-table"></i>
      <span>Tables</span></a>
  </li>
</ul>
<!-- End of Sidebar -->