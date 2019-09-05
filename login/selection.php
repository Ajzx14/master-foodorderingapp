<?php 
session_start();
require_once 'class.user.php';
$user_home = new USER();

if($user_home->is_logged_in())
{
$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  <link href="../css/style.css" rel="stylesheet" type="text/css" media="all">-->
      <link href="assets/sec_style.css" rel="stylesheet" type="text/css" media="all">
<link href="//fonts.googleapis.com/css?family=Gudea:400,400i,700&subset=latin-ext" rel="stylesheet">
<!--// online-fonts -->
<!-- js -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    body{
        background-image: url(images/blur_bg.jpg);
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
 <div class="container">
<div class="logo" style="padding-left:20px;text-align:center">
			<a><img src="../images/subway/logo_subway_v30.png"></a>
            <div style="margin-left:75%"></div>
		</div>
     <h2>SUBWAY</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">WALK-IN</a></li>
    <li><a data-toggle="tab" href="#menu1">HOME-DELIVERY</a></li>
    
  </ul>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Walk In</h3>
      <div class="form">
        <form method="post" action="wi.php">
            <div><p>First-Name:</p>
            <input type="text" placeholder="Firstname" name="firstname_wi" required><br/>
            </div>
            <div>
            <p>Last-Name:</p>
            <input type="text" placeholder="Lastname" name="lastname_wi" required/><br/>
            </div>
            <div>
            <p>Email Id</p>
            <input type="email" placeholder="Mail Id" name="email_wi" required/><br/>
            </div>
            <div>
            <p>Mobile-Number:</p>
            <input type="number" placeholder="Mobile number" name="mobile-no_wi" required/><br/>
            </div>
            <input type="submit" value="Proceed" name="submit_wi"/>
        </form></div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Home Delivery</h3>
      <div class="form">
        <form method="post" action="hd.php">
            <p>First-Name:</p>
            <input type="text" placeholder="Firstname" name="firstname" required><br/>
            <p>Last-Name:</p>
            <input type="text" placeholder="Lastname" name="lastname" required/><br/>
            <p>Address:</p>
            <input type="text" placeholder="Address" name="address" required/><br/>
            <p>Email Id</p>
            <input type="email" placeholder="Mail Id" name="email" required/><br/>
            <p>Mobile-Number:</p>
            <input type="number" value="Mobile number" name="mobile-no" required/><br/>
            <input type="submit" value="Proceed" name="submit"/>
        </form></div>
    </div></div>
    
  
</div>

</body>
</html>
