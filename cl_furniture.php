<?php
include_once 'config/database.php';
$database = new Database();
$db = $database->getConnection();

	class Furniture  extends Product2 
    {
	    private $height = "";
	    private $width = "";
	    private $length = "";
	    public  $type; 
	
	public function  initialization_dimensions($datafurniture)
    { 
        $this->height       = $datafurniture['height'];
		$this->width        = $datafurniture['width'];
		$this->length       = $datafurniture['length'];
    }
    public function __construct($db, $arr, $datafurniture)
    {
		$this->conn = $db;
        $this->initialization($arr);
		$this->initialization_dimensions($datafurniture);		
    }
	
    public function getHeight()
    {
        return $this->height;
    }
    public function getWidth()
    {
        return $this->width;
    }
    public function getLength()
    {
        return $this->length;
    }
	

	function  save()
    {	
        echo "<br/>";
        $sql_insert_f = "INSERT INTO products VALUES (NULL, 
                                                            '$this->sku', 
                                                            '$this->name',
                                                            '$this->price',
                                                            '$this->type', 
                                                            '', 
                                                            '', 
                                                            '$this->width', 
                                                            '$this->height', 
                                                            '$this->length')";
        $stmt = $this->conn->prepare($sql_insert_f);
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
        echo "Furniture <br>" . $this->getSku() . " <br>" 
                              . $this->getName() . " <br>" 
                              . $this->getPrice() . "<br>Dimensions: " 
                              . $this->getHeight() . " x " 
                              . $this->getWidth() . " x " 
                              . $this->getLength() . "<br><br>";
    }  
 }					
?>