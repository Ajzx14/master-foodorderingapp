<?php
session_start();
include("../config.inc.php");
setlocale(LC_MONETARY,"en_US"); // US national format (see : http://php.net/money_format)
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
	$user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title><?php echo $row['userEmail']; ?></title>
        <!-- Bootstrap -->
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<!-- //css files -->
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Gudea:400,400i,700&subset=latin-ext" rel="stylesheet">
<!--// online-fonts -->
<!-- js -->
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-3.1.1.min.js"></script>
<script type="text/javascript" src="../js/ex.js"></script>
<link href="../css/style_cart.css" rel="stylesheet" type="text/css">	
<script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
<script>
$(document).ready(function(){	
		$(".save").submit(function(e){
			var form_data = $(this).serialize();
			var button_content = $(this).find('button[type=submit]');
			button_content.html('Saving...'); //Loading button text 

			$.ajax({ //make ajax request to cart_process.php
				url: "oldmeal.php",
				type: "POST",
				dataType:"json", //expect json value from server
				data: form_data
			}).done(function(data){ //on Ajax success
				$("#cart-info").html(data.items); //total items in cart-info element
				button_content.html('Saved');
                button_content.css("disable")//reset button text to original text
				alert("Item added to Cart!"); //alert user
				if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
					$(".cart-box").trigger( "click" ); //trigger click to update the cart box.
				}
			})
			e.preventDefault();
		});
        </script>
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
            <div class="header">
	<div style="background:rgba(0,0,0,0.8)">
		<div class="logo" style="padding-left:20px">
			<a><h1><label>S</label>ubway<?php echo $row['userName'];?></h1></a>
            <div style="margin-left:75%"></div>
		</div>
		<!-- navigation -->
		<div class="top-left">
			<div class="top-icons">
			</div>
			<div class="top-nav">
				<nav class="navbar navbar-default">
					<div class="navbar-header">
						
								
					</div>
					<!-- navbar-header -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						 <nav class="linkEffects linkHoverEffect_12">
							<ul style="padding-left:20px">
								<li><a href="logout.php"><span>Log Out</span></a></li>
                             </ul>
						</nav>
					</div>
					<div class="clearfix"> </div>	
				</nav>
			</div>
			<div class="clearfix"> </div>	
			
			<!-- //navigation -->
		</div>
	</div>
	
</div>
<div class="save">
    <h3 style="text-align:center">Review Your Cart Before Saving</h3>
<?php
if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
	$total 			= 0;
	$list_tax 		= '';
	$cart_box 		= '<ul class="view-cart">';

	foreach($_SESSION["products"] as $product){ //Print each item, quantity and price.
		$product_name = $product["product_name"];
		$product_qty = $product["product_qty"];
		$product_price = $product["product_price"];
		$product_code = $product["product_code"];
		$product_color = $product["product_color"];
		$product_size = $product["product_size"];
		
		$item_price 	= sprintf("%01.2f",($product_price * $product_qty));  // price x qty = total item price
		
		$cart_box 		.=  "<li> $product_code &ndash;  $product_name (Qty : $product_qty | $product_color | $product_size) <span> $currency. $item_price </span></li>";
		
		$subtotal 		= ($product_price * $product_qty); //Multiply item quantity * price
		$total 			= ($total + $subtotal); //Add up to total price
	}
	
	$grand_total = $total + $shipping_cost; //grand total
	
	foreach($taxes as $key => $value){ //list and calculate all taxes in array
			$tax_amount 	= round($total * ($value / 100));
			$tax_item[$key] = $tax_amount;
			$grand_total 	= $grand_total + $tax_amount; 
	}
	
	foreach($tax_item as $key => $value){ //taxes List
		$list_tax .= $key. ' '. $currency. sprintf("%01.2f", $value).'<br />';
	}
	
	$shipping_cost = ($shipping_cost)?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':'';
	
	//Print Shipping, VAT and Total
	$cart_box .= "<li class=\"view-cart-total\">$shipping_cost  $list_tax <hr>Payable Amount : $currency ".sprintf("%01.2f", $grand_total)."</li>";
	$cart_box .= "</ul>";
	
	echo $cart_box;
}else{
	echo "Your Cart is empty";
}
?>
    <a href="oldmeal.php" type="submit" class="cart-box">Save</a>
</div>
    </body>

</html>




