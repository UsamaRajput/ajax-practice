<!DOCTYPE html>
<html>
<head>
	<title>ajax Load Data</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
	<header>
		<h1>AJAX WITH PHP</h1>
		Search Here:<input type="text" id="search">
	</header>
	<nav>
		<form>
			Add Name:<input type="text" id="name">
			<input type="submit" id="insert">
		</form>
	</nav>
	<section>

	</section>
	<div class="error-message"></div>
	<div class="success-message"></div>
	<div class="popup">
		<div class="popup-box">
			<h1>Update Name</h1>
			<table cellspacing="20px">
				
			</table>
			<div class="close-popup">X</div>
		</div>
	</div>

</div>
<script src="../js/jquery.js"></script>
<script>
	$(document).ready(function(){
		function load_data() {
			$.ajax({
				url:"fetch.php",
				type:"POST",
				success:function(data){
					$("section").html(data);
				}
			});
		}

		load_data();

		$("#insert").on("click",function(e){
			e.preventDefault();
			var name = $("#name").val();
			if (name == "") {
				$(".error-message").html("Please Fill This field").slideDown(200);
				$(".success-message").slideUp(200);
			}else{
				$.ajax({
					url:"insert.php",
					type:"POST",
					data : {name:name},
					success:function(data){
						if (data == 1) {
							load_data();
							$("form").trigger("reset");
							$(".success-message").html("Data Inserted").slideDown(200);
							$(".error-message").slideUp(200);
						}
						else{
							$(".error-message").html("No Data Inserted").slideDown(200);
							$(".success-message").slideUp(200);
						}
					}
				});
			}

		});
		$(document).on("click",".del-btn",function() {
			var delId = $(this).data("del");
			var delElement = this;

			if (confirm("do You Want To Delete This")) {
			$.ajax({
				url: "del.php",
				type:"POST",
				data: {del:delId},
				success:function(d){
					if (d == 1) {
				$(".success-message").html("Data Is Deleted").slideDown(200);
				$(".error-message").slideUp(200);
				$(delElement).closest("tr").fadeOut();
					}
					else{
				$(".error-message").html("Data Deleted Failed").slideDown(200);
				$(".success-message").slideUp(200);
					}
				}
			});
			}
		});




	$(document).on("click",".edit-btn",function(){
		$(".popup").show();
		var editId = $(this).data("edit");
		$.ajax({
			url : "update-show.php",
			type : "POST",
			data : {edit_id:editId},
			success:function(e){
				$(".popup-box table").html(e);	
			}
		});
	});

	$(document).on("click","#edit-submit",function(){
		var updateId = $("#edit-id").val();
		var updateName = $("#edit-name").val();

		$.ajax({
			url:"update.php",
			type:"POST",
			data:{upId:updateId,upName:updateName},
			success:function(u){
				if (u == 1) {
					load_data();
					$(".popup").hide();
				}
			}
		});
	});

	$(".close-popup").click(function() {
		$(".popup").hide();
	});

	$("#search").on("keyup",function(){
		var search_text = $(this).val();
		$.ajax({
			url: "search.php",
			type: "POST",
			data: {search:search_text},
			success:function(s){
				$("section").html(s);
			}
		});
	});
	});
</script>
</body>
</html>