<?php
include("../lib/database.php");
include("../lib/session.php");
session_start();
// logout section ::::::::::::::::developer sharif
if (!isset($_SESSION['admin_name'])){
header("location:login.php");
}
?>
<?php
include ("inc/header.php");
include ("inc/sidebar.php");
?>
<div class="grid_10">
  <div class="box round first grid">
    <h2>Edit Brand</h2>
    <div class="block copyblock">
      <?php
      // class call for session::::::::coder_sharif
      echo message::msg();
      ?>
      <?php
      // Brand edit id :::::::::::::::::codersharif
      if (isset($_REQUEST['brand_id'])) {
      $brand_id=$_REQUEST['brand_id'];
      $selectid=$connect->selectbyid("shop_brand","*","brand_id=$brand_id");
      extract($selectid);
      ?>
      <form action="action/brandedit.php" method="post">
        <table class="form">
          <tr>
            <td>
            <label>Brand Name</label>
            </td>
            <td>
              <input type="text" name="brand_name" value="<?=isset($brand_name)?$brand_name:'';?>"" class="medium" required="" />
            </td>
          </tr>
          <tr>
            <td>
            <label></label>
            </td>
            <td>
              <input type="hidden" name="edit_id" value="<?=isset($brand_id)?$brand_id:'';?>">
              <input type="submit" name="submit" Value="Update" />
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