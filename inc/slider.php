<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
			        <?php 
			        // letest brand new product mens products form brands
                    $iphoneProduct=$connect_pro->letestProduct("product","*","brand_id=4","product_id","1");
                     extract($iphoneProduct);

			         ?>
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?pro_id=<?=$product_id;?>"> <img src="admin/action/<?=$image;?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?=$product_name;?></h2>
						<p><?php
                           $new_body=explode(" ",$body);
	                       $limit=array_slice($new_body,0,8);
	                       echo implode(" ", $limit).".....";
						?></p>
						<div class="button"><span><a href="details.php?pro_id=<?=$product_id;?>"> Add to cart</a></span></div>
				   </div>

			   </div>	

				<div class="listview_1_of_2 images_1_of_2">
				     <?php 
				     // letest brand new product mens products form brands
                    $samsungProduct=$connect_pro->letestProduct("product","*","brand_id=2","product_id","1");
                     extract($samsungProduct);

			         ?>
				 <div class="listimg listimg_2_of_1">
						 <a href="details.php?pro_id=<?=$product_id;?>">  <img src="admin/action/<?=$image;?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?=$product_name;?></h2>
						<p><?php
                           $new_body=explode(" ",$body);
                           $limit=array_slice($new_body,0,8);
                           echo implode(" ", $limit).".....";
						?></p>
						<div class="button"><span><a href="details.php?pro_id=<?=$product_id;?>"> Add to cart</a></span></div>
				   </div>
				</div>
			</div>

			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
				     <?php 
				     // letest brand new product mens products form brands
                    $assusProduct=$connect_pro->letestProduct("product","*","brand_id=5","product_id","1");
                     extract($assusProduct);

			         ?>
				 <div class="listimg listimg_2_of_1">
						 <a href="details.php?pro_id=<?=$product_id;?>"> <img src="admin/action/<?=$image;?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?=$product_name;?></h2>
					    <p><?php
                           $new_body=explode(" ",$body);
	                       $limit=array_slice($new_body,0,8);
	                       echo implode(" ", $limit).".....";
						?></p>
						<div class="button"><span><a href="details.php?pro_id=<?=$product_id;?>"> Add to cart</a></span></div>
				   </div>
				</div>			
				<div class="listview_1_of_2 images_1_of_2">
				     <?php 
				     // letest brand new product mens products form brands
                    $cannonProduct=$connect_pro->letestProduct("product","*","brand_id=6","product_id","1");
                     extract($cannonProduct);

			         ?>
				 <div class="listimg listimg_2_of_1">
						 <a href="details.php?pro_id=<?=$product_id;?>"> <img src="admin/action/<?=$image;?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?=$product_name;?></h2>
						<p><?php
                           $new_body=explode(" ",$body);
	                       $limit=array_slice($new_body,0,8);
	                       echo implode(" ", $limit).".....";
						?></p>
						<div class="button"><span><a href="details.php?pro_id=<?=$product_id;?>"> Add to cart</a></span></div>
				   </div>
				</div>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
</div>