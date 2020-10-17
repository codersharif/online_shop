<?php
include("../lib/session.php");
 session_start();

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
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
              <?php
                  echo message::msg();
              ?>
                 <form action="action/catinsert.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                            <label>Category Name</label>
                            </td>
                            <td>
                                <input type="text" name="cat_name" placeholder="Enter Category Name..." class="medium" required="" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label>Status</label>
                            </td>
                            <td>
                                <select name="cat_status" required="">
                                    <option label="Select"></option>
                                    <option value="1">Publish</option>
                                    <option value="0">Unpublish</option>
                                </select>
                            </td>
                        </tr>
						            <tr> 
                            <td>
                            <label></label>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include ("inc/footer.php");?>