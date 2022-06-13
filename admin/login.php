 <?php
include("../classes/adminlogin.php");
include("../helpers/msg_alert.php");
session_start();

  
    if (isset($_SESSION['admin_name'])) {
       header("location:dashboard.php");     
    }


?>
 <?php
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if(isset($_REQUEST['submit'])){
   	  extract($_REQUEST);
      $password1=md5($password);
      if($login_obj->admin_login("admin_table","*","email='$email' AND password='$password1'") !=false){
      	  if (isset($_REQUEST['remember'])){
      	  	 setcookie('email',$email,time()+3600);
      	  	 setcookie('password',$password,time()+3600);
      	  }

      	  $admin_info=$login_obj->admin_login("admin_table","*","email='$email' AND password='$password1'");

      	  $_SESSION['admin_name']=$admin_info['admin_name'];
          header("location:dashboard.php");
          
      }
      else{
      	//   $msg="Email & Password don\'t match";
      	//  echo  alert::msg($msg);
		   $_SESSION['error'] = "Email & Password don\'t match";
      }
     
   }  
   header('location:login.php');
} 
 ?>

 <!DOCTYPE html>

 <head>
     <meta charset="utf-8">
     <title>Login</title>
     <!-- <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" /> -->

     <style type="text/css">
     .p {
         color: #666;
         margin-left: 100px;
         margin-right: 100px;
     }
     </style>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
         crossorigin="anonymous">
 </head>

 <body>
     <div class="container-fluid">
         <div class="row" id="content">
             <div class="col-md-12" class="text-center">
                 <div class="card col-4" style="top:30%;left:40%">
                     <div class="card-body">
                         <h1 class="card-title">Admin Login</h1>
                         <form action="login.php" method="post">
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Email address</label>
                                 <input type="email" class="form-control" placeholder="example@info.com" required name="email" value="<?=isset($_COOKIE['email'])?$_COOKIE['email']:'';?>" />
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Password</label>
                                 <input type="password" class="form-control" placeholder="Password" required name="password" value="<?=isset($_COOKIE['password'])?$_COOKIE['password']:'';?>" />
                             </div>
                             <div class="form-group form-check">
                                 <input type="checkbox" name="remember" value="yes" class="form-check-input" id="exampleCheck1">
                                 <label class="form-check-label" for="exampleCheck1">REMEMBER ME</label>
                             </div>
                             <button type="submit" name="submit" class="btn btn-primary">Login</button>
                         </form>
                     </div>
                 </div>
             </div><!-- content -->
         </div>
     </div><!-- container -->
 </body>

 </html>