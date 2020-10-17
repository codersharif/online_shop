<?php
include("inc/header.php"); 
 ?>
<?php 
 if (isset($_SESSION['cuslogin']) == false){
    header("location:login.php");
   }
 ?>
 <style type="text/css">
   .tblone{width: 550px;border: 2px solid #ddd;margin: 0 auto;}
   .tblone tr td{text-align: justify;}
 </style>
 <div class="main">
    <div class="content">
    	<div class="section group">
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
<?php
include("inc/footer.php"); 
 ?>
  
