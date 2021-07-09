<?php
include_once('dbconnect.php');

$conn = mysqli_connect("localhost","doubleks_fairy_martadmin","E8OMX979P9") or die("Unable to connect");
mysqli_select_db($conn,"doubleks_fairy_mart");

$sql="DELETE FROM tbl_products WHERE prid='$_GET[prid]'";
$result = mysqli_query($conn,$sql);

if($result){
echo '<script type="text/javascript"> alert("Delete Successful")</script>';
header("refresh:1; url=/263547_project_fairy_mart/php/admin/main_page_admin.php");
}
else{
echo "Error";
}
?> 