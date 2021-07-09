<?php
include_once("dbconnect.php");

if (isset($_POST['submit'])) {
	$primage = uniqid() . '.png';
    $prname = $_POST['prname'];
    $prtype = $_POST['prtype'];
    $prprice = $_POST['prprice'];
    $prqty = $_POST['prqty'];
    
    if (file_exists($_FILES["primage"]["tmp_name"]) || is_uploaded_file($_FILES["primage"]["tmp_name"])) {
        $sqlinsertprod =  "INSERT INTO tbl_products(primage, prname, prtype, prprice, prqty) VALUES('$primage','$prname','$prtype','$prprice','$prqty')";
        if ($conn->exec($sqlinsertprod)) {
            uploadImage($primage);
            echo "<script>alert('Success')</script>";
            echo "<script>window.location.replace('/263547_project_fairy_mart/php/admin/main_page_admin.php')</script>";
        } else {
            echo "<script>alert('Failed')</script>";
			echo "<script>window.location.replace('/263547_project_fairy_mart/php/admin/new_product.php')</script>";
            return;
        }
    } else {
        echo "<script>alert('Image Not Available')</script>";
		echo "<script>window.location.replace('/263547_project_fairy_mart/php/admin/new_product.php')</script>";
        return;
    }
}

function uploadImage($primage)
{
    $target_dir = "/home8/doubleks/public_html/263547_project_fairy_mart/images/";
    $target_file = $target_dir . $primage;
    move_uploaded_file($_FILES["primage"]["tmp_name"], $target_file);
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>New Product Form</title>
	<link rel="shortcut icon" type="image" href="/263547_project_fairy_mart/images/fairy_mart_logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="/263547_project_fairy_mart/js/validate_pr.js"></script>
	<link rel="stylesheet" href="/263547_project_fairy_mart/css/style1.css">
</head>

<body>
	<div class="header">
		<img src="/263547_project_fairy_mart/images/fairy_mart_logo.png" />
		<h1>Fairy Mart</h1>
		<p>We help you in your diet &#128512; </p>
	</div>

	<div class="navbar">
		<a href="/263547_project_fairy_mart/php/admin/main_page_admin.php" class="right">Back to Main Page <i class="fa fa-level-up"></i></a>
	</div>

	<div class="main">
		<h2>Add New Product</h2>
		<div class="container">
			<form name="newProductForm" action="/263547_project_fairy_mart/php/admin/new_product.php" onsubmit="return validateNewProductForm()" method="post" enctype="multipart/form-data">
			
			<div class="row" align="center">
			<img class="imgselection" src="/263547_project_fairy_mart/images/photo.png"><br>
                <input type="file" onchange="previewFile()" name="primage" id="idprimage" accept="image/*"><br>
            </div>

            <div class="row">
				<div class="col-25">
					<i class="fa fa-lemon-o"></i>
					<label for="prname">Product Name</label>
				</div>
				<div class="col-75">
						<input type="text" id="idprname" name="prname" placeholder="Product Name..">
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<i class="	fa fa-shopping-basket"></i>
					<label for="prtype">Product Type</label>
				</div>
				<div class="col-75">
					<select name="prtype" id="idprtype">
						<option value="noselection">Please Select Product Type</option>
						<option value="Apples and Pears">Apples and Pears</option>
						<option value="Citrus">Citrus</option>
						<option value="Stone Fruit">Stone Fruit</option>
                        <option value="Tropical and Exotic">Tropical and Exotic</option>
                        <option value="Berries">Berries</option>
                        <option value="Melons">Melons</option>
						<option value="Tomatoes and Avocados">Tomatoes and Avocados</option>
                    </select>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<i class="fa fa-money"></i>
					<label for="prprice">Product Price (RM) </label>
				</div>
				<div class="col-75">
					<input type="text" id="idprprice" name="prprice" placeholder="Product Price.." min="1.00" max="999.00">
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<i class="fa fa-bars" style="font-size:14px"></i>
					<label for="prqty" style="font-size:13px">Product Quantity (pack)</label>
				</div>
				<div class="col-75">
                    <input type="number" id="idprqty" name="prqty" placeholder="Product Quantity.." min="1" max="100">
				</div>
			</div>
            <br>
			<div class="row">
				<div><input type="submit" name="submit" value="Add"></div>
			</div>
			</form>
		</div>
	</div>

	<div class="footer">
		<footer>&copy; Copyright 2021 Fairy Mart. Design By Angela</footer>
	</div>

</body>

</html>

<script>
function previewFile() {
    const preview = document.querySelector('.imgselection');
    const file = document.querySelector('input[type=file]').files[0];
    const reader = new FileReader();
    reader.addEventListener("load", function () {
        // convert image file to base64 string
           preview.src = reader.result;
    }, false);
    
    if (file) {
        reader.readAsDataURL(file);
    }
}
</script>