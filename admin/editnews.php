<?php
// Kết nối CSDL
require('../includes/db.php');

// Lấy ID từ URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID không hợp lệ hoặc không được cung cấp.");
}
$id = intval($_GET['id']);

// Lấy dữ liệu bài viết
$sql_str = "SELECT * FROM news WHERE id=$id";
$res = mysqli_query($conn, $sql_str);

if (!$res || mysqli_num_rows($res) == 0) {
    die("Không tìm thấy dữ liệu với ID: $id");
}
$news = mysqli_fetch_assoc($res);

// Xử lý form cập nhật
if (isset($_POST['btnUpdate'])) {
    if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
        die("ID không hợp lệ khi cập nhật.");
    }
    $id = intval($_POST['id']); // Lấy ID từ form
    $name = $_POST['title'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
    $summary = $_POST['summary'];
    $description = $_POST['description'];
    $danhmuc = intval($_POST['danhmuc']);

    // Xử lý hình ảnh
    if (!empty($_FILES['anh']['name'])) {
        if (!empty($news['avatar']) && file_exists($news['avatar'])) {
            unlink($news['avatar']); // Xóa ảnh cũ
        }

        $filename = $_FILES['anh']['name'];
        $location = "uploads/news/" . uniqid() . $filename;
        $extension = strtolower(pathinfo($location, PATHINFO_EXTENSION));
        $valid_extensions = array("jpg", "jpeg", "png");

        if (in_array($extension, $valid_extensions)) {
            if (move_uploaded_file($_FILES['anh']['tmp_name'], $location)) {
                $sql_str = "UPDATE news 
                            SET title='$name', 
                                slug='$slug', 
                                description='$description', 
                                summary='$summary', 
                                avatar='$location', 
                                newscategory_id=$danhmuc, 
                                updated_at=NOW() 
                            WHERE id=$id";
            }
        }
    } else {
        $sql_str = "UPDATE news 
                    SET title='$name', 
                        slug='$slug', 
                        description='$description', 
                        summary='$summary', 
                        newscategory_id=$danhmuc, 
                        updated_at=NOW() 
                    WHERE id=$id";
    }

    mysqli_query($conn, $sql_str);

    // Chuyển hướng sau khi cập nhật
    header("Location: ./listnews.php");
    exit;
}

require('includes/header.php');
?>
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Cập nhật tin tức</h1>
                        </div>
                        <form class="user" method="post" action="#" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="title" value="<?= htmlspecialchars($news['title']) ?>">
                            </div>
                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input type="file" class="form-control" name="anh">
                                <br>
                                Ảnh hiện tại: <img src="<?= $news['avatar'] ?>" height="100px">
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt tin:</label>
                                <textarea name="summary" class="form-control"><?= htmlspecialchars($news['summary']) ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội dung tin:</label>
                                <textarea name="description" class="form-control"><?= htmlspecialchars($news['description']) ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Danh mục tin tức:</label>
                                <select class="form-control" name="danhmuc">
                                    <option>Chọn danh mục</option>
                                    <?php
                                    $sql_categories = "SELECT * FROM newscategories ORDER BY name";
                                    $result = mysqli_query($conn, $sql_categories);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?= $row['id'] ?>" <?= $row['id'] == $news['newscategory_id'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($row['name']) ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button class="btn btn-primary" name="btnUpdate">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require('includes/footer.php');
?>
