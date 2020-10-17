<?php
include("inc/header.php"); 
 ?>
<?php 
 if (isset($_SESSION['cuslogin']) == false){
    header("location:login.php");
   }
 ?>
 <?php 
 // order table insert codeing:::::::::::::::::::::::
  if (isset($_REQUEST['order_id']) && $_REQUEST['order_id'] == 'order'){
     $sid=session_id();
     //user id form user table
     $userid=$_SESSION['cmrid'];
     //cart_tbl select 
     $cartdata=$connect->selectallbytype("cart_tbl","*","session_id='$sid'");
     foreach ($cartdata as $data){
      extract($data);
      $price=$price*$quantity;
        $insertorder=$connect->insert("order_tbl","user_id='$userid',product_id='$product_id',product_name='$product_name',price='$price',quantity='$quantity',image='$image'");
        //order_tbl insert code :::::::::::::::::::::::::coder sharif
        if($insertorder){
          $deldata=$connect->delete("cart_tbl","session_id='$sid'");
          header("location:success.php");
        }
        else{
          $msg="Order Payment Field!";
        }

     }

  }

  ?>
 <style type="text/css">
   .tblone{width: 500px;border: 2px solid #ddd;margin: 0 auto;}
   .tblone tr td{text-align: justify;}
   .division{width: 50%;float: left;}
   .tbltwo{float: right;margin-top: 10px;border: 2px solid #ddd;margin-right: 13px;width: 300px;}
   .tbltwo tr th{padding: 10px;}
   .order a{text-align: center;display:block;margin: 0 auto;border: 1px solid #ddd;padding: 5px 10px;color: #cc3300;background: #003366;font-weight: bold;font-size: 20px;width: 100px;border-radius: 5px;margin-bottom:5px;}
 </style>
 <div class="main">
    <div class="content">
      <div class="section group">
       <h2><?=@$msg;?></h2>
       <div class="division">
          <table class="tblone">
          <tr>
            <th>Sl</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
          </tr>
          <?php
          $sid=session_id();
          $cart_selected=$connect_cart->selectallcart("cart_tbl","*","session_id='$sid'");
          $i=0;
          $sum=0;
          $qty=0;
          foreach($cart_selected as $cart_select){
          extract($cart_select);
          $i++;
          
          ?>
          <tr>
            <td><?=$i;?></td>
            <td><?=$product_name;?></td>
            <td>$<?=$price;?></td>
            <td><?=$quantity;?></td>
            <td><?php
                    $total=$price * $quantity;
                    echo "$ ".$total;
            ?></td>
          </tr>
          <?php
          // total price for sub total
          $qty."<br>";
          $qty=$qty + $quantity;
            $sum=$sum + $total;
            $_SESSION['qty']=$qty;
            $_SESSION['sum']=$sum;
              // forech end break
          }
          ?>
        </table>
        <?php
        if (is_array($cart_selected)){
        ?>
        <table class="tbltwo" width="40%">
          <tr>
            <th>Sub Total</th>
            <th>:</th>
            <td>$ <?=$sum;?></td>
          </tr>
          <tr>
            <th>VAT</th>
            <th>:</th>
            <td>10% (<?=$sum * 0.1;?>)</td>
          </tr>
          <tr>
            <th>Grand Total</th>
            <th>:</th>
            <td>$
              <?php
              // 10% vat
              // $vat=$sum/10; or
              $vat=$sum * 0.1;
              $gtotal=$vat +$sum;
              echo $gtotal;
              ?>
            </td>
          </tr>
          <tr>
            <th>Quantity</th>
            <th>:</th>
            <td><?=$_SESSION['qty'];?></td>
          </tr>
        </table>
        <?php
        }
        ?>
       </div>
       <div class="division">
           <?php
        $userid=$_SESSION['cmrid'];
        $userdata=$connect->selectbyid("user","*","user_id='$userid'");
        if ($userdata){

      ?>
      <table class="tblone">
        <tr>
          <th colspan="3">Your Profile Details</th>
        </tr>
        <tr>
          <td width="20%">Name</td>
          <td width="5%">:</td>
          <td><?=$userdata['user_name'];?></td>
        </tr>
         <tr>
          <td>Mobile</td>
          <td>:</td>
          <td><?=$userdata['mobile'];?></td>
        </tr>
        <tr>
          <td>E-mail</td>
          <td>:</td>
          <td><?=$userdata['email'];?></td>
        </tr>
         <tr>
          <td>Address</td>
          <td>:</td>
          <td><?=$userdata['address'];?></td>
        </tr>
        <tr>
          <td>City</td>
          <td>:</td>
          <td><?=$userdata['city'];?></td>
        </tr>
        <tr>
          <td>Zip-code</td>
          <td>:</td>
          <td><?=$userdata['zipcode'];?></td>
        </tr>
        <tr>
          <td>Country</td>
          <td>:</td>
          <td><?=$userdata['country'];?></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td><a href="editprofile.php?profile_id=<?php echo $userdata['user_id'];?>">Update details</a></td>
        </tr>
        
      </table>
      <?
       }
      ?>
         
       </div>
    </div>
  </div>
  <div class="order">
     <a href="?order_id=order">Order</a>
    
  </div>
</div>
<?php
include("inc/footer.php"); 
 ?>
  
