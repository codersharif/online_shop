<?php
include("inc/header.php"); 
 ?>
<?php 
 if (isset($_SESSION['cuslogin']) == false){
    header("location:login.php");
   }

  // update query::::::::::::::::::::::;;
   if (isset($_REQUEST['edit_id'])){
       $edit_id=$_REQUEST['edit_id'];
       extract($_REQUEST);
       $update=$connect->update("user","user_name='$user_name',address='$address',city='$city',country='$country',zipcode='$zipcode',mobile='$mobile',email='$email'","user_id='$edit_id'");
       if ($update){
           header("location:profile.php");
       }
       else{
         $msg="Profile Update Fail!";
         alert::msg($msg);
       }
   }
 ?>
 <style type="text/css">
   .tblone{width: 550px;border: 2px solid #ddd;margin: 0 auto;}
   .tblone tr td{text-align: justify;}
   input[type='text'],[type='email']{
        width: 300px;
        height: 25px;
        border: 1px solid #666;
        border-radius: 3px;
   }
 </style>
 <div class="main">
    <div class="content">
    	<div class="section group">
      <?php
        if (isset($_REQUEST['profile_id'])){
           $profile_id=$_REQUEST['profile_id'];
           $userdata=$connect->selectbyid("user","*","user_id='$profile_id'");
      ?>
      <form>
      <table class="tblone">
        <tr>
          <th colspan="2">Your Profile Update</th>
        </tr>
        <tr>
          <td width="20%">Name</td>
          <td><input type="text" name="user_name" value="<?=$userdata['user_name'];?>"></td>
        </tr>
         <tr>
          <td>Mobile</td>
          <td><input type="text" name="mobile" value="<?=$userdata['mobile'];?>"></td>
        </tr>
        <tr>
          <td>E-mail</td>
          <td><input type="email" name="email" value="<?=$userdata['email'];?>"></td>
        </tr>
         <tr>
          <td>Address</td>
          <td><input type="text" name="address" value="<?=$userdata['address'];?>"></td>
        </tr>
        <tr>
          <td>City</td>
          <td><input type="text" name="city" value="<?=$userdata['city'];?>"></td>
        </tr>
        <tr>
          <td>Zip-code</td>
          <td><input type="text" name="zipcode" value="<?=$userdata['zipcode'];?>"></td>
        </tr>
        <tr>
          <td>Country</td>
          <td><input type="text" name="country" value="<?=$userdata['country'];?>"></td>
        </tr>
        <tr>
          <input type="hidden" name="edit_id" value="<?php echo $userdata['user_id'];?>">
          <td></td>
          <td><input type="submit" name="update" value="Save"></td>
        </tr>
        
      </table>
      </form>
      <?
       }
      ?>

 		</div>
 	</div>
</div>
<?php
include("inc/footer.php"); 
 ?>
  
