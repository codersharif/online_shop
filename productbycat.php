<?php
include("inc/header.php"); 
 ?>
 <?php 
    // accept cat_id::::::::::::;;;
    if (!isset($_REQUEST['cat_id']) || $_REQUEST['cat_id']==null){
    	echo "<script>window.location ='404.php';</script>";
    }
    else{
    	$cat_id=$_REQUEST['cat_id'];
    }
 ?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from CATEGORY</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      <?php
	       // selected products form category:::::::::::::::::::::::::::::::::::

	       $product_selected=$connect->selectallbytype("product","*","cat_id=$cat_id");
	       if(is_array($product_selected)){
	       foreach ($product_selected as $product_select) {
	         extract($product_select);
	       ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?pro_id=<?=$product_id;?>"> <img src="admin/action/<?=$image;?>" alt="" width="200px" height="250px;"  /></a>
					 <h2><?=$product_name;?></h2>
					 <p><?php
                           $new_body=explode(" ",$body);
	                       $limit=array_slice($new_body,0,8);
	                       echo implode(" ", $limit).".....";
					?></p>2
					 <p><span class="price">$ <?=$price;?></span></p>
				     <div class="button"><span><a href="details.php?pro_id=<?=$product_id;?>"> Details</a></span></div>
				</div>
				<?php 
                   }
               }
               else{
               	 // echo "<p>Products of this category are not available ?</p>";
               	  header("location:404.php");
               }

				 ?>
			</div>

	
	
    </div>
 </div>
</div>
<?php
include("inc/footer.php"); 
 ?>