<?php 
// :::::::::::developer sharif khan
 class Product{
 	private $conn;
 	public function __construct($host,$user,$pass,$db){
      $this->conn=new mysqli($host,$user,$pass,$db);
      if ($this->conn->connect_errno){
      	  die("database connection Fail!".$this->conn->connect_error);
      }
 	} 

  //letest product order by product_id   but condition brand_id .... letest brand new product

 	public function letestProduct($table,$cols,$condition,$orderid,$limit){
         $sql="SELECT $cols FROM $table WHERE $condition ORDER BY $orderid DESC LIMIT $limit";

         $query=$this->conn->query($sql);
         if($query->num_rows>0){
            return $query->fetch_assoc();
         }
         else{
         	return false;
         }
 	}


  // products form category::::::::::::::::
      //  getall
    public function selectallcategory($table,$cols,$condition){
    $sql="SELECT $cols FROM $table ORDER BY $condition DESC";
    $query=$this->conn->query($sql);
    if($query->num_rows>0){
      return $query->fetch_all(MYSQLI_ASSOC);
    }
    else{
      return false;
    }


  }

  //:::::::::::::select product form category
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
  


 }

 $connect_pro=new Product("localhost","root","","shop");



 ?>