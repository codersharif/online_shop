<?php 
include("../../lib/database.php");
session_start();

if (isset($_REQUEST['submit'])) {
	extract($_REQUEST);
	  if ( $connect->insert("shop_brand","brand_name='$brand_name'")){
          $_SESSION['msg']="Brand Add Successfully";
  	      header("location:../brandadd.php");	
  	  }
  	  else{
  	  	 $_SESSION['msg']="Brand Add Fail!";
  	     header("location:../catadd.php");
  	  }

	}
 ?>