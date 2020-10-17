 <?php
include("../classes/adminlogin.php");
include("../helpers/msg_alert.php");
session_start();

  
    if (isset($_SESSION['admin_name'])) {
       header("location:dashboard.php");     
    }


?>
<?php
  if(isset($_REQUEST['submit'])){
   	  extract($_REQUEST);
      $password1=md5($password);
      if($login_obj->admin_login("admin_table","*","email='$email' AND password='$password1'") !=false){
      	  if (isset($_REQUEST['remember'])){
      	  	 setcookie('email',$email,time()+3600);
      	  	 setcookie('password',$password,time()+3600);
      	  }

      	  $admin_info=$login_obj->admin_login("admin_table","*","email='$email' AND password='$password1'");

      	  $_SESSION['admin_name']=$admin_info['admin_name'];
          header("location:dashboard.php");
          
      }
      else{
      /*	 echo "<script>";
      	 echo "alert('no match')";
      	 echo "</script>";*/
      	  $msg="Email & Password don\'t match";
      	 echo  alert::msg($msg);
      }
     
   }  

 
 ?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />

    <style type="text/css">
    	.p{
    		color:#666;
    		margin-left: 100px;
    		margin-right: 100px;
    	}
    	
    </style>
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="email" placeholder="example@info.com" required="" name="email" value="<?=isset($_COOKIE['email'])?$_COOKIE['email']:'';?>" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password" value="<?=isset($_COOKIE['password'])?$_COOKIE['password']:'';?>"/>
			</div>
			<div>
				<p class="p"><input type="checkbox" name="remember" value="yes" />REMEMBER ME</p>
			</div>
			<div>
				<input type="submit" name="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">codersharif</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>