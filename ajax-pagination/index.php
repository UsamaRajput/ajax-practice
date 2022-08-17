<!DOCTYPE html>
<html>
<head>
	<title>Ajax Pagination</title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
	<div class="container">
		<header>
			<h1>AJAX PHP PAGINATION</h1>
		</header>
		<section>
		</section>
	</div>
	<script src="../js/jquery.js"></script>
	<script>
		$(document).ready(function(){
			function load_data(pageNo){
				$.ajax({
					url: "pagination.php",
					type: "POST",
					data:{page:pageNo},
					success:function(data){
						$("section").html(data);
					}
				});
			}
			load_data();

			$(document).on("click",".pagination a",function(e){
				e.preventDefault();
				var pageId = $(this).attr("id");
				load_data(pageId);
			});

		});

	</script>
</body>
</html>