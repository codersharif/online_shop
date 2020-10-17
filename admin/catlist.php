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
		<h2>Category List</h2>
		<?php
		// cat_id delete query:::::::::::::::::::codersharif
			if (isset($_REQUEST['del_id'])){
				$del_id=$_REQUEST['del_id'];

		?>
		<div class="delete">
			<p>Are you sure went you delete?&nbsp;<br><a class="btn btn-red" href="catlist.php?cdel_id=<?=$del_id;?>">Yes</a>&nbsp;<a class="btn btn-red" href="catlist.php">No</a></p>
		</div>
		<?php

		}
		if (isset($_REQUEST['cdel_id'])){
			$cdel_id=$_REQUEST['cdel_id'];
		$delete=$connect->delete("categories","cat_id='$cdel_id;'");
		if ($delete){
			$msg="Category Delete Successfully.";
			
		}
		else{
			$msg="Category Delete Fail!";
		
		}
		}

		?>
		<h2><?=@$msg;?></h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Category Name</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					// category selected query::::::::::::::::::::::::::
					$selected=$connect->getbyDESC("categories","*","cat_id");
					if (is_array($selected)){
				     $i=0;
					foreach ($selected as $select) {
					extract($select);
					$i++;
					?>
					<tr class="odd gradeX">
						<td><?=$i;?></td>
						<td><?=$cat_name;?></td>
						<td><?php echo $cat_status==1?"Publish":"Unpulish";?></td>
						<td><a href="category_edit.php?cat_edit=<?php echo urlencode($cat_id);?>">Edit</a> || <a href="catlist.php?del_id=<?php echo urldecode($cat_id);?>">Delete</a></td>
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