<?php
// Kết nối database
include "connection.php";
// Kiểm tra kết nối
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


// cap nhat mcp_id cho table have
$sql = "SELECT * FROM mcps WHERE mcp_district = '".$_POST['district']."' AND mcp_address = '".$_POST['ward']."'";
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