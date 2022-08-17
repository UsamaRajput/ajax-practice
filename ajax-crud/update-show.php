<?php 
require_once 'db.php';
$up_id = $_POST['edit_id'];

$up_query = "SELECT * FROM user_data WHERE id = $up_id";
$up_run = mysqli_query($con,$up_query) or die("update query failed");

$data = mysqli_fetch_array($up_run);

$output = "
		<tr>
			<td>Add Name</td>
			<td><input type='text' id='edit-name' value='".$data['user_name']."'>
			<input type='hidden' id='edit-id' value='".$data['id']."'>

			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type='submit' id='edit-submit' value='Update'></td>
		</tr>
";

echo $output;

?>