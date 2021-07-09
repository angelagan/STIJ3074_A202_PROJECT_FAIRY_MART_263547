<?php
session_start();
include_once("dbconnect.php");

if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $password = trim(sha1($_POST['password']));
    $sqllogin = "SELECT * FROM tbl_admin WHERE email = '$email' AND password = '$password' AND otp = '1'";

    $select_stmt = $conn->prepare($sqllogin);
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    if ($select_stmt->rowCount() > 0) {
        $_SESSION["session_id"] = session_id();
        $_SESSION["email"] = $email;
        $_SESSION["name"] = $row['name'];
		$_SESSION["gender"] = $row['gender'];
        $_SESSION["phone"] = $row['phone'];
        $_SESSION["pass"] = $row['password'];
        $_SESSION["datereg"] = $row['date_reg'];
        echo "<script> alert('Login Successful')</script>";
        echo "<script> window.location.replace('/263547_project_fairy_mart/php/admin/main_page_admin.php')</script>";
    } else {
        session_unset();
        session_destroy();
        echo "<script> alert('Login Fail')</script>";
        echo "<script> window.location.replace('/263547_project_fairy_mart/php/admin/login_admin.php')</script>";
    }
}
if (isset($_GET["status"])) {
    if (($_GET["status"] == "logout")) {
        session_unset();
        session_destroy();
        echo "<script> alert('Session Cleared')</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Login Admin Form</title>
	<link rel="shortcut icon" type="image" href="/263547_project_fairy_mart/images/fairy_mart_logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="/263547_project_fairy_mart/js/validate_admin.js"></script>
	<link rel="stylesheet" href="/263547_project_fairy_mart/css/style1.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body onload="loadCookies()">
	<div class="header">
	<img src="/263547_project_fairy_mart/images/fairy_mart_logo.png" />
		<h1>Fairy Mart</h1>
		<p>We help you in your diet &#128512; </p>
	</div>

	<div class="navbar">
		<a href="/263547_project_fairy_mart/index.html" class="right">Home <i class="fa fa-home"></i></a>
	</div>

	<div class="main">
		<h2>Log In Admin Account</h2>
		<div class="container">
			<form name="loginForm" action="/263547_project_fairy_mart/php/admin/login_admin.php"  onsubmit="return validateLoginForm()" method="post">
				<div class="row">
					<div class="col-25">
						<i class="fa fa-envelope icon"></i>
						<label for="femail">Email</label>
					</div>
					<div class="col-75">
						<input type="text" id="idemail" name="email" placeholder="Your Email ...">
					</div>
				</div>
				
				<div class="row">
					<div class="col-25">
						&nbsp<i class="fa fa-lock"></i>&nbsp&nbsp
						<label for="lname">Password</label>
					</div>
					<div class="col-75">
						<input type="password" id="idpass" name="password" placeholder="Your Password ...">
					</div>
				</div>
				
				<div class="row">
					<div class="col-65">
						<div>
							<label>
								<input type="checkbox" id="idremember" name="remember"> Remember Me
							</label>
						</div>
					</div>
				</div>
                <br>
                
				<div class="row">
					<input type="submit" name="submit" value="Login" >
				</div>
				<br>
				
				<div class="forgot">
					<div class="forgotPassword">
						<a style="text-decoration:none; color: BlueViolet; font-weight: bold; text-align: center;" href="/263547_project_fairy_mart/php/admin/forgot_password_admin.php">Forgot Password ?</a>
				</div>
				</div>
			</form>
		</div>
	</div>

	<div class="footer">
		<footer>&copy; Copyright 2021 Fairy Mart. Design By Angela</footer>
	</div>

</body>

</html>