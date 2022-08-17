<!DOCTYPE html>
<html>
<head>
	<title>Load More Pagination</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<header>
			<h1>AJAX LOAD MORE <span>PAGINATION</span></h1>
		</header>
		<section>
			<table border="1" class="data-body">
				<thead>
					<tr>
						<th>ID</th>
						<th>NAME</th>
					</tr>
				</thead>

			</table>

		</section>
	</div>

	<script src="../js/jquery.js"></script>
	<script>
		$(document).ready(function(){
			function load_data(num){
				$.ajax({
					url:"pagination.php",
					type:"POST",
					data:{data_num : num},
					success:function(data){
						if (data) {
							$(".pagination").remove();
							$(".data-body").append(data);
						}
						else{
						
							$(".pagination input").val("Finished");
							$(".pagination input").prop("disabled",true);
						}
						
					}
				});
			}
			load_data();
			$(document).on("click","#pagi-btn",function(){
				var start = $(this).data("no");
				load_data(start);
			});
		});
	</script>

</body>
</html>