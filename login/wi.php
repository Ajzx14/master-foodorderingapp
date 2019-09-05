<!DOCTYPE html>
<html>
<head>
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
    </body>
</html>
<?php
session_start();
require_once 'class.user.php';
include("../config.inc.php");
if(isset($_POST['submit_wi'])){
    
    $fname=$_POST['firstname_wi'];
    $lname=$_POST['lastname_wi'];
    $email=$_POST['email_wi'];
    $mobile=$_POST['mobile-no_wi'];

   if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
    foreach($_SESSION["products"] as $product){ 
    $product_code = $product["product_code"];
    $sql = "INSERT INTO `wi` ". "(id ,fname, lname, mobile, product_code) ". "VALUES('','$fname','$lname', '$mobile', '$product_code')";
               
        $stm_in = $mysqli_conn->query($sql);

    }
   }
    $code = md5(uniqid(rand()));
       $reg_user = new USER();

	$stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	
				
			$id = $reg_user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
			
			$message = "<div style='display:block;border:1.5px solid yellow;padding:50px;text-decoration:justified;background-color:rgba(0,100,0,.3)'>	
            			<h1 style='text-decoration:bold;color:white;font-family: 'Goudy Old Style',Garamond,'Big Caslon','Times New Roman',serif'>Hello $fname $lname</h1>,
						<br /><h4 style='color:yellow;font-family: 'Hoefler Text','Baskerville Old Face',Garamond,'Times New Roman',serif'>
						Welcome to SUBWAY..!<br/><br />
						Dear customer,<br/>
						Thankyou for using our service,
                        Your order has been confirmed Enjoy..; 
                        <br />
						Thanks,</h4></div>";
						
			$subject = "Confirm Order";
						
			$reg_user->send_mail($email,$message,$subject);	
			$msg = "
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong>  We've sent an email to $email.
                    Please click on the confirmation link in the email to create your account. 
			  		</div>
					";
		
    header("location:../paypal/products.php");
}

?>