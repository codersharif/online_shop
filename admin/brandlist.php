<?php
include("../lib/database.php");
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
		<h2>Brand List</h2>
		<?php
		// brand_id delete query:::::::::::::::::::codersharif
			if (isset($_REQUEST['del_id'])){
				$del_id=$_REQUEST['del_id'];

		?>
		<div class="delete">
			<p>Are you sure to delete?&nbsp;<br><a class="btn btn-red" href="brandlist.php?cdel_id=<?=$del_id;?>">Yes</a>&nbsp;<a class="btn btn-red" href="brandlist.php">No</a></p>
		</div>
		<?php

		}
		if (isset($_REQUEST['cdel_id'])){
			$cdel_id=$_REQUEST['cdel_id'];
		$delete=$connect->delete("shop_brand","brand_id='$cdel_id;'");
		if ($delete){
			$msg="Brand Delete Successfully.";
			
		}
		else{
			$msg="Brand Delete Fail!";
		
		}
		}

		?>
		<h2><?=@$msg;?></h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Brand Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					// brand selected query::::::::::::::::::::::::::developer sharif
					$selected=$connect->getbyDESC("shop_brand","*","brand_id");
					if (is_array($selected)){	
					$i=0;	
					foreach ($selected as $select){
					extract($select);
					  $i++;
					?>
					<tr class="odd gradeX">
						<td><?=$i;?></td>
						<td><?=$brand_name;?></td>
						<td><a href="brand_edit.php?brand_id=<?php echo urlencode($brand_id);?>">Edit</a> || <a href="brandlist.php?del_id=<?php echo urldecode($brand_id);?>">Delete</a></td>
					</tr>
					<?php
					//end select code:::::::::::::;;
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