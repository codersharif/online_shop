<?php 
   include("../../lib/database.php");
    session_start();

  if (isset($_REQUEST['edit_id'])){
  	 extract($_REQUEST);
  	 $edit_id=$_REQUEST['edit_id'];
  	 // echo $edit_id;
     if ($connect->update("categories","cat_name='$cat_name',cat_status='$cat_status'","cat_id='$edit_id'")) {
         header("location:../catlist.php");	
     }
     else{
        $_SESSION['msg']="Category Edit Fail!";
     	header("location:../category_edit.php");	
     }

  }
?>