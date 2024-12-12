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
                            <h1 class="h4 text-gray-900 mb-4">Thêm mới người dùng</h1>
                        </div>
                        <form class="user" method="post" action="addusers.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" name="name"
                                    aria-describedby="emailHelp" placeholder="Tên người dùng">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email"
                                    aria-describedby="emailHelp" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="password" name="password"
                                    aria-describedby="emailHelp" placeholder="Mật khẩu">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="phone" name="phone"
                                    aria-describedby="emailHelp" placeholder="Phone">
                            </div>
                           



                            <div class="form-group">
                                <label class="form-label">Quyền:</label>
                                <select class="form-control" name="type">
                                    <option>Chọn quyền</option>
                                    <option value="Admin">Amin</option>
                                    <option value="Staff">Staff</option>
                                    
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