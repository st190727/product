
<?php

include_once 'config/database.php';

require_once("cl_product.php");
$database = new Database();
$db = $database->getConnection();


if(isset($_POST['chk_id']))
{
    $arr = $_POST['chk_id'];
    foreach ($arr as $id) {
	
	$product=new Book($db, [], []);
		$product->deleteProduct($id);
    }
}
?>
<!DOCTYPE html>
<html>
	<head>
		
		<meta content="width=device-width, initial-scale=1" name="viewport" >
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	</head>
		<body>

				<a href='product_add.php' class='btn btn-default pull-right'>ADD</a>				
            <form  method="post">
				<input id="submit" name="submit" type="submit" class="btn btn-danger" value="MASS DELETE" /><br/><br/>
					<?php if (isset($_GET['msg'])) { ?>
					<p class="alert alert-success"><?php echo $_GET['msg']; ?></p>
					<?php } ?>
	   
				<input id="chk_all" name="chk_all" type="checkbox"  /><a> Delete all </a><br/>
                <tbody>
				
					<?php
					echo'<br/><br/>';


$product=new Book($db, [], []);

		$stmt=$product->getProducts();
					$book='book';
					$disk='dvd-disk';
					$furniture='furniture';
				
					foreach ($stmt as $row) {
					
					echo "

					<div style='height:160px;width:200px;border:1px solid #bfbfbf; border-radius: 3px; display:inline-block;margin-right:25px;margin-left:25px; margin-bottom:10px;'>
					<div class='delete_checkbox'>
					<br/>
			
					";?>
			
			<input name="chk_id[]" type="checkbox" class='chkbox' value="<?php echo $row['id']; ?>"/><br/>
			<?php echo"
			
			
			$row[sku]<br/>
			$row[name]<br/>
			$row[price]<br/>";
			
			if ($row['type']=='furniture'){
			
				echo "Dimention: ".$row['height'].'x'.$row['width'].'x'.$row['length'] ." CM ";
			}
			else if ($row['type']=='book'){
			
				echo "Weight: ".$row['weight']." KG ";	
			}
			else if ($row['type']=='dvd-disk')
			{
				echo "Size: ".$row['size']." MB ";
			}
			
			echo"</div>		</div> ";
			}
?>
</tbody>
            
            </form>
			<script src="js/jquery-1.10.2.js"></script>
			<script type="text/javascript">
			$(document).ready(function(){
				$('#chk_all').click(function(){
					if(this.checked)
						$(".chkbox").prop("checked", true);
					else
						$(".chkbox").prop("checked", false);
				});
			});
			</script>
		</body>
</html>
<?php require_once "layout_footer.php";?>