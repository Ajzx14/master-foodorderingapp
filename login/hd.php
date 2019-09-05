<?php
session_start();
require_once 'class.user.php';
include("../config.inc.php");
if(isset($_POST['submit'])){
    
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile-no'];
    $address=$_POST['address'];
   if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
    foreach($_SESSION["products"] as $product){ 
    $product_code = $product["product_code"];
    $sql = "INSERT INTO `hd` ". "(id ,fname, lname, mobile, address, product_code) ". "VALUES('','$fname','$lname', '$mobile','$address' , '$product_code')";
               
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
                        Your order has been confirmed and it will be soon at:<br />$address ;
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





