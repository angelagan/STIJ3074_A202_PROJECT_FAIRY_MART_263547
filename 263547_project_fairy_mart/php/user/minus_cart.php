<?php
include_once('dbconnect.php');
$prid = $_GET['prid'];
$qty = $_GET['qty'];

$conn = mysqli_connect("localhost","doubleks_fairy_martadmin","E8OMX979P9") or die("Unable to connect");
  mysqli_select_db($conn,"doubleks_fairy_mart"); 
  if ($qty == 1) {
    echo "<script>alert('Minimum Quanitity')</script>";
    echo "<script> window.location.replace('cart.php')</script>";
  }
  else{
  $sqlupdatecart = "UPDATE tbl_cart SET qty = qty -1 WHERE prid = $prid";
  $result = mysqli_query($conn,$sqlupdatecart);

if($result){
    
    echo "<script> window.location.replace('cart.php')</script>";
}
else{
    echo "<script>alert('Add Failed')</script>";
    echo "<script> window.location.replace('cart.php')</script>";
}
  }

?>