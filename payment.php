<?php
include("inc/header.php"); 
 ?>
<?php 
 if (isset($_SESSION['cuslogin']) == false){
    header("location:login.php");
   }
 ?>
 <style type="text/css">
   .payment{margin: 0 auto;width: 500px;border: 2px solid #ddd;text-align: center;margin-top:5px;padding: 50px;min-height: 200px;margin-bottom: 5px;}
   .payment h2{border-bottom: 2px solid #ddd;margin-bottom: 80px;padding-bottom: 10px;}
   .payment a{color:#cc3300;padding: 5px 10px;border: 2px solid #ddd;background:#003366
;font-weight: bold;border-radius: 5px;font-size: 25px;cursor:pointer;}
   .back a{text-align: center;font-size: 25px;display: block;border: 1px solid #ddd;padding:10px;background: #666;color: #fff;font-weight: bold;margin: 0 auto;width: 150px;border-radius: 5px;}
 </style>
 <div class="main">
    <div class="content">
      <div class="section group">
       <div class="payment">
        <h2>Choose Payment Option</h2>
        <a href="payoffline.php" title="offline payment option">Offline payment</a>
        <a href="payonline.php" title="online payment option">Online payment</a>
         
       </div>
       <div class="back">
       <a href="cart.php">Previous</a>
         
       </div>


    </div>
  </div>
</div>
<?php
include("inc/footer.php"); 
 ?>
  
