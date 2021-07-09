<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home8/doubleks/public_html/PHPMailer/src/Exception.php';
require '/home8/doubleks/public_html/PHPMailer/src/PHPMailer.php';
require '/home8/doubleks/public_html/PHPMailer/src/SMTP.php';

    include_once("dbconnect.php");
    
     $name = $_POST["name"];
     $email = $_POST["email"];
     $phone = $_POST["phone"];
     $gender = $_POST["gender"];
     $passa = $_POST["passworda"];
     $passb = $_POST["passwordb"];
     $shapass = sha1($passa);  
     $otp = rand(1000,9999);

     if (!(isset($name) || isset($email) || isset($phone) ||isset($gender) || isset($passa) || isset($passb))){
        echo "<script>alert('Please Fill in All Required Information !')</script>";
        echo "<script>window.location.replace('/263547_project_fairy_mart/html/register.html')</script>";
    }else if($passa != $passb){
        echo "<script>alert('Password and Confirm Password does not match !')</script>";
        echo "<script>window.location.replace('/263547_project_fairy_mart/html/register.html')</script>";
    }else{
       $sqlregister = "INSERT INTO tbl_user(name,email,phone,gender,password,otp) VALUES('$name','$email','$phone','$gender','$shapass','$otp')";
       try{
           $conn->exec($sqlregister);
           echo "<script> alert('Registration Successful. An email has been sent to your registered email. Please check your email for OTP verification. Also check in your spam folder.')</script>";
           echo "<script> window.location.replace('/263547_project_fairy_mart/php/user/login.php')</script>";
           sendEmail($otp,$email);
       }catch(PDOException $e){
           echo "<script> alert('Registration Failed')</script>";
           echo "<script> window.location.replace('/263547_project_fairy_mart/html/register.html')</script>";
       }
    } 
    function sendEmail($otp,$email){
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0;                                               //Disable verbose debug output
    $mail->isSMTP();                                                    //Send using SMTP
    $mail->Host       = 'mail.doubleksc.com';                          //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                           //Enable SMTP authentication
    $mail->Username   = 'fairy_mart@doubleksc.com';                  //SMTP username
    $mail->Password   = 'AW34086S7M';                                 //SMTP password
    $mail->SMTPSecure = 'tls';         
    $mail->Port       = 587;
    
    $from = "fairy_mart@doubleksc.com";
    $to = $email;
    $subject = "From Fairy Mart. Please Verify Your Account";
    $message = "<p>Click the following link to verify your account<br><br><a href='https://doubleksc.com/263547_project_fairy_mart/php/user/verify_account.php?email=".$email."&key=".$otp."'>Verify My Account</a>";
    
    $mail->setFrom($from,"Fairy Mart");
    $mail->addAddress($to);                                             //Add a recipient
    
    //Content
    $mail->isHTML(true);                                                //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->send();
    }
?>
