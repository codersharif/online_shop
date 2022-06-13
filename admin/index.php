<?php
 session_start();

  if (!isset($_SESSION['admin_name'])){
      header("location:login.php");
  }else{
    header("location:dashboard.php");
  }
   
 ?>