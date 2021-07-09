<?php
session_start();
include_once("dbconnect.php");

$email=$_SESSION ["email"];
// $password=$_SESSION ["password"];

if (isset($_GET['button'])) {
    if ($_GET['button'] === 'delete') {
        $prid= $_GET['prid'];
        $primage = $_GET['primage'];
        $prname = $_GET['prname'];
        $prtype = $_GET['prtype'];
        $prprice = $_GET['prprice'];
        $prqty = $_GET['prqty'];
        $sqldelete = "DELETE FROM tbl_products WHERE prid='$prid'";
        $stmt = $conn->prepare($sqldelete);
        if ($stmt->execute()) {
            echo "<script> alert('Delete Success')</script>";
        } else {
            echo "<script> alert('Delete Failed')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Main Page</title>
    <link rel="shortcut icon" type="image" href="/263547_project_fairy_mart/images/fairy_mart_logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/263547_project_fairy_mart/css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="header">
        <img src="/263547_project_fairy_mart/images/fairy_mart_logo.png" />
        <h1>Fairy Mart</h1>
        <p>We help you in your diet &#128512; </p>
    </div>

    <div class="navbar">
        <a href="/263547_project_fairy_mart/php/admin/login_admin.php" class="right">Log Out <i class="fa fa-sign-out"></i></a>
        <a href="/263547_project_fairy_mart/php/admin/edit_profile_admin.php" class="right">Profile <i class="fa fa-user-circle"></i></a>
    </div>

    <center>
    <h2>Welcome <?php echo $email?> to Fairy Mart</h2>
    </center>

	<div class="searchbar">
	    <form action="search_admin.php" method="POST" align="right">
        <div class="row">
            <div class="column">	
            <input type="text" id="idprname" name="prname" placeholder="Search Product Name.." >
        </div>

        <div class="column">
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

        <div class="column">
            <button type="submit" name="button" value="search"><i class="fa fa-search"></i></button></button>
        </div>
        </div>
        </form>
      </div>

    <div>
        <h3>Featured Product</h3>
        <div class="row">
        <?php
            $conn = mysqli_connect("localhost","doubleks_fairy_martadmin","E8OMX979P9") or die("Unable to connect");
            mysqli_select_db($conn,"doubleks_fairy_mart");
            
            $sql ="SELECT * FROM tbl_products ORDER BY prid DESC";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                ?>
                
                    <div class="column">
                        <div class="card">
                            <img src = "/263547_project_fairy_mart/images/<?php echo $row['primage'];?>" width=30% height=30%>
                            <h2 style="color:black; font-weight: bold; text-align: center; font-size: 20px"><?php echo $row['prname']; ?></h2>
                            <p class="category">Product Type: &nbsp&nbsp<?php echo $row['prtype']; ?></p>
                            <p class="category">Product Price (RM): &nbsp&nbsp<?php echo $row['prprice']; ?></p>
                            <p class="category">Product Quantity (pack): &nbsp&nbsp<?php echo $row['prqty']; ?></p>
                            <a href='edit_product.php?prid=<?php echo $row['prid']; ?>' class='fa fa-pencil' style="text-decoration: none; color:black; font-weight: bold; font-size: 25px; padding-left:60px"> &nbsp&nbsp 
                            <a href='delete_product.php?prid=<?php echo $row['prid']; ?>' class='fa fa-trash' onclick='return deleteDialog()' style="text-decoration: none; color:black; font-weight: bold; font-size: 25px; padding-left:60px"></a></a></p>
                        </div>
                    </div>
                
                <?php
                }
            }
        ?>
        </div>

    <div>
        <a href="/263547_project_fairy_mart/php/admin/new_product.php" class="float"> <i class="fa fa-plus my-float"></i>
        <span class="addproduct">Add Product</span></a>
    </div>
    <br><br><br><br>

    <div class="footer">
        <footer>&copy; Copyright 2021 Fairy Mart. Design By Angela</footer>
    </div>
</body>

</html>