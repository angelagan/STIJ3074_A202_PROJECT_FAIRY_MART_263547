<?php
session_start();
$email=$_SESSION ["email"];
include_once("dbconnect.php");

$sqlloadcart = "SELECT * FROM tbl_cart INNER JOIN tbl_products ON tbl_cart.prid = tbl_products.prid WHERE tbl_cart.email = '$email'";
$stmt = $conn->prepare($sqlloadcart);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>My Cart</title>
    <link rel="shortcut icon" type="image" href="/263547_project_fairy_mart/images/fairy_mart_logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/263547_project_fairy_mart/css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header">
        <img src="/263547_project_fairy_mart/images/fairy_mart_logo.png" />
        <h1>Fairy Mart</h1>
        <p>We help you in your diet &#128512; </p>
    </div>

    <div class="navbar">
        <a href="/263547_project_fairy_mart/php/user/main_page.php" class="right">Back to Main Page <i class="fa fa-level-up"></i></a>
    </div>

    <div class="row">
        <h3>My Cart</h3>
            <?php
                $sumtotal = 0.0;
                foreach ($rows as $carts) {
                    echo "<div class='column-card'>";
                    $prid = $carts['prid'];
                    $qty = $carts['qty'];
                    $total = 0.0;
                    $total = $carts['prprice'] * $carts['qty'];
                    $imgurl = "/263547_project_fairy_mart/images/".$carts['primage'];
            ?>

        <div class='card'>
            <p align='right' style='margin-top:-5%;'><a href='delete_order.php?prid=<?php echo $carts['prid']; ?>' class='fa fa-remove' onclick='return deleteDialog()' style='text-decoration:none; font-size:18px; color:black'></a></p>
            <img src=<?php echo $imgurl?> class='image'>
            <h2 style="color:black; font-weight:bold; text-align:center; font-size:24px"><?php echo $carts['prname']; ?>  </h3>
            <p align='center' style="color:indigo; font-weight:bold; text-align:center; font-size:18px"> RM <?php echo number_format($carts['prprice'],2) ?> / pack</p>
            <table class='center' style='margin-left:25%;'><tr><td><a href='minus_cart.php?prid=<?php echo $carts['prid'];?>&qty=<?php echo $carts['qty'];?>'><i class='fa fa-minus' style='font-size:18px;color:black'></i></a></td>
            <td style="color:indigo; font-weight: bold; text-align: center; font-size: 18px">&nbsp Qty : <?php echo $carts['qty']; ?></td>
            <td>&nbsp<a href='plus_cart.php?prid=<?php echo $carts['prid'];?>'><i class='fa fa-plus' style='font-size:18px;color:black'></i></a></td></tr></table><br>
            <h2 style="color:darkred; font-weight: bold; text-align: center; font-size: 22px">Total : RM <?php echo number_format($total,2) ?><br>
            </div>
            </div>
            <?php
            $sumtotal = $total + $sumtotal;
        }
        echo "</div>";
        
        echo "<div class='container-src'>
        <h4 style='text-align: center'>Total Price: RM " . number_format($sumtotal, 2) . "</h4></div>";
        ?>
        </div>
         <br><br><br>

        <div class="main1">
            <h2>Payment Form</h2>
            <div class="container">
                <form name="paymentForm" action="/263547_project_fairy_mart/php/user/payment.php" method="get">
                    <div class="row">
                        <div class="col-25">
                            <i class="fa fa-envelope icon"></i>
                            <label for="femail">Your Email</label>&nbsp
                        </div>
                        <div class="col-75">
                            <input type="text" id="idemail" name="email" value="<?php echo $email ?>" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <i class="fa fa-user icon"></i>&nbsp
                            <label for="fname">Your Name</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="idname" name="name" placeholder="Your Name ..." required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            &nbsp<i class="fa fa-phone"></i>&nbsp&nbsp
                            <label for="lphone">Phone Number</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="idphone" name="phone" placeholder="Your Phone ..." required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            &nbsp<i class="fa fa-clock-o"></i>&nbsp
                            <label for="ltime">Pick Up Time</label>
                        </div>
                        <div class="col-75">
                            <input type="time" id="idtime" name="pickup" min="09:00" max="18:00" required>
                        </div>
                    </div>
                    
                    <div class="row">
					    <div class="col-25">
					        <i class="fa fa-pencil icon"></i>
						    <label for="lremarks">Payment Remarks</label>
					    </div>
					    <div class="col-75">
						    <input type="text" id="idremarks" name="remarks" placeholder="Your Remarks ...">
					    </div>
				    </div>
                    <br><br>

                    <input type="hidden" id="idprice" name="price" value="<?php echo $sumtotal ?>">
                    <input type="hidden" id="email" name="email" value="<?php echo $email ?>">
                    <div class="row">
                        <input type="submit" name="button" value="Pay">
                    </div>
                </form>
            </div>
        </div> 
        <br><br><br><br><br><br>

        <div class="footer">
            <footer>&copy; Copyright 2021 Fairy Mart. Design By Angela</footer>
        </div>

    </body>
</html>