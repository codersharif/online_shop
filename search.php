<?php 

$servername = "localhost";
$username = "root";
$password = "";
$db="shop";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";







  $output='';
  if (isset($_REQUEST['submit'])){
      $search=$_REQUEST['search'];
      $search=preg_replace("#[^0-9a-z]#i","",$search);

$sql = "SELECT * FROM product WHERE product_name LIKE '%$search%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $product_id=$row["product_id"];
        $product=$row["product_name"];
        $image=$row["image"];
        $price=$row["price"];
     ?>
        $output.=<div class="grid_1_of_4 images_1_of_4">
           <a href="details.php?pro_id=<?=$product_id;?>"><img src="admin/action/<?=$image;?>" alt="" width="200px" height="250px;" /></a>
           <h2><?php echo $product; ?></h2>
           <p><span class="price">$<?=$price;?></span></p>
             <div class="button"><span><a href="details.php?pro_id=<?=$product_id;?>" class="details">Details</a></span></div>
        </div>

    <?php
    }
} else {
   $output.="there was no search result";
}


    
  }
$conn->close();

 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <title></title>
 </head>
 <body>
     <?php 

     print("$output");
      ?>

        <div class="section group">
               <?php 
               /* $sql="SELECT * FROM product WHERE product_name='$output'";
                $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $product=$row["product_name"];

                            $output.='<div>'.$product.'</div>';
                        }
                    } else {
                       $output.="there was no search result";
                    }
*/
                ?>

      
        <?php print("$output");?>
       <!--  <?php
          //}
        ?> -->
      </div>
 </body>
 </html>