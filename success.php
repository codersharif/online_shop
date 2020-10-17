<?php
include("inc/header.php"); 
 ?>
<?php 
 if (isset($_SESSION['cuslogin']) == false){
    header("location:login.php");
   }
 ?>
 <style type="text/css">
   .purchase{margin: 0 auto;width: 500px;border: 2px solid #ddd;text-align: center;margin-top:5px;padding: 50px;min-height: 200px;margin-bottom: 5px;}
   .purchase h2{border-bottom: 2px solid #ddd;margin-bottom: 80px;padding-bottom: 10px;}
   .purchase p{font-size: 18px;text-align: left;line-height: 25px;}
 </style>
 <div class="main">
    <div class="content">
      <div class="section group">
       <div class="purchase">
        <h2>Success</h2>
        <?php
          $userid=$_SESSION['cmrid'];
          $selected=$connect->selectallbytype("order_tbl","*","user_id='$userid' AND date=now()");
          $sum=0;
          foreach ($selected as $select){
           extract($select);
           $sum=$sum + $price;
          }
       ?>
        <p>Total Payable Amount (Including Vat) :$
          <?php
            $vat=$sum * 0.1;
            $total=$sum + $vat;
            echo $total; 
           ?>
        </p>
        <p>Thanks for purchase .Receive Your Order Successfully .we will contact 
        you ASAP with delivery detials.Here is your order detials ....<a href="orderdetials.php">Visit here....</a></p>
       </div>
    </div>
  </div>
</div>
<?php
include("inc/footer.php"); 
 ?>
  
