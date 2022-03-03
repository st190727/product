<?php
include_once 'config/database.php';
    
    $database = new Database();
    $db = $database->getConnection();

require_once("cl_product.php");


 class Book  extends Product2 
 {
	
	public  $weight; 
	public  $type; 
	
	public function  initialization_weight($databook)
    { 
	   if (isset ($databook['weight']))
        {
			$this->weight       = $databook['weight'];
		}
    }
	
    public function __construct($db, $arr, $databook)
    {
		$this->conn = $db;
        $this->initialization($arr);
		$this->initialization_weight($databook);		
    }

    public function getWeight()
    {
        return $this->weight;
    }
	
	function  save()
    {	
        echo "<br/>";
		
        $sql_insert = "INSERT INTO products VALUES (NULL, '$this->sku', '$this->name','$this->price','$this->type', '', '$this->weight', '', '', '')";
		$stmt = $this->conn->prepare($sql_insert);
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
        echo "Book <br>" . $this->getSku() . " <br>" . $this->getName() . " <br>" . $this->getPrice() . "<br>Weight: " . $this->getWeight() . "<br><br>";
	}
 }					
?>