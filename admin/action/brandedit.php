<?php 
   include("../../lib/database.php");
    session_start();

  if (isset($_REQUEST['edit_id'])){
  	 extract($_REQUEST);
  	 $edit_id=$_REQUEST['edit_id'];
  	 // echo $edit_id;
     if ($connect->update("shop_brand","brand_name='$brand_name'","brand_id='$edit_id'")){
         header("location:../brandlist.php");	
     }
     else{
        $_SESSION['msg']="Brand Update Fail!";
     	header("location:../brand_edit.php");	
     }

  }
?>