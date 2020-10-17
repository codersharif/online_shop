<?php
include("inc/header.php");
?>
<?php 
  // wish list page data check 
  $cmrid=$_SESSION['cmrid'];
  $check=$connect->selectallorder("wlist_tbl","*","user_id='$cmrid'","w_id");
  if(!$check){
  	header("location:index.php");
  }

?>
<?php
// delete wish list id ::::::::::::;;
if (isset($_REQUEST['del_wlistid'])){
	$del_wlistid=$_REQUEST['del_wlistid'];
	$delete=$connect->delete("wlist_tbl","w_id='$del_wlistid'");
	if($delete){
	   header("location:wishlist.php");
	}
	else{
		$msg="Wish List Remove Fail !";
	}
}


 ?>
<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
				<h2>Wish List</h2>
				<h2><?=@$msg?></h2>
				<table class="tblone">
					<tr>
						<th>SL</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
					<?php
					 $cmrid=$_SESSION['cmrid'];
                     $selectwishlist=$connect->selectallorder("wlist_tbl","*","user_id='$cmrid'","w_id");
					if (is_array($selectwishlist)){
					$i=0;
					foreach($selectwishlist as $select){
					extract($select);
					$i++;
					
					?>
					<tr>
						<td><?=$i;?></td>
						<td><?=$product_name;?></td>
						<td><?=$price;?></td>
						<td><img src="admin/action/<?=$image;?>" alt="img"/></td>
						<td>
						<a href="details.php?pro_id=<?=$product_id;?>">Buy Now</a>||
						<a onclick="return confirm('Are You Sure To Delete')" href="?del_wlistid=<?=$w_id;?>">Remove</a>
						</td>
					</tr>

		          <?php 
					}
				}else{
					$msg="Data Empty";
				}
				?>
				</table>
			</div>
			<div class="shopping">
				<div class="shopleft" style="width: 100%;text-align: center;">
					<a href="index.php"> <img src="images/shop.png" alt="" /></a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
</div>
<?php
include("inc/footer.php");
?>