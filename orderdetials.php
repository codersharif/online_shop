<?php
include("inc/header.php"); 
 ?>
<?php 
 if (isset($_SESSION['cuslogin']) == false){
    header("location:login.php");
   }


  // update order tab status 
     if (isset($_REQUEST['userid'])){
     $userid=$_REQUEST['userid'];
     $date=$_REQUEST['date'];
     $price=$_REQUEST['price'];

     $update=$connect->update("order_tbl","status='2'","user_id='$userid' AND price='$price' AND date='$date'");

     if ($update){
      $msg="Update Success";
     }else{
         $msg="Update Fail";
     }

  }

   //order delete 
/*   if (isset($_REQUEST['del_id'])){
     $del_id=$_REQUEST['del_id'];
     $delete=$connect->delete("order_tbl","order_id='$del_id'");
      if ($delete){
      $msg="Order Delete Successfully";
     }else{
         $msg="Order Delete  Fail";
     }
   }*/
 ?>
 <style type="text/css">
 </style>
 <div class="main">
    <div class="content">
      <div class="section group">
       <div class="payment">
        <h2>Your Order Detials </h2>
        <h2><?=@$msg?></h2>
        <table class="tblone">
          <tr>
            <th width="10%">No</th>
            <th width="20%">Product Name</th>
            <th width="10%">Image</th>
            <th width="20%">Quantity</th>
            <th width="15%">Price</th>
            <th width="15%">Date</th>
            <th width="15%">Status</th>
            <th width="10%">Action</th>
          </tr>
          <?php
          $userid=$_SESSION['cmrid'];
          $selected=$connect->selectallorder("order_tbl","*","user_id='$userid'","date");
          $i=0;
          if (is_array($selected)){
          foreach ($selected as $select){
        
            $i++;
           extract($select);
          
          
          ?>
          <tr>
            <td><?=$i;?></td>
            <td><?=$product_name;?></td>
            <td><img src="admin/action/<?=$image;?>" alt="img"/></td>
            <td><?=$quantity;?></td>
             <td>$<?=$price;?></td>
             <td><?=$format_obj->formatDate($date);?></td>
             <td>
            <?php
            if($status==0){
               echo "Pending"; 
               }
               elseif($status==1) {
                echo "Shifted";
              }
              else{
                echo "Ok";
                } ?>
            </td>
            <?php
             if ($status == 1){?>
                <td><a href="?userid=<?php echo $user_id?>&price=<?php echo $price?>&date=<?php echo $date?>">Confirm</a></td>
             <?php      
              }elseif($status ==2){?>
               <td>Ok</td>
            <?php 
              }else{?>
              <td>N/A</td>
             <?php 
              }
             ?>
            

          </tr>
          <?php
          // foreach end
           } 
         }
          ?>
        </table>
       </div>
    </div>
  </div>
</div>
<?php
include("inc/footer.php"); 
 ?>
  
