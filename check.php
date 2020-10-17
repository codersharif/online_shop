<?php 
include("lib/database.php"); 
    if (isset($_REQUEST['submit'])){
       $email=$_REQUEST['email'];

     $data=$connect->selectbyid("user","*","email='$email'");
     echo $email."<br>";
	 $value=$data['email'];
	 echo $value;
	 if ($email == $value){
		echo "Email already exit";
		
	}
	else{
		echo "ok done";
	}

}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>check</title>
 </head>
 <body>
   <form action="" method="get">
   email:
   <input type="email" name="email">
   <input type="submit" name="submit" value="submit">
   	

   </form>
 
 </body>
 </html>