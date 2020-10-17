<?php
include("inc/header.php");
?>
<?php
// quantity Update in cart_tbl::::::::::::::::::::::::::::::;
	if (isset($_REQUEST['ubdate'])){
		extract($_REQUEST);
	if($quantity <=0 ){
$connect->delete("cart_tbl","cart_id='$cart_id;'");
echo "<script>window.location='cart.php';</script>";
}
elseif($connect_cart->updatecart("cart_tbl","quantity='$quantity'","cart_id='$cart_id'")){
// $msg="Quantity Update Successfuly";
echo "<script>window.location='cart.php';</script>";

}
else{
$msg="Quantity Update Fail !";
}
}
?>
<?php
if (!isset($_REQUEST['id'])){
	echo "<meta http-equiv='refresh' content='0;URL=?id=coder'/>";

}
?>
<?php
// cart_id delete query:::::::::::::::::::codersharif
if (isset($_REQUEST['del_id'])){
	$del_id=$_REQUEST['del_id'];
	$delete=$connect->delete("cart_tbl","cart_id='$del_id;'");
	if ($delete){
	header("location:cart.php");
	}
	else{
	$msg="cart Delete Fail!";
	
	}
	}

?>
<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
				<h2>Your Cart</h2>
				<span style="color: #666;font-size: 18px;font-weight: bold;">
					<?=@$msg;?>
				</span>
				
				<table class="tblone">
					<tr>
						<th width="10%">SL</th>
						<th width="20%">Product Name</th>
						<th width="10%">Image</th>
						<th width="15%">Price</th>
						<th width="20%">Quantity</th>
						<th width="15%">Total Price</th>
						<th width="10%">Action</th>
					</tr>
					<?php
					$sid=session_id();
					$cart_selected=$connect_cart->selectallcart("cart_tbl","*","session_id='$sid'");
					if (is_array($cart_selected)){
					$i=0;
					$sum=0;
					$qty=0;
					foreach($cart_selected as $cart_select){
					extract($cart_select);
					$i++;
					
					?>
					<tr>
						<td><?=$i;?></td>
						<td><?=$product_name;?></td>
						<td><img src="admin/action/<?=$image;?>" alt="img"/></td>
						<td>$<?=$price;?></td>
						<td>
							<!-- quantity update form::::::; 				 -->
							<form action="" method="post">
								<input type="hidden" name="cart_id" value="<?=$cart_id;?>">
								<input type="number" name="quantity" value="<?=$quantity;?>"/>
								<input type="submit" name="ubdate" value="Update"/>
							</form>
						</td>
						<td><?php
										$total=$price * $quantity;
										echo "$ ".$total;
						?></td>
						<td><a onclick="return confirm('Are you sure to delete');" href="cart.php?del_id=<?=$cart_id;?>">X</a></td>
					</tr>
					<?php
					// total price for sub total
					$qty."<br>";
					$qty=$qty + $quantity;
						$sum=$sum + $total;
						$_SESSION['qty']=$qty;
						$_SESSION['sum']=$sum;
							// forech end break
					}
					?>
					<?php
					// is_array end::::::::
					}
					else{
					/*echo'<span style="color: blue;font-size: 18px;font-weight: bold;">Data empty....</span>';*/
					header("location:index.php");
					}
					
					?>
				</table>
				<?php
				if (is_array($cart_selected)){
				?>
				<table style="float:right;text-align:left;" width="40%">
					<tr>
						<th>Sub Total : </th>
						<td>$ <?=$sum;?></td>
					</tr>
					<tr>
						<th>VAT : </th>
						<td>10%</td>
					</tr>
					<tr>
						<th>Grand Total :</th>
						<td>$
							<?php
							// 10% vat
							// $vat=$sum/10; or
							$vat=$sum * 0.1;
							$gtotal=$vat +$sum;
							echo $gtotal;
							?>
						</td>
					</tr>
				</table>
				<?php
				}
				else{
				echo "Cart Empty ! Please Shop now .";
				}
				?>
				
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="index.php"> <img src="images/shop.png" alt="" /></a>
				</div>
				<div class="shopright">
					<a href="payment.php"> <img src="images/check.png" alt="" /></a>
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