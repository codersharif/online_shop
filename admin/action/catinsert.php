<?php 
  include("../../lib/database.php"); 
  session_start();

  if (isset($_REQUEST['submit'])){
  	  extract($_REQUEST);
  	  if ( $connect->insert("categories","cat_name='$cat_name',cat_status='$cat_status'")){
          $_SESSION['msg']="Category Add Successfull";
  	     header("location:../catadd.php");	
  	  }
  	  else{
  	  	 $_SESSION['msg']="Category Add Fail!";
  	     header("location:../catadd.php");
  	  }
  }

 ?>