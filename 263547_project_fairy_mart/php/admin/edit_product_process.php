<?php
 //echo "EdIT SUCCESS"
 $primage = uniqid() . '.png';
 $prid=$_POST['prid'];
 $prname = $_POST['prname'];
 $prtype = $_POST['prtype'];
 $prprice = $_POST['prprice'];
 $prqty = $_POST['prqty'];

 $conn = mysqli_connect("localhost","doubleks_fairy_martadmin","E8OMX979P9") or die("Unable to connect");
 mysqli_select_db($conn,"doubleks_fairy_mart"); 

//   if (file_exists($_FILES["primage"]["tmp_name"]) || is_uploaded_file($_FILES["primage"]["tmp_name"])){
  $sql="UPDATE tbl_products SET prname='$prname', prtype='$prtype', prprice='$prprice', prqty='$prqty' WHERE prid='$prid'";
//   primage='$primage',

   $result= mysqli_query($conn,$sql) or die(mysqli_error());
   if($result == true){
        // uploadImage($primage);
        echo '<script type="text/javascript"> alert("Edit Sucessful")</script>';
        echo "<script>window.location.replace('/263547_project_fairy_mart/php/admin/main_page_admin.php')</script>";
   }else{
           echo "Error";
   }
//   }

//   function uploadImage($primage)
//   {
//      $target_dir = "/home8/doubleks/public_html/263547_project_fairy_mart/images/";
//      $target_file = $target_dir . $primage;
//      move_uploaded_file($_FILES["primage"]["tmp_name"], $target_file);
//   }
?>