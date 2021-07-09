<?php
error_reporting(0);
include_once("dbconnect.php");
$email = $_GET['email'];
$mobile = $_GET['mobile'];
$amount = $_GET['amount'];
$remarks = $_GET['remarks'];

$data = array(
    'id' =>  $_GET['billplz']['id'],
    'paid_at' => $_GET['billplz']['paid_at'] ,
    'paid' => $_GET['billplz']['paid'],
    'x_signature' => $_GET['billplz']['x_signature']
);

$paidstatus = $_GET['billplz']['paid'];

if ($paidstatus=="true"){
  $receiptid = $_GET['billplz']['id'];
  $signing = '';
    foreach ($data as $key => $value) {
        $signing.= 'billplz'.$key . $value;
        if ($key === 'paid') {
            break;
        } else {
            $signing .= '|';
        }
    }
    
    $signed= hash_hmac('sha256', $signing, 'S-gPqA9CDF8FTTg3UgdA1ISw');
    if ($signed === $data['x_signature']) {
        

    }
    $sqlinsertpurchased = "INSERT INTO tbl_paid(receiptid,email,paid_amount,remarks,status) VALUES('$receiptid','$email', '$amount','$remarks','paid')";
    $sqldeletecart = "DELETE FROM tbl_cart WHERE email='$email'";

    if ($conn->exec($sqlinsertpurchased) && $conn->exec($sqldeletecart)) {
        echo "<script>alert('Payment Successful')</script>";
        echo'  <br><br><body><div><h2><br><br><center>Your Receipt</center>
        </h1>
        <table border=1 width=80% align=center>
        <tr><td>Receipt ID</td><td>'.$receiptid.'</td></tr>
        <tr><td>Email to </td><td>'.$email. ' </td></tr>
        <td>Amount </td><td>RM ' .number_format($amount, 2). '</td></tr>
        <tr><td>Payment Remarks</td><td>'.$remarks.'</td></tr>
        <tr><td>Payment Status </td><td>Paid</td></tr>
        <tr><td>Payment Date </td><td>'.date("d/m/Y").'</td></tr>
        <tr><td>Payment Time </td><td>'.date("h:i a").'</td></tr>
        </table><br>
        <p><center><a href="https://doubleksc.com/263547_project_fairy_mart/php/user/main_page.php" >Press Back Button To Return To Fairy Mart Main Page</a></center></p></div></body>';
    }
      
}
else{
     echo "<script>alert('Payment Failed')</script>";
     echo "<script>window.location.replace('/263547_project_fairy_mart/php/user/cart.php')</script>";
}
?>