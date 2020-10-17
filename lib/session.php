<?php 
 class message{
 	public static function msg(){
 	  if (isset($_SESSION['msg'])){
        $output=$_SESSION['msg'];
        $_SESSION['msg']=NULL;
        return $output;

    }

 	}
 }
 
 

 ?>