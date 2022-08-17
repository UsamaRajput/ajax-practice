<?php 
require_once 'db.php';
if (isset($_POST['data_num'])) {
	$start = $_POST['data_num'];
}
else{
	$start = 0;
}
$limit = 5;
$query = "SELECT * FROM user_data LIMIT $start,$limit";
$run = mysqli_query($con,$query);
$output = "";
if (mysqli_num_rows($run) > 0) {
	$output .= "<tbody>";
	$number = "";
while ($data = mysqli_fetch_array($run)) {
	$number = $data['id'];
	$output .= "<tr>
					<td>{$data['id']}</td>
					<td>{$data['user_name']}</td>
				</tr>";
}
$output .="

					<tr class='pagination'>
					<td  colspan='2'>
						<input type='button' id='pagi-btn' data-no='{$number}' value='Load More'>
					</td>
					</tr>
					</tbody>";
echo $output;

}
else{
	echo "";
}


 ?>
