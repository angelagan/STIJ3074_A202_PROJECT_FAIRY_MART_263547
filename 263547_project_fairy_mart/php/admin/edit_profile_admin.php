<?php
    include 'dbconnect.php';
    session_start();
	$email=$_SESSION['email'];

	$conn = mysqli_connect("localhost","doubleks_fairy_martadmin","E8OMX979P9") or die("Unable to connect");
    mysqli_select_db($conn,"doubleks_fairy_mart");
    
	$query=mysqli_query($conn,"SELECT * FROM tbl_admin where email='$email'")or die(mysqli_error());
	$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
	<head>
    	<title>Edit Admin Profile</title>
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
        	<a href="/263547_project_fairy_mart/php/admin/main_page_admin.php" class="right">Back to Main Page <i class="fa fa-level-up"></i></a>
    	</div>

    	<div class="main">
        	<h2>Admin Profile</h2>
        <div class="container">

        <?php
            $email=$_SESSION ["email"];

            $conn = mysqli_connect("localhost","doubleks_fairy_martadmin","E8OMX979P9") or die("Unable to connect");
            mysqli_select_db($conn,"doubleks_fairy_mart");
            $sql ="SELECT * FROM tbl_admin WHERE email=".$email++;
            $result = mysqli_query($conn,$sql);
                if($result ==true){
                	$row= mysqli_fetch_assoc($result);
                    $name=$row['name'];
                    $phone= $row['phone'];
                }
        ?>

            <form name="editAdminProfile" action="/263547_project_fairy_mart/php/admin/edit_profile_admin.php" onsubmit="return validateRegForm()" method="post">
            	<div class="row">
                	<div class="col-25">
                    	<i class="fa fa-user icon"></i>&nbsp
                    	<label for="fname">Name</label>
                	</div>
                	<div class="col-75">
                    	<input type="text" id="idname" name="name" placeholder="Your Name ..." value="<?php echo $row['name'];?>">
                	</div>
               </div>

            	<div class="row">
                	<div class="col-25">
                    	<i class="fa fa-phone"></i>&nbsp&nbsp
                    	<label for="lphone">Phone</label>
                  	</div>
                  	<div class="col-75">
                    	<input type="tel" id="idphone" name="phone" placeholder="Your Phone Number ..." value="<?php echo $row['phone'];?>">
                  	</div>
            	</div>

            	<input type="hidden" id="idemail" name="email" placeholder="Your Email ..." value="<?php echo $row['email'];?>">
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

<?php
	if(isset($_POST['update'])){
		$name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $query = "UPDATE tbl_admin SET name = '$name', phone = '$phone' WHERE email = '$email'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
?>
        <script type="text/javascript">alert("Update Successful");window.location = "main_page_admin.php";</script>
<?php
   }              
?>