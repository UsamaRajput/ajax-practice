<?php 
require_once "db.php";

if (isset($_POST['page'])) {
	$page_no = $_POST['page'];

}else{
	$page_no = 1;
}
$limit = 10;

$offset = ($page_no - 1) * $limit;

$query = "SELECT * FROM user_data LIMIT $offset, $limit";
$run = mysqli_query($con,$query) or die("Query Failed");

if (mysqli_num_rows($run)>0) {
	$output = "<table>
	<tr>
	<th>ID</th>
	<th>User Name</th>
	</tr>";
	while ($data = mysqli_fetch_array($run)) {
		$output .= "<tr>
		<td>{$data['id']}</td>
		<td>{$data['user_name']}</td>
		</tr>";

	}
	$output .= "</table>";

	$pagi_query = "SELECT * FROM user_data";
	$pagi_run = mysqli_query($con,$pagi_query);

	$total_record = mysqli_num_rows($pagi_run);

	$total_pages = ceil($total_record/$limit);

	$output .= "<div class='pagination'>";

	for ($i=1; $i <=$total_pages; $i++) {
		if ($page_no == $i) {
			$class = "active";
		} 
		else{
			$class = "";
		}
		$output .= "<a href='' class='".$class."' id='".$i."'>".$i."</a>";
	}
	$output .= "</div>";

	echo $output;
}
else{
	echo "No Record Found";
}


?>