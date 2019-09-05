<?php
session_start(); //start session
include("config.inc.php");
setlocale(LC_MONETARY,"en_US"); // US national format (see : http://php.net/money_format)
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Review Your Cart Before Buying</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<!-- //css files -->
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Gudea:400,400i,700&subset=latin-ext" rel="stylesheet">
<!--// online-fonts -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<script type="text/javascript" src="js/ex.js"></script>
<!-- //js -->

<link href="css/style_cart.css" rel="stylesheet" type="text/css">
    <style>body{
        background: url("../images/subway/blur_bg.jpg") no-repeat;
    }</style>
</head>
<body>
    <div class="logo" style="padding-left:20px;text-align:center">
			<a><img src="images/subway/logo_subway_v30.png"></a>
            <div style="margin-left:75%"></div>
		</div>
<h3 style="text-align:center">Review Your Cart Before Buying</h3>
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
    <a href="#" class="cart-box" data-toggle="modal" data-target="#myModal1">Proceed..</a>
					<div class="modal fade" id="myModal1" role="dialog">
						<div class="modal-dialog">
						<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
						              <h1><img src="images/subway/logo_subway_v30.png"></h1>
                                    <h5>Do You Want to save your meal for future?</h5>
										<span><a href="login/index.php" id="save" class="modal_btn">YES</a><a href="login/selection.php" id="n_save" class="modal_btn" >NO</a></span>
                                    </div>
							</div>
						</div>
					</div>
                    
    </body>
</html>