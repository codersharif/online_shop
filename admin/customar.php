<?php
include("../lib/database.php");
include("../lib/session.php");
session_start();
// logout section ::::::::::::::::developer sharif
if (!isset($_SESSION['admin_name'])){
header("location:login.php");
}

if (isset($_REQUEST['ok'])){
   header('location:order.php');
}
?>
<?php
include ("inc/header.php");
include ("inc/sidebar.php");
?>
<div class="grid_10">
  <div class="box round first grid">
    <h2>Custromer Detials</h2>
    <div class="block copyblock">
      <?php
      // class call for session::::::::coder_sharif
      echo message::msg();
      ?>
      <?php
      // Category edit id :::::::::::::::::codersharif
      if (isset($_REQUEST['userId'])) {
      $userId=$_REQUEST['userId'];
      $selectid=$connect->selectbyid("user","*","user_id=$userId");
      extract($selectid);
      ?>
      <form action="" method="post">
        <table class="form">
          <tr>
            <td>
            <label>Name</label>
            </td>
            <td>
              <input type="text" name="name" value="<?=isset($user_name)?$user_name:'';?>" class="medium"/>
            </td>
          </tr>
            <tr>
            <td>
            <label>Address</label>
            </td>
            <td>
              <input type="text" name="address" value="<?=isset($address)?$address:'';?>" class="medium"/>
            </td>
          </tr>
            <tr>
            <td>
            <label>City</label>
            </td>
            <td>
              <input type="text" name="city" value="<?=isset($city)?$city:'';?>" class="medium"/>
            </td>
          </tr>
            <tr>
            <td>
            <label>Country</label>
            </td>
            <td>
              <input type="text" name="country" value="<?=isset($country)?$country:'';?>" class="medium"/>
            </td>
          </tr>
            <tr>
            <td>
            <label>Zip code</label>
            </td>
            <td>
              <input type="text" name="zipcode" value="<?=isset($zipcode)?$zipcode:'';?>" class="medium"/>
            </td>
          </tr>
                <tr>
            <td>
            <label>Mobile</label>
            </td>
            <td>
              <input type="number" name="mobile" value="<?=isset($mobile)?$mobile:'';?>" class="medium"/>
            </td>
          </tr>
                <tr>
            <td>
            <label>E-mail</label>
            </td>
            <td>
              <input type="email" name="email" value="<?=isset($email)?$email:'';?>" class="medium"/>
            </td>
          </tr>
          <tr>
             <td>
              <label></label>
             </td>
            <td>
              <input type="submit" name="ok" Value="Ok" />
            </td>
          </tr>
        </table>
        <?php
        }
        ?>
      </form>
    </div>
  </div>
</div>
<?php include ("inc/footer.php");?>