<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm bài viết</title>
    <style>
        .post-section {
            padding-left: 120px;
            padding-right: 120px;
            text-align: center;
            background-color: white;
        }

        .section-title {
            font-size: 32px;
            font-weight: bold;
            color: #F18EA7;
            padding-bottom: 20px;
            padding-top: 20px;
            background-color: #fff;
        }

        .post-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
            justify-content: space-between;
        }

        .post-item {
            width: 300px;
            border: 1px solid #ddd;
            padding: 20px;
            text-align: center;
            background-color: #f9f9f9;
            transition: transform 0.3s ease;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .post-item:hover {
            transform: scale(1.05);
        }

        .post-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .post-excerpt {
            font-size: 14px;
            color: #555;
            margin-bottom: 15px;
        }

        .read-more {
            font-size: 14px;
            color: white;
            background-color: #F18EA7;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .read-more:hover {
            background-color: #f16e82;
        }

        /* Đảm bảo thiết kế phù hợp trên các thiết bị di động */
        @media (max-width: 768px) {
            .post-item {
                width: 45%;
            }
        }

        @media (max-width: 480px) {
            .post-item {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <?php 
    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ecommerceshop";  // Thay bằng tên cơ sở dữ liệu của bạn

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    require_once('../includes/header.php'); // Header của trang

    // Lấy từ khóa tìm kiếm từ người dùng
    $searchQuery = isset($_GET['query']) ? $_GET['query'] : '';

    // Xử lý tìm kiếm nếu có từ khóa
    if ($searchQuery) {
        // Chuẩn bị câu truy vấn tìm kiếm bài viết
        $sql = "SELECT * FROM news WHERE title LIKE ? OR summary LIKE ?";
        $stmt = $conn->prepare($sql);
        $searchTerm = "%" . $searchQuery . "%";
        $stmt->bind_param('ss', $searchTerm, $searchTerm);

        // Thực thi câu truy vấn
        $stmt->execute();
        $result = $stmt->get_result();

        // Hiển thị kết quả tìm kiếm
        echo '<div class="post-section">';
        echo '<h2 class="section-title">Kết quả tìm kiếm bài viết cho: "' . htmlspecialchars($searchQuery) . '"</h2>';
        echo '<div class="post-list">';

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="post-item">';
                echo '<h3 class="post-title">' . htmlspecialchars($row['title']) . '</h3>';
                echo '<p class="post-excerpt">' . htmlspecialchars(mb_substr($row['summary'], 0, 100)) . '...</p>';
                echo '<a href="blog.php?id=' . $row['id'] . '" class="read-more">Đọc thêm</a>';
                echo '</div>';
            }
        } else {
            echo "<p>Không tìm thấy bài viết nào.</p>";
        }

        echo '</div>'; // End .post-list
        echo '</div>'; // End .post-section

        // Đóng kết nối
        $stmt->close();
    } else {
        echo "<p>Vui lòng nhập từ khóa tìm kiếm.</p>";
    }

    // Đóng kết nối cơ sở dữ liệu
    $conn->close();

    require_once('../includes/footer.php'); // Footer của trang
    ?>
</body>
</html>
