<?php 
require_once 'db.php';
$name = $_POST['name'];


$insert_query = "INSERT INTO user_data(user_name) VALUES('$name')";

$insert_run = mysqli_query($con,$insert_query);

if ($insert_run) {
	echo 1;
}
else{
	echo 0;
}



?>