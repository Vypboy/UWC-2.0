<?php

// Kết nối database
include "connection.php";


// Kiểm tra kết nối
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Lấy dữ liệu từ database

$sql = "DELETE FROM have WHERE mcp_id= '".$_POST['mcp_id']."' AND employee_id = '".$_POST['employee_id']."'";
$result = mysqli_query($con, $sql);


// Đóng kết nối
mysqli_close($con);

?>