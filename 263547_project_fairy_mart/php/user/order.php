<?php
session_start();
$email=$_SESSION ["email"];

	include_once("dbconnect.php");

        if (isset($_POST['order'])) {
            $prid = $_POST['prid'];
            $qty = $_POST['qty'];

            $sqlinsertcart =  "INSERT INTO tbl_cart (email,prid,qty) VALUES('$email','$prid','$qty')";
            
            if ($conn->exec($sqlinsertcart)) {
                echo "<script>alert('Add Successful')</script>";
                echo "<script>window.location.replace('/263547_project_fairy_mart/php/user/main_page.php')</script>";
            } else {
                echo "<script>alert('Add Failed')</script>";
                echo "<script>window.location.replace('/263547_project_fairy_mart/php/user/cart.php')</script>";
            return;
            }
        }   
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Form</title>
    <link rel="shortcut icon" type="image" href="/263547_project_fairy_mart/images/fairy_mart_logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="/263547_project_fairy_mart/js/validate.js"></script>
	<link rel="stylesheet" href="/263547_project_fairy_mart/css/style1.css">
</head>

<body>
	<div class="header">
		<img src="/263547_project_fairy_mart/images/fairy_mart_logo.png" />
		<h1>Fairy Mart</h1>
		<p>We help you in your diet &#128512; </p>
	</div>

	<div class="navbar">
        <a href="/263547_project_fairy_mart/php/user/main_page.php" class="right">Back to Main Page <i class="fa fa-level-up"></i></a>
	</div>

	<div class="main">
		<h2>Order Product</h2>
		<div class="container">

			<?php
				$prid=$_GET['prid'];
					
				$conn = mysqli_connect("localhost","doubleks_fairy_martadmin","E8OMX979P9") or die("Unable to connect");
				mysqli_select_db($conn,"doubleks_fairy_mart");
					
				$sql ="SELECT * FROM tbl_products WHERE prid=".$prid++;
					
                $result = mysqli_query($conn,$sql);
                    if($result ==true){
					    $row= mysqli_fetch_assoc($result);
						$prname=$row['prname'];
						$prtype = $row['prtype'];
						$prprice = $row['prprice'];
						$prqty = $row['prqty'];
				}
			?>
				
            <form name="orderForm" action="/263547_project_fairy_mart/php/user/order.php" onsubmit="return validateOrderForm()" method="post" enctype="multipart/form-data">
                
                <div class="row" align="center">
                    <div class="left">
                        <img src = "/263547_project_fairy_mart/images/<?php echo $row['primage'];?>" height=30% width=30%/>
                    </div>
               </div>
               <br>

                <div class="row">
                    <div class="row" style="text-align:center; font-size:24px">
                        <label for="prname" ><b><?php echo $row['prname']; ?></b></label>
                    </div>
               </div>

                <div class="row">
                    <div class="row" style="text-align:center; font-size:18px; color:indigo" >
                        <label for="prtype">Product Type : <?php echo $row['prtype'];?></label>
                    </div>
                </div>

                <div class="row">
                    <div class="row" style="text-align:center; font-size:18px; color:indigo">
                        <label for="prprice"><b>Product Price : RM<?php echo $row['prprice'];?></b></label>
                    </div>
                </div>
                <br><br>

                <div class="row">
				    <div class="col-25">
					    &nbsp<i class="fa fa-bars"></i>&nbsp
					    <label for="qty">Quantity</label>
				    </div>
				    <div class="col-75">
                        <input type="number" id="idqty" name="qty" placeholder="Order Quantity ..."min="1" max="<?php echo $row['prqty'];?>">
				    </div>
			    </div>

                <input type="hidden" name="prid" value="<?php echo $row["prid"]; ?>"/><br>
                <br>
                <div class="row">
                    <div><input type="submit" name="order" value="Add To Cart"></div>
                </div>
            </form>
        </div>
    </div>
    <br>

    <div class="footer">
		<footer>&copy; Copyright 2021 Fairy Mart. Design By Angela</footer>
	</div>

</body>
</html>