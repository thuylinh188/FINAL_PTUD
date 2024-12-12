<?php 
require('includes/header.php');
if ($_SESSION['user']['type'] != 'Admin'){
    echo "<h2>Bạn không có quyền truy cập vào nội dung này</h2>";
} else {
?>
    <div>
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Người dùng</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>STT</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php 
        require('../includes/db.php');
        $sql_str = "select 
        * from admins order by admins.created_at";
        $result = mysqli_query($conn, $sql_str);
        $stt = 0;
        while ($row = mysqli_fetch_assoc($result)){
            $stt++;
            ?>

            
                <tr>
                    <td><?=$stt?></td>
                    <td><?=$row['name']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['type']?></td>
                    <td><?=$row['status']?></td>
                    
                    <td>
                        <a class="btn btn-warning" href="editusers.php?id=<?=$row['id']?>">Edit</a>  
                        <a class="btn btn-danger" 
                        href="deleteuser.php?id=<?=$row['id']?>"
                        onclick="return confirm('Bạn chắc chắn xóa tài khoản này này?');">Delete</a>
                    </td>
                    
                </tr>
                <?php
        }
        ?>                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
            

    
    <?php
    }
require('includes/footer.php');
?>