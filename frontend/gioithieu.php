<?php include('../includes/header.php'); ?>
<style>

        /* CSS cho trang Giới Thiệu */
        html, body, main {
            background-color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Phần banner */
        .banner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 70px 120px;
            background-color: white;
            flex-direction: row-reverse;
        }

        .banner-content {
            max-width: 60%; /* Giới hạn không gian cho nội dung */
            padding: 20px;
        }

        .slogan {
            font-size: 24px;
            font-weight: bold;
            color: #f18ea7;
            margin-bottom: 10px;
        }

        .main-title {
            font-family: 'Lobster', cursive;
            font-size: 60px;
            color: #f18ea7;
            margin-bottom: 20px;
            text-shadow: 3px 3px 8px rgba(241, 142, 167, 0.5);
        }

        .description {
            flex: 1.5;
            font-size: 20px;
            line-height: 1.6;
            color: #333;
            padding-right: 20px;
            box-sizing: border-box;
            text-align: justify;
        }

        .cta-button {
            display: inline-block;
            background-color: #f18ea7;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 25px;
            margin-top: 40px;
        }

        .logo {
            max-width: 50%; /* Giữ kích thước cho logo */
            text-align: right;
        }

        .logo img {
            width: 70%;
            height: 100%; /* Căn chỉnh hình ảnh với container */
            object-fit: cover; /* Đảm bảo ảnh vừa khung */
            top: 0;
            left: 0;
            border-radius: 10px;
        }

        /*Điện thoại*/
        @media (max-width: 768px) {
    .banner {
        flex-direction: column;
        padding: 30px 20px;
        text-align: center;
    }
    .banner-content {
        max-width: 100%;
    }
    .main-title {
        font-size: 40px;
    }
    .description {
        font-size: 16px;
        padding: 0;
    }
    .cta-button {
        padding: 10px 20px;
        font-size: 14px;
        margin-top: 20px;
    }
    .logo {
        width: 162px;
        height: 164px
    }
    .logo img {
        width: 162px;
        height: 164px; 
        object-fit: cover;
        top: 0;
        left: 0;
    }
}
        /* Về Chúng Tôi */
        .about {

            padding: 70px 120px;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 70px 120px;
            background-color: white;
        }
       
        .about-carousel {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            background-color: white;
        }

        .carousel {
            width: 50%; /* Đặt chiều rộng cụ thể cho carousel */
            height: 500px;
            border-radius: 10px; /* Bo góc như hình mẫu */
            margin: 0; /* Xóa khoảng cách giữa ảnh và phần nội dung */
            text-align: center; /* Tạo khoảng cách giữa ảnh và phần nội dung */
        }

        .carousel img {
           width: 100%;
           height: 150%; /* Căn chỉnh hình ảnh với container */
           object-fit: cover; /* Đảm bảo ảnh vừa khung */
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

        .about-content {
            max-width: 60%;
            padding-left: 40px;
            text-align: center;
            padding-bottom: 40px;
            padding-top: 40px;
        }

        .about-content h2 {
            font-size: 40px;
            color: #f18ea7;
            margin-bottom: 40px;
            text-align: center;
        }

        .about-content p {
            font-size: 20px;
            line-height: 1.8;
            color: #333;
            text-align: justify;
        }
        /*Điện thoại*/
        @media (max-width: 768px) {
    .about {
        flex-direction: column;
        text-align: center;
        padding: 30px 20px;
        
    }
    
    .about-content {
        padding: 20px 0;
        text-align: center;
        font-size: 16px;
        max-width: 100%;
    }
    .about-content h2 {
        font-size: 30px;
         margin-bottom: 20px;
        }
    .about-content p {
            font-size: 16px;
        }
}

        /* Giá trị cốt lõi*/
        .core-values {
            text-align: center;
            padding: 50px 20px;
            background-color: #fff;
        }

        .core-values h2 {
            font-size: 40px;
            color: #f18ea7;
            margin-bottom: 40px;
            text-transform: uppercase;
        }

        .values-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .value-box {
            background: linear-gradient(to right, #fddde6, #ffe7ed);
            padding: 20px 10px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            min-width: 100px;
            text-align: center;
            flex-grow: 1;
        }

       .value-box p {
            font-size: 24px;
            color: #000;
            font-weight: bold;
            margin: 70px;
        }
        /*ĐIện thoại*/
        @media (max-width: 768px) {
        .core-values h2 {
            font-size: 30px;
            margin-bottom: 20px;
            margin-top: 0;
        }
        .values-container {
            flex-direction: column;
            gap: 10px;
        }
        .value-box {
           padding: 15px 10px;
        }
        .value-box p {
           font-size: 16px;
           margin: 30px 0;
        }
}
        /* Tầm nhìn */
        .vision {
            padding: 70px 120px;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: white;
        }
        .vision-content {
            max-width: 60%;
            padding-right: 40px;
            text-align: center;
            padding-bottom: 40px;
            padding-top: 40px;
        }

        .vision-content h2 {
            font-size: 40px;
            color: #f18ea7;
            margin-bottom: 40px;
            text-align: center;
        }

        .vision-content p {
            font-size: 20px;
            line-height: 1.8;
            color: #333;
            text-align: justify;
        }

        .vision-carousel {
           flex: 1;
           display: flex;
           justify-content: center;
           align-items: center;
           position: relative;
           padding-left: 100px
           text-align: center;
        }

        .carousel {
           width: 110%; 
           height: 500px; 
           position: relative;
           overflow: hidden;
           border-radius: 10px;
           margin: ;
           text-align: center;
        }

        .carousel img {
            width: 100%;
            height: 150%; /* Căn chỉnh hình ảnh với vùng carousel */
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            border-radius: 10px;
        }

        .carousel img.active {
            opacity: 1; /* Hiển thị ảnh hiện tại */
        }
        /*Điện thoại*/
        @media (max-width: 768px) {
    .vision {
        flex-direction: column;
        text-align: center;
        padding: 30px 20px;
        
    }
    
    .vision-content {
        padding: 20px 0;
        text-align: center;
        font-size: 16px;
        max-width: 100%;
    }
    .vision-content h2 {
        font-size: 30px;
         margin-bottom: 20px;
    }
    .vision-content p {
            font-size: 16px;
        }
    .carousel {
        width: 256px;
        height: 288px;
        text-align: center;
    }
    .carousel .img {
           position: fixed;
           width: 256px;
           height: 288px;
           top: 0;
           left: 0;
           opacity: 0;
           transition: opacity 1s ease-in-out;
        }
}

        /* Sứ mệnh */
        .mission {
           padding: 80px 220px;
           text-align: center;
           margin: 0 auto;
           background-color: white;
        }

        .mission h2 {
            font-size: 40px; /* Kích thước tiêu đề */
            font-weight: bold;
            color: #f18ea7;
            margin-bottom: 20px;
        }

        .mission p {
            font-size: 22px; /* Kích thước chữ */
            line-height: 1.8;
            color: #333;
            margin-bottom: 20px;
            text-align: justify;
        }

        .mission-image {
            max-width: 100%; /* Điều chỉnh kích thước ảnh tương đối khung */
            height: auto; /* Giữ tỷ lệ ảnh */
            margin-top: 20px; /* Khoảng cách giữa nội dung và ảnh */
            border-radius: 10px; /* Tùy chọn: Bo góc ảnh cho thẩm mỹ */
        }
        /*Điện thoại*/
        @media (max-width: 768px) {
            .mission {
                 padding: 30px 20px;
            }
            .mission h2 {
                 font-size: 30px;    
            }
            .mission p {
                 font-size: 16px;
            }
        }
        /*Tham gia ngay */
        .join-now {
            margin-top: 20px;
           text-align: center;
           background-color: #fdfdfd; /* Màu nền nhạt */

        }

        .join-now h2 {
            font-size: 24px; /* Phong cách chữ cho hashtag */
            color: #333;
            font-weight: bold;
            margin-bottom: 20px;
            padding-top: 100px;
        }

        .join-now p {
            font-size: 40px; /* Kích thước tiêu đề */
            color: #f18ea7; /* Màu sắc tiêu đề */
            margin-bottom: 10px;
            font-weight: bold;
        }

        .shop-now-button {
           display: inline-block;
           padding: 10px 20px;
           background-color: #f18ea7; /* Màu nền cho nút */
           color: #fff; /* Màu chữ */
           text-decoration: none;
           font-size: 18px;
           font-weight: bold;
           border-radius: 5px;
           margin-bottom: 30px;
        }
        .shop-now-button:hover {
           background-color: #e17d92; /* Màu khi rê chuột */
        }
        .join-now image {
            width: 100%;
            height: auto;
            object-fit: cover; /* Giữ tỷ lệ ảnh */
            margin: 0; /* Khoảng cách giữa nội dung và ảnh */
            border-radius: 10px;  
        }
        /*ĐIện thoại*/
        @media (max-width: 768px) {
    .join-now {
        padding: 20px 10px;
    }
    .join-now h2 {
            font-size: 20px;
            padding-top: 40px;
        }

        .join-now p {
            font-size: 30px; 
           
        }
    .shop-now-button {
        font-size: 16px;
        padding: 8px 15px;
    }
    .join-now img {
        width: 100%;
    }
}
        /*Liên hệ */
        .contact-info {
           display: flex;
           justify-content: center;
           align-items: center;
           background-color: white;
           gap: 20px;
           padding: 70px 120px;
           margin-top: 30px;
           border-top: 2px solid #ebedef; /* Đường viền nhẹ để tách biệt */
        }

        .contact-details {
            flex: 1;
        }

        .contact-details h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .contact-details p {
            margin-bottom: 15px;
            display: flex;
            font-size: 18px;
            align-items: center;
            padding: 10px;
        }

        .contact-details i {
           color: #f18ea7; /* Màu sắc icon */
           margin-right: 10px;
           font-size: 20px;
        }

        .contact-map {
            flex: 1;
            display: flex;
            justify-content: right;
            align-items: right;
            padding:
        }

        .contact-map iframe {
            max-width: 100%;  
            max-height: auto;
            object-fit: cover;
            border-radius: 0;
        }
        /*Điện thoại*/
        @media (max-width: 768px) {
    .contact-info {
        flex-direction: column;
        padding: 30px 20px;
    }
    .contact-details p {
        font-size: 16px;
    }
    .contact-map iframe {
        width: 100%;
    }
}
        /*Tương tác ngay */
        .interaction {
           padding: 70px 120px;
           text-align: center;
           margin: 0 auto;
           background-color: #F5F5F5;
           margin-bottom: 20px;
        }
        .interaction h2 {
            font-size: 24px; /* Phong cách chữ cho hashtag */
            color: #333;
            font-weight: bold;
            margin-bottom: 30px;
            padding-top: 120px;
        }

        .interaction p {
            font-family: Lora, sans-serif;
            font-size: 45px; /* Kích thước tiêu đề */
            color: #f18ea7; /* Màu sắc tiêu đề */
            margin-bottom: 40px;
            font-weight: bold;
        }

        .interaction-buttons {
            display: inline-block;
            background-color: #f18ea7;
            color: #fff;
            padding: 22px 50px;
            border-radius: 30px;
            font-size: 18px;
            cursor: pointer;
            text-decoration: none;
        }
        /*Điện thoại*/
        @media (max-width: 768px) {
    .interaction {
        padding: 30px 20px;
    }
    .interaction h2 {
        font-size: 20px;
    }
    .interaction p {
        font-size: 28px;
    }
    .interaction-buttons {
        font-size: 16px;
        padding: 10px 30px;
    }
}
    </style>
    <head>
  <title>Giới thiệu</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="gii-thiu">
        <!-- Phần Banner -->
        <div class="banner">
            <div class="logo">
                <img src="http://localhost:8088/FINAL/hinhanh/logo2.png" alt="ChiMooTee">
            </div>
            <div class="banner-content">
                <div class="slogan">“Heightening Lifestyle, Modern Designs”</div>
                <div class="main-title">PHONG CÁCH - SÁNG TẠO</div>
                <p class="description">
                    Thương hiệu thời trang ChiMooTee cam kết mang đến sản phẩm chất lượng cao với các thiết kế sáng tạo và hiện đại. 
                    Là nơi để chị em phụ nữ thể hiện sự tự tin và phong cách thời trang riêng của mình. 
                    ChiMooTee là nơi tập hợp của những người đam mê với nhiệm vụ làm cho cuộc sống của phụ nữ trở nên đẹp hơn.
                </p>
                <a class="cta-button" href="shop.php">MUA NGAY</a>
            </div>
        </div>
        
        <!-- Phần Về Chúng Tôi -->
        <div class="about">
            <div class="carousel">
             <img src="http://localhost:8088/FINAL/hinhanh/vct1.jpg" alt="About Us 1" class="active">
             <img src="http://localhost:8088/FINAL/hinhanh/vct2.jpg" alt="About Us 2">
             <img src="http://localhost:8088/FINAL/hinhanh/vct3.jpg" alt="About Us 3">
            </div>
            <div class="about-content">
                <h2>VỀ CHÚNG TÔI</h2>
                <p>
                    Là nền tảng bán lẻ thời trang hàng đầu Việt Nam. ChiMooTee được thành lập nhằm mục tiêu đáp ứng yêu cầu ngày càng cao của người tiêu dùng, 
                    hiện đang trở thành kênh mua sắm quần áo thời trang nữ được quan tâm bậc nhất hiện nay tại thị trường Việt Nam.
                </p>
                <p>
                    Góp mặt trong ngành thời trang Việt Nam từ lâu đời, đi lên từ xưởng quần áo nhỏ lẻ. Ngày nay, ChiMooTee đã từng bước để lại dấu ấn riêng 
                    trên thị trường thời trang nữ với những mẫu mã chất lượng trong từng “đường kim mũi chỉ”.
                </p>
            </div>
        </div>

        <!-- Giá trị cốt lõi -->
        <div class="core-values">
          <h2>GIÁ TRỊ CỐT LÕI</h2>
          <div class="values-container">
            <div class="value-box">
               <p>CHẤT LƯỢNG VÀ SÁNG TẠO</p>
            </div>
            <div class="value-box">
               <p>TỰ TIN VÀ PHONG CÁCH</p>
            </div>
            <div class="value-box">
               <p>ĐAM MÊ VÀ TẬN TÂM</p>
            </div>
         </div>
        </div>
         <!-- Tầm nhìn --> 
        <div class="vision">
              <div class="vision-content">
                 <h2>TẦM NHÌN</h2>
                 <p>
                    Với mong muốn nâng tầm thời trang Việt vươn ra quốc tế, chúng tôi không chỉ tập trung nghiên cứu và phát triển thị trường may mặc trong nước. ChiMooTee còn hướng đến việc trở thành nền tảng bán lẻ thời trang hàng đầu tại các nước Đông Nam Á.
                 </p>
                 <p>
                    Đáp ứng đầy đủ các tiêu chí: chất lượng đảm bảo, đa dạng các mẫu mã, giá cả phù hợp, thông tin sản phẩm rõ ràng và nhiều chính sách ưu đãi hấp dẫn cho khách hàng.
                 </p>
              </div>
                 <div class="vision-carousel">
                 <div class="carousel">
                <img src="http://localhost:8088/FINAL/hinhanh/vision1.jpg" class="active" alt="Tầm Nhìn 1">
                <img src="http://localhost:8088/FINAL/hinhanh/sm3.jpg" alt="Tầm Nhìn 2">
                <img src="http://localhost:8088/FINAL/hinhanh/vision2.jpg" alt="Tầm Nhìn 3">
              </div>
              </div>
        </div>

          <div class="mission">
            <h2>SỨ MỆNH</h2>
            <p>
               ChiMooTee luôn đặt phương châm phát triển chính là mang lại cho phái đẹp một phiên bản đẹp nhất của chính mình. Với phong cách thời trang đầy cuốn hút và thanh lịch, phái nữ có thể hoàn toàn tự tin thể hiện cá tính và chinh phục những điều mình yêu thích.
            </p>
            <p>
                Với thông điệp cốt lõi được gói gọn trong slogan “Heightening Lifestyle, Modern Designs” có nghĩa là “Nâng Tầm Phong Cách Sống bằng những Thiết Kế Hiện Đại”, ChiMooTee mong muốn mang lại giá trị cho khách hàng trong việc nâng cao chất lượng cuộc sống thông qua thời trang hàng ngày của bạn.
            </p>
            <img src="http://localhost:8088/FINAL/hinhanh/mission.jpg" alt="Mission" class="mission-image">
          </div>

        <!-- Tham gia ngay -->
        <div class="join-now">
    <h2>Tham gia ngay</h2>
    <p>#FashionComunity</p>
    <a href="shop.php" class="shop-now-button">Cửa hàng</a>
    <div class="join-now image">
        <img src="http://localhost:8088/FINAL/hinhanh/thamgiangay.png">
    </div>
</div>
<!-- Liên hệ -->
<section class="contact-info">
        <div class="contact-details">
            <h2>THÔNG TIN LIÊN HỆ</h2>
            <p><i class="fas fa-map-marker-alt"></i> 279 Nguyễn Tri Phương, Phường 5, Quận 10, TP.HCM</p>
            <p><i class="fas fa-phone-alt"></i> +84 85 783 1524</p>
            <p><i class="fas fa-envelope"></i> chimootee@gmail.com</p>
            <p><i class="fas fa-clock"></i> Thứ 2 - Thứ 6: 9:00 - 22:00<br>Thứ 7 - Chủ Nhật: 9:00 - 21:00</p>
        </div>
        <div class="contact-map">
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.652755067781!2d106.66587187480471!3d10.761222489386627!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ee4ecfa255d%3A0x9e5ec3fa6801b7d6!2zMjc5IMSQLiBOZ3V54buFbiBUcmkgUGjGsMahbmcsIFBoxrDhu51uZyA1LCBRdeG6rW4gMTAsIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1732371966192!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>


        <!-- Phần Tương Tác -->
        <div class="interaction">
            <h2>TƯƠNG TÁC VỚI CHÚNG TÔI NGAY</h2>
            <p>LIÊN HỆ NGAY ĐỂ CHIMOOTEE CÓ THỂ HỖ TRỢ BẠN</P>
            <a class="interaction-buttons" href="index.php">Liên Hệ Ngay</a>
        </div>

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

      setInterval(changeImage, 3000);
  });
</script>
    <?php include('../includes/footer.php'); ?>
</body>
</html>