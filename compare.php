<?php
include("inc/header.php");
?>
<?php 
 if (isset($_SESSION['cuslogin']) == false){
    header("location:index.php");
   }
 ?>
<style>
table.tblone img {
    height: 90px;
    width: 100px;
}
</style>
<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
				<h2>Compare</h2>
				<h2><?=@$msg?></h2>
				<table class="tblone">
					<tr>
						<th width="10%">SL</th>
						<th width="20%">Product Name</th>
						<th width="15%">Price</th>
						<th width="10%">Image</th>
						<th width="10%">Action</th>
					</tr>
					<?php
					$cmrid=$_SESSION['cmrid'];
					$selectcompare=$connect->selectallorder("compare","*","user_id='$cmrid'","cpr_id");
					if (is_array($selectcompare)){
					$i=0;
					foreach($selectcompare as $select){
					extract($select);
					$i++;
					
					?>
					<tr>
						<td><?=$i;?></td>
						<td><?=$product_name;?></td>
						<td><?=$price;?></td>
						<td><img src="admin/action/<?=$image;?>" alt="img"/></td>
						<td><a href="details.php?pro_id=<?=$product_id;?>">view</a></td>
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