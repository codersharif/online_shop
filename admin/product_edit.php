<?php
include("../lib/database.php");
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
        <h2>Edit Product</h2>
        <div class="block">
        <?php
           echo message::msg();
        ?>

             <?php 
              if (isset($_REQUEST['p_edit'])){
                  $p_edit=$_REQUEST['p_edit'];
                  extract($connect->selectbyid("product","*","product_id='$p_edit'"));
             ?>
            <form action="action/productedit.php" method="post" enctype="multipart/form-data">
                <table class="form">
                    
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" name="product_name" value="<?=isset($product_name)?$product_name:'';?>" class="medium"  />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="cat_id">
                                <option >Select Category</option>
                                <?php
                                $cat_selected=$connect->selectall("categories","*");
                                foreach ($cat_selected as $cat_select){
                                //extract($cat_select);
                                ?>
                                <option
                                 <?php
                                  // product tbl er cat_id == category tbl er cat_id same hole ::selected
                                   if ($cat_id == $cat_select['cat_id']){ ?>
                                        selected="selected"
                                 <?php } ?>
                                 value="<?=$cat_select['cat_id'];?>"><?=$cat_select['cat_name'];?></option>
                                 <?php
                                   }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Brand</label>
                        </td>
                        <td>
                            <select id="select" name="brand_id" >
                                <option>Select Brand</option>
                                <?php
                               $brand_selected=$connect->selectall("shop_brand","*");
                                foreach ($brand_selected as $brand_select) {
                                //extract($brand_select);
                                                      
                                ?>
                                <option 
                                <?php 
                                // product tbl er brand_id == brand tbl er brand_id same hole ::selected
                                if ($brand_id == $brand_select['brand_id']){ ?>
                                 selected="selected"
                                 <?php }  ?>
                                 value="<?=$brand_select['brand_id'];?>"><?=$brand_select['brand_name'];?></option>
                                <?php
                                 }
                                ?>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Description</label>
                        </td>
                        <td>
                            <textarea name="body" class="tinymce" >
                                <?php echo isset($body)?$body:''; ?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Price</label>
                        </td>
                        <td>
                            <input type="text" name="price" value=" <?=isset($price)?$price:''; ?>" class="medium"/>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <img src="action/<?=$image;?>" width="200px" height="80px"><br>
                            <input type="file" name="image" value="<?=$image?>" />
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label>Product Type</label>
                        </td>
                        <td>
                            <select id="select" name="type" >
                                <option value="0" <?=$type==0?'selected':''?>>Featured</option>
                                <option value="1" <?=$type==1?'selected':''?>>Non-Featured</option>
                               
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        <input type="hidden" name="edit_id" value="<?=isset($product_id)?$product_id:'';?>">
                            <input type="submit" name="update" Value="update" />
                        </td>
                    </tr>
                </table>
            </form>
            <?php 
               }
             ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
setupTinyMCE();
setDatePicker('date-picker');
$('input[type="checkbox"]').fancybutton();
$('input[type="radio"]').fancybutton();
});
</script>
<!-- Load TinyMCE -->
<?php include ("inc/footer.php");?>