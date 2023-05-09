<?php

// Kết nối database
include "connection.php";


// Kiểm tra kết nối
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Lấy dữ liệu từ database
if($_POST['capacity']=='all') $sql = "SELECT * FROM mcps";
else $sql = "SELECT * FROM mcps WHERE capacity = '".$_POST['capacity']."' AND mcp_district = '".$_POST['district']."'";
$result = mysqli_query($con, $sql);

// Chuyển dữ liệu thành mảng JSON
$data = array();
while($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
echo json_encode($data);

// Đóng kết nối
mysqli_close($con);

?>