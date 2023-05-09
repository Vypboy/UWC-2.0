<?php
// Kết nối database
include "connection.php";


// Kiểm tra kết nối
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}



// cap nhat mcp_id cho table have
$sql = "DELETE FROM have WHERE mcp_id = '".$_POST['id']."'";
mysqli_query($con, $sql);
$sql = "DELETE FROM mcps WHERE mcp_id = '".$_POST['id']."'";
$result = mysqli_query($con, $sql);
// Lấy dữ liệu từ database
$sql = "SELECT * FROM mcps WHERE mcp_district = '".$_POST['kv']."' ";

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