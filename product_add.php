<?php


require_once("cl_product.php");

echo '<link rel="stylesheet" type="text/css" href="styles.css">';
echo '<br/><br/>';
echo '<br/><a href ="index.php">Main</a><br/>';
echo '<div><a href="index.php">Back</a></div>';
echo '<br/><br/>';
$page_title = "Product add";
require_once "layout_header.php";

echo '
<!DOCTYPE html>
<html>
		<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
				<title>Title</title>
			<script src="script.js"></script>
		</head>
<body>	
<br/><br/>
		<form method="POST" action="product_add.php" enctype="multipart/form-data">
		
			<p>Please add Your data.</p>
				<div class="reg-form">
				
				
				<label for="sku">SKU</label>
				<input class="form-control" type="text" id="sku" name="sku" placeholder="JVC200123 ..." required><br/><br/>
				
				<label for="product_name">Product name</label>
					<input class="form-control" type="text" id="product_name" name="product_name" placeholder="Acme disk ..." required><br/><br/>
					
				<label for="product_price">Product price</label>
					<input class="form-control" type="text" id="product_price" name="product_price" placeholder="1.00 ..." required><br/><br/>

				<label for="product_type">Choose Product Type</label>
										
										<select class="form-control" onchange="yesnoCheck(this);" name="product_type">
											<option value="">Select</option>
											<option value="dvd-disk">DVD-disc</option>
											<option value="book">Book</option>
											<option value="furniture">Furniture</option>
										</select><br/><br/>
										
										
				<div id="ifYesdisk" style="display: none;">
					<p>DVD-disk</p>	
					<label for="product_size">Product size in MB for DVD-disk</label>
						<input class="form-control" type="text" id="product_size" name="product_size" placeholder="2.00 MB ..." ><br/>	
				</div>							
				
				
				<div id="ifYesbook" style="display: none;">
					<p>BOOK</p>
					<label for="product_weight">Product weight for Book</label>
						<input class="form-control" type="text" id="product_weight" name="product_weight" placeholder="2.00 kg..." ><br/>	
				</div>


				<div id="ifYesfurniture" style="display: none;">
				<p>FURNITURE</p>	
				
				<label for="product_height">Product height</label>
					<input class="form-control" type="text" id="product_height" name="product_height" placeholder="12.00 cm ..." ><br/>
				
				<label for="product_width">Product width</label>
					<input class="form-control" type="text" id="product_width" name="product_width" placeholder="2.00 cm ..." ><br/>	
				
				<label for="product_length">Product length</label>
					<input class="form-control" type="text" id="product_length" name="product_length" placeholder="10.00 cm ..." ><br/>		
				</div><br/>	
				
					
					<button  type="submit" name="submit">SUBMIT</button>
				
				</div>
		</form>';

if (isset($_POST['submit'])) {
	if(null!=($_POST["sku"] && $_POST["product_name"] && $_POST["product_price"] && $_POST["product_type"] && $_POST["product_size"] && $_POST["product_weight"] && $_POST["product_height"] && $_POST["product_width"] && $_POST["product_length"]))
	
	{
	$sku=$_POST["sku"];
	$name=$_POST["product_name"];
	$price=$_POST["product_price"];
	
	

	$type=$_POST["product_type"];
	
	$size=$_POST["product_size"];
	$weight=$_POST["product_weight"];
	$height=$_POST["product_height"];
	$width=$_POST["product_width"];
	$length=$_POST["product_length"];
	

	}
	
$type=$_POST["product_type"];
if(isset($_POST["product_type"])){
	{
		$product_type = $_POST["product_type"];
	}

if($type=='book'){

$product=new Book($db,
				array(
                "sku"=>$_POST["sku"],
                "name"=>$_POST["product_name"],
				"price"=>$_POST["product_price"],
                "type"=>$_POST["product_type"],
			
                ),array(
				 "weight"=>$_POST["product_weight"],
				 )
				);
			
			$product->save();
					
}else if ($type=='dvd-disk'){		
$product=new Disk($db,
				array(
                "sku"=>$_POST["sku"],
                "name"=>$_POST["product_name"],
				"price"=>$_POST["product_price"],
                "type"=>$_POST["product_type"],
			
                ),array(
				 "size"=>$_POST["product_size"],
				 )
				);
			
			$product->save();
			
			
			
}else if ($type=='furniture'){
$product=new Furniture($db,
				array(
                "sku"=>$_POST["sku"],
                "name"=>$_POST["product_name"],
				"price"=>$_POST["product_price"],
                "type"=>$_POST["product_type"],
			
                ),array(
				 "height"=>$_POST["product_height"],
				 "width"=>$_POST["product_width"],
				 "length"=>$_POST["product_length"],
				 )
				);
			
			$product->save();
	
		}
	}
}

echo '</div>
</body>    
</html>';
require_once "layout_footer.php";

?>


	
