<?php 
require_once 'db.php';
$search = $_POST['search'];
$query = "SELECT * FROM user_data WHERE user_name LIKE '%$search%'";
$run = mysqli_query($con,$query);

if (mysqli_num_rows($run)>0) {
	echo "<table>
			<tr>
				<th width='50px'>ID</th>
				<th>USER NAME</th>
				<th width='100px'>EDIT</th>
				<th width='100px'>DELETE</th>
			</tr>";
	while ($data = mysqli_fetch_array($run)) {
		echo "
			<tr>
				<td>".$data['id']."</td>
				<td>".$data['user_name']."</td>
				<td><button class='edit-btn' data-edit='".$data['id']."'>Edit</button></td>
				<td><button class='del-btn' data-del='".$data['id']."'>Delete</button></td>
			</tr>
		";
	}
	echo "</table>";
}
else{
	echo "<h1>No Data Found</h1>";
}




?>