<?php
include("inc/header.php"); 
?>
<?php
//logout code::::::::::::;; 1st way
/* if (isset($_REQUEST['action']) && $_REQUEST['action'] !=false){
 	session_destroy();
 	header("location:login.php");
   
 }*/
 //logout code::::::::::::;; 2nd away
 if (isset($_REQUEST['cmrlogout'])){
 	// session id delete after order
 	$sid=session_id();
 	$deldata=$connect->delete("cart_tbl","session_id='$sid'");
  // compare delete by logout
  $cmrid=$_SESSION['cmrid'];
  $delcompare=$connect->delete("compare","user_id='$cmrid'");
 	session_destroy();
 	header("location:login.php");
 }


 if (isset($_SESSION['cuslogin']) == false){
  	header("location:login.php");

  }

 ?>
 <div class="main">
    <div class="content">
    <div class="section group">
      <div class="order">
         <h2>order page</h2>
         <?php 
          echo $_SESSION['cmrname'];
         ?>
      	
      </div>
    </div>
 </div>
</div>
<?php
include("inc/footer.php"); 
 ?>