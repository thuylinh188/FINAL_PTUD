<?php 
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
                        <h1 class="h4 text-gray-900 mb-4">Thêm đơn hàng</h1>
                    </div>
                    <form class="user" method="post" action="addorders.php" enctype="multipart/form-data">                        
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user"
                            id="id" name="id" aria-describedby="emailHelp"
                            placeholder="Mã đơn hàng">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user"
                            id="user_id" name="user_id" aria-describedby="emailHelp"
                            placeholder="Mã khách hàng">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user"
                            id="firstname" name="firstnamw" aria-describedby="emailHelp"
                            placeholder="Họ">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user"
                            id="lastname" name="lastname" aria-describedby="emailHelp"
                            placeholder="Tên">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user"
                            id="address" name="address" aria-describedby="emailHelp"
                            placeholder="Địa chỉ">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user"
                            id="phone" name="phone" aria-describedby="emailHelp"
                            placeholder="Số điện thoại">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user"
                            id="email" name="email" aria-describedby="emailHelp"
                            placeholder="Email">
                    </div>
                    

                        </select>
                    </div>
                    <button class="btn btn-primary">Tạo mới</button>
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