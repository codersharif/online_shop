<?php
include("inc/header.php");
?>
<?php
if (isset($_REQUEST['pro_id'])){
$pro_id=$_REQUEST['pro_id'];
}
?>
<?php
if (isset($_REQUEST['submit'])){
$quantity=$_REQUEST['quantity'];
$sid=session_id();
// $addcart=$connect_cart->addToCart("$quantity","$pro_id");
$result=$connect_cart->selectToproduct("product","*","product_id='$pro_id'");
extract($result);
//select cart_tbl :::::::some id not agin add so,...
$checkquery=$connect_cart->selectbyidwith_sid("cart_tbl","*","product_id='$pro_id'","session_id='$sid'");
// echo $product_id;
if ($checkquery){
// id check :::::same id 2nd time dont add:::::::::;;
$msg="Product Already Added !";
}
else{
// cart_table insert query::::::::::::::
if ($connect_cart->AddToCart("cart_tbl","session_id='$sid',product_id='$product_id',product_name='$product_name',price='$price',quantity='$quantity',image='$image'")){
header("location:cart.php");
}
else{
header("location:404.php");
}
}
}
//compare """"""""""""""""""""""':::::::::

if (isset($_REQUEST['compare'])){
$cmrid=$_SESSION['cmrid'];
$proid=$_REQUEST['proid'];

$checkquery=$connect->selectbyid("compare","*","user_id='$cmrid' AND product_id='$proid'");
// echo $product_id;
if ($checkquery){
// id check :::::same id 2nd time dont add:::::::::;;
$msg="Already Added Check Compare Page !";
}else{
//select product table
$selectproduct=$connect->selectbyid("product","*","product_id='$proid'");
extract($selectproduct);
if ($selectproduct){
  //insert compare table 
if ($connect->insert("compare","user_id='$cmrid',product_id='$product_id',product_name='$product_name',price='$price',image='$image'")){
$msg="Added to Compare";
}
else{
$msg="Not Added";
}
}
}
}



//wish list ::::::::::::::::::

if(isset($_REQUEST['wlist'])){
  $cmrid=$_SESSION['cmrid'];
  $proid=$_REQUEST['proid'];

  $checkquery=$connect->selectbyid("wlist_tbl","*","user_id='$cmrid' AND product_id='$proid'");
// echo $product_id;
if ($checkquery){
// id check :::::same id 2nd time dont add:::::::::;;
$msg="Already Added Check Wish list Page !";
}else{

  // select product table 
  $selectproduct=$connect->selectbyid("product","*","product_id='$proid'");
  extract($selectproduct);

  if ($selectproduct){
  //insert wish list table 
  if ($connect->insert("wlist_tbl","user_id='$cmrid',product_id='$product_id',product_name='$product_name',price='$price',image='$image'")){
  $msg="Added to Wish List";
  }
  else{
  $msg="Not Added";
  }
  }
 }
}

?>

<style type="text/css">
  .mybutton{width: 100px;float: left;margin-right: 50px;}
</style>
<div class="main">
  <div class="content">
    <div class="section group">
      <div class="cont-desc span_1_of_2">
        <?php
        if (isset($_REQUEST['pro_id'])) {
        $pro_id=$_REQUEST['pro_id'];
        extract($connect->getBySingleid($pro_id));
        ?>
        <div class="grid images_3_of_2">
          <img src="admin/action/<?=$image;?>" alt=""/>
        </div>
        <div class="desc span_3_of_2">
          <h2><?=$product_name;?></h2>
          <div class="price">
            <p>Price: <span>$<?=$price;?></span></p>
            <p>Category: <span><?=$cat_name;?></span></p>
            <p>Brand:<span><?=$brand_name;?></span></p>
          </div>
          <!-- add cart form:::::::::::: -->
          <div class="add-cart">
            <form action="" method="post">
              <input type="number" class="buyfield" name="quantity" value="1"/>
              <input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
            </form>
          </div>
          <span style="color: red;font-size: 18px;font-weight: bold;">
            <?=@$msg;?>
          </span>

          <?php  if(isset($_SESSION['cmrid'])){ ?>
          <div class="add-cart">
             <div class="mybutton">
                <form action="" method="post">
              <input type="hidden" name="proid" value="<?=$product_id?>"/>
              <input type="submit" class="buysubmit" name="compare" value="Added to Compare"/>
            </form>
             </div>
             <div class="mybutton">
              <form action="" method="post">
              <input type="hidden" name="proid" value="<?=$product_id?>"/>
              <input type="submit" class="buysubmit" name="wlist" value="Save To List"/>
            </form>
             </div>
          </div>
          <?php } ?>
        </div>
        <div class="product-desc">
          <h2>Product Details</h2>
          <p><?=$body;?></p>
        </div>
        
        <?php
        }
        ?>
      </div>
      <div class="rightsidebar span_3_of_1">
        <h2>CATEGORIES</h2>
        <ul>
          <?php
          $category_selected=$connect_pro->selectallcategory("categories","*","cat_id");
          foreach ($category_selected as $category_select){
          extract($category_select);
          ?>
          
          <li><a href="productbycat.php?cat_id=<?=$cat_id;?>"><?=$cat_name;?></a></li>
          
          <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php
include("inc/footer.php");
?>