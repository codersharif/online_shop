<?php
 class alert{
 	public static function msg($msg){
       $output ="<script>";
       $output .="alert('$msg')";
       $output.="</script>";
       return $output;
 	}
 } 

?>