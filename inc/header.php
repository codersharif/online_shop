<?php
include("lib/database.php");
include("lib/session.php");
include("lib/cart.php");
include("lib/productclass.php");
include("helpers/msg_alert.php");
include("helpers/format.php");
session_start();
 ?>
<!DOCTYPE HTML>
<head>
	<title>Store Website</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
	<script src="js/jquerymain.js"></script>
	<script src="js/script.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/nav.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript" src="js/nav-hover.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
	<script type="text/javascript">
	$(document).ready(function($){
	$('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
	});
	</script>
</head>
<body>
	<div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			<div class="header_top_right">
				<div class="search_box">
					<form action="search.php" method="post">
						<!-- <input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"> -->
						<input type="text" name="search" placeholder="search for Products">
						<input type="submit" name="submit" value="SEARCH">
					</form>
				</div>
				<div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
							<span class="cart_title">Cart</span>
							<span class="no_product">
								<?php
								  $sid=session_id();
					              $cart_data=$connect_cart->selectallcart("cart_tbl","*","session_id='$sid'"); 
					              if ($cart_data){
                                  if (isset($_SESSION['sum'])){
                                  	echo "$ ".$_SESSION['sum']." | Qty:".$_SESSION['qty'];

                                  }

	                              }
	                              else{
	                              	echo "(Empty)";
	                              }

								 ?>


							</span>
						</a>
					</div>
				</div>
				<?php
				// login logout section:::::::::::::::;;;
				if (isset($_SESSION['cuslogin']) == true){
				?>
				<!-- <div class="login"><a href="order.php?action=logout">Logout</a></div> -->
					<div class="login"><a href="order.php?cmrlogout=<?php $_SESSION['cmrid'];?>">Logout</a></div>

				 <?php  
				 }else{ ?>

				 	<div class="login"><a href="login.php">Login</a></div>
				 
				 <?php
				 }
				 ?>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="menu">
			<ul id="dc_mega-menu-orange" class="dc_mm-orange">
				<li><a href="index.php">Home</a></li>
				<li><a href="topbrands.php">Top Brands</a></li>
              <!-- cart check:::::::::::::::: -->
				<?php
				 $sid=session_id();
				 if ($connect->selectbyid("cart_tbl","*","session_id='$sid'")) { ?>
				 	<li><a href="cart.php">Cart</a></li>
				 	<li><a href="payment.php">Payment</a></li>
				 <?php			
				  } 
				 ?>
				 <!-- order detials check -->
				 <?php
				 if (isset($_SESSION['cmrid'])){
				
				  $cmrid=$_SESSION['cmrid'];
                  $check=$connect->selectbyid("order_tbl","*","user_id='$cmrid'");
                  if ($check){?>
                 <li><a href="orderdetials.php">order detials</a></li>
	             <?php } } ?>
			 <!-- //profile:::::::check -->
				<?php
				  if (isset($_SESSION['cuslogin'])) { ?>
				 <li><a href="profile.php">Profile</a></li>
				 <?php
				   } 
				 ?>

               <!-- compare -->
				  <?php
				 if(isset($_SESSION['cmrid'])){ 
                  $checkcompare=$connect->selectallbytype("compare","*","user_id='$cmrid'");
                  if ($checkcompare) { ?>

                  <li><a href="compare.php">Compare</a> </li>
                  <?php }} ?>
                  <!-- compare -->
                 <!-- wishlish -->
                 <?php
				 if(isset($_SESSION['cmrid'])){ 
                  $check=$connect->selectallorder("wlist_tbl","*","user_id='$cmrid'","w_id");
                  if ($check) { ?>

                  <li><a href="wishlist.php">Wish List</a> </li>
                  <?php }} ?>
              
				<li><a href="contact.php">Contact</a> </li>
				<div class="clear"></div>
			</ul>
		</div>