<?php                
require 'connection.php'; 
$event_name = $_POST['event_name'];
$event_start_hour = date("Y-m-d H:i:s", strtotime($_POST['event_start_hour'])); 
$event_end_hour = date("Y-m-d H:i:s", strtotime($_POST['event_end_hour'])); 
$insert_query = "insert into `calendar_event`(`event_name`,`event_start_hour`,`event_end_hour`) values ('".$event_name."','".$event_start_hour."','".$event_end_hour."')";             
if(mysqli_query($con, $insert_query))
{
	$data = array(
                'status' => true,
                'msg' => 'Event added successfully!'
            );
}
else
{
	$data = array(
                'status' => false,
                'msg' => 'Sorry, Event not added.'				
            );
}
echo json_encode($data);	
?>
