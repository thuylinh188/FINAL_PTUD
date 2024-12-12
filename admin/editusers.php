<?php
// Get the ID from the URL
$id = $_GET['id'] ?? null;

if ($id) {
    // Connect to the database
    require('../includes/db.php');

    // Retrieve the user's current data
    $sql_str = "SELECT * FROM admins WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql_str);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $users = mysqli_fetch_assoc($res);

    // Check if form was submitted
    if (isset($_POST['btnUpdate'])) {
        // Retrieve form data
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $address = $_POST['address'] ?? '';
        $type = $_POST['type'] ?? '';

        // Hash password if it's not empty
        if ($password !== '') {
            $password = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $password = $users['password']; // Keep the current password if no new password is provided
        }

        // Update the user details
        $sql_str = "UPDATE admins SET name = ?, email = ?, password = ?, phone = ?, address = ?, type = ?, status = 'active', created_at = NOW(), updated_at = NOW() WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql_str);
        mysqli_stmt_bind_param($stmt, "sssssssi", $name, $email, $password, $phone, $address, $type, $id);
        mysqli_stmt_execute($stmt);

        // Redirect to the list page after update
        header("Location: ./listnews.php");
        exit();
    }
} else {
    echo "Invalid ID!";
    exit();
}

require('includes/header.php');
?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Cập nhật người dùng</h1>
                        </div>
                        <form class="user" method="post" action="#" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" name="name" aria-describedby="emailHelp" placeholder="Tên người dùng" value="<?= htmlspecialchars($users['name']) ?>">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" value="<?= htmlspecialchars($users['email']) ?>">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="password" name="password" aria-describedby="emailHelp" placeholder="Mật khẩu">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="phone" name="phone" aria-describedby="emailHelp" placeholder="Phone" value="<?= htmlspecialchars($users['phone']) ?>">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="address" placeholder="Địa chỉ"><?= htmlspecialchars($users['address']) ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Quyền:</label>
                                <select class="form-control" name="type">
                                    <option>Chọn quyền</option>
                                    <option value="Admin" <?= $users['type'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
                                    <option value="Staff" <?= $users['type'] == 'Staff' ? 'selected' : '' ?>>Staff</option>
                                </select>
                            </div>
                            <button class="btn btn-primary" name="btnUpdate">Cập nhật</button>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require('includes/footer.php');
?>
