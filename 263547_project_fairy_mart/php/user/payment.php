<?php
   $email = $_GET["email"];
   $name = $_GET["name"];
   $phone = $_GET["phone"];
   $pickup = $_GET['pickup'];
   $remarks = $_GET['remarks'];
   $amount = $_GET['price'];

   $api_key = '2b9692e3-44a8-4bff-8467-b66c2d7b69a4';
   $collection_id = '3hkdwrlg';
   $host = 'https://billplz-staging.herokuapp.com/api/v3/bills';

   $data = array(
       'collection_id' => $collection_id,
       'email' => $email,
       'mobile' => $mobile,
       'name' => $name,
       'amount' => $amount * 100, // RM20
       'description' => 'Payment for order',
       'callback_url' => "http://doubleksc.com/263547_project_fairy_mart/php/user/main_page.php",
       'redirect_url' => "http://doubleksc.com/263547_project_fairy_mart/php/user/payment_update.php?email=$email&name=$name&phone=$phone&remarks=$remarks&amount=$amount"
   );
   $process = curl_init($host);
   curl_setopt($process, CURLOPT_HEADER, 0);
   curl_setopt($process, CURLOPT_USERPWD, $api_key . ":");
   curl_setopt($process, CURLOPT_TIMEOUT, 30);
   curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($process, CURLOPT_SSL_VERIFYHOST, 0);
   curl_setopt($process, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($process, CURLOPT_POSTFIELDS, http_build_query($data));

   $return = curl_exec($process);
   curl_close($process);

   $bill = json_decode($return, true);

   header("Location: {$bill['url']}");
?>