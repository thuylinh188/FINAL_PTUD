<?php 
require('includes/header.php');

function anhdaidien($arrstr,$height){
    //$arrstr la mang cac anh co dang anh1;anh2;anh3
    //tach chuoi nay thanh mang - tach voi ;
    // $arr = $arrstr.split(';');
    $arr = explode(';', $arrstr);
    return "<img src='$arr[0]' height='$height' />";
}
?>



<div>


    

<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Sản phẩm</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh đại diện</th>
                    <th>Số lượng tồn kho</th>
                    <th>Danh mục</th>
                    <th>Thương hiệu</th>                    
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh đại diện</th>
                    <th>Số lượng tồn kho</th>
                    <th>Danh mục</th>
                    <th>Thương hiệu</th>                    
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </tfoot>
            <tbody>
            <?php 
    require('../includes/db.php');
    $sql_str = "SELECT 
    products.id AS pid,
    products.name AS pname,
    images,
    categories.name AS cname,
    brands.name AS bname,
    products.stock AS quantity,
    products.status AS pstatus
FROM products, categories, brands
WHERE products.category_id = categories.id 
AND products.brand_id = brands.id 
ORDER BY products.name";
    $result = mysqli_query($conn, $sql_str);
    while ($row = mysqli_fetch_assoc($result)){
        ?>

        
            <tr>
                <td><?=$row['pname']?></td>
                <td><?=anhdaidien($row['images'], "100px")?></td>
                <td><?=$row['quantity']?></td> <!-- Hiển thị số lượng tồn kho từ cột stock -->
                <td><?=$row['cname']?></td>
                <td><?=$row['bname']?></td>
                <td><?=$row['pstatus']?></td>
                <td>
                    <a class="btn btn-warning" href="editproduct.php?id=<?=$row['pid']?>">Edit</a>  
                    <a class="btn btn-danger" 
                    href="deleteproduct.php?id=<?=$row['pid']?>"
                    onclick="return confirm('Bạn chắc chắn xóa sản phẩm này?');">Delete</a>
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
require('includes/footer.php');
?>