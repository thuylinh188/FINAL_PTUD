<?php
include '../includes/db.php';
session_start();
$is_homepage = false;
require_once('../includes/header.php');

$idsp = $_GET['id'] ?? 0;
$sql_str = "SELECT * FROM news WHERE id = $idsp";
$result = mysqli_query($conn, $sql_str);

// Kiểm tra nếu có kết quả
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $anh = $row['avatar']??'';
} else {
    echo "Có lỗi khi truy vấn dữ liệu.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Tin Tức</title>
    <style>
    /* Style page here (same as your original CSS) */
    <style>
    /* Toàn bộ trang */
body {
    font-family:  'Palatino Linotype', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
}
.news-banner {
    position: relative;
    text-align: center;
    height: 200px; /* Chiều cao của banner */
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #fdf3f5; /* Màu nền của banner */
}

.background-pattern {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('http://localhost:8088/FINAL/hinhanh/4.png'); /* Đường dẫn đến hình nền */
    background-size: cover; /* Điều chỉnh hình nền phủ đều */
    background-repeat: repeat;
    opacity: 0.5; /* Độ trong suốt của hình nền */
    z-index: 1;
}

.news-title {
    font-family:'Palatino Linotype', sans-serif;
    font-size: 3rem;
    color: #f18ea7; /* Màu chữ */
    z-index: 2; /* Đảm bảo chữ nằm trên hình nền */
}

/* Tiêu đề trang */
.news-title {
    text-align: center;
    font-size: 2rem;
    color: #f18ea7;
    margin-top: 20px;
}

/* Phần hiển thị các bài viết */
.news-container {
    width: 90%;
    margin: 0 auto;
    padding: 20px 0;
}

.news-cards {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 20px;
}

/* Mỗi thẻ bài viết */
.news-card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    width: 30%;
    overflow: hidden;
    transition: transform 0.3s ease;
}

.news-card:hover {
    transform: translateY(-10px);
}

.news-card img {
    width: 100%;
    height: auto;
    object-fit: cover;
}

.news-content {
    padding: 15px;
}

.news-content h2 {
    font-size: 1.2rem;
    color: #f18ea7;
    margin: 0;
}

.news-content p {
    font-size: 1rem;
    color: #777;
    margin: 10px 0;
}

.news-content a {
    text-decoration: none;
    color: #f18ea7;
    font-weight: bold;
}

.news-content a:hover {
    color: #e44d55;
}
.feedback-form {
    background-color: #f8f8f8; /* Màu nền của form */
    padding: 30px;
    border-radius: 10px;
    max-width: 600px;
    margin: 50px auto;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    font-family:  'Palatino Linotype', sans-serif;
    text-align: center;
}

.form-title {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.form-description {
    font-size: 14px;
    color: #666;
    margin-bottom: 20px;
}

.form-group {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-bottom: 20px;
    font-family:  'Palatino Linotype', sans-serif;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    font-family:  'Palatino Linotype', sans-serif;

}

.form-group input[type="text"],
.form-group input[type="email"] {
    width: 48%; /* Chia đôi chiều rộng */
}

textarea {
    width: 100%;
    resize: none;
}

.submit-button {
    background-color: #f76c8a;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-family:  'Palatino Linotype', sans-serif;
    text-align: right;
}

.submit-button:hover {
    background-color: #e85c7b;
}
@media (max-width: 768px) {
            .news-cards {
                justify-content: center;
            }

            .news-card {
                width: 100%; /* Thẻ bài viết chiếm toàn bộ chiều rộng */
                margin-bottom: 20px;
            }

            .feedback-form {
                padding: 20px;
                margin: 20px;
            }

            .form-group input,
            .form-group textarea {
                width: 100%;
            }

            .news-title {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .news-title {
                font-size: 1.2rem; /* Giảm kích thước font trên màn hình nhỏ hơn */
            }

            .feedback-form {
                margin: 10px;
            }

            .form-group input[type="text"],
            .form-group input[type="email"] {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<div class="news-banner">
    <div class="background-pattern"></div>
    <h1 class="news-title">TIN TỨC</h1>
</div>

<div class="news-container">
    <div class="news-cards">
        <?php
        // Hiển thị danh sách tin tức
        $sql = "SELECT * FROM news ORDER BY id DESC LIMIT 6";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $avatar = !empty($row['avatar']) ? "http://localhost:8088/FINAL/admin/" . $row['avatar'] : "http://localhost:8088/FINAL/admin/uploads/default-image.jpg";
                echo '<div class="news-card">';
                
                // Thêm ảnh cho từng bài viết
                // Giả sử trường 'avatar' chứa tên ảnh (ví dụ: 'anh1.jpg')
                
                echo '<img src="' . $avatar . '" alt="' . htmlspecialchars($row['title']) . '">';
                echo '<div class="news-content">';
                echo '<h2>' . $row['title'] . '</h2>';
                echo '<ul>';
                echo '<li>' . $row['created_at'] . '</li>';
                echo '<li>8 Comments</li>';  // Có thể thay đổi nếu có dữ liệu bình luận
                echo '</ul>';
                echo '<p>' . substr($row['summary'], 0, 100) . '...</p>';
                echo '<a href="new-details.php?id=' . $row['id'] . '">Xem chi tiết</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "Không có bài viết nào!";
        }
        ?>
    </div>
</div>


    <div class="feedback-form">
        <h2 class="form-title">Ý KIẾN PHẢN HỒI</h2>
        <p class="form-description">Mọi thông tin xin điền vào biểu mẫu bên dưới để được hỗ trợ ngay</p>
        <form action="#" method="POST">
            <div class="form-group">
                <input type="text" name="first_name" placeholder="First Name" required>
                <input type="text" name="last_name" placeholder="Last Name" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email Address" required>
            </div>
            <div class="form-group">
                <textarea name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <button type="submit" class="submit-button">Gửi</button>
        </form>
    </div>
</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>

<?php
$conn->close();
?>