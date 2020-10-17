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
		<h2>Product List</h2>
		<?php
		// cat_id delete query:::::::::::::::::::codersharif
			if (isset($_REQUEST['del_id'])){
				$del_id=$_REQUEST['del_id'];

		?>
		<div class="delete">
			<p>Are you sure to you delete?&nbsp;<br><a class="btn btn-red" href="productlist.php?cdel_id=<?=$del_id;?>">Yes</a>&nbsp;<a class="btn btn-red" href="productlist.php">No</a></p>
		</div>
		<?php

		}
		if (isset($_REQUEST['cdel_id'])){
		$cdel_id=$_REQUEST['cdel_id'];
        //img delete to file:::::::::::::codersharif
        $imgselect=$connect->selectbyid("product","*","product_id='$cdel_id'");
        unlink('action/'.$imgselect['image']);
       // id delete query:::::::::::::
		$delete=$connect->delete("product","product_id='$cdel_id;'");
		if ($delete){
			$msg="Product Delete Successfully.";
			
		}
		else{
			$msg="Product Delete Fail!";
		
		}
		}

		?>
		<h2><?=@$msg;?></h2>
		<div class="block">
		<?php
           echo message::msg();
        ?>
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>SL</th>
						<th>Product Name</th>
						<th>Cat_id</th>
						<th>Brand_id</th>
						<th>Description</th>
						<th>Price</th>
						<th>Image</th>
						<th>Type</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$product_selected=$connect->getBYinnerjoni();
					if (is_array($product_selected)){
			            $i=0;
						foreach ($product_selected as $product_select){
						$i++;
						extract($product_select);
						
				    ?>
					
						<tr class="odd gradeX">
						<td><?=$i;?></td>
						<td><?=$product_name;?></td>
						<td><?=$cat_name;?></td>
						<td><?=$brand_name;?></td>
						<td><?php
							$new_body=explode(" ",$body);
							$limit=array_slice($new_body,0,8);
							echo implode(" ",$limit).".....";
						?></td>
						<td>$<?=$price;?></td>
						<td><img src="action/<?=$image;?>" width="40px" height="40px"></td>
						<td><?=$type==1?'General':'Featured';?></td>
						<td><a href="product_edit.php?p_edit=<?echo urlencode($product_id);?>">Edit</a> || <a href="productlist.php?del_id=<?echo urlencode($product_id);?>">Delete</a></td>
					</tr>
					<?php
					//end foreach break::::::::::::::::;;;;
							}
									
								}
								else{
									echo "<h3 class=\"no_data\">NO DATA......</h3>";
								}
					?>
					
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function () {
setupLeftMenu();
$('.datatable').dataTable();
		setSidebarHeight();
});
</script>
<?php include ("inc/footer.php");?>