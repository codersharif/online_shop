<?php
include("../lib/database.php");
include("../helpers/format.php");
 session_start();

  if (!isset($_SESSION['admin_name'])){
      header("location:login.php");
  }


  if (isset($_REQUEST['shiftid'])){
  	 $shiftid=$_REQUEST['shiftid'];
  	 $date=$_REQUEST['date'];
  	 $price=$_REQUEST['price'];

  	 $update=$connect->update("order_tbl","status='1'","user_id='$shiftid' AND price='$price' AND date='$date'");

  	 if ($update){
  	 	$msg="Update Success";
  	 }else{
         $msg="Update Fail";
  	 }

  }

  // delete product id 
    if (isset($_REQUEST['delproduct'])){
  	 $delproduct=$_REQUEST['delproduct'];
  	 $date=$_REQUEST['date'];
  	 $price=$_REQUEST['price'];

  	 $delete=$connect->delete("order_tbl","user_id='$delproduct' AND price='$price' AND date='$date'");

  	 if ($delete){
  	 	$msg="Data Delete Successfully";
  	 }else{
         $msg="Data Delete  Fail";
  	 }

  }
   
   
 ?>
<?php 
include ("inc/header.php");
include ("inc/sidebar.php");
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Custromer Order List</h2>
                <h2><?=@$msg;?></h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Data $ Time</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Customer Id</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					  $orderData=$connect->getbyDESC("order_tbl","*","date"); 
					  if (is_array($orderData)){
					  foreach ($orderData as $data){
					  extract($data);
					 ?>
						<tr class="odd gradeX">
							<td><?=$order_id;?></td>
							<td><?=$format_obj->formatDate($date);?></td>
							<td><?=$product_name;?></td>
							<td><?=$quantity;?></td>
							<td>$<?=$price;?></td>
							<td><?=$user_id;?></td>
							<td><a href="customar.php?userId=<?=$user_id?>">View Detials</a></td>

							<?php
							 if ($status == 0){ ?>
							  	<td><a href="?shiftid=<?php echo $user_id?>&price=<?php echo $price?>&date=<?php echo $date?>">Shifted</a></td>
							 <?php  	
							  }elseif($status == 1){ ?>
							   <td>panding</td>
                               <?php
							  	}else { ?>
                                 <td><a href="?delproduct=<?php echo $user_id?>&price=<?php echo $price?>&date=<?php echo $date?>">Remove</a></td>
                           <?php 
							  }
							 ?>
							
						</tr>

						<?php } }?>
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
