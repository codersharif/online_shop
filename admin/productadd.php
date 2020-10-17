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
        <h2>Add New Product</h2>
        <div class="block">
        <?php
           echo message::msg();
        ?>
            <form action="action/productinsert.php" method="post" enctype="multipart/form-data">
                <table class="form">
                    
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" name="product_name" placeholder="Enter Product Name..." class="medium"  />
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
                                extract($cat_select);
                                ?>
                                <option value="<?=$cat_id;?>"><?=$cat_name;?></option>
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
                                extract($brand_select);
                          
                                ?>
                                <option value="<?=$brand_id;?>"><?=$brand_name;?></option>
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
                            <textarea name="body" class="tinymce" ></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Price</label>
                        </td>
                        <td>
                            <input type="text" name="price" placeholder="Enter Price..." class="medium"/>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input type="file" name="image"  />
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label>Product Type</label>
                        </td>
                        <td>
                            <select id="select" name="type" >
                                <option >Select Type</option>
                                <option value="0">Featured</option>
                                <option value="1">Non-Featured</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
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