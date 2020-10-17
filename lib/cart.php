<?php 
// :::::::::::developer sharif khan
 class CART{
 	private $conn;
 	public function __construct($host,$user,$pass,$db){
      $this->conn=new mysqli($host,$user,$pass,$db);
      if ($this->conn->connect_errno){
      	  die("database connection Fail!".$this->conn->connect_error);
      }
 	} 


  //:::::::::::::::::::::::ADD to cart
  	public function AddToCart($table,$cols){
 		$sql="INSERT INTO $table SET $cols";

 		$query=$this->conn->query($sql);
 		if($this->conn->affected_rows > 0){
 			return true;
 		}
 		else{
 			return false;
 		}
 	} 

 	//:::::::::::::::;update cart:::::::::
 	public function updatecart($table,$cols,$condition){
 		$sql="UPDATE $table SET $cols WHERE $condition";

 		$query=$this->conn->query($sql);
 		if($this->conn->affected_rows > 0){
 			return true;
 		}
 		else{
 			return false;
 		}

 	}

 

 	//:::::::::::::::::::::::::::::::::::::::

 	public function selectToproduct($table,$cols,$condition){
 		$sql="SELECT $cols FROM $table WHERE $condition";
 		$query=$this->conn->query($sql);
 		if($query->num_rows>0){
 			return $query->fetch_assoc();
 		}
 		else{
 			return false;
 		}


 	}

 	//  getall
 		public function selectallcart($table,$cols,$condition){
 		$sql="SELECT $cols FROM $table WHERE $condition";
 		$query=$this->conn->query($sql);
 		if($query->num_rows>0){
 			return $query->fetch_all(MYSQLI_ASSOC);
 		}
 		else{
 			return false;
 		}


 	}

 	//::::::::::::::::::::::chquery select with condition
 	    public function selectbyidwith_sid($table,$cols,$condition,$sid){
 		$sql="SELECT $cols FROM $table WHERE $condition AND $sid";
 		$query=$this->conn->query($sql);
 		if($query->num_rows>0){
 			return $query->fetch_assoc();
 		}
 		else{
 			return false;
 		}

 	}

 }

 $connect_cart=new CART("localhost","root","","shop");



 ?>