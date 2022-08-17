<?php 
require_once 'db.php';
$del_id = $_POST['del'];

$del_query = "DELETE FROM user_data WHERE id = $del_id";
$run_del = mysqli_query($con, $del_query) or die("del Query Failed");
if ($run_del) {
	echo 1;
}
else{
	echo 0;
}

?>