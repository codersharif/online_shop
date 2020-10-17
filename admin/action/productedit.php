<?php 
include("../../lib/database.php");
session_start();

if (isset($_REQUEST['update'])){
	extract($_REQUEST);
	// file upload valadation::::::::
	$extention=['jpg','jpeg','png','gif'];
    $path="img/";
    $file_name=$_FILES['image']['name'];
    $file_size=$_FILES['image']['size'];
    $tmp_name=$_FILES['image']['tmp_name'];
  
  //unik id set
    $div=explode('.',$file_name);
    $file_txt=strtolower(end($div));
    $unick_img=substr(md5(time()),0,10).'.'.$file_txt;
    $upload_img=$path.$unick_img;

	if(move_uploaded_file($tmp_name, $upload_img)){
		 if($file_size > 2097152) {
        $_SESSION['msg']="Plese Select Image Less Then 2mb ?";
        header("location:../productlist.php"); 
    }elseif (in_array($file_txt, $extention) === false){
        $_SESSION['msg']="You Can Upload Only ".implode(',', $extention)." Formate File ?";
        header("location:../productlist.php"); 
    }
	elseif ( $connect->update("product","product_name='$product_name',cat_id='$cat_id',brand_id='$brand_id',body='$body',price='$price',image='$upload_img',type='$type'","product_id='$edit_id'")){
          $_SESSION['msg']="Product Update Successfully";
	      header("location:../productlist.php");	
	 }
  	  else{
  	  	 $_SESSION['msg']="Product Update Fail!";
  	     header("location:../productlist.php");
  	  }

    }
    else{
         $connect->update("product","product_name='$product_name',cat_id='$cat_id',brand_id='$brand_id',body='$body',price='$price',type='$type'","product_id='$edit_id'");

          $_SESSION['msg']="Product Update Successfully";
	      header("location:../productlist.php");
 
    }


	}
 ?>

