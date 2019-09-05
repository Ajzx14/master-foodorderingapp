<?php
session_start(); //start session
include("config.inc.php"); //include config file
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>SUBWAY at your home</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } 
</script>
<!--// Meta tag Keywords -->
<!-- css files -->
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
<link href="css/style_cart.css" rel="stylesheet" type="text/css">	
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script>
$(document).ready(function(){	
		$(".form-item").submit(function(e){
			var form_data = $(this).serialize();
			var button_content = $(this).find('button[type=submit]');
			button_content.html('Adding...'); //Loading button text 

			$.ajax({ //make ajax request to cart_process.php
				url: "cart_process_nv.php",
				type: "POST",
				dataType:"json", //expect json value from server
				data: form_data
			}).done(function(data){ //on Ajax success
				$("#cart-info").html(data.items); //total items in cart-info element
				button_content.html('Add another'); //reset button text to original text
				alert("Item added to Cart!"); //alert user
				if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
					$(".cart-box").trigger( "click" ); //trigger click to update the cart box.
				}
			})
			e.preventDefault();
		});

	//Show Items in Cart
	$( ".cart-box").click(function(e) { //when user clicks on cart box
		e.preventDefault(); 
		$(".shopping-cart-box").fadeIn(); //display cart box
		$("#shopping-cart-results").html('<img src="images/ajax-loader.gif">'); //show loading image
		$("#shopping-cart-results" ).load( "cart_process_nv.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
	});
	
	//Close Cart
	$( ".close-shopping-cart-box").click(function(e){ //user click on cart box close link
		e.preventDefault(); 
		$(".shopping-cart-box").fadeOut(); //close cart-box
	});
	
	//Remove items from cart
	$("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
		e.preventDefault(); 
		var pcode = $(this).attr("data-code"); //get product code
		$(this).parent().fadeOut(); //remove item element from box
		$.getJSON( "cart_process_nv.php", {"remove_code":pcode} , function(data){ //get Item count from Server
			$("#cart-info").html(data.items); //update Item count in cart-info
			$(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
		});
	});

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

<!-- //js -->
</head>
<body>
<div class="se-pre-con"></div>
    <div class="header">
	<div style="background:rgba(0,0,0,0.8)">
		<div class="logo" style="padding-left:20px">
			<a href="index.html"><img src="images/subway/logo_subway_v30.png"></a>
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
								<li><a href="index.html"><span>Home</span></a></li> 
								<li><a href="index.html" class="scroll"><span>About</span></a></li> 
								<li><a href="veg.php"><span>vegians</span></a></li> 
								<li><a href="#"><span>Non-vegians</span></a></li> 
								<li><a href="#" class="scroll"><span>Offers</span></a></li> 
								<li><a href="index.html" class="scroll"><span>Contact Us</span></a></li> 
							 <li style="padding-left:450px"><abbr>Coming Soon<a href="#"><span>my old meal</span></a></abbr></li>
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
<!--main-content-->
<div class="clearfix"> </div>	
<!--php--><div>
    <h3 class="title">SUB for Non-Vegians</h3>
<a href="#" class="cart-box" id="cart-info" title="View Cart">
          <span class="glyphicon glyphicon-gift"></span>          
<?php 
if(isset($_SESSION["products"])){
	echo count($_SESSION["products"]); 
}else{
	echo 0; 
}
?>
</a>

<div class="shopping-cart-box">
<a href="#" class="close-shopping-cart-box" >Close</a>
<h3>Your Shopping Cart</h3>
    <div id="shopping-cart-results">
    </div>
</div>
    </div>
<div class="team-page" id="team">
<?php
//List products from database
$results = $mysqli_conn->query("SELECT product_name, product_desc, product_code, product_image, product_price FROM product_list_nv");
//Display fetched records as you please
if (!$results) {
    throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
}
$products_list =  '<div class="container">';

while($row = $results->fetch_assoc()) {
$products_list .= <<<EOT


<div class="col-md-4 about-poleft t1" style="margin-top:30px">
<form class="form-item">
            <div class="about_img"><img src="images/subway/{$row["product_image"]}" alt="">
              <h5>{$row["product_name"]}</h5>
              <div class="about_opa">
				<p>Price : {$currency} {$row["product_price"]}</p>
                
<div align="center" style="padding-top4px">
    Bread :
    <select name="product_color" style="width:200px">
    <option value="Whole Weat">Whole Weat</option>
    <option value="Hony oat">Hony oat</option>
    <option value="Italian">Italian</option>
    <option value="Italian corn">Italian corn</option>
    <option value="Oregano">Oregano</option>
    <option value="Garlic">Garlic</option>
    </select></div><br/>
	<div align="center">
    Size :
    <select name="product_size" style="width:200px">
	<option value="Hony musterd">Hony musterd</option>
    <option value="Sweet onion">Sweet onion</option>
    <option value="Mayonise">Mayonise</option>
    <option value="Olive oil blend">Olive oil blend</option>
    <option value="BBQ">BBQ</option>
    <option value="Chilli">Chilli</option>
    
    </select>
	</div><br/>
    <div align="center" style="padding-top4px">
    Qty :
    <select name="product_qty" style="width:200px">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    </select>
	</div><br/>
    <input name="product_code" type="hidden" value="{$row["product_code"]}">
    <button type="submit" class="btn btn-warning btn-block">To SUBs</button>
    </div>
            </div>
</form>
</div>

EOT;

}
$products_list .= '</div>';

echo $products_list;
?>
</div>
    
    
<!---->
<!-- team -->

	
		
<!-- //team -->
<!-- footer-->
	<div class="footer">
		<div class="container"><div class="w3agile_footer_copy">
				<p>© 2016 Internal. All rights reserved | Design by PATELS</p>
			</div></div>
	</div>
		<!--
			<div class="w3agile_footer_copy">
				<p>© 2016 Internal. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts.</a></p>
			</div>
		</div>
	</div>
<!-- //footer -->


<!-- js files -->
	<!-- Starts-Number-Scroller-Animation-JavaScript -->
					<script src="js/waypoints.min.js"></script> 
					<script src="js/counterup.min.js"></script> 
					<script>
						jQuery(document).ready(function( $ ) {
							$('.counter').counterUp({
								delay: 20,
								time: 3000
							});
						});
					</script>
				
		
		
	<!-- js -->
	<script src="js/lightbox-plus-jquery.min.js"> </script>
		<link rel="stylesheet" href="css/lightbox.css">
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- //js -->

	 <script src="js/responsiveslides.min.js"></script>
	 <script>
		// You can also use "$(window).load(function() {"
		$(function () {
		  $("#slider").responsiveSlides({
			auto: true,
			manualControls: '#slider3-pager',
		  });
		});
	  </script>

  
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->

	<!-- //js files -->


	<!-- bottom-top -->
	<!-- smooth scrolling -->
		<script type="text/javascript">
			$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/								
			$().UItoTop({ easingType: 'easeOutQuart' });
			});
		</script>
		<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- //smooth scrolling -->
	<!--// bottom-top -->


</body>
</html>