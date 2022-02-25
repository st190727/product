<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $page_title; ?></title>
	<script src="script.js"></script>
	<script>
	function yesnoCheck(that) 
{
    if (that.value == "1") 
    {
        document.getElementById("disk1").style.display = "block";
    }
    else
    {
        document.getElementById("disk1").style.display = "none";
    }
    if (that.value == "2")
    {
        document.getElementById("book1").style.display = "block";
    }
    else
    {
        document.getElementById("book1").style.display = "none";
    }
    if (that.value == "3")
    {
        document.getElementById("furniture1").style.display = "block";
    }
    else
    {
        document.getElementById("furniture1").style.display = "none";
    }
}
	</script>
	

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- our custom CSS -->
    <link rel="stylesheet" href="libs/css/custom.css" />
</head>

<body>

    <!-- container -->
    <div class="container">

        <!-- show page header -->
        <div class="page-header">
             <h1><?php echo $page_title; ?></h1>  
			 
        </div>