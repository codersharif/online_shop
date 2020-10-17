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
    <h2>Edit Category</h2>
    <div class="block copyblock">
      <?php
      // class call for session::::::::coder_sharif
      echo message::msg();
      ?>
      <?php
      // Category edit id :::::::::::::::::codersharif
      if (isset($_REQUEST['cat_edit'])) {
      $cat_edit=$_REQUEST['cat_edit'];
      $selectid=$connect->selectbyid("categories","*","cat_id=$cat_edit");
      extract($selectid);
      ?>
      <form action="action/catedit.php" method="post">
        <table class="form">
          <tr>
            <td>
            <label>Category Name</label>
            </td>
            <td>
              <input type="text" name="cat_name" value="<?=isset($cat_name)?$cat_name:'';?>" placeholder="Enter Category Name..." class="medium" required="" />
            </td>
          </tr>
          <tr>
           <td>
              <label>Status</label>
            </td>
            <td>
              <select name="cat_status" required="">
                <option ></option>
                <option value="1" <?php echo $cat_status==1?'selected':''?>>Publish</option>
                <option value="0" <?php echo $cat_status==0?'selected':''?>>Unpublish</option>
              </select>
            </td>
          </tr>
          <tr>
             <td>
              <label></label>
             </td>
            <td>
              <input type="hidden" name="edit_id" value="<?=isset($cat_id)?$cat_id:'';?>">
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