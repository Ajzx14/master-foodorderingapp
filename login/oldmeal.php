<?php
session_start();
include ('../config.inc.php');
require_once 'class.user.php';
$user_home = new USER();

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$email = $row['userEmail']; 

$stm_tb = $mysqli_conn->query("CREATE TABLE IF NOT EXISTS `$email` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_qty` int(50) NOT NULL,
  `product_color` varchar(50) NOT NULL,
  `product_size` varchar(50) NOT NULL,
  `product_prize` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
");

if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
	foreach($_SESSION["products"] as $product){ //Print each item, quantity and price.
		$product_name = $product["product_name"];
		$product_qty = $product["product_qty"];
		$product_price = $product["product_price"];
		$product_code = $product["product_code"];
		$product_color = $product["product_color"];
		$product_size = $product["product_size"];
		$subtotal 		= ($product_price * $product_qty); //Multiply item quantity * price
		$total 			= ($total + $subtotal); //Add up to total price
	    $sql = "INSERT INTO `$email` ". "(id ,product_name, product_code, product_qty, product_color, product_size, product_prize) ". "VALUES('','$product_name','$product_code', '$product_qty', '$product_color', '$product_size', '$product_price')";
               
        $stm_in = $mysqli_conn->query($sql);
    }
    header("location:selection.php");
}
    
else{
	echo "Your Cart is empty";
}


?>