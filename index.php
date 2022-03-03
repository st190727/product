<?php

	echo '<link rel="stylesheet" type="text/css" href="styles.css">';
	echo '<br/><a href ="index.php">Main</a><br/>';
	echo '<br/><br/>';

	$page_title = "Product list";
	require_once "layout_header.php";

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
			<title>Title</title>
			<script src="script.js"></script>
			<script src="js/jquery-1.10.2.js"></script>
	</head>
		<body>	
			<div>		
				<?php	
					include_once 'get_products.php';
				?>		
			</div>
			<script type="text/javascript">
				$(document).ready(function()
				{
					$('#chk_all').click(function()
					{
						if(this.checked)
							$(".chkbox").prop("checked", true);
						else
							$(".chkbox").prop("checked", false);
					});
				});
			</script>
		</body>    
</html>

<?php
	require_once "layout_footer.php";
?>
