<?php
// Kết nối database
include "connection.php";
// Kiểm tra kết nối
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM have ";
$result = mysqli_query($con, $sql);
$existing = 0;
while($row = mysqli_fetch_assoc($result)) {
    if($row['employee_id']==$_GET['em_id'] &&$row['mcp_id']==$_GET['mcp_id']) $existing = 1;
}
// cap nhat mcp_id cho table have
if(!$existing){
$sql = "INSERT INTO have SET employee_id = '".$_GET['em_id']."', mcp_id = '".$_GET['mcp_id']."' ";
mysqli_query($con, $sql);
}
// khong can kiem tra nhu tren cung duoc vi dang nao mot collector chi duoc giao 1 mcp
// Đóng kết nối
mysqli_close($con);

?>