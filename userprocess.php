<?php
include("lib/database.php"); 
include("lib/session.php"); 
session_start();


if (isset($_REQUEST['submit'])){
	extract($_REQUEST);
	$password=md5($password);
   
    // email chack database or form 
     $data=$connect->selectbyid("user","*","email='$email'");
	 $value=$data['email'];
	 if ($email == $value){
		$_SESSION['msg']="E-mail Already Exists.";
		header("location:login.php");	
	}
	else{

		if ($connect->insert("user","user_name='$username',address='$address',city='$city',country='$country',zipcode='$zipcode',email='$email',mobile='$mobile',password='$password'")){
		$_SESSION['msg']="User Registration Successfully.";
		header("location:login.php");
		
	}
	else{
		$_SESSION['msg']="User Registration Fail.";
		header("location:login.php");
	}

	} 

}



 ?>