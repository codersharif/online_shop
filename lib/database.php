<?php 
// :::::::::::developer sharif khan
 class Db{
 	private $conn;
 	public function __construct($host,$user,$pass,$db){
      $this->conn=new mysqli($host,$user,$pass,$db);
      if ($this->conn->connect_errno){
      	  die("database connection Fail!".$this->conn->connect_error);
      }
 	} 

 	// insert function ;:::sharif khan
 	public function insert($table,$cols){
 		$sql="INSERT INTO $table SET $cols";

 		$query=$this->conn->query($sql);
 		if($this->conn->affected_rows > 0){
 			return true;
 		}
 		else{
 			return false;
 		}
 	} 
 	// select all function ;:::sharif khan 

 		public function selectall($table,$cols){
 		$sql="SELECT $cols FROM $table";

 		$query=$this->conn->query($sql);
 		if($query->num_rows>0){
 			return $query->fetch_all(MYSQLI_ASSOC);
 		}
 		else{
 			return false;
 		}
 	} 

  //select all with status  ::::::sharif khan

    public function selectallbytype($table,$cols,$condition){
    $sql="SELECT $cols FROM $table WHERE $condition";

    $query=$this->conn->query($sql);
    if($query->num_rows>0){
      return $query->fetch_all(MYSQLI_ASSOC);
    }
    else{
      return false;
    }
    
  }

  // select get order
    public function selectallorder($table,$cols,$condition,$order){
    $sql="SELECT $cols FROM $table WHERE $condition ORDER BY $order DESC";
    $query=$this->conn->query($sql);
    if($query->num_rows>0){
      return $query->fetch_all(MYSQLI_ASSOC);
    }
    else{
      return false;
    }


  }

  //data select
  public function selectOrderBy($table,$cols,$condition){
     $sql="SELECT $cols FROM $table ORDER BY $condition";
     $query=$this->conn->query($sql);
     if ($query->num_rows > 0){
        return $query->fetch_all(MYSQLI_ASSOC);
     }
     else{
      return false;
     }
  }


 	// selectbyid function ;:::sharif khan 

 		public function selectbyid($table,$cols,$condition){
 		$sql="SELECT $cols FROM $table WHERE $condition";

 		$query=$this->conn->query($sql);
 		if($query->num_rows>0){
 			return $query->fetch_assoc();
 		}
 		else{
 			return false;
 		}
 	} 
 	// Update function ;:::sharif khan 
 	public function update($table,$cols,$condition){
       $sql="UPDATE $table SET $cols WHERE $condition";

       $query=$this->conn->query($sql);
       if ($this->conn->affected_rows>0){
       	  return true;
       }
       else{
       	return false;
       }
 	}
 	// Delete function ;:::sharif khan 
 	public function delete($table,$condition){
 		$sql="DELETE FROM $table WHERE $condition";

 		$query=$this->conn->query($sql);
 		if ($this->conn->affected_rows >0){
 			return true;
 		}
 		else{
 			return false;
 		}
 	}

// select order by desc ::::::::::::::::::::::::
   public function getbyDESC($table,$cols,$condition){
       $sql="SELECT $cols FROM $table ORDER BY $condition DESC";

       $query=$this->conn->query($sql);
       if($query->num_rows>0){
                  return $query->fetch_all(MYSQLI_ASSOC);
            }
            else{
                  return false;
       }

   }


   //multitable table inner join order desc::::sharif::::::::::::::::::just use product table::
   public function getBYinnerjoni(){
     $sql="SELECT product.*,categories.cat_name,shop_brand.brand_name 
      FROM product
      INNER JOIN categories
      ON product.cat_id=categories.cat_id
      INNER JOIN shop_brand
      ON product.brand_id=shop_brand.brand_id
      ORDER BY product.product_id DESC ";

      $query=$this->conn->query($sql);
      if ($query->num_rows >0){
         return $query->fetch_all(MYSQLI_ASSOC);
      }
      else{
        return false;
      }
      
    }

  //getby single id by use alias and join table ::::::coder sharif:::just use product table
    public function getBySingleid($id){
       $sql="SELECT p.*,c.cat_name,b.brand_name FROM product as p,categories as c,shop_brand as b
       WHERE p.cat_id=c.cat_id AND p.brand_id=b.brand_id AND p.product_id='$id'";

       $query=$this->conn->query($sql);

       if ($query->num_rows>0){
         return $query->fetch_assoc();
       }
       else{
        return false;
       }

    }


//:::::::get all by type order by desc ::::::::::::::::::::coder sharif
      public function getallbyTypeDesc($table,$cols,$type,$condition,$limit){
      $sql="SELECT $cols FROM $table WHERE $type ORDER by $condition DESC LIMIT $limit";

      $query=$this->conn->query($sql);
      if ($query->num_rows>0){
        return $query->fetch_all(MYSQLI_ASSOC);
      }
      return false;
   }

// getall without type and order by desc
         public function getallbyDesc($table,$cols,$condition,$limit){
       $sql="SELECT $cols FROM $table ORDER by $condition DESC LIMIT $limit";

      $query=$this->conn->query($sql);
      if ($query->num_rows>0){
        return $query->fetch_all(MYSQLI_ASSOC);
      }
      return false;
   }


 }

 $connect=new Db("localhost","root","","shop");





 ?>