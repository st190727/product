<?php
include_once 'config/database.php';
$database = new Database();
$db = $database->getConnection();

include_once 'cl_product.php';

class Disk  extends Product2 {
	
	public  $size; 
	public  $type; 
	
	public function  initialization_size($datadisk)
    {
	   if(isset ($datadisk['size']))
       {
			$this->size       = $datadisk['size'];
	   }
    }
	
    public function __construct($db, $arr, $datadisk)
    { 
		$this->conn = $db;
        $this->initialization($arr);
		$this->initialization_size($datadisk);		
    }
	
    public function getSize()
    {
        return $this->size;
    }

	public function  save()
    {	
        echo "<br/>";
		
        $sql_insert_d = "INSERT INTO products VALUES (NULL, '$this->sku', 
                                                            '$this->name',
                                                            '$this->price',
                                                            '$this->type', 
                                                            '$this->size', '', '', '', '')";
        $stmt = $this->conn->prepare($sql_insert_d);
        $stmt->execute();
	}

	public function  get_type($type)
    {
        if($type=='disk')
            {
                $this->type="disk";
            }
        else if($type=='book')
            {
                $this->type="book";
            }
        else	
            {
                $this->type="furniture";
            }
        return $type;
    }
	public function showProduct() 
    {
        echo "<br>Disk <br>" . $this->getSku() . " <br>" . $this->getName() . " <br>" . $this->getPrice() . "<br>Size: " . $this->getSize() . "<br><br>";
    } 
 
 }					
?>