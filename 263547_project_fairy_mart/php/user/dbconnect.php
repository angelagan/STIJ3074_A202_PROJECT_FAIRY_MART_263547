<?php
$servername = "localhost";
$username = "doubleks_fairy_martadmin";
$password = "E8OMX979P9";
$dbname = "doubleks_fairy_mart";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>