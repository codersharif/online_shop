<?php
include("inc/header.php"); 
include("inc/slider.php"); 
?>
 <div class="main">
    <div class="content">
  
    	<div class="content_top">
     
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
               <?php 
               // connect::::form lib/database.php:::::sharif...here 4 means limit
                $f_Product_select=$connect->getallbyTypeDesc("product","*","type=0","product_id","4");
                foreach ($f_Product_select as $f_Product){
                 extract($f_Product);
                ?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?pro_id=<?=$product_id;?>"><img src="admin/action/<?=$image;?>" alt="" width="200px" height="250px;" /></a>
					 <h2><?=$product_name;?></h2>
					 <p><?php
                       $new_body=explode(" ",$body);
                       $limit=array_slice($new_body,0,8);
                       echo implode(" ", $limit).".....";

					 ?></p>
					 <p><span class="price">$<?=$price;?></span></p>
				     <div class="button"><span><a href="details.php?pro_id=<?=$product_id;?>" class="details">Details</a></span></div>
				</div>
				<?php
			    }
				?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			  <?php 
               // connect::::form lib/database.php:::::sharif ...here 4 means limit
                $f_Product_select=$connect->getallbyDesc("product","*","product_id","4");
                foreach ($f_Product_select as $f_Product){
                 extract($f_Product);
                ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?pro_id=<?=$product_id;?>"><img src="admin/action/<?=$image;?>" alt="" width="200px" height="250px;" /></a>
					 <h2><?=$product_name;?></h2>
					 <p><span class="price">$<?=$price;?></span></p>
				     <div class="button"><span><a href="details.php?pro_id=<?=$product_id;?>" class="details">Details</a></span></div>
				</div>
              <?php 
                  }
               ?>
			</div>
    </div>
 </div>
</div>
<?php
include("inc/footer.php"); 
 ?>