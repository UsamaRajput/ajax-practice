<?php 
require_once 'db.php';

$up_id = $_POST['upId'];
$up_name = $_POST['upName'];

$up_query = "UPDATE user_data SET user_name = '$up_name' WHERE id = $up_id";
$up_run = mysqli_query($con,$up_query);

if ($up_run) {
	echo 1;
}
else{
	echo 0;
}
?>