<?php
require('../includes/db.php');

// Kiểm tra nếu có tham số 'id' trong URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];  // Lấy ID từ URL

    // Truy vấn lấy thông tin bài viết từ cơ sở dữ liệu theo ID
    $sql = "SELECT * FROM news WHERE id = $id";
    $result = $conn->query($sql);

    // Kiểm tra nếu có kết quả
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();  // Lấy bài viết
    } else {
        echo "Bài viết không tồn tại!";
        exit;
    }
} else {
    echo "ID bài viết không hợp lệ!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Tin Tức</title>
    <style>
        /* CSS cho trang chi tiết bài viết */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .h1{
            color: #f18ea7;
        }
        .container {
            display: flex;
            justify-content: space-between;
            width: 90%;
            margin: 50px auto;
        }

        /* Phần nội dung bài viết */
        .content {
            width: 70%;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .content img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .content h2 {
            font-size: 1.8rem;
            color: #F18EA7;
            margin-bottom: 10px;
        }

        .content p {
            font-size: 1rem;
            color: #777;
            line-height: 1.6;
        }

        /* Phần thanh bên (sidebar) */
        .sidebar {
            width: 28%;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar h3 {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 20px;
        }

        .sidebar .search-box,
        .sidebar .category-list,
        .sidebar .recent-posts,
        .sidebar .comments {
            margin-bottom: 20px;
        }

        .sidebar .search-box input,
        .sidebar .search-box button {
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }
        .sidebar .search-box button {
            background-color: #f18ea7;
        }
        .sidebar .category-list ul,
        .sidebar .recent-posts ul {
            list-style: none;
            padding: 0;
        }

        .sidebar .category-list li,
        .sidebar .recent-posts li {
            margin-bottom: 10px;
        }

        .sidebar .category-list a,
        .sidebar .recent-posts a {
            text-decoration: none;
            color: #f56263;
        }

        .sidebar .category-list a:hover,
        .sidebar .recent-posts a:hover {
            color: #e44d55;
        }

        .sidebar .comments textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .sidebar .comments button {
            padding: 10px;
            width: 100%;
            background-color: #F18EA7;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .sidebar .comments button:hover {
            background-color: #e44d55;
        }
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
    color: #333;
    margin: 0;
}

.news-content p {
    font-size: 1rem;
    color: #777;
    margin: 10px 0;
}

.news-tittle, .news-content a {
    text-decoration: none;
    color: #f56263;
    font-weight: bold;
}

.news-content a:hover {
    color: #e44d55;
}
.submit-button {
    display: block;
    width: 200px; /* Chiều rộng của nút */
    margin: 20px auto; /* Canh giữa nút */
    padding: 10px 20px; /* Khoảng cách bên trong */
    background-color: #F18EA7; /* Màu nền */
    color: #fff; /* Màu chữ */
    font-size: 1rem; /* Kích thước chữ */
    font-weight: bold; /* Chữ in đậm */
    text-align: center; /* Canh giữa chữ */
    text-decoration: none; /* Bỏ gạch chân */
    border: none; /* Bỏ đường viền */
    border-radius: 50px; /* Bo tròn nút */
    cursor: pointer; /* Thay đổi con trỏ khi rê chuột */
    transition: all 0.3s ease; /* Hiệu ứng chuyển đổi */
}

.submit-button:hover {
    background-color: #e44d55; /* Màu nền khi rê chuột */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Đổ bóng */
    transform: scale(1.05); /* Hiệu ứng phóng to nhẹ */
}
<style>
.comments {
    margin-top: 20px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.comments h3 {
    margin-bottom: 10px;
    color: #333;
}

.comments textarea {
    width: 100%;
    height: 100px;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 10px;
    resize: none;
    outline: none;
    transition: box-shadow 0.3s ease;
}

.comments textarea:focus {
    box-shadow: 0 0 5px rgba(241, 142, 167, 0.8);
    border-color: #F18EA7;
}

.comments button {
    padding: 10px 20px;
    font-size: 14px;
    color: white;
    background-color: #F18EA7;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.comments button:hover {
    background-color: #f16e82;
}

#commentList {
    margin-top: 20px;
    text-align: left;
}

.comment-item {
    padding: 10px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 10px;
    font-size: 14px;
    color: #333;
}
@media (max-width: 768px) {
            .news-cards {
                justify-content: center;
            }
            .news-content {
                width: 100%;
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
        
        
    /* Đối với màn hình mobile */
    .news-card {
        width: 100%; /* Mỗi thẻ bài viết chiếm toàn bộ chiều rộng */
        margin-bottom: 20px;
    }

    .content h2, .content p {
        font-size: 1rem; /* Giảm kích thước chữ */
    }

    .news-container {
        padding: 10px;
    }

    .submit-button {
        font-size: 0.9rem; /* Giảm kích thước chữ của nút */
        padding: 10px; /* Giảm khoảng cách bên trong nút */
    }

    .comments textarea {
        height: 80px; /* Giảm chiều cao textarea */
    }
}
</style>

    </style>
</head>
<body>

<?php include '../includes/header.php'; ?>

<div class="container">

    <!-- Phần nội dung bài viết -->
    <div class="content">
        <h1 class="news-title"><?php echo $row['title']; ?></h1>
        <div class="news-content">
            <p><?php echo nl2br($row['description']); ?></p>
        </div>
    </div>

    <!-- Phần thanh bên -->
    <div class="sidebar">
        <!-- Tìm kiếm -->
        <div class="search-box">
        <form action="searchnews.php" method="GET"> <!-- Gửi truy vấn đến file search.php -->
        <input 
            type="text" 
            name="query" 
            placeholder="Tìm kiếm bài viết..." 
            required 
        />
            <button>Tìm kiếm</button>
        </form>
        </div>

        <!-- Danh mục bài viết -->
        <div class="category-list">
            <h3>Danh Mục</h3>
            <ul>
            <li><a href="search_by_category_news.php?newscategory_id=2">Phối đồ cùng ChiMooTee</a></li>
        <li><a href="search_by_category_news.php?newscategory_id=1">Xu hướng</a></li>
            </ul>
        </div>

        <!-- Bài viết gần đây -->
        <div class="recent-posts">
            <h3>Bài Viết Gần Đây</h3>
            <ul>
                <li><a href="new-details.php?id=2">Cách phối đồ đẹp cho mùa giáng sinh</a></li>
                <li><a href="new-details.php?id=3">Các phong cách thời trang ở Chimootee</a></li>
                <li><a href="new-details.php?id=1">Xu hướng thời trang đơn giản</a></li>
            </ul>
        </div>

        <!-- Phần bình luận -->
        <div class="comments">
        <h3>Bình luận</h3>
        <textarea placeholder="Viết bình luận của bạn..." id="commentInput"></textarea>
        <button id="submitComment">Gửi bình luận</button>
        <div class="comment-list" id="commentList">
            <!-- Bình luận sẽ được thêm vào đây -->
        </div>
    </div>

    <script>
        document.getElementById('submitComment').addEventListener('click', function() {
            // Lấy giá trị của bình luận
            var comment = document.getElementById('commentInput').value;

            // Tạo phần tử bình luận mới
            var commentItem = document.createElement('div');
            commentItem.classList.add('comment-item');
            commentItem.innerText = comment;

            // Thêm bình luận mới vào danh sách
            document.getElementById('commentList').appendChild(commentItem);

            // Xóa nội dung trong ô nhập bình luận
            document.getElementById('commentInput').value = '';
        });
    </script>
    </div>

</div>
<div class="news-container">
<h3>Bài Viết Liên quan</h3>
    <div class="news-cards">
        <?php
        // Hiển thị danh sách tin tức
        $sql = "SELECT * FROM news ORDER BY id DESC LIMIT 3";
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
    <a href="blog.php" class="submit-button">Xem thêm</a>
</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>

<?php
$conn->close();
?>
