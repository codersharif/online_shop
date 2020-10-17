<?php 
class adminlogin{
  private $conn;	
  public function __construct($host,$user,$pass,$db){
   $this->conn=new mysqli($host,$user,$pass,$db);
   if($this->conn->connect_errno){
   	die("database connection Fail.".$this->conn->connect_error);
   }
  }

  public function admin_login($table,$cols,$condition){
  	$sql="SELECT $cols FROM $table WHERE $condition";

  	$query=$this->conn->query($sql);
  	if ($query->num_rows > 0){
  		return $query->fetch_assoc();
  	}
  	else{
  		return false;
  	}
  }

}

$login_obj=new adminlogin("localhost","root","","shop");

?>
