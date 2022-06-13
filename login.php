<?php
include("inc/header.php");
?>
<?php
 if (isset($_SESSION['cuslogin']) == true){
  	header("location:order.php");
  } 

 ?>
<?php 
if (isset($_REQUEST['login'])){
	extract($_REQUEST);
	$password=md5($password);
	if (empty($email) || empty($password)){
	   $field="Fields must not be empty !";
	}
	else{

	if ($connect->selectbyid("user","*","email='$email' AND password='$password'") !=false){
        //custromaer login sectiion
        $custromer_info=$connect->selectbyid("user","*","email='$email' AND password='$password'");
		$_SESSION['cuslogin']=true;
		$_SESSION['cmrid']=$custromer_info['user_id'];
		$_SESSION['cmrname']=$custromer_info['user_name'];
		header("location:order.php");
		
	}
	else{
		$msg="E-mail or Password don\'t match!";
		echo alert::msg($msg);

	}
}

}

?>
<div class="main">
	<div class="content">
		<div class="login_panel">
			<h3>Existing Users</h3>
			<h4 style="color: red;"><?=@$field?></h4>
			<form action="" method="post">
				<input type="email" name="email" placeholder="E-mail">
				<input type="password" name="password" placeholder="******" ">
				<!-- <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p> -->
				<div class="buttons"><div><button type="submit" name="login" class="grey">Sign In</button></div></div>

			</form>
			
		</div>

		<!--    user register  -->
		<div class="register_account">
			<h3>Register New Account</h3>
			 <h3><?php
			   echo message::msg();
			 ?></h3>
			<form action="userprocess.php" method="post">
				<table>
					<tbody>
						<tr>
							<td>
								<div>
									<input type="text" name="username" placeholder="Enter your name">
								</div>
								<div>
									<input type="text" name="address" placeholder="Address">
								</div>
								
								<div>
									<input type="text" name="city" placeholder="City">
								</div>
								<div>
									<input type="text" name="country" placeholder="country">
								</div>
							</td>
							<td>
								
								<div>
									<input type="text" name="zipcode" placeholder="Zip-code">
								</div>
								<div>
									<input type="email" name="email" placeholder="example@mail.com" >
								</div>
								
								<div>
									<input type="text" name="mobile" placeholder="Phone">
								</div>
								
								<div>
									<input type="password" name="password" placeholder="******">
								</div>
							</td>
						</tr>
					</tbody></table>
					<div class="search"><div><button type="submit" name="submit" class="grey">Create Account</button></div></div>
					<div class="clear"></div>
				</form>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<?php
include("inc/footer.php");
?>