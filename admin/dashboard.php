<?php 
session_start();

  if (isset($_REQUEST['action'])){
  	 session_destroy();
  	 header("location:login.php");
  }

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
                <h2> Dashbord</h2>
                <div class="block">               
                  Welcome admin panel        
                </div>
            </div>
        </div>
<?php include ("inc/footer.php");?>