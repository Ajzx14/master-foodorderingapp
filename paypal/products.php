<?php
session_start();
include ("../config.inc.php");
include 'db_config.php';

//Set useful variables for paypal form
$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypal_id = 'info@codexworld.com'; //Business Email
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all">
      <link href="assets/sec_style.css" rel="stylesheet" type="text/css" media="all">
<link href="//fonts.googleapis.com/css?family=Gudea:400,400i,700&subset=latin-ext" rel="stylesheet">
<title>Products - CodexWorld</title>
    <style>
        body{
        background-image: url(../login/images/blur_bg.jpg);
    }
      
        .buy{
            align-content: center;
            padding: 20px;
            margin: 20px;
            margin-left: 40%;
            width: 200px;
            height: 200px;
            border: 2px solid rgba(255,0,0,.6);
            font-family: cursive;
            color: white;
            font-size: 17px;
            margin-top: 50px;
            box-shadow: 0 5px 10px 0 rgba(0,0,0,.5);
        }
        .buy:hover{
            border: 2px solid black;
            box-shadow: 0 5px 10px 0 rgba(0,0,0,.5);
        }
    </style>
    <style>
    .no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(images/Preloader_1.gif) center no-repeat #fff;
}
    </style>
<!-- //js -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>


	<script>$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});</script>

</head>
<body>
     <div class="se-pre-con"></div>
    <div class="logo" style="padding-right:40px;text-align:center">
			<a><img src="../images/subway/logo_subway_v30.png"></a>
            <div style="margin-left:10%"></div>
		</div>
	<?php
    if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
	$total 			= 0;
	$list_tax 		= '';
	

	foreach($_SESSION["products"] as $product){ //Print each item, quantity and price.
		$product_name = $product["product_name"];
		$product_qty = $product["product_qty"];
		$product_price = $product["product_price"];
		$product_code = $product["product_code"];
		$product_color = $product["product_color"];
		$product_size = $product["product_size"];
		$subtotal 		= ($product_price * $product_qty); //Multiply item quantity * price
		$total 			= ($total + $subtotal); //Add up to total price
	}
	
	$grand_total = $total + $shipping_cost; //grand total
	
	foreach($taxes as $key => $value){ //list and calculate all taxes in array
			$tax_amount 	= round($total * ($value / 100));
			$tax_item[$key] = $tax_amount;
			$grand_total 	= $grand_total + $tax_amount; 
	}
    $code = rand(100,999);    
    }	//fetch products from the database
	?>
    <div class="form"><div class="buy">
    <p><br/>Name: <?php echo "SUBWAY" ?></p>
    <p><br/>Price: <?php echo $grand_total; ?></p></div>
    <form action="<?php echo $paypal_url; ?>" method="post">

        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="Subway">
        <input type="hidden" name="item_number" value="SUb<?php echo $code?>">
        <input type="hidden" name="amount" value="<?php echo $grand_total ?>">
        <input type="hidden" name="currency_code" value="USD">
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='http://localhost/intrnal/paypal/cancel.php'>
		<input type='hidden' name='return' value='http://localhost/internal/paypal/success.php'>

        
        <!-- Display the payment button. -->
        <input type="image" name="submit" border="0"
        src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online" style="margin-left:50%">
        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
    
    </form>
</div>
</body>
</html>
