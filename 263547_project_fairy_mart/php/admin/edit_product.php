<?php
   include_once("dbconnect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Product Form</title>
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
      <h2>Edit Product</h2>
         <div class="container">

             <?php
                 $prid=$_GET['prid'];

                 $conn = mysqli_connect("localhost","doubleks_fairy_martadmin","E8OMX979P9") or die("Unable to connect");
                 mysqli_select_db($conn,"doubleks_fairy_mart");

                 $sql ="SELECT * FROM tbl_products WHERE prid=".$prid++;

                    $result = mysqli_query($conn,$sql);
                    if($result ==true){
                      $row= mysqli_fetch_assoc($result);
                      $primage= $row['primage'];
                      $prname= $row['prname'];
                      $prtype = $row['prtype'];
                      $prprice = $row['prprice'];
                      $prqty = $row['prqty'];
                     }
             ?>

            <form name="editProductForm" action="/263547_project_fairy_mart/php/admin/edit_product_process.php" onsubmit="return validateNewProductForm()" method="post" enctype="multipart/form-data">

               <div class="row" align="center">
                  <img class="imgselection" src="/263547_project_fairy_mart/images/<?php echo $row ['primage'];?>"><br>
                  <!--<input type="file" onchange="previewFile()" name="primage" id="idprimage" accept="image/*"><br>-->
               </div>

               <div class="row">
                  <div class="col-25">
                     <i class="fa fa-lemon-o"></i>
                     <label for="prname">Product Name</label>
                  </div>
                  <div class="col-75">
                     <input type="text" id="idprname" name="prname" placeholder="Product Name.." value="<?php echo $row['prname'];?>">
                  </div>
               </div>

               <div class="row">
                  <div class="col-25">
                     <i class="fa fa-shopping-basket"></i>
                     <label for="prtype">Product Type</label>
                  </div>
                  <div class="col-75">
                      <select name="prtype" id="idprtype">
						    <option value="noselection">Please Select Product Type</option>
						    <option value="Apples and Pears"<?php if($prtype == 'Apples and Pears') echo "selected"; ?>>Apples and Pears</option>
						    <option value="Citrus"<?php if($prtype == 'Citrus') echo "selected"; ?>>Citrus</option>
						    <option value="Stone Fruit"<?php if($prtype == 'Stone Fruit') echo "selected"; ?>>Stone Fruit</option>
                      <option value="Tropical and Exotic"<?php if($prtype == 'Tropical and Exotic') echo "selected"; ?>>Tropical and Exotic</option>
                      <option value="Berries"<?php if($prtype == 'Berries') echo "selected"; ?>>Berries</option>
                      <option value="Melons"<?php if($prtype == 'Melons') echo "selected"; ?>>Melons</option>
						    <option value="Tomatoes and Avocados"<?php if($prtype == 'Tomatoes and Avocados') echo "selected"; ?>>Tomatoes and Avocados</option>
                      </select>
                  </div>
               </div>

               <div class="row">
                  <div class="col-25">
                     <i class="fa fa-money"></i>
                     <label for="prprice">Product Price (RM) </label>
                  </div>
                  <div class="col-75">
                     <input type="text" id="idprprice" name="prprice" placeholder="Product Price.." value="<?php echo $row['prprice'];?>">
                  </div>
               </div>

               <div class="row">
                  <div class="col-25">
                     <i class="fa fa-bars" style="font-size:14px"></i>
                     <label for="prqty" style="font-size:13px">Product Quantity (pack)</label>
                  </div>
                  <div class="col-75">
                     <input type="number" id="idprqty" name="prqty" placeholder="Product Quantity.." value="<?php echo $row['prqty'];?>" min="1" max="100">
                  </div>
               </div>
               <input type="hidden" name="prid" value="<?php echo $row["prid"]; ?>"/>
               <br>
               <div class="row">
                  <div><input type="submit" name="update" value="Edit"></div>
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