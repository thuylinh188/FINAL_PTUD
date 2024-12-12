<?php

//lay id goi den
$delid = $_GET['id'];

//ket noi csdl
require('../includes//db.php');

//xoa du lieu san pham trong CSDL
$sql_str = "delete from admins where id=$delid";
mysqli_query($conn, $sql_str);

header("location: listusers.php");

