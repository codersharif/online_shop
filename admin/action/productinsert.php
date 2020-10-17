<?php 
include("../../lib/database.php");
session_start();

if (isset($_REQUEST['submit'])){
	  extract($_REQUEST);
    
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

    if (empty($file_name)){
        $_SESSION['msg']="Please Select Any Image?";
        header("location:../productadd.php"); 
    // byte decler =2097152 byte =2mb    
    }elseif ($file_size > 2097152) {
        $_SESSION['msg']="Plese Select Image Less Then 2mb ?";
        header("location:../productadd.php"); 
    }elseif (in_array($file_txt, $extention) === false){
        $_SESSION['msg']="You Can Upload Only ".implode(',', $extention)." Formate File ?";
        header("location:../productadd.php"); 
    }
    else{
      if (move_uploaded_file($tmp_name,$upload_img)){
          $connect->insert("product","product_name='$product_name',cat_id='$cat_id',brand_id='$brand_id',body='$body',price='$price',image='$upload_img',type='$type'");
         $_SESSION['msg']="Product Add Successfully";
         header("location:../productadd.php");
      
      }
      else{
         $_SESSION['msg']="Product Add Fail!";
         header("location:../productadd.php");
      }
    

  }

	}











/*    if ($move){
        if ( $connect->insert("product","product_name='$product_name',cat_id='$cat_id',brand_id='$brand_id',body='$body',price='$price',image='$path',type='$type'")){
          $_SESSION['msg']="Product Add Successfully";
        header("location:../productadd.php"); 
   }
      else{
         $_SESSION['msg']="Product Add Fail!";
         header("location:../productadd.php");
      }

    }*/
 ?>

