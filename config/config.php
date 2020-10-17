<?php 
 class Db{
 	private $conn;
 	public function __construct($host,$user,$pass,$db){
      $this->conn=new mysqli($host,$user,$pass,$db);
      if ($this->conn->connect_errno){
      	  die("database connection Fail!".$this->conn->connect_error);
      }
 	} 
 }

 $connect=new Db("localhost","root","","shop");

 ?>